<?php if( $pages = App::sub_pages($post->post_parent, $post->ID)): ?>
  <div class="sibling-pages">
    <h1>Dans la même catégorie</h1>
    <h2>
      <i class="fa fa-angle-right"></i>
      <a href="<?php echo e(App::permalink( $post->post_parent )); ?>"><?php echo e(get_the_title( $post->post_parent )); ?></a>
    </h2>
    <ul class="pages-list">

      <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="d-flex">
          <div class="thumb">
            <img src="<?php echo e(get_the_post_thumbnail_url( $page->ID, 'thumbnail' )); ?>" alt="<?php echo e($page->post_title); ?>">
          </div>
          <div>
            <a href="<?php echo e(App::permalink( $page->ID )); ?>"><?php echo e($page->post_title); ?></a> <br> <a href="<?php echo e(App::permalink( $page->ID )); ?>" class="btn btn-sm btn-primary btn-orange">Demande devis</a>
          </div>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
  </div>
<?php endif; ?>

<div id="side-banner">
  <?php if(count($pages) > 5): ?>
    <a href="#"> <img src="<?= App\asset_path('images/short-banner.png'); ?>" alt="Voyager aux USA sans VISA"> </a>
  <?php else: ?>
    <a href="#"> <img src="<?= App\asset_path('images/long-banner.png'); ?>" alt="Voyager aux USA sans VISA"> </a>
  <?php endif; ?>
</div>

<!--
<div class="ask-for-call">
  <div class="heading d-flex">
    <img src="<?= App\asset_path('images/artisan-img2.png'); ?>" alt="Artisan">
    <h1>Vous êtes un <em>Artisan</em>
      <small>Profitez de nos offres de chantiers...</small>
    </h1>
  </div>
  <form action="" class="form" method="post">
    <div class="form-group">
      <input type="email" required class="form-control" name="email" placeholder="Votre Email">
    </div>
    <div class="form-group">
      <input type="phone" required class="form-control" name="email" placeholder="Votre N°de téléphone">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block btn-lg" type="submit">Être rappelé...Allô!</button>
    </div>
  </form>
</div>
-->

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
