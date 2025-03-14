<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Items</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <button onClick="myFunction()" class="btn btn-success btn-sm dropbtn"><i class="fa fa-plus"></i> Add Item</button>
                            <div id="myDropdown" class="dropdown-content">
                                <?php $__currentLoopData = $viewitem['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $encrypted = $encrypter->encrypt($item_type->item_type_id); ?>
                                <a href="<?php echo e(URL::to('/admin/upload-item')); ?>/<?php echo e($encrypted); ?>"><?php echo e($item_type->item_type_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
         <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Items</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Item Image</th>
                                            <th width="100">Item Name</th>
                                            <th>Featured Item?</th>
                                            <th>Free Item?</th>
                                            <th>Flash Request?</th>
                                            <th>Vendor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php if($item->item_thumbnail != ''): ?> <img height="50" width="50" src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_thumbnail); ?>" alt="<?php echo e($item->item_name); ?>"/><?php else: ?> <img height="50" width="50" src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>" />  <?php endif; ?></td>
                                            <td><a href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank" class="black-color"><?php echo e(substr($item->item_name,0,50)); ?></a></td>
                                            
                                            
                                            <td><?php if($item->item_featured == 'no'): ?> No <?php else: ?> Yes <?php endif; ?> <a href="items/<?php echo e($item->item_featured); ?>/<?php echo e($item->item_token); ?>" style="font-size:12px; color:#0000FF; text-decoration:underline;">Can you change?</a></td>
                                            <td><?php if($item->free_download == 1): ?> <span class="badge badge-success">Yes</span> <?php else: ?> <span class="badge badge-danger">No</span> <?php endif; ?></td>
                                            <td><?php if($item->item_flash_request == 1): ?> <?php if($item->item_flash == 0): ?> <span class="badge badge-danger">Waiting for approval</span> <?php else: ?> <span class="badge badge-success">Approved</span> <?php endif; ?> <?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><a href="<?php echo e(url('/user')); ?>/<?php echo e($item->username); ?>" target="_blank" class="black-color"><?php echo e($item->username); ?></a></td>
                                            <td><?php if($item->item_status == 1): ?> <span class="badge badge-success">Approved</span> <?php elseif($item->item_status == 2): ?> <span class="badge badge-danger">Rejected</span> <?php else: ?> <span class="badge badge-warning">UnApproved</span> <?php endif; ?></td>
                                            <td><a href="edit-item/<?php echo e($item->item_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            <?php else: ?>
                                            <a href="items/<?php echo e($item->item_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a><?php endif; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/admin/items.blade.php ENDPATH**/ ?>