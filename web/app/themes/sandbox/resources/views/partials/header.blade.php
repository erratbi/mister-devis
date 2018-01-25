<header class="banner">
  <div class="top-header d-flex">
    <ul class="list-inline ml-auto">
      <li class="list-inline-item">Besoin d'aide ? <span class="phone">09 88 77 27 00</span></li>
      <li class="list-inline-item"><a href="mailto:support@mister-devis.com">support@mister-devis.com</a></li>
      <li class="list-inline-item"><a href="mailto:contact@mister-devis.com">contact@mister-devis.com</a></li>
    </ul>
  </div>
  <div class="d-flex mid-header justify-content-between">
    <a class="brand" href="{{ home_url('/') }}"> <img src="@asset('images/brand.jpg')" alt="{{ get_bloginfo('name', 'display') }}"> </a>
    <a href="#" class="header-banner"><img src="@asset('images/esta-wide-banner.jpg')" alt="Prenez des Vacanaces aux USA sans VISA"></a>
    <div class="header-actions">
      <h1>Êtes-vous un professionnel ?</h1>
      <a href="#" class="btn btn-green">
        <i class="fa fa-edit"></i>
        Inscription PRO</a> <a href="#" class="btn btn-danger">
        <i class="fa fa-lock"></i>
        Espace PRO</a>
    </div>
  </div>
  <nav class="header-nav nav-primary d-flex justify-content-center">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
</header>
