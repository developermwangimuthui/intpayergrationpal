<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\AdminControllers\SiteSettingController;
use App\ProductOther;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Web\AlertController;
use App\Models\Core\Payments_setting;
use Illuminate\Support\Facades\DB;
use Validator;

use Hash;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lang;
use Carbon;

// use Illuminate\Support\Facades\Mail;
use Session;
use View;
use Config;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\Models\Web\Currency;
use App\Models\Web\News;
use App\Models\Web\Order;
use App\User;
use Illuminate\Support\Facades\Mail;
class IndexController extends Controller
{

    public function __construct(
        Index $index,
        News $news,
        Languages $languages,
        Products $products,
        Currency $currency,
        Order $order
    )
    {
        $this->index = $index;
        $this->order = $order;
        $this->news = $news;
        $this->languages = $languages;
        $this->products = $products;
        $this->currencies = $currency;
        $this->theme = new ThemeController();
    }

    public function index()
    {

        $title = array('pageTitle' => Lang::get("website.Home"));
        $final_theme = $this->theme->theme();
        /*********************************************************************/
        /**                   GENERAL CONTENT TO DISPLAY                    **/
        /*********************************************************************/
        $result = array();
        $result['commonContent'] = $this->index->commonContent();
        $title = array('pageTitle' => Lang::get("website.Home"));
        /********************************************************************/

        /*********************************************************************/
        /**                   GENERAL SETTINGS TO FETCH PRODUCTS           **/
        /*******************************************************************/

        /**  SET LIMIT OF PRODUCTS  **/
        if (!empty($request->limit)) {
            $limit = $request->limit;
        } else {
            $limit = 12;
        }

        /**  MINIMUM PRICE **/
        if (!empty($request->min_price)) {
            $min_price = $request->min_price;
        } else {
            $min_price = '';
        }

        /**  MAXIMUM PRICE  **/
        if (!empty($request->max_price)) {
            $max_price = $request->max_price;
        } else {
            $max_price = '';
        }
        /*************************************************************************/
        /*********************************************************************/
        /**                     FETCH NEWEST PRODUCTS                       **/
        /*********************************************************************/

        $data = array('page_number' => '0', 'type' => '', 'limit' => 10, 'min_price' => $min_price, 'max_price' => $max_price);
        $newest_products = $this->products->products($data);
        $result['products'] = $newest_products;
        /*********************************************************************/
        /**                     Compare Counts                              **/
        /*********************************************************************/

        /*********************************************************************/

        /***************************************************************/
        /**   CART ARRAY RECORDS TO CHECK WETHER OR NOT DISPLAYED--   **/
        /**  --PRODUCT HAS BEEN ALREADY ADDE TO CART OR NOT           **/
        /***************************************************************/
        $cart = '';
        $result['cartArray'] = $this->products->cartIdArray($cart);
        /**************************************************************/

        //special products
        $data = array('page_number' => '0', 'type' => 'special', 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price);
        $special_products = $this->products->products($data);
        $result['special'] = $special_products;
        //Flash sale

        $data = array('page_number' => '0', 'type' => 'flashsale', 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price);
        $flash_sale = $this->products->products($data);
        $result['flash_sale'] = $flash_sale;
        // //top seller
        $data = array('page_number' => '0', 'type' => 'topseller', 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price);
        $top_seller = $this->products->products($data);
        $result['top_seller'] = $top_seller;

        //most liked
        $data = array('page_number' => '0', 'type' => 'mostliked', 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price);
        $most_liked = $this->products->products($data);
        $result['most_liked'] = $most_liked;


        //is feature
        $data = array('page_number' => '0', 'type' => 'is_feature', 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price);
        $featured = $this->products->products($data);
        $result['featured'] = $featured;

        $data = array('page_number' => '0', 'type' => '', 'limit' => 3, 'is_feature' => 1);
        $news = $this->news->getAllNews($data);
        $result['news'] = $news;
        //current time

        $currentDate = Carbon\Carbon::now();
        $currentDate = $currentDate->toDateTimeString();


        $slides = $this->index->slides($currentDate);
        $result['slides'] = $slides;
        //liked products
        $result['liked_products'] = $this->products->likedProducts();

        $orders = $this->order->getOrders();
        if (count($orders) > 0) {
            $allOrders = $orders;
        } else {
            $allOrders = $this->order->allOrders();
        }

        $temp_i = array();
        foreach ($allOrders as $orders_data) {
            $mostOrdered = $this->order->mostOrders($orders_data);
            foreach ($mostOrdered as $mostOrderedData) {
                $temp_i[] = $mostOrderedData->products_id;
            }
        }
        $detail = array();
        $temp_i = array_unique($temp_i);
        foreach ($temp_i as $temp_data) {
            $data = array('page_number' => '0', 'type' => '', 'products_id' => $temp_data, 'limit' => 7, 'min_price' => '', 'max_price' => '');
            $single_product = $this->products->products($data);
            if (!empty($single_product['product_data'][0])) {
                $detail[] = $single_product['product_data'][0];
            }
        }

        $result['weeklySoldProducts'] = array('success' => '1', 'product_data' => $detail, 'message' => "Returned all products.", 'total_record' => count($detail));
        return view("web.index", ['title' => $title, 'final_theme' => $final_theme])->with(['result' => $result]);
    }

    public function maintance()
    {
        return view('errors.maintance');
    }


    public function paymentsgateway()
    {

        $products = DB::table('products')->join('products_description', 'products.products_id', '=', 'products_description.products_id')->groupBy('products.products_id')->get();

        $payments = DB::table('payment_methods')->get();
        $id = 'id';
        $paypal_id = DB::table('payment_methods_detail')->where('key', '=', 'id')->pluck('value')->first();

        $enviroment = DB::table('payment_methods')->where('payment_methods_id', '=', 3)->pluck('environment')->first();
    

        if ($enviroment == 0) {
            $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        } else {
            $url = 'https://www.paypal.com/cgi-bin/webscr';
        }


        return view('front.index', ['products' => $products, 'paymentss' => $payments, 'url' => $url, 'paypal_id' => $paypal_id]);
    }

    public function ajax()
    {

        foreach ($_REQUEST as $key => $value) {
            $customer_data[$key] = $value;
        }

        $address = (object)$customer_data;
        session(['data' => $address]);

        return json_encode(session('data'));
    }

    public function cancel()
    {
        /*echo '<pre>';echo print_r(session('data'));exit;
       echo 'your payment is cancel';exit;*/


        if (!empty(session('data'))) {
            $orders_id = DB::table('orders')->insertGetId(
                [
                    'total_tax' => 0.00,
                    'customers_id' => 1,
                    'customers_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'customers_company' => 'other',
                    'customers_street_address' => 'other',
                    'customers_suburb' => 'other',
                    'customers_city' => 'other',
                    'customers_postcode' => 'other',
                    'customers_state' => 'other',
                    'customers_country' => 'other',
                    'customers_telephone' => 'other',

                    'email' => session('data')->email_address,
                    'customers_address_format_id' => 1,

                    'delivery_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'delivery_street_address' => 'other',
                    'delivery_suburb' => 'other',
                    'delivery_city' => 'other',
                    'delivery_postcode' => 'other',
                    'delivery_state' => 'other',
                    'delivery_country' => 'other',
                    'delivery_address_format_id' => 'other',

                    'billing_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'billing_street_address' => 'other',
                    'billing_suburb' => 'other',
                    'billing_city' => 'other',
                    'billing_postcode' => 'other',
                    'billing_state' => 'other',
                    'billing_country' => 'other',
                    'billing_address_format_id' => 'other',

                    'payment_method' => 'PayPal',
                    'cc_type' => 'other',
                    'cc_owner' => 'other',
                    'cc_number' => 'other',
                    'cc_expires' => 'oer',
                    'last_modified' => date('Y-m-d H:i:s'),
                    'date_purchased' => date('Y-m-d H:i:s'),
                    'orders_date_finished' => date('Y-m-d H:i:s'),
                    'currency' => session('data')->currency_type,
                    'currency_value' => '0.00',
                    'order_price' => session('data')->enter_amount,

                    'shipping_cost' => session('data')->enter_amount,

                    'shipping_method' => 'other',
                    'shipping_duration' => 3,
                    'order_information' => 'jhjhgjhg',
                    'is_seen' => 1,

                    'coupon_code' => '887',
                    'coupon_amount' => 0,
                    'exclude_product_ids' => '76',
                    'product_categories' => '78',
                    'excluded_product_categories' => '7',
                    'free_shipping' => 1,
                    'product_ids' => '1',


                    'ordered_source' => 1,
                    'delivery_phone' => '87897',
                    'billing_phone' => '767868',
                    'transaction_id' => '776786',
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s'),

                    // 'orders_status' => $orders_status,
                    //'orders_date_finished'  => $orders_date_finished,


                ]
            );


            $orders_history_id = DB::table('orders_status_history')->insertGetId(
                [
                    'orders_id' => $orders_id,
                    'orders_status_id' => 5,
                    'date_added' => date('Y-m-d h:i:s'),
                    'customer_notified' => 1,
                    'comments' => ''
                ]
            );

            $orders_products_id = DB::table('orders_products')->insertGetId(
                [
                    'orders_id' => $orders_id,
                    'products_id' => 1,
                    'products_name' => session('data')->services,
                    'products_price' => session('data')->enter_amount,
                    'final_price' => session('data')->enter_amount,
                    'products_tax' => 0.00,
                    'products_quantity' => 1,
                ]
            );
        }

        $email = session('data')->email_address;
        $emailmessage = 'Dear ' . session('data')->first_name . ' ' . session('data')->last_name . ',<br>You Order has been Placed but you have not paid your amount you are just one step to pay your amount. <br> <br> <p style="text-align:center;">We sent this email to ' . session('data')->first_name . '<br>
		Copyright © 2019-2020 Premium Freelancing Accounts All rights reserved.
		54 Beedstrasse, Düsseldorf, 40468, Germany</p>';
        $emailsubject = 'Product/Service Status';
        $client_name = session('data')->first_name . ' ' . session('data')->last_name;

        $myVar = new AlertController();
        $mail = $myVar->sendEmail($email, $emailmessage, $emailsubject, $client_name);

        return view('front.cancel', ['data' => session('data')]);
    }

    public function success()
    {

        if (!empty(session('data'))) {
            $users = User::where('email', session('data')->email_address)->get();
            $product = session('data')->services;
            $product_id = DB::table('products_description')->where('products_name', 'like', '%' . $product . '%')->pluck('products_id')->first();


            # check if email is less than 1
            if (sizeof($users) < 1) {
                $user = new User();
                $user->role_id = 2;
                $user->first_name = session('data')->first_name;
                $user->last_name = session('data')->last_name;
                $user->email = session('data')->email_address;
                $user->password = Hash::make(session('data')->first_name);
                if ($user->save()) {
                    $user_id = $user->id;
                    $customer_id = DB::table('customers')->insertGetId(
                        [
                            'user_id' => $user_id

                        ]
                    );
                }
            } else {
                $user_id = DB::table('users')->where('email', session('data')->email_address)->pluck('id')->first();
                $customer_id = DB::table('customers')->where('user_id', $user_id)->pluck('customers_id')->first();
            }

            if($product_id =='' || $product_id == null){
                $product_id = DB::table('products_description')->where('products_name', 'like', '%' . 'others' . '%')->pluck('products_id')->first();

//                $product_other = new ProductOther();
//                $product_other->product_id = $product_id;
//                $product_other->user_id =$user_id;
//                $product_other->others_name = $product;
//                $product_other->save();
            }


            $orders_id = DB::table('orders')->insertGetId(
                [
                    'total_tax' => 0.00,
                    'customers_id' => $customer_id,
                    'customers_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'customers_company' => 'other',
                    'customers_street_address' => 'other',
                    'customers_suburb' => 'other',
                    'customers_city' => 'other',
                    'customers_postcode' => 'other',
                    'customers_state' => 'other',
                    'customers_country' => 'other',
                    'customers_telephone' => 'other',

                    'email' => session('data')->email_address,
                    'customers_address_format_id' => 1,

                    'delivery_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'delivery_street_address' => 'other',
                    'delivery_suburb' => 'other',
                    'delivery_city' => 'other',
                    'delivery_postcode' => 'other',
                    'delivery_state' => 'other',
                    'delivery_country' => 'other',
                    'delivery_address_format_id' => 'other',

                    'billing_name' => session('data')->first_name . ' ' . session('data')->last_name,
                    'billing_street_address' => 'other',
                    'billing_suburb' => 'other',
                    'billing_city' => 'other',
                    'billing_postcode' => 'other',
                    'billing_state' => 'other',
                    'billing_country' => 'other',
                    'billing_address_format_id' => 'other',

                    'payment_method' => 'PayPal',
                    'cc_type' => 'other',
                    'cc_owner' => 'other',
                    'cc_number' => 'other',
                    'cc_expires' => 'oer',
                    'last_modified' => date('Y-m-d H:i:s'),
                    'date_purchased' => date('Y-m-d H:i:s'),
                    'orders_date_finished' => date('Y-m-d H:i:s'),
                    'currency' => session('data')->currency_type,
                    'currency_value' => '0.00',
                    'order_price' => session('data')->enter_amount,

                    'shipping_cost' => 0,

                    'shipping_method' => 'other',
                    'shipping_duration' => 3,
                    'order_information' => 'jhjhgjhg',
                    'is_seen' => 1,

                    'coupon_code' => '887',
                    'coupon_amount' => 0,
                    'exclude_product_ids' => '76',
                    'product_categories' => '78',
                    'excluded_product_categories' => '7',
                    'free_shipping' => 1,
                    'product_ids' => $product_id,


                    'ordered_source' => 1,
                    'delivery_phone' => '87897',
                    'billing_phone' => '767868',
                    //'transaction_id'	 =>	 	$_GET['tx'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                    // 'orders_status' => $orders_status,
                    //'orders_date_finished'  => $orders_date_finished,

                ]
            );


            $orders_history_id = DB::table('orders_status_history')->insertGetId(
                [
                    'orders_id' => $orders_id,
                    'orders_status_id' => 1,
                    'date_added' => date('Y-m-d H:i:s'),
                    'customer_notified' => 1,
                    'comments' => ''
                ]
            );

            $orders_products_id = DB::table('orders_products')->insertGetId(
                [
                    'orders_id' => $orders_id,
                    'products_id' => 1,
                    'products_name' => session('data')->services,
                    'products_price' => session('data')->enter_amount,
                    'final_price' => session('data')->enter_amount,
                    'products_tax' => 0.00,
                    'products_quantity' => 1,
                ]
            );

            $email = session('data')->email_address;
            $emailmessage = 'Dear ' . session('data')->first_name . ' ' . session('data')->last_name . ',<br>You have successfully paid ' . session('data')->currency_type . session('data')->enter_amount . ' We will let you know about your status on ' . session('data')->email_address . ' soon.<br> <br>';
            $emailsubject = 'Product/Service Status';
            $client_name = session('data')->first_name . ' ' . session('data')->last_name;


            $myVar = new AlertController();
            $mail = $myVar->sendEmail($email, $emailmessage, $emailsubject, $client_name);
        } else {

        }


        return view('front.success', ['data' => session('data')]);
    }


    public function error()
    {
        return view('errors.general_error', ['msg' => $msg]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->back();
    }

    public function test()
    {
        $productcategories = $this->products->productCategories1();
        echo print_r($productcategories);
    }

    private function setHeader($header_id)
    {
        $count = $this->order->countCompare();
        $languages = $this->languages->languages();
        $currencies = $this->currencies->getter();
        $productcategories = $this->products->productCategories();
        $title = array('pageTitle' => Lang::get("website.Home"));
        $result = array();
        $result['commonContent'] = $this->index->commonContent();

        if ($header_id == 1) {

            $header = (string)View::make('web.headers.headerOne', ['count' => $count, 'currencies' => $currencies, 'languages' => $languages, 'productcategories' => $productcategories, 'result' => $result])->render();
        } elseif ($header_id == 2) {
            $header = (string)View::make('web.headers.headerTwo');
        } elseif ($header_id == 3) {
            $header = (string)View::make('web.headers.headerThree')->render();
        } elseif ($header_id == 4) {
            $header = (string)View::make('web.headers.headerFour')->render();
        } elseif ($header_id == 5) {
            $header = (string)View::make('web.headers.headerFive')->render();
        } elseif ($header_id == 6) {
            $header = (string)View::make('web.headers.headerSix')->render();
        } elseif ($header_id == 7) {
            $header = (string)View::make('web.headers.headerSeven')->render();
        } elseif ($header_id == 8) {
            $header = (string)View::make('web.headers.headerEight')->render();
        } elseif ($header_id == 9) {
            $header = (string)View::make('web.headers.headerNine')->render();
        } else {
            $header = (string)View::make('web.headers.headerTen')->render();
        }
        return $header;
    }

    private function setBanner($banner_id)
    {
        if ($banner_id == 1) {
            $banner = (string)View::make('web.banners.banner1')->render();
        } elseif ($banner_id == 2) {
            $banner = (string)View::make('web.banners.banner2')->render();
        } elseif ($banner_id == 3) {
            $banner = (string)View::make('web.banners.banner3')->render();
        } elseif ($banner_id == 4) {
            $banner = (string)View::make('web.banners.banner4')->render();
        } elseif ($banner_id == 5) {
            $banner = (string)View::make('web.banners.banner5')->render();
        } elseif ($banner_id == 6) {
            $banner = (string)View::make('web.banners.banner6')->render();
        } elseif ($banner_id == 7) {
            $banner = (string)View::make('web.banners.banner7')->render();
        } elseif ($banner_id == 8) {
            $banner = (string)View::make('web.banners.banner8')->render();
        } elseif ($banner_id == 9) {
            $banner = (string)View::make('web.banners.banner9')->render();
        } elseif ($banner_id == 10) {
            $banner = (string)View::make('web.banners.banner10')->render();
        } elseif ($banner_id == 11) {
            $banner = (string)View::make('web.banners.banner11')->render();
        } elseif ($banner_id == 12) {
            $banner = (string)View::make('web.banners.banner12')->render();
        } elseif ($banner_id == 13) {
            $banner = (string)View::make('web.banners.banner13')->render();
        } elseif ($banner_id == 14) {
            $banner = (string)View::make('web.banners.banner14')->render();
        } elseif ($banner_id == 15) {
            $banner = (string)View::make('web.banners.banner15')->render();
        } elseif ($banner_id == 16) {
            $banner = (string)View::make('web.banners.banner16')->render();
        } elseif ($banner_id == 17) {
            $banner = (string)View::make('web.banners.banner17')->render();
        } elseif ($banner_id == 18) {
            $banner = (string)View::make('web.banners.banner18')->render();
        } elseif ($banner_id == 19) {
            $banner = (string)View::make('web.banners.banner19')->render();
        } else {
            $banner = (string)View::make('web.banners.banner20')->render();
        }
        return $banner;
    }

    private function setFooter($footer_id)
    {
        if ($footer_id == 1) {
            $footer = (string)View::make('web.footers.footer1')->render();
        } elseif ($footer_id == 2) {
            $footer = (string)View::make('web.footers.footer2')->render();
        } elseif ($footer_id == 3) {
            $footer = (string)View::make('web.footers.footer3')->render();
        } elseif ($footer_id == 4) {
            $footer = (string)View::make('web.footers.footer4')->render();
        } elseif ($footer_id == 5) {
            $footer = (string)View::make('web.footers.footer5')->render();
        } elseif ($footer_id == 6) {
            $footer = (string)View::make('web.footers.footer6')->render();
        } elseif ($footer_id == 7) {
            $footer = (string)View::make('web.footers.footer7')->render();
        } elseif ($footer_id == 8) {
            $footer = (string)View::make('web.footers.footer8')->render();
        } elseif ($footer_id == 9) {
            $footer = (string)View::make('web.footers.footer9')->render();
        } else {
            $footer = (string)View::make('web.footers.footer10')->render();
        }
        return $footer;
    }

    //page
    public function page(Request $request)
    {

        $pages = $this->order->getPages($request);
        if (count($pages) > 0) {
            $title = array('pageTitle' => $pages[0]->name);
            $final_theme = $this->theme->theme();
            $result['commonContent'] = $this->index->commonContent();
            $result['pages'] = $pages;
            return view("web.page", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
        } else {
            return redirect()->intended('/');
        }
    }

    //myContactUs
    public function contactus(Request $request)
    {
        $title = array('pageTitle' => Lang::get("website.Contact Us"));
        $result = array();
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();

        return view("web.contact-us", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
    }

    //processContactUs
    public function processContactUs(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $result['commonContent'] = $this->index->commonContent();

        $data = array('name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message, 'adminEmail' => $result['commonContent']['setting'][3]->value);

        Mail::send('/mail/contactUs', ['data' => $data], function ($m) use ($data) {
            $m->to($data['adminEmail'])->subject(Lang::get("website.contact us title"))->getSwiftMessage()
                ->getHeaders()
                ->addTextHeader('x-mailgun-native-send', 'true');
        });

        return redirect()->back()->with('success', Lang::get("website.contact us message"));
    }
}
