

<?php $__env->startSection('content'); ?>

<div class="container">

     <form method="POST" action="<?php echo e(route('search.tweet')); ?>" enctype="multipart/form-data">


        <?php echo e(csrf_field()); ?>



        <?php if(count($errors)): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>


        <div class="form-group">
            <label>Username:</label>
            <textarea class="form-control" name="screen_name"placeholder="twitterdev, adhirnews" ><?php echo isset($screen_name['screen_name']) ? $screen_name['screen_name'] : '';?></textarea>
        </div>
        <div class="form-group"> 
            <button class="btn btn-success">Search Tweet for User</button>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Twitter Id</th>
                <th>Created At</th>
                <th>Source</th>
                <th>Message</th>
                <th>Username</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data)): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td><?php echo e($value['id']); ?></td>
                        <td><?php echo e($value['created_at']); ?></td>
                        <td><?php echo e('Twitter'); ?></td>
                        <td><?php echo e($value['text']); ?></td>
                        <td><?php echo e($value['user']['name']); ?></td>
                        <td><a href="https://twitter.com/<?php echo $screen_name['screen_name'];?>/status/<?php echo e($value['id']); ?>"></a>https://twitter.com/<?php echo $screen_name['screen_name'];?>/status/<?php echo e($value['id']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/resources/views/twitter.blade.php ENDPATH**/ ?>