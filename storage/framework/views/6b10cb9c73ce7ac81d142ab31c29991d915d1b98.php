<?php $__env->startSection('content'); ?>
<style>
	.wrapper{
		display:  none !important;
	}
</style>
<div class="login-box">
  <div class="login-logo">

  	
    <img src="<?=url('/images/front_logo/pfa-2.png')?>" alt="Premium Freelancing Accounts" id="logo"  width="250" height="50">


    <div style="
    font-size: 25px;
"><b> <?php echo e(trans('labels.welcome_message')); ?> to PFA Accounts</b> </div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo e(trans('labels.login_text')); ?></p>

    <!-- if email or password are not correct -->
    <?php if( count($errors) > 0): ?>
    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only"><?php echo e(trans('labels.Error')); ?>:</span>
                  <?php echo e($error); ?>

            </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(Session::has('loginError')): ?>
        <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only"><?php echo e(trans('labels.Error')); ?>:</span>
              <?php echo session('loginError'); ?>

        </div>
    <?php endif; ?>

    <?php echo Form::open(array('url' =>'admin/checkLogin', 'method'=>'post', 'class'=>'form-validate')); ?>


       <div class="form-group has-feedback">
        <?php echo Form::email('email', '', array('class'=>'form-control email-validate', 'id'=>'email')); ?>

        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                     <?php echo e(trans('labels.AdminEmailText')); ?></span>
       <span class="help-block hidden"> <?php echo e(trans('labels.AdminEmailText')); ?></span>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" name='password' class='form-control field-validate' value="">
       <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   <?php echo e(trans('labels.AdminPasswordText')); ?></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>

      </div>
  	  <img src="">
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <?php echo Form::submit(trans('labels.login'), array('id'=>'login', 'class'=>'btn btn-primary btn-block btn-flat' )); ?>

        </div>

          <div class="col-xs-4">
              <a href="<?=url('/admin/forgotPassword')?>" class="btn btn-warning  btn-flat"  >Forget Your Passowrd?</a>
          </div>
        <!-- /.col -->
      </div>
    <?php echo Form::close(); ?>


  </div>

  <!-- /.login-box-body -->
</div>

<?php echo $__env->make('admin.layoutLlogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Php\intpayergrationpal-master\resources\views/admin/login.blade.php ENDPATH**/ ?>