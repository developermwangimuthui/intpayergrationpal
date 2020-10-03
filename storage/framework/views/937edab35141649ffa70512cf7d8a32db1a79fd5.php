<?php $__env->startSection('content'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small><?php echo e(trans('labels.title_dashboard')); ?> <?php echo e($result['currency'][105]->value); ?></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if($role->dashboard_view == 1): ?>
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo e($result['total_orders']); ?></h3>
                                <p><?php echo e(trans('labels.NewOrders')); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo e(URL::to('admin/orders/display')); ?>" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="<?php echo e(trans('labels.viewAllOrders')); ?>"><?php echo e(trans('labels.viewAllOrders')); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                
                <!-- ./col -->
                
                <!-- ./col -->
                
                <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo e($result['totalCustomers']); ?></h3>

                                <p><?php echo e(trans('labels.customerRegistrations')); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo e(URL::to('admin/customers/display')); ?>" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="<?php echo e(trans('labels.viewAllCustomers')); ?>"><?php echo e(trans('labels.viewAllCustomers')); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo e($result['totalProducts']); ?></h3>

                                <p><?php echo e(trans('labels.totalProducts')); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo e(URL::to('admin/products/display')); ?>" class="small-box-footer"
                               data-toggle="tooltip" data-placement="bottom"
                               title="<?php echo e(trans('labels.viewAllProducts')); ?>"><?php echo e(trans('labels.viewAllProducts')); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="nav-tabs-custom">
                            <div class="box-header with-border">
                                <h3 class="box-title"> <?php echo e(trans('labels.addedSaleReport')); ?></h3>
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
                                                    aria-label="Help"><?php echo e(trans('labels.customDate')); ?></button>
                                        </div>
                                        <input class="form-control" aria-label="Text input with multiple buttons">
                                        <div class="input-group-btn">
                                            <button type="button"
                                                    class="btn btn-primary"><?php echo e(trans('labels.go')); ?></button>
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
                                            <span class="description-text"><?php echo e(trans('labels.total_revenue')); ?></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> 0%</span>
                                            <h5 class="description-header">$10,390.90</h5>
                                            <span class="description-text"><?php echo e(trans('labels.total_cost')); ?></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-green"><i
                                                    class="fa fa-caret-up"></i> 20%</span>
                                            <h5 class="description-header">$24,813.53</h5>
                                            <span class="description-text"><?php echo e(trans('labels.total_profit')); ?></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-red"><i
                                                    class="fa fa-caret-down"></i> 18%</span>
                                            <h5 class="description-header">1200</h5>
                                            <span class="description-text"><?php echo e(trans('labels.goal_completions')); ?></span>
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
                                <h3 class="box-title"><?php echo e(trans('labels.NewOrders')); ?></h3>

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
                                            <th><?php echo e(trans('labels.OrderID')); ?></th>
                                            <th><?php echo e(trans('labels.CustomerName')); ?></th>
                                            <th><?php echo e(trans('labels.TotalPrice')); ?></th>
                                            <th><?php echo e(trans('labels.Status')); ?> </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(count($result['orders'])>0): ?>
                                            <?php $__currentLoopData = $result['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $total_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($key<=10): ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?php echo e(URL::to('admin/orders/vieworder/')); ?>/<?php echo e($orders->orders_id); ?>"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="Go to detail"><?php echo e($orders->orders_id); ?></a>
                                                            </td>
                                                            <td><?php echo e($orders->customers_name); ?></td>
                                                            <td><?php if($orders->currency == 'USD'): ?>
                                                                    $
                                                                <?php endif; ?>
                                                                <?php if($orders->currency == 'EUR'): ?>
                                                                    €
                                                                <?php endif; ?>
                                                                <?php if($orders->currency == 'GBP'): ?>
                                                                    £
                                                                <?php endif; ?>
                                                                <?php echo e(floatval($orders->total_price)); ?> </td>
                                                            <td>
                                                                <?php if($orders->orders_status_id==1): ?>
                                                                    <span class="label label-warning"></span>
                                                                <?php elseif($orders->orders_status_id==2): ?>
                                                                    <span class="label label-success">
                            <?php elseif($orders->orders_status_id==3): ?>
                                                                </span>  <span class="label label-danger"></span>
                                                                <?php else: ?>
                                                                    <span class="label label-primary">
                            <?php endif; ?>
                                                                        <?php echo e($orders->orders_status); ?>

                                 </span>


                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4"><?php echo e(trans('labels.noOrderPlaced')); ?></td>

                                            </tr>
                                        <?php endif; ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                                <a href="<?php echo e(URL::to('admin/orders/display')); ?>"
                                   class="btn btn-sm btn-default btn-flat pull-right" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="View All Orders"><?php echo e(trans('labels.viewAllOrders')); ?></a>
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
                                <h3 class="box-title"><?php echo e(trans('labels.GoalCompletion')); ?></h3>

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
                                <?php if($result['total_orders']>0): ?>
                                    <div class="progress-group">
                                        <span class="progress-text"><?php echo e(trans('labels.CompleteOrders')); ?></span>
                                        <span class="progress-number"><b><?php echo e($result['compeleted_orders']); ?></b>/<?php echo e($result['total_orders']); ?></span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-green"
                                                 style="width: <?php echo e($result['compeleted_orders']*100/$result['total_orders']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($result['total_orders']>0): ?>
                                <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text"><?php echo e(trans('labels.PendingOrders')); ?></span>
                                        <span class="progress-number"><b><?php echo e($result['pending_orders']); ?></b>/<?php echo e($result['total_orders']); ?></span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-yellow"
                                                 style="width: <?php echo e($result['pending_orders']*100/$result['total_orders']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <!-- /.progress-group -->
                                <?php if($result['total_orders']>0): ?>
                                    <div class="progress-group">
                                        <span class="progress-text"><?php echo e(trans('labels.InprocessOrders')); ?></span>
                                        <span class="progress-number"><b><?php echo e($result['inprocess']); ?></b>/<?php echo e($result['total_orders']); ?></span>
                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-red"
                                                 style="width: <?php echo e($result['inprocess']*100/$result['total_orders']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo e(trans('labels.RecentlyAddedProducts')); ?></h3>
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
                                    <?php $__currentLoopData = $result['recentProducts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProducts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="<?php echo e(asset('').$recentProducts->products_image); ?>" alt=""
                                                     width=" 100px" height="100px">
                                            </div>
                                            <div class="product-info">
                                                <a href="<?php echo e(URL::to('admin/products/edit')); ?>/<?php echo e($recentProducts->products_id); ?>"
                                                   class="product-title"><?php echo e($recentProducts->products_name); ?>

                                                    <span
                                                        class="label label-warning label-succes pull-right"><?php echo e($result['currency'][19]->value); ?><?php echo e(floatval($recentProducts->products_price)); ?></span></a>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="<?php echo e(URL::to('admin/products/display')); ?>" class="uppercase"
                                   data-toggle="tooltip" data-placement="bottom"
                                   title="View All Products"><?php echo e(trans('labels.viewAllProducts')); ?></a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
        <?php endif; ?>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script src="<?php echo asset('admin/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
    
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
                        url: "<?php echo e(route('getMonthlyOrdersData')); ?>",
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\Php\intpayergrationpal\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>