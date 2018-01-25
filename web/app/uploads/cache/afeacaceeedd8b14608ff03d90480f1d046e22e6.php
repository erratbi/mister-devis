<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.sub-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div id="category-page">

    <div class="container">
      <?php while(have_posts()): ?> <?php (the_post()); ?>
      <?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endwhile; ?>

      <?php if($sub_pages = App::sub_pages()): ?>
        <div class="sub-pages">
          <div class="row">
            <?php $__currentLoopData = $sub_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-4">
                <div class="page-item">
                  <div class="thumb">
                    <a href="<?php echo e(App::permalink($page->ID)); ?>"><img src="<?php echo e(get_the_post_thumbnail_url( $page->ID)); ?>"></a>
                  </div>
                  <div class="actions">
                    <a href="<?php echo e(App::permalink($page->ID)); ?>" class="btn btn-sm btn-primary btn-orange btn-lg">Demande devis</a>
                    <h3>
                      <a href="<?php echo e(App::permalink($page->ID)); ?>"><?php echo e($page->post_title); ?></a>
                    </h3>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>