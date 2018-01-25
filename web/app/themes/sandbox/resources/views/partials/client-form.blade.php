<div id="client-form" class="slide">
  <h1 class="title">Formulaire: Demande de devis</h1>
  <form class="form-content carousel-inner">
    <input type="hidden" value="{{$post->post_title}}" name="cat">
    <div id="step-1" class="step row carousel-item active" data-height="250">
      <label class="col-6">
        <input type="radio" name="type_propriete" value="Propriétaire">
        <span>
          <img src="@asset('images/icons/proprietaire-icon.png')" alt="Propriétaire">
          <span>Propriétaire</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_propriete" value="Locataire">
        <span>
          <img src="@asset('images/icons/locataire-icon.png')" alt="Locataire">
          <span>Locataire</span>
        </span>
      </label>
    </div>


    <div id="step-2" class="step row carousel-item" data-height="430">
      <label class="col-6">
        <input type="radio" name="type_batiment" value="Maison & Villa">
        <span>
          <img src="@asset('images/icons/bureau-icon.png')" alt="Maison & Villa">
          <span>Maison & Villa</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_batiment" value="Appartement">
        <span>
          <img src="@asset('images/icons/appartement-icon.png')" alt="Appartement">
          <span>Appartement</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_batiment" value="Commerce ou Bureau">
        <span>
          <img src="@asset('images/icons/bureau-icon.png')" alt="Commerce ou Bureau">
          <span>Commerce ou Bureau</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_batiment" value="Autre...">
        <span>
          <img src="@asset('images/icons/autre-icon.png')" alt="Autre...">
          <span>Autre...</span>
        </span>
      </label>
    </div>


    <div id="step-3" class="step row carousel-item" data-height="430">
      <label class="col-6">
        <input type="radio" name="type_travaux" value="Remplacement">
        <span>
          <img src="@asset('images/icons/remplacement-icon.png')" alt="Remplacement">
          <span>Remplacement</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_travaux" value="Installation neuve">
        <span>
          <img src="@asset('images/icons/installation-neuve-icon.png')" alt="Installation neuve">
          <span>Installation neuve</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_travaux" value="Réparation">
        <span>
          <img src="@asset('images/icons/reparation-icon.png')" alt="Réparation">
          <span>Réparation</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="type_travaux" value="Entretien">
        <span>
          <img src="@asset('images/icons/entretien-icon.png')" alt="Entretien">
          <span>Entretien</span>
        </span>
      </label>
    </div>


    <div id="step-4" class="step row carousel-item" data-height="430">
      <label class="col-6">
        <input type="radio" name="delai_souhaite" value="Au plus vite">
        <span>
          <img src="@asset('images/icons/rapide-icon.png')" alt="Au plus vite">
          <span>Au plus vite</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="delai_souhaite" value="Moins de 2 mois">
        <span>
          <img src="@asset('images/icons/moin-2mois-icon.png')" alt="Moins de 2 mois">
          <span>Moins de 2 mois</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="delai_souhaite" value="Plus de 2 mois">
        <span>
          <img src="@asset('images/icons/2mois-icon.png')" alt="Plus de 2 mois">
          <span>Plus de 2 mois</span>
        </span>
      </label>
      <label class="col-6">
        <input type="radio" name="delai_souhaite" value="Dans l'année">
        <span>
          <img src="@asset('images/icons/annee-icon.png')" alt="Dans l'année">
          <span>Dans l'année</span>
        </span>
      </label>
    </div>


    <div id="step-5" class="step last-step row carousel-item" data-height="730">
      <div class="col-12">
        <h2>
          <img src="@asset('images/icons/handshake-icon.png')">Veuillez remplir le formulaire !</h2>
        <div class="form-group">
          <label for="nom"><em>*</em> Nom / Raison social</label>
          <input type="text" required class="form-control" placeholder="Nom / Raison social" name="nom">
        </div>
        <div class="form-group">
          <label for="prenom"><em>*</em> Prénom</label>
          <input type="text" required class="form-control" placeholder="Prénom" name="prenom">
        </div>
        <div class="form-group">
          <label for="email"><em>*</em> Email</label>
          <input type="email" required class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group">
          <label for="telephone"><em>*</em> Téléphone</label>
          <input type="text" required pattern="^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$" class="form-control" placeholder="Téléphone" name="telephone">
        </div>
        <div class="form-group">
          <label for="observation">Observation</label>
          <textarea class="form-control" placeholder="Observation" name="observation"></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block btn-lg" type="submit">Voir votre DEVIS!</button>
        </div>
        <small>Les champs marqués par (<em>*</em>) sont obligatoires</small>

      </div>
    </div>

    <div id="step-6" class="step congrats-step row carousel-item" data-height="350">
      <div class="col-12">

        <img src="@asset('images/brand.jpg')" alt="logo">

        <h2>Confirmation de votre demande de devis</h2>

        <p>
          Nous vous confirmons la réception de votre demande de devis. Prochainement un de nos conseillers vous contactera afin de recueillir l'ensemble des informations concernant votre projet. A très bientôt
        </p>
        <p>L'équipe mister-devis.com</p>

      </div>
    </div>
  </form>
</div>
