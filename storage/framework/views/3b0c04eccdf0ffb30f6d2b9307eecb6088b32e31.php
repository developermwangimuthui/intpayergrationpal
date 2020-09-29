<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <?php
        $check =  DB::table('manage_role')
                   ->where('user_types_id',Auth()->user()->role_id)
                   //->where('dashboard_view',1)
                   ->first();
        ?>
        <li class="header"><?php echo e(trans('labels.navigation')); ?></li>
        <li class="treeview <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo e(trans('labels.header_dashboard')); ?></span>
          </a>
        </li>

      <?php

        if($check->language_view == 1){
      ?>

        

      <?php } ?>
      <?php
        if($check->view_media == 1){
      ?>
      

      <?php } ?>
      <?php

        if($check->manufacturer_view == 1){
      ?>
       
      <?php }
        if($check->products_view == 1 or $check->categories_view == 1 ){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/products/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/products/attributes/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/add/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addinventory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproductimages/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/filter') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/inventory/display') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-database"></i> <span><?php echo e(trans('labels.link_products')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

            <?php if($check->categories_view == 1): ?>
              <li class="<?php echo e(Request::is('admin/categories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/filter') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/categories/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_main_categories')); ?></a></li>
            <?php endif; ?>

            <?php if($check->products_view == 1): ?>
              <li class="<?php echo e(Request::is('admin/products/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/add/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addinventory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproductimages/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/products/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_all_products')); ?></a></li>
            <?php endif; ?>
            <?php if($check->products_view == 1): ?>
              <li class="<?php echo e(Request::is('admin/products/attributes/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/products/attributes/add') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/products/attributes/*') ? 'active' : ''); ?>" ><a href="<?php echo e(URL::to('admin/products/attributes/display' )); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.products_attributes')); ?></a></li>
              <li class="<?php echo e(Request::is('admin/products/inventory/display') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/products/inventory/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.inventory')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php } ?>
      <?php

        if($check->news_view == 1){
      ?>
        
      <?php } ?>
      <?php
        if($check->customers_view == 1){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/customers/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/customers/add') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/customers/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customers/address/display/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customers/filter') ? 'active' : ''); ?> ">
          <a href="<?php echo e(URL::to('admin/customers/display')); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_customers')); ?></span>
          </a>
        </li>
      <?php } ?>
      <?php
          if($check->tax_location_view == 1){
        ?>
          
        <?php } ?>
        <?php
          if($check->coupons_view ==1){
        ?>
        
      <?php } ?>
      
      <?php

        if($check->orders_view == 1){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/orders/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/orders/vieworder/*') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/orders/display')); ?>" ><i class="fa fa-list-ul" aria-hidden="true"></i> <span> <?php echo e(trans('labels.link_orders')); ?></span>
          </a>
        </li>
      <?php } ?>
      <?php

        if($check->shipping_methods_view == 1){
      ?>
        
          <?php } ?>
          <?php
            if($check->payment_methods_view == 1){
          ?>
            <li class="treeview <?php echo e(Request::is('admin/paymentmethods/index') ? 'active' : ''); ?>">
              <a  href="<?php echo e(URL::to('admin/paymentmethods/index')); ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>
              <?php echo e(trans('labels.link_payment_methods')); ?></span>
              </a>
            </li>
          <?php } ?>
          <?php
            if($check->reports_view == 1){
          ?>
        <li class="treeview <?php echo e(Request::is('admin/statscustomers') ? 'active' : ''); ?> <?php echo e(Request::is('admin/outofstock') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductspurchased') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductsliked') ? 'active' : ''); ?> <?php echo e(Request::is('admin/lowinstock') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
  <span><?php echo e(trans('labels.link_reports')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">


           <!-- <li class="<?php echo e(Request::is('admin/productsstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/stockin')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.stockin')); ?></a></li>-->
            <li class="<?php echo e(Request::is('admin/statscustomers') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/statscustomers')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_customer_orders_total')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/statsproductspurchased') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/statsproductspurchased')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_total_purchased')); ?></a></li>

          </ul>
        </li>
      <?php } ?>
      <?php

      $route =  DB::table('settings')
                 ->where('name','is_web_purchased')
                 ->where('value', 1)
                 ->first();
        if($check->website_setting_view == 1 and $route != null){
      ?>

        <li class="treeview <?php echo e(Request::is('admin/sliders') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addsliderimage') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editslide/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/webpages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addwebpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editwebpage/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/websettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/webthemes') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customstyle') ? 'active' : ''); ?> <?php echo e(Request::is('admin/constantbanners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addconstantbanner') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editconstantbanner/*') ? 'active' : ''); ?>" >
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
  <span> <?php echo e(trans('labels.link_site_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="treeview <?php echo e(Request::is('admin/media/add') ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-picture-o"></i> <span><?php echo e(trans('labels.Theme Setting')); ?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/1">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> <?php echo e(trans('labels.Home Page')); ?> </span>
                    </a>
                </li>
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/4">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> Product Page Settings </span>
                    </a>
                </li>
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/5">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> Shop Page Settings </span>
                    </a>
                </li>
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/2">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> Cart Page Settings </span>
                    </a>
                </li>
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/6">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> Contact Page Settings</span>
                    </a>
                </li>
                <li class="treeview <?php echo e(Request::is('admin/theme/setting') ? 'active' : ''); ?> ">
                    <a href="<?php echo e(url('admin/webPagesSettings')); ?>/7">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> Colors Settings</span>
                    </a>
                </li>
              </ul>
            </li>
            <li class="<?php echo e(Request::is('admin/constantbanners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/constantbanners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/constantbanners/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/constantbanners')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_Banners')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/sliders') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addsliderimage') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editslide/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/sliders')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_Sliders')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/webpages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addwebpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editwebpage/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/webpages')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.content_pages')); ?></a></li>

            <!-- <li class="<?php echo e(Request::is('admin/webthemes') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/webthemes')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.website_themes')); ?></a></li> -->

            <li class="<?php echo e(Request::is('admin/seo') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/seo')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.seo content')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/customstyle') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/customstyle')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.custom_style_js')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/websettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/websettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_setting')); ?></a></li>
          </ul>
        </li>
      <?php } ?>
      <?php
      $route =  DB::table('settings')
                 ->where('name','is_app_purchased')
                 ->where('value', 1)
                 ->first();

        if($check->application_setting_view == 1 and $route != null){
      ?>

        <li class="treeview <?php echo e(Request::is('admin/banners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addbanner') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editbanner/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/pages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editpage/*') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/appSettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/admobSettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/applabel') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addappkey') ? 'active' : ''); ?> <?php echo e(Request::is('admin/applicationapi') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
  <span> <?php echo e(trans('labels.link_app_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/banners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addbanner') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editbanner/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/banners')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_Banners')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/pages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editpage/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/pages')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.content_pages')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/admobSettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/admobSettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_admob')); ?></a></li>

            <li class="android-hide <?php echo e(Request::is('admin/applabel') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addappkey') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/applabel')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.labels')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/applicationapi') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/applicationapi')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.applicationApi')); ?></a></li>

            <li class="<?php echo e(Request::is('admin/appsettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/appsettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_setting')); ?></a></li>

          </ul>
        </li>
      <?php } ?>
      
      <?php

        if($check->manage_admins_view == 1){
      ?>

         <li class="treeview <?php echo e(Request::is('admin/admins') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addadmins') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editadmin/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manageroles') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addadminType') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editadminType/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i>
  <span> <?php echo e(trans('labels.Manage Admins')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>

          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/admins') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addadmins') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editadmin/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/admins')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_admins')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/manageroles') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addadminType') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editadminType/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/manageroles')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_manage_roles')); ?></a></li>
          </ul>
        </li>
        <?php }
        if($check->edit_management == 1){
        ?>

          <!--------create middlewares -------->
        
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php /**PATH D:\Php\intpayergrationpal-master\resources\views/admin/common/sidebar.blade.php ENDPATH**/ ?>