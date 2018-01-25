<?php $__env->startSection('content'); ?>
  <div id="category-page">
    <?php while(have_posts()): ?> <?php (the_post()); ?>
    <div class="col-sm">
      <?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php endwhile; ?>
    <div class="col" id="sub-category-sidebar">
      <?php echo $__env->make('partials.artisan-signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>