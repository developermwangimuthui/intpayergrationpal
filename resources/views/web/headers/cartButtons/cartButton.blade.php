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
<div class="d-lg-none d-md-none d-xs-block d-sm-block">
<?php $qunatity=0; ?>
                @foreach($result['commonContent']['cart'] as $cart_data)
                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>
                @endforeach

                <a class="cart-dropdown-toggle" href="#" role="button" id="ddAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cart-arrow-down" aria-hidden="true"></i>
                    <span class="badge badge-secondary">{{ $qunatity }}</span>

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
                <div class="cart-dropdown-menu dropdown-menu dropdown-menu-right" aria-labelledby="ddaction">
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


<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
