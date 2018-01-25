<article <?php (post_class('d-flex')); ?>>
  <div class="thumb">
    <a href="<?php echo e(get_permalink()); ?>"> <img src="<?php echo e(get_the_post_thumbnail_url()); ?>" alt="<?php echo e(get_the_title()); ?>"> </a>
  </div>
  <div>
    <h1><a href="<?php echo e(get_permalink()); ?>"><?php echo e(get_the_title()); ?></a></h1>
  </div>
</article>
