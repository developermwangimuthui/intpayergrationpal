<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <?php echo e(trans('labels.AddNewImage')); ?> <small><?php echo e(trans('labels.ListingAllImage')); ?>...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i>
                    <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li class="active"><?php echo e(trans('labels.AddNewImage')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->

        <!-- /.row -->
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo e(trans('labels.ListingAllImage')); ?> </h3>



                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                                data-target="#myModal"><?php echo e(trans('labels.AddNew')); ?></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if(count($errors) > 0): ?>
                                <?php if($errors->any()): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <?php echo e($errors->first()); ?>

                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(isset($images)): ?>
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xs-4 col-md-2 margin-bottomset">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <p><a href="<?php echo e(url('admin/media/deleteimage')); ?>/<?php echo e($image->id); ?>"
                                                class="label label-danger">Delete</a></p>
                                    </div>
                                    <img src="<?php echo e(asset($image->path)); ?>" alt="...">
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add File Here</h4>
                    </div>
                    <div class="modal-body">
                        <p>Click or Drop Images in the Box for Upload.</p>
                        <form action="<?php echo e(url('admin/media/uploadimage')); ?>" enctype="multipart/form-data"
                            class="dropzone " id="my-dropzone">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" disabled="disabled" id="compelete"
                            data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="myModaldetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h3 class="modal-title text-primary" id="myModalLabel">Image Details</h3>
                    </div>

                    <?php echo Form::open(array('url' =>'admin/deleteimage', 'method'=>'post', 'class' => 'form-horizontal',
                    'enctype'=>'multipart/form-data', 'onsubmit' => 'return ConfirmDelete()')); ?>

                    <div class="image_embed">

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="myDeleteImage"
                            data-toggle="modal">Delete</button>
                        
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>


                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

        <div id="myModal2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmation!!</h4>
                    </div>
                    <div class="modal-body">
                        <p>You are sure to delete It!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="myDeleteImage"
                            data-toggle="modal">Delete</button>
                        <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal"
                            aria-hidden="true">Cancel</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\Php\intpayergrationpal\resources\views/admin/media/addimages.blade.php ENDPATH**/ ?>