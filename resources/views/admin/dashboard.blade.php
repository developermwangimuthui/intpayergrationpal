@extends('admin.layout')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>{{ trans('labels.title_dashboard') }} {{$result['currency'][105]->value}}</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if($role->dashboard_view == 1)
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $result['total_orders'] }}</h3>
                                <p>{{ trans('labels.NewOrders') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ URL::to('admin/orders/display')}}" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="{{ trans('labels.viewAllOrders') }}">{{ trans('labels.viewAllOrders') }} <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                {{--<div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-light-blue">
                    <div class="inner">
                      <h3>{{ $result['currency'][19]->value }}{{ $result['total_money'] }}</h3>
        			  <p>{{ trans('labels.Total Money') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ URL::to('admin/products/display')}}" class="small-box-footer" data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.viewAllProducts') }}">{{ trans('labels.viewAllProducts') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>--}}
                <!-- ./col -->
                {{--<div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <h3>{{ $result['currency'][19]->value }}{{ $result['profit'] }}</h3>
        			  <p>{{ trans('labels.Total Money Earned') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ URL::to('admin/orders/display')}}" class="small-box-footer" data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.viewAllOrders') }}">{{ trans('labels.viewAllOrders') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>--}}
                <!-- ./col -->
                {{--<div class="col-lg-4 col-xs-6">

                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{ $result['outOfStock'] }} </h3>
                      <p>{{ trans('labels.outOfStock') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ URL::to('admin/outofstock')}}" class="small-box-footer" data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.outOfStock') }}">{{ trans('labels.outOfStock') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>--}}
                <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $result['totalCustomers'] }}</h3>

                                <p>{{ trans('labels.customerRegistrations') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ URL::to('admin/customers/display')}}" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="{{ trans('labels.viewAllCustomers') }}">{{ trans('labels.viewAllCustomers') }} <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $result['totalProducts'] }}</h3>

                                <p>{{ trans('labels.totalProducts') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ URL::to('admin/products/display')}}" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="{{ trans('labels.viewAllProducts') }}">{{ trans('labels.viewAllProducts') }} <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="nav-tabs-custom">
                            <div class="box-header with-border">
                                <h3 class="box-title"> {{ trans('labels.addedSaleReport') }}</h3>
                                <div class="box-tools pull-right" style="position: relative !important;">
                                    <p class="notify-colors"><span class="sold-content" data-toggle="tooltip"
                                                                   data-placement="bottom"
                                                                   title="Completed Orders"></span> Completed
                                        <span class="purchased-content" data-toggle="tooltip" data-placement="bottom"
                                              title="Cancelled Orders Products"></span>Cancelled  <span
                                            class="purchased-content2" data-toggle="tooltip" data-placement="bottom"
                                            title="Cancelled Orders Products"></span>Returned  </p>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 400px;"></canvas>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <div class="col-md-12" style="display: none">
                        <div class="box">
                            <div class="box-header with-border">
                                <!--<h3 class="box-title pull-left">Monthly Report</h3>-->

                                <div class="col-xs-12 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default"
                                                    aria-label="Help">{{ trans('labels.customDate') }}</button>
                                        </div>
                                        <input class="form-control" aria-label="Text input with multiple buttons">
                                        <div class="input-group-btn">
                                            <button type="button"
                                                    class="btn btn-primary">{{ trans('labels.go') }}</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-tools pull-right" >
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
{{--                                            <strong>{{ trans('labels.sales') }}: 1 Jan, 2014 - 30 Jul, 2014</strong>--}}
                                        </p>

                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="salesChart" style="height: 400px;"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./box-body -->
                            <div class="box-footer" style="display: none">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-green"><i
                                                    class="fa fa-caret-up"></i> 17%</span>
                                            <h5 class="description-header">$35,210.43</h5>
                                            <span class="description-text">{{ trans('labels.total_revenue') }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> 0%</span>
                                            <h5 class="description-header">$10,390.90</h5>
                                            <span class="description-text">{{ trans('labels.total_cost') }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-green"><i
                                                    class="fa fa-caret-up"></i> 20%</span>
                                            <h5 class="description-header">$24,813.53</h5>
                                            <span class="description-text">{{ trans('labels.total_profit') }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-red"><i
                                                    class="fa fa-caret-down"></i> 18%</span>
                                            <h5 class="description-header">1200</h5>
                                            <span class="description-text">{{ trans('labels.goal_completions') }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- MAP & BOX PANE -->

                        <!-- /.box -->
                        <div class="row">
                            <!-- /.col -->

                            <div class="col-md-12">
                                <!-- USERS LIST -->

                                <!--/.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- TABLE: LATEST ORDERS -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('labels.NewOrders') }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('labels.OrderID') }}</th>
                                            <th>{{ trans('labels.CustomerName') }}</th>
                                            <th>{{ trans('labels.TotalPrice') }}</th>
                                            <th>{{ trans('labels.Status') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($result['orders'])>0)
                                            @foreach($result['orders'] as $total_orders)
                                                @foreach($total_orders as $key=>$orders)
                                                    @if($key<=10)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ URL::to('admin/orders/vieworder/') }}/{{ $orders->orders_id }}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="Go to detail">{{ $orders->orders_id }}</a>
                                                            </td>
                                                            <td>{{ $orders->customers_name }}</td>
                                                            <td>@if($orders->currency == 'USD')
                                                                    $
                                                                @endif
                                                                @if($orders->currency == 'EUR')
                                                                    €
                                                                @endif
                                                                @if($orders->currency == 'GBP')
                                                                    £
                                                                @endif
                                                                {{ floatval($orders->total_price) }} </td>
                                                            <td>
                                                                @if($orders->orders_status_id==1)
                                                                    <span class="label label-warning"></span>
                                                                @elseif($orders->orders_status_id==2)
                                                                    <span class="label label-success">
                            @elseif($orders->orders_status_id==3)
                                                                </span>  <span class="label label-danger"></span>
                                                                @else
                                                                    <span class="label label-primary">
                            @endif
                                                                        {{ $orders->orders_status }}
                                 </span>


                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        @else
                                            <tr>
                                                <td colspan="4">{{ trans('labels.noOrderPlaced') }}</td>

                                            </tr>
                                        @endif


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                                <a href="{{ URL::to('admin/orders/display') }}"
                                   class="btn btn-sm btn-default btn-flat pull-right" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="View All Orders">{{ trans('labels.viewAllOrders') }}</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">

                        <!-- PRODUCT LIST -->

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('labels.GoalCompletion') }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <!-- /.progress-group -->
                                @if($result['total_orders']>0)
                                    <div class="progress-group">
                                        <span class="progress-text">{{ trans('labels.CompleteOrders') }}</span>
                                        <span class="progress-number"><b>{{ $result['compeleted_orders'] }}</b>/{{ $result['total_orders'] }}</span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-green"
                                                 style="width: {{ $result['compeleted_orders']*100/$result['total_orders'] }}%"></div>
                                        </div>
                                    </div>
                                @endif
                                @if($result['total_orders']>0)
                                <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">{{ trans('labels.PendingOrders') }}</span>
                                        <span class="progress-number"><b>{{ $result['pending_orders'] }}</b>/{{ $result['total_orders'] }}</span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-yellow"
                                                 style="width: {{ $result['pending_orders']*100/$result['total_orders'] }}%"></div>
                                        </div>
                                    </div>
                                @endif
                            <!-- /.progress-group -->
                                @if($result['total_orders']>0)
                                    <div class="progress-group">
                                        <span class="progress-text">{{ trans('labels.InprocessOrders') }}</span>
                                        <span class="progress-number"><b>{{ $result['inprocess'] }}</b>/{{ $result['total_orders'] }}</span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-red"
                                                 style="width: {{ $result['inprocess']*100/$result['total_orders'] }}%"></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('labels.RecentlyAddedProducts') }}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach($result['recentProducts'] as $recentProducts)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{asset('').$recentProducts->products_image}}" alt=""
                                                     width=" 100px" height="100px">
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ URL::to('admin/products/edit') }}/{{ $recentProducts->products_id }}"
                                                   class="product-title">{{ $recentProducts->products_name }}
                                                    <span
                                                        class="label label-warning label-succes pull-right">{{ $result['currency'][19]->value }}{{ floatval($recentProducts->products_price) }}</span></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{ URL::to('admin/products/display') }}" class="uppercase"
                                   data-toggle="tooltip" data-placement="bottom"
                                   title="View All Products">{{ trans('labels.viewAllProducts') }}</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
        @endif
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script src="{!! asset('admin/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
    {{-- <script>
                 $(document).ready(function () {
                   $.ajax({
                       url:"{{route('getMonthlyOrdersData')}}",
                       method:"GET",
                       dataType:"json",
                       success:function(data)
                       {
                        charts.OrderSummary(data);
                       }
                      });
                 })  ;



       function OrderSummary(data) {
         var ctx = document.getElementById('salesChart').getContext('2d');
         var myChart = new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                 datasets: [{
                     label: '# of Votes',
                     data: [12, 19, 3, 5, 2, 3],
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(54, 162, 235, 0.2)',
                         'rgba(255, 206, 86, 0.2)',
                         'rgba(75, 192, 192, 0.2)',
                         'rgba(153, 102, 255, 0.2)',
                         'rgba(255, 159, 64, 0.2)'
                     ],
                     borderColor: [
                         'rgba(255, 99, 132, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)'
                     ],
                     borderWidth: 1
                 }]
             },
             options: {
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero: true
                         }
                     }]
                 }
             }
         });

       }

   </script> --}}
    <script>
        (function ($) {

            var charts = {
                init: function () {
                    // -- Set new default font family and font color to mimic Bootstrap's default styling
                    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#292b2c';

                    this.ajaxGetPostMonthlyData();

                },

                ajaxGetPostMonthlyData: function () {
                    var urlPath = 'http://' + window.location.hostname + '/getMonthlyOrdersData';
                    $.ajax({
                        url: "{{route('getMonthlyOrdersData')}}",
                        method: "GET",
                        dataType: "json",
                        success: function (data) {

                            console.log(data);
                            charts.createCompletedJobsChart(data);
                        }
                    });
                    //   var request = $.ajax( {
                    //     method: 'GET',
                    //     url: urlPath
                    // } );

                    //   request.done( function ( response ) {
                    //     console.log( response );
                    //     charts.createCompletedJobsChart( response );
                    //   });
                },

                /**
                 * Created the Completed Jobs Chart
                 */
                createCompletedJobsChart: function (data) {

                    var ctx = document.getElementById("salesChart");
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.months, // The response got from the ajax request containing all month names in the database
                            datasets: [
                                {
                                    label: "Sessions",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(255, 255, 255, 0)",
                                    borderColor: "rgba(2,117,216,1)",
                                    pointRadius: 5,
                                    pointBackgroundColor: "rgba(2,117,216,1)",
                                    pointBorderColor: "rgba(255,255,255,0.8)",
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                                    pointHitRadius: 20,
                                    pointBorderWidth: 2,
                                    data: data.returned_orders_count // The response got from the ajax request containing data for the completed jobs in the corresponding months
                                },
                                {
                                    label: "Sessions",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(255, 255, 255, 0)",
                                    borderColor: "rgba(200, 0, 0, 1)",
                                    pointRadius: 5,
                                    pointBackgroundColor: "rgba(200, 0, 0, 1)",
                                    pointBorderColor: "rgba(200, 0, 0, 1)",
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(200, 0, 0, 1)",
                                    pointHitRadius: 20,
                                    pointBorderWidth: 2,
                                    data: data.cancelled_orders_count // The response got from the ajax request containing data for the completed jobs in the corresponding months
                                },
                                {
                                    label: "Sessions",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(255, 255, 255, 0)",
                                    borderColor: "rgba(0, 200, 0, 1)",
                                    pointRadius: 5,
                                    pointBackgroundColor: "rgba(0, 200, 0, 1)",
                                    pointBorderColor: "rgba(0, 200, 0, 1)",
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(0, 200, 0, 1)",
                                    pointHitRadius: 20,
                                    pointBorderWidth: 2,
                                    data: data.completed_orders_count // The response got from the ajax request containing data for the completed jobs in the corresponding months
                                }
                            ],
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'date'
                                    },
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 7
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        max: data.max, // The response got from the ajax request containing max limit for y axis
                                        maxTicksLimit: 5
                                    },
                                    gridLines: {
                                        color: "rgba(0, 0, 0, .125)",
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            }
                        }
                    });
                }
            };

            charts.init();

        })(jQuery);
    </script>

@endsection


