<!-- //header style One -->
<header id="headerOne" class="header-area header-one header-desktop d-none d-lg-block d-xl-block">
    <div class="header-mini bg-top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <nav id="navbar_0_2" class="navbar navbar-expand-md navbar-dark navbar-0">
              <div class="navbar-lang">

                @if(count($languages) > 1)
                <div class="dropdown">

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <img src="{{asset('').session('language_image')}}" width="17px" />
                     {{	session('language_name')}}
                    </button>
                    <ul class="dropdown-menu">
                      @foreach($languages as $language)
                      <li  @if(session('locale')==$language->code) style="background:lightgrey;" @endif>
                        <button  onclick="myFunction1({{$language->languages_id}})" class="btn" style="background:none;" href="#">
                          <img style="margin-left:10px; margin-right:10px;"src="{{asset('').$language->image_path}}" width="17px" />
                          <span>{{$language->name}}</span>
                        </button>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  @include('web.common.scripts.changeLanguage')
                  @endif
                  @if(count($currencies) > 1)
                  <div class="dropdown">

                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                        @if(session('symbol_left') != null)
                        <span >{{session('symbol_left')}}</span>
                        @else
                        <span >{{session('symbol_right')}}</span>
                        @endif
                       {{session('currency_code')}}


                      </button>
                      <ul class="dropdown-menu">
                        @foreach($currencies as $currency)
                        <li  @if(session('currency_title')==$currency->code) style="background:lightgrey;" @endif>
                          <button  onclick="myFunction2({{$currency->id}})" class="btn" style="background:none;" href="#">
                            @if($currency->symbol_left != null)
                            <span style="margin-left:10px; margin-right:10px;">{{$currency->symbol_left}}</span>
                            <span>{{$currency->code}}</span>
                            @else
                            <span style="margin-left:10px; margin-right:10px;">{{$currency->symbol_right}}</span>
                            <span>{{$currency->code}}</span>
                            @endif
                          </button>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    @include('web.common.scripts.changeCurrency')
                    @endif
              </div>
              <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="nav-avatar nav-link">
                          <div class="avatar">
                          <?php
                          if(auth()->guard('customer')->check()){
                           if(auth()->guard('customer')->user()->avatar == null){ ?>
                            <img class="img-fluid" src="{{asset('web/images/miscellaneous/avatar.jpg')}}">
                          <?php }else{ ?>
                            <img class="img-fluid" src="{{auth()->guard('customer')->user()->avatar}}">
                          <?php
                                }
                             }
                          ?>
                          </div>
                          <span><?php if(auth()->guard('customer')->check()){ ?>@lang('website.Welcome')&nbsp;! {{auth()->guard('customer')->user()->first_name}} <?php }?> </span>
                        </div>
                      </li>
                      <?php if(auth()->guard('customer')->check()){ ?>
                      <li class="nav-item"> <a href="{{url('profile')}}" class="nav-link">@lang('website.Profile')</a> </li>
                      <li class="nav-item"> <a href="{{url('wishlist')}}" class="nav-link">@lang('website.Wishlist')</a> </li>
                      <li class="nav-item"> <a href="{{url('compare')}}" class="nav-link">@lang('website.Compare')&nbsp;(<span id="compare">{{$count}}</span>)</a> </li>
                      <li class="nav-item"> <a href="{{url('orders')}}" class="nav-link">@lang('website.Orders')</a> </li>
                      <li class="nav-item"> <a href="{{url('shipping-address')}}" class="nav-link">@lang('website.Shipping Address')</a> </li>
                      <li class="nav-item"> <a href="{{url('logout')}}" class="nav-link padding-r0">@lang('website.Logout')</a> </li>
                      <?php }else{ ?>
                        <li class="nav-item"><div class="nav-link">@lang('website.Welcome')!</div></li>
                        <li class="nav-item"> <a href="{{ URL::to('/guest_checkout')}}" class="nav-link -before">@lang('website.Guest Checkout')</a> </li>
                        <li class="nav-item"> <a href="{{url('orders')}}" class="nav-link">@lang('website.Orders')</a> </li>
                        <li class="nav-item"> <a href="{{ URL::to('/login')}}" class="nav-link -before"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;@lang('website.Login/Register')</a> </li>

                      <?php } ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="header-navbar logo-nav bg-menu-bar">
      <div class="container">
        <nav id="navbar_1_2" class="navbar navbar-expand-lg  bg-nav-bar">
        <a href="{{ URL::to('/')}}" class="logo">
    @if($result['commonContent']['setting'][77]->value=='name')
    <?=stripslashes($result['commonContent']['setting'][78]->value)?>
    @endif

    @if($result['commonContent']['setting'][77]->value=='logo')
    <img src="{{asset('').$result['commonContent']['setting'][15]->value}}" alt="<?=stripslashes($result['commonContent']['setting'][79]->value)?>">
    @endif
    </a>
          <div class=" navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link " href="{{url('/')}}" >
                    @lang('website.Home')
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="{{url('/shop')}}"  >
                    @lang('website.Shop')
                    <span class="badge badge-secondary">Hot</span>
                  </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" >
                      @lang('website.News')
                    </a>
                    <div class="dropdown-menu">
                      @foreach($result['commonContent']['newsCategories'] as $categories)
                          <div class="dropdown-submenu">
                            <a class="dropdown-item" href="{{ URL::to('/news?category='.$categories->slug)}}">{{$categories->name}}</a>
                          </div>
                      @endforeach

                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" >
                    @lang('website.infoPages')
                  </a>
                  <div class="dropdown-menu">
                    @foreach($result['commonContent']['pages'] as $page)
                      <a class="dropdown-item" href="{{ URL::to('/page?name='.$page->slug)}}">
                        {{$page->name}}
                      </a>
                    @endforeach
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="{{url('contact')}}" >
                    @lang('website.Contact Us')
                  </a>
                </li>
                <li class="nav-item ">
                      <a href="{{url('shop?type=special')}}"class="btn btn-secondary">@lang('website.SPECIAL DEALS')</a>
                    </li>
              </ul>
            </div>

        </nav>
      </div>
    </div>
    <div class="header-maxi bg-header-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-8">
            <form class="form-inline" action="{{ URL::to('/shop')}}" method="get">
              <div class="search">
                  <div class="select-control">
                      <select class="form-control" name="category">
                       @include('web.common.HeaderCategories')
                       @php    productCategories(); @endphp
                      </select>
                    </div>
                    <input type="search"  name="search" placeholder="@lang('website.Search entire store here')..." value="{{ app('request')->input('search') }}" aria-label="Search">
                <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>
          <div class="col-12 col-lg-4">
            <ul class="top-right-list">
              <li class="phone-header">
                <a href="#">
                    <i class="fas fa-phone"></i>
                    <span class="block">
                      <span class="title">@lang('website.Call Us Now')</span>
                      <span class="items">{{$result['commonContent']['setting'][11]->value}}</span>
                    </span>
                </a>
              </li>
              <li class="cart-header dropdown head-cart-content d-none d-md-block">
                <?php $qunatity=0; ?>
                                @foreach($result['commonContent']['cart'] as $cart_data)
                                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>
                                @endforeach

                                <a href="#" id="dropdownMenuButton" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="badge badge-secondary">{{ $qunatity }}</span>
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    <!--<img class="img-fluid" src="{{asset('').'public/images/shopping_cart.png'}}" alt="icon">-->

                                    <span class="block">
                                    	<span class="title">@lang('website.My Cart')</span>
                                        @if(count($result['commonContent']['cart'])>0)
                                            <span class="items">{{ count($result['commonContent']['cart']) }}&nbsp;@lang('website.items')</span>
                                        @else
                                            <span class="items">(0)&nbsp;@lang('website.item')</span>
                                        @endif
                                    </span>
                                </a>

                                @if(count($result['commonContent']['cart'])>0)
                                @php
                                $default_currency = DB::table('currencies')->where('is_default',1)->first();
                                if($default_currency->id == Session::get('currency_id')){

                                  $currency_value = 1;
                                }else{
                                  $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();

                                  $currency_value = $session_currency->value;
                                }
                                @endphp
                                <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCartButton_9">
                                    <ul class="shopping-cart-items">
                                        <?php
                                            $total_amount=0;
                                            $qunatity=0;
                                        ?>
                                        @foreach($result['commonContent']['cart'] as $cart_data)

                                        <?php
                					             	$total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
                					            	$qunatity 	  += $cart_data->customers_basket_quantity; ?>
                                        <li>
                                            <div class="item-thumb">
                                            	<a href="{{ URL::to('/deleteCart?id='.$cart_data->customers_basket_id)}}" class="icon" ><img class="img-fluid" src="{{asset('').'web/images/close.png'}}" alt="icon"></a>
                                            	<div class="image">
                                                	<img class="img-fluid" src="{{asset('').$cart_data->image}}" alt="{{$cart_data->products_name}}"/>
                                                </div>
                                            </div>
                                            <div class="item-detail">
                                              <h2 class="item-name">{{$cart_data->products_name}}</h2>
                                              <span class="item-quantity">@lang('website.Qty')&nbsp;:&nbsp;{{$cart_data->customers_basket_quantity}}</span>
                                              <span class="item-price">{{Session::get('symbol_left')}}{{$cart_data->final_price*$cart_data->customers_basket_quantity*$currency_value}}{{Session::get('symbol_right')}}</span>
                                           </div>
                                        </li>
                                        @endforeach
                                    <li>
                                      <div class="tt-summary">
                                      	  <p>@lang('website.items')<span>{{ $qunatity }}</span></p>
                                        	<p>@lang('website.SubTotal')<span>{{Session::get('symbol_left')}}{{ $total_amount*$currency_value }}{{Session::get('symbol_right')}}</span></p>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="buttons">
                                          <a class="btn btn-dark" href="{{ URL::to('/viewcart')}}">@lang('website.View Cart')</a>
                                          <a class="btn btn-secondary" href="{{ URL::to('/checkout')}}">@lang('website.Checkout')</a>
                                      </div>
                                   </li>
                                 </ul>

                                </div>

                				@else

                                <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <ul class="shopping-cart-items">
                                        <li>@lang('website.You have no items in your shopping cart')</li>
                                    </ul>
                                </div>
                                @endif

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
