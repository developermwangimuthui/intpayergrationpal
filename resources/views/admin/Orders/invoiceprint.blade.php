@extends('admin.layout')
<style>
.wrapper.wrapper2{
	display: block;
}
.wrapper{
	display: none;
}
@media print {
body {-webkit-print-color-adjust: exact;}
}
</style>
<body onload="window.print();">
<div class="wrapper wrapper2" style="display: block;">
  <!-- Main content -->
  <section class="invoice" style="margin: 15px;">
      <!-- title row -->
      <div class="col-xs-12">
      <div class="row">
       @if(session()->has('message'))
      	<div class="alert alert-success alert-dismissible">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           <h4><i class="icon fa fa-check"></i> {{ trans('labels.Successlabel') }}</h4>
            {{ session()->get('message') }}
        </div>
        @endif
        @if(session()->has('error'))
        	<div class="alert alert-warning alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-warning"></i> {{ trans('labels.WarningLabel') }}</h4>
                {{ session()->get('error') }}
            </div>

        @endif


       </div>
      </div>
      <div class="row">
        <div class="col-xs-12">

            <div class="col-xs-4">

                    <img src="https://pfaccounts.com/wp-content/uploads/2019/10/pfa-2.png" height="40px;" width="100px">

            </div>
            <div class="col-xs-4">

            </div>
            <div class="col-xs-4">

                <small class="">
                    <b>Premium Freelancing Accounts</b><br>
                    Beedstrasse 54 40468 Dusseldorf Germany
                    </small>
            </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h2>{{ trans('Invoice') }}</h2>
          <address>
            <strong>{{ $data['orders_data'][0]->customers_name }}</strong><br>
            <!--{{ $data['orders_data'][0]->customers_street_address }} <br>
            {{ $data['orders_data'][0]->customers_city }}, {{ $data['orders_data'][0]->customers_state }} {{ $data['orders_data'][0]->customers_postcode }}, {{ $data['orders_data'][0]->customers_country }}<br>
            {{ trans('labels.Phone') }}: &nbsp;{{ $data['orders_data'][0]->customers_telephone }}<br>-->
            {{ trans('labels.Email') }}:{{ $data['orders_data'][0]->email }}<br><br>



          </address>



        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          {{--{{ trans('labels.ShippingInfo') }}
          <address>
            <strong>{{ $data['orders_data'][0]->delivery_name }}</strong><br>
            {{ trans('labels.Phone') }}: {{ $data['orders_data'][0]->delivery_phone }}<br>
            {{ $data['orders_data'][0]->delivery_street_address }} <br>
            {{ $data['orders_data'][0]->delivery_city }}, {{ $data['orders_data'][0]->delivery_state }} {{ $data['orders_data'][0]->delivery_postcode }}, {{ $data['orders_data'][0]->delivery_country }}<br>
           <strong> {{ trans('labels.ShippingMethod') }}:</strong> {{ $data['orders_data'][0]->shipping_method }} <br>
           <strong> {{ trans('labels.ShippingCost') }}:</strong> @if(!empty($data['orders_data'][0]->shipping_cost)) {{ $data['currency'][19]->value }}{{ $data['orders_data'][0]->shipping_cost }} @else --- @endif <br>
          </address>--}}.
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         {{--{{ trans('labels.BillingInfo') }}
          <address>
            <strong>{{ $data['orders_data'][0]->billing_name }}</strong><br>
            {{ trans('labels.Phone') }}: {{ $data['orders_data'][0]->billing_phone }}<br>
            {{ $data['orders_data'][0]->billing_street_address }} <br>
            {{ $data['orders_data'][0]->billing_city }}, {{ $data['orders_data'][0]->billing_state }} {{ $data['orders_data'][0]->billing_postcode }}, {{ $data['orders_data'][0]->billing_country }}<br>
          </address>--}}
          <Br><br>
          {{ trans('Order Number') }}: &nbsp;&nbsp;&nbsp;&nbsp; {{'PF'.$data['orders_data'][0]->orders_id }} <br>
            <small class="">{{ trans('labels.OrderedDate') }}:&nbsp;&nbsp;&nbsp;&nbsp; {{ date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased)) }}</small>
            <br>
            {{ trans('labels.PaymentMethods') }}:&nbsp;&nbsp;&nbsp;&nbsp;{{ str_replace('_',' ', $data['orders_data'][0]->payment_method) }}

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead style="background-color:#000; color:#ffffff;!important">
            <tr >
              <th>Item</th>
              <th>{{ trans('labels.Qty') }}</th>
              <th></th>
              <th></th>
              <th></th>
              <th>{{ trans('labels.Price') }}</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                  <td  width="30%">
                    {{  $data['prod_des']->products_name }}<br>
                </td>
                <td>{{  $data['prod_des']->products_quantity }}</td>


                <td></td>
                <td></td>
                <td></td>
                <td style="text-align:center"> @if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                        {{ $data['prod_des']->final_price }}
                </td>
             </tr>

            <!--@foreach($data['orders_data'][0]->data as $products)

            <tr>
                <td>{{  $products->products_quantity }}</td>
                <td  width="30%">
                    {{  $products->products_name }}<br>
                </td>
                <td>
                    {{  $products->products_model }}
                </td>
                <td>
                @foreach($products->attribute as $attributes)
                	<b>{{ trans('labels.Name') }}:</b> {{ $attributes->products_options }}<br>
                    <b>{{ trans('labels.Value') }}:</b> {{ $attributes->products_options_values }}<br>
                    <b>{{ trans('labels.Price') }}:</b> {{ $data['currency'][19]->value }}{{ $attributes->options_values_price }}<br>

                @endforeach</td>

                <td>{{ $data['currency'][19]->value }}{{ $products->final_price }}</td>
             </tr>
            @endforeach-->

            </tbody>
          </table>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">

          {{--@if(!empty($data['orders_data'][0]->coupon_code))
              <p class="lead" style="margin-bottom:10px">{{ trans('labels.Coupons') }}:</p>
                <table class="text-muted well well-sm no-shadow stripe-border table table-striped" style="text-align: center; ">
                	<tr>
                        <th style="text-align: center; ">{{ trans('labels.Code') }}</th>
                        <th style="text-align: center; ">{{ trans('labels.Amount') }}</th>
                    </tr>

				</table>
          @endif--}}

          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">


              <tr style="outline: thin solid grey;">
                <th style="width:50%">{{ trans('labels.Subtotal') }}:</th>
                <td>@if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                    {{ $data['subtotal'] }}</td>
              </tr>
              <tr style="outline: thin solid grey;">
                <th>{{ trans('labels.Tax') }}:</th>
                <td>@if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                    {{ $data['orders_data'][0]->total_tax }}</td>
              </tr>

              @if(!empty($data['orders_data'][0]->coupon_code))
              <tr style="outline: thin solid grey;">
                <th>{{ trans('labels.DicountCoupon') }}:</th>
                <td>@if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                    {{ $data['orders_data'][0]->coupon_amount }}</td>
              </tr>
              @endif
              <tr style="outline: thin solid black;">
                <th>{{ trans('labels.Total') }}:</th>
                <td>
                    @if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                    {{ $data['orders_data'][0]->order_price }}</td>
              </tr>

            </table>
          </div>

        </div>


        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->


</body>

