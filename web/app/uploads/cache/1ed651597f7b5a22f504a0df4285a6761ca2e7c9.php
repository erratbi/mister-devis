<?php if( ! empty( $first_level_pages ) ): ?>
  <div id="cats-accordion">
    <h1>Toutes les catégories</h1>
    <?php $__currentLoopData = $first_level_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div>
        <ul>
          <li>
            <a data-toggle="collapse" href="#panel-<?php echo e($page1->ID); ?>" aria-expanded="false" aria-controls="panel-<?php echo e($page1->ID); ?>"><?php echo e($page1->post_title); ?></a>
          </li>
          <?php if($sub_level_pages = App::sub_pages($page1->ID)): ?>
            <ul class="collapse  <?php echo e($page1->ID === $post->post_parent ? 'show' : ''); ?>" id="panel-<?php echo e($page1->ID); ?>" data-parent="#cats-accordion">
              <?php $__currentLoopData = $sub_level_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(App::permalink( $page2->ID )); ?>"><?php echo e($page2->post_title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          <?php endif; ?>
        </ul>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php endif; ?>
