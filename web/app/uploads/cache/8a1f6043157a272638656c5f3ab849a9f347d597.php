<form action="" method="POST" id="artisan-signup-form">
  <h1>Inscription Gratuite &amp; Sans Engagement</h1>
  <div class="form-group">
    <label for="id_activite">Activité principale</label>
    <select name="id_activite" required id="id_activite" class="form-control">
      <option value="" selected="selected">Sélectionnez une catégorie...</option>
      <option value="ALARME">Alarme &amp; Surveillance</option>
      <option value="CUISINE">Cuisine</option>
      <option value="PISCINE">Piscine</option>
      <option value="SALLE BAIN">Salle de Bain</option>
      <option value="CLIMATISATION">Climatisation</option>
      <option value="ENERGIES RENOUVELABLES">Energies Renouvelables</option>
      <option value="TRAITEMENT">Traitements</option>
      <option value="CHAUFFAGE">Chauffage</option>
      <option value="DEMENAGEMENT">Déménagement</option>
      <option value="GROS OEUVRE">Gros Oeuvre</option>
      <option value="SECOND OEUVRE">Second Oeuvre</option>
      <option value="FENETRE">Fenêtres et porte fenêtres</option>
      <option value="AUTRE">Autres</option>
    </select>
  </div>

  <div class="form-group">
    <div class="d-flex">
      <div class="mr-2">
        <label for="prenom"><em>*</em>Prénom</label>
        <input type="text" id="prenom" name="prenom" class="form-control" required placeholder="Prénom">
      </div>
      <div>
        <label for="nom"><em>*</em>Nom</label>
        <input type="text" id="nom" name="nom" class="form-control" required placeholder="Nom">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="raison_sociale"><em>*</em>Raison sociale</label>
    <input type="text" id="raison_sociale" name="raison_sociale" required class="form-control" placeholder="Raison sociale">
  </div>
  <div class="form-group">
    <label for="code_postal"><em>*</em>Code postal</label>
    <input type="text" id="code_postal" required name="code_postal" class="form-control" placeholder="Code postal">
  </div>

  <div class="form-group">
    <div class="d-flex">
      <div class="mr-2">
        <label for="telephone_portable"><em>*</em>Téléphone portable</label>
        <input type="text" id="telephone_portable" name="telephone_portable" class="form-control" required placeholder="Téléphone portable">
      </div>
      <div>
        <label for="telephone_fixe">Téléphone fixe</label>
        <input type="text" id="telephone_fixe" name="telephone_fixe" class="form-control" placeholder="Téléphone fixe">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="login"><em>*</em>Nom d'utilisateur</label>
    <input type="text" id="login" name="login" required class="form-control" placeholder="Nom d'utilisateur">
  </div>
  <div class="form-group">
    <label for="email"><em>*</em>Adresse email</label>
    <input type="email" id="email" name="email" required class="form-control" placeholder="Adresse email">
  </div>

  <div class="form-group">
    <div class="d-flex">
      <div class="mr-2">
        <label for="pass"><em>*</em>Mot de passe</label>
        <input type="password" id="pass" name="pass" class="form-control" required placeholder="Mot de passe">
      </div>
      <div>
        <label for="pass2">Confirmation</label>
        <input type="password" id="pass2" name="pass2" class="form-control" required placeholder="Confirmation">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="horaireRDV">Horraires pour vous joindre</label>
    <input type="text" id="horaireRDV" name="horaireRDV" class="form-control" placeholder="Horraires pour vous joindre">
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-lg btn-success">
      <i class="fa fa-edit"></i>
      Valider votre inscription
    </button>
  </div>
</form>
