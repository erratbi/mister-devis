<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.sub-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div id="category-page">

    <?php while(have_posts()): ?> <?php (the_post()); ?>
    <div class="container">
      <?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php endwhile; ?>

    <div class="container">
      <?php if(!empty($all_pages = App::sub_pages())): ?>
        <div class="all-pages card-columns" style="column-count: 3">
          <?php $__currentLoopData = $all_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <div class="card-heading">
                <a href="<?php echo e(App::permalink($page->ID)); ?>"><img src="<?php echo e(get_the_post_thumbnail_url( $page->ID, 'post-thumbnail' )); ?>" class="card-img-top" alt="<?php echo e($page->post_title); ?>"></a>
              </div>

              <div class="card-body">
                <h2><?php echo e($page->post_title); ?></h2>
                <?php if(! empty( $sub_pages = App::sub_pages($page->ID))): ?>
                  <ul>
                    <?php $__currentLoopData = $sub_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(App::permalink($sub_page->ID)); ?>"><?php echo e($sub_page->post_title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>