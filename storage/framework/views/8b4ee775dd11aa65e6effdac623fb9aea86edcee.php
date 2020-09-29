<style>
.wrapper.wrapper2{
	display: block;
}
/* .wrapper{
	display: none;
} */
@media  print {
body {-webkit-print-color-adjust: exact;}
}
</style>
<body>
<div class="wrapper wrapper2" style="display: block;">
  <!-- Main content -->
  <section class="invoice" style="margin: 15px;">
      <!-- title row -->
      <div class="col-xs-12">
      <div class="row">
       <?php if(session()->has('message')): ?>
      	<div class="alert alert-success alert-dismissible">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           <h4><i class="icon fa fa-check"></i> <?php echo e(trans('labels.Successlabel')); ?></h4>
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        	<div class="alert alert-warning alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('labels.WarningLabel')); ?></h4>
                <?php echo e(session()->get('error')); ?>

            </div>

        <?php endif; ?>


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
          <h2><?php echo e(trans('Invoice')); ?></h2>
          <address>
            <strong><?php echo e($data['orders_data'][0]->customers_name); ?></strong><br>
            <!--<?php echo e($data['orders_data'][0]->customers_street_address); ?> <br>
            <?php echo e($data['orders_data'][0]->customers_city); ?>, <?php echo e($data['orders_data'][0]->customers_state); ?> <?php echo e($data['orders_data'][0]->customers_postcode); ?>, <?php echo e($data['orders_data'][0]->customers_country); ?><br>
            <?php echo e(trans('labels.Phone')); ?>: &nbsp;<?php echo e($data['orders_data'][0]->customers_telephone); ?><br>-->
            <?php echo e(trans('labels.Email')); ?>:<?php echo e($data['orders_data'][0]->email); ?><br><br>



          </address>



        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          .
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         
          <Br><br>
          <?php echo e(trans('Order Number')); ?>: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo e('PF'.$data['orders_data'][0]->orders_id); ?> <br>
            <small class=""><?php echo e(trans('labels.OrderedDate')); ?>:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e(date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased))); ?></small>
            <br>
            <?php echo e(trans('labels.PaymentMethods')); ?>:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e(str_replace('_',' ', $data['orders_data'][0]->payment_method)); ?>


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
              <th><?php echo e(trans('labels.Qty')); ?></th>
              <th></th>
              <th></th>
              <th></th>
              <th><?php echo e(trans('labels.Price')); ?></th>
            </tr>
            </thead>
            <tbody>

                <tr>
                  <td  width="30%">
                    <?php echo e($data['prod_des']->products_name); ?><br>
                </td>
                <td><?php echo e($data['prod_des']->products_quantity); ?></td>


                <td></td>
                <td></td>
                <td></td>
                <td style="text-align:center"> <?php if($data['orders_data'][0]->currency == 'USD'): ?>
                        $
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                        €
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                        £
                    <?php endif; ?>
                        <?php echo e($data['prod_des']->final_price); ?>

                </td>
             </tr>

            <!--<?php $__currentLoopData = $data['orders_data'][0]->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($products->products_quantity); ?></td>
                <td  width="30%">
                    <?php echo e($products->products_name); ?><br>
                </td>
                <td>
                    <?php echo e($products->products_model); ?>

                </td>
                <td>
                <?php $__currentLoopData = $products->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<b><?php echo e(trans('labels.Name')); ?>:</b> <?php echo e($attributes->products_options); ?><br>
                    <b><?php echo e(trans('labels.Value')); ?>:</b> <?php echo e($attributes->products_options_values); ?><br>
                    <b><?php echo e(trans('labels.Price')); ?>:</b> <?php echo e($data['currency'][19]->value); ?><?php echo e($attributes->options_values_price); ?><br>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>

                <td><?php echo e($data['currency'][19]->value); ?><?php echo e($products->final_price); ?></td>
             </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->

            </tbody>
          </table>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">

          

          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">


              <tr style="outline: thin solid grey;">
                <th style="width:50%"><?php echo e(trans('labels.Subtotal')); ?>:</th>
                <td><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                        $
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                        €
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                        £
                    <?php endif; ?>
                    <?php echo e($data['subtotal']); ?></td>
              </tr>
              <tr style="outline: thin solid grey;">
                <th><?php echo e(trans('labels.Tax')); ?>:</th>
                <td><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                        $
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                        €
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                        £
                    <?php endif; ?>
                    <?php echo e($data['orders_data'][0]->total_tax); ?></td>
              </tr>

              <?php if(!empty($data['orders_data'][0]->coupon_code)): ?>
              <tr style="outline: thin solid grey;">
                <th><?php echo e(trans('labels.DicountCoupon')); ?>:</th>
                <td><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                        $
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                        €
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                        £
                    <?php endif; ?>
                    <?php echo e($data['orders_data'][0]->coupon_amount); ?></td>
              </tr>
              <?php endif; ?>
              <tr style="outline: thin solid black;">
                <th><?php echo e(trans('labels.Total')); ?>:</th>
                <td>
                    <?php if($data['orders_data'][0]->currency == 'USD'): ?>
                        $
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                        €
                    <?php endif; ?>
                    <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                        £
                    <?php endif; ?>
                    <?php echo e($data['orders_data'][0]->order_price); ?></td>
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


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Php\intpayergrationpal-master\resources\views/admin/Orders/invoiceprint.blade.php ENDPATH**/ ?>