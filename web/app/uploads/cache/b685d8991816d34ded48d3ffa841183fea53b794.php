<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.sub-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container">
    <div id="search-results">
      <h1 class="title">Résultats de recherche pour : <?php echo e(get_search_query()); ?></h1>
      <div class="row">
        <div class="col-sm">
          <?php if(!have_posts()): ?>
            <div class="alert alert-warning">
              <?php echo e(__('Désolé, aucun résultat n\'a été trouvé.', 'sage')); ?>

            </div>
            <?php echo get_search_form(false); ?>

          <?php endif; ?>

          <div class="search-items">
            <?php while(have_posts()): ?> <?php (the_post()); ?>
            <?php echo $__env->make('partials.content-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endwhile; ?>
          </div>
        </div>

        <div class="col" id="sub-category-sidebar">

          <?php echo $__env->make( 'partials.search-sidebar' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
      </div>
    </div>
    
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>