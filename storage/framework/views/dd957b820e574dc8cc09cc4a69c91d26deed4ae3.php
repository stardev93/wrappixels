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
                        <h1>Refund Request</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Refund Request</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Order ID</th>
                                            <th>Item Name</th>
                                            <th>Buyer</th>
                                            <th>Refund Reason</th>
                                            <th>Refund Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($refund->ref_purchased_token); ?> </td>
                                            <td><?php echo e($refund->item_name); ?> </td>
                                            <td><a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($refund->username); ?>" target="_blank" class="blue-color"><?php echo e($refund->username); ?></a></td>
                                            <td><?php echo e($refund->ref_refund_reason); ?> </td>
                                            <td><?php echo e($refund->ref_refund_comment); ?></td>
                                            <td>
                                            <?php if($refund->ref_refund_approval == ""): ?> 
                                            <a href="<?php echo e(URL::to('/admin/refund')); ?>/<?php echo e($refund->ref_order_id); ?>/<?php echo e($refund->refund_id); ?>/buyer" class="btn btn-success btn-sm" title="payment released to buyer"><i class="fa fa-money"></i>&nbsp; Refund Accept</a> 
                                            <a href="<?php echo e(URL::to('/admin/refund')); ?>/<?php echo e($refund->ref_order_id); ?>/<?php echo e($refund->refund_id); ?>/vendor" class="btn btn-danger btn-sm" title="payment released to vendor"><i class="fa fa-close"></i>&nbsp; Refund Declined</a>
                                            <?php else: ?>
                                            <?php if($refund->ref_refund_approval == 'accepted'): ?> <span class="badge badge-success">Accepted</span> <?php else: ?> <span class="badge badge-danger">Declined</span> <?php endif; ?>
                                            
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                        
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>

    


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/admin/refund.blade.php ENDPATH**/ ?>