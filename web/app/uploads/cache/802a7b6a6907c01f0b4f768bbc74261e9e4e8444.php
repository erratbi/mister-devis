<?php $__env->startSection('content'); ?>
  <div id="category-page" class="artisan-form">
    <div class="row">
      <?php while(have_posts()): ?> <?php (the_post()); ?>
      <div class="col-sm">
        <?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="how-it-works">
          <h1>Comment ça Marche ?</h1>

          <ul>
            <li class="year"><?php echo e(date('Y')); ?></li>
            <li class="left">
              <i class="fa fa-random"></i>
              <p>Nous Investissons Dans Des Campagnes Publicitaires Sur Google, Facebook Et Par Mail</p>
            </li>
            <li class="right">
              <i class="fa fa-files-o"></i>
              <p>Nous Réceptionnons Des Demandes De Devis.</p>
            </li>
            <li class="left">
              <i class="fa fa-check-square-o"></i>
              <p>Sélection Et Vérification Des Projets Sérieux De Particuliers Ou De Professionnels (Chantiers De 1000 € À 500’000 €)</p>
            </li>
            <li class="right">
              <i class="fa fa-handshake-o"></i>
              <p>Validation De L’acceptation De La Mise En Relation Avec Le Client (Justificatif Disponible).</p>
            </li>
            <li class="left">
              <i class="fa fa-clock-o"></i>
              <p>Vous Recevez 1 Alerte Par Mail Et Par SMS Vous Informant D’un Projet De Chantier Vérifié Et Disponible Dans Votre Secteur.</p>
            </li>
            <li class="right">
              <i class="fa fa-clock-o"></i>
              <p>Vous Choisissez Votre Chantier Librement En Fonction De Vos Besoins Et De Votre Planning De Travail.</p>
            </li>
            <li class="left">
              <i class="fa fa-euro"></i>
              <p>Vous Ne Payez Que Les Informations Dont Vous Avez Besoin.</p>
            </li>
            <li class="right">
              <i class="fa fa-file-pdf-o"></i>
              <p>Vous Obtenez Votre « Fiche Chantier » Et Contactez Votre Futur Client Pour Un RDV</p>
            </li>
            <li class="left">
              <i class="fa fa fa-share"></i>
              <p>A La Suite Du « RDV Chantier » Vous Envoyez Un Devis Conforme À La Demande Du Client.</p>
            </li>
            <li class="right">
              <i class="fa fa fa-line-chart"></i>
              <p>Vous Suivez L’évolution De La Demande Jusqu’à L’acceptation Et La Signature Du Chantier Avec Un Acompte.</p>
            </li>
            <li class="left">
              <i class="fa fa fa-hourglass-o"></i>
              <p>Vous Réalisez Les Travaux Conformément Au Devis Signé Et Vous Encaissez Le Solde De La Facture.</p>
            </li>
          </ul>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="col" id="artisan-signup-sidebar">
        <?php echo $__env->make('partials.artisan-signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>