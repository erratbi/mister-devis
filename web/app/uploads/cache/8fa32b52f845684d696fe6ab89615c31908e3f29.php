<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.sub-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="subcategory-page">
          <?php while(have_posts()): ?> <?php (the_post()); ?>
          <?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endwhile; ?>

        </div>
      </div>
      <div class="col" id="sub-category-sidebar">

        <?php echo $__env->make( 'partials.sub-category-sidebar' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="page-footer row">
      <div class="col">
        <h5>Notre engagement</h5>
        <ul>
          <li>Nous vous proposons des Professionnels qualifiés</li>
          <li>Notre Service est sans engagement et Gratuit</li>
          <li>Vous permettre de comparer jusqu’à 5 Devis</li>
          <li>2 minutes pour enregistrer votre demande</li>
        </ul>
      </div>
      <div class="col">
        <h5>Nos artisans sont</h5>
        <ul>
          <li>A proximité de votre domicile</li>
          <li>Des entreprises à taille humaine</li>
          <li>Dépositaires de nombreux savoir-faire</li>
          <li>Homologués dans le métier exercé</li>
        </ul>
      </div>
      <div class="col">
        <h5>Confidentialité</h5>
        <ul>
          <li>Vos informations sont confidentielles</li>
          <li>Vos infos sont protégées</li>
          <li>C’est très simple, rapide et gratuit</li>
          <li>80 000 artisans professionnels qualifiés</li>
        </ul>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>