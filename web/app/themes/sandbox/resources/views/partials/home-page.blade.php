@php(the_content())

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

<div id="price-guides-cta">
  <div class="container">
    <div class="wrap">
      <h1>Consultez Nos Guides des Prix</h1>
      <h2>Faites vos comparaisons de prix et obtenir le coût convenable de vos travaux</h2>
      <a href="#">Voir tous nos guides de prix</a>
    </div>
    <img src="@asset('images/guides-img.png')" alt="Female artisan">
  </div>
</div>


<div id="price-guides-list">
  <div class="container">
    <ul>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/piscines.jpg')" alt="Guide des prix piscines" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix piscines</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/chaudieres.jpg')" alt="Guide des prix chaudières" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix chaudières</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/cuisines.jpg')" alt="Guide des prix cuisines" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix cuisines</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/fenetres.jpg')" alt="Guide des prix fenêtres" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix fenêtres</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/renovations.jpg')" alt="Guide des prix rénovations" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix rénovations</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/plomberie.jpg')" alt="Guide des prix plomberie" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix plomberie</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/charpente.jpg')" alt="Guide des prix charpente" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix charpente</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/cheminee.jpg')" alt="Guide des prix cheminée" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix cheminée</a>
        </h4>
      </li>
      <li>
        <div class="icon">
          <a href="#"><img src="@asset('images/veranda.jpg')" alt="Guide des prix véranda" class="icon"></a>
        </div>
        <h4 class="title">
          <a href="#">Guide des prix véranda</a>
        </h4>
      </li>
    </ul>
    <div class="text-centre">
      <a href="#" class="btn btn-primary btn-lg">Voir tous les guides</a>
    </div>
  </div>
</div>
