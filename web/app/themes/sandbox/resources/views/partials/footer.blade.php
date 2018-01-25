<footer id="footer" class="content-info">
  <div class="container"></div>

  <div id="artisan-signup-cta">
    <div class="container">
      <img src="@asset('images/inscription-img.png')" alt="Male artisan">
      <div class="wrap">
        <h1>Vous êtes un Professionnel ?</h1>
        <h2>Profitez de notre base de données de chantiers pour mieux commencer l'année 2018</h2>
        <a href="{{site_url('inscription-pro')}}" class="btn btn-primary btn-lg"> Inscription Gratuite...
          <i class="fa fa-caret-right ml-2"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="footer-content">
    <div class="social">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <ul>
              <li><a href="{{site_url()}}}">Mister Devis</a></li>
              <li><a href="#">Nos guides de prix</a></li>
              <li><em><a href="{{site_url('inscription-pro')}}">Inscription PRO</a></em></li>
              <li><a href="#">Conseils</a></li>
              <li><a href="#">Contactez-nous!</a></li>
            </ul>
          </div>
          <div class="col-sm-4">
            <ul class="icons">
              <li><a href="#" class="fb">
                  <i class="fa fa-facebook"></i>
                </a></li>
              <li><a href="#" class="gp">
                  <i class="fa fa-google-plus"></i>
                </a></li>
              <li><a href="#" class="tw">
                  <i class="fa fa-twitter"></i>
                </a></li>
              <li><a href="#" class="rss">
                  <i class="fa fa-rss"></i>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="mid-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <h3>TRAVAUX mister devis</h3>
            @if (has_nav_menu('travaux_footer_menu'))
              {!! wp_nav_menu(['theme_location' => 'travaux_footer_menu']) !!}
            @endif
          </div>
          <div class="col-sm">
            <h3>DECO mister devis</h3>
            @if (has_nav_menu('deco_footer_menu'))
              {!! wp_nav_menu(['theme_location' => 'deco_footer_menu']) !!}
            @endif
          </div>
          <div class="col-sm">
            <h3>JARDIN mister devis</h3>
            @if (has_nav_menu('jardin_footer_menu'))
              {!! wp_nav_menu(['theme_location' => 'jardin_footer_menu']) !!}
            @endif
          </div>
          <div class="col-sm-4">
            @php(dynamic_sidebar('sidebar-footer'))
            <div class="footer-newsletter">
              <h3>S'abonner à notre Newslettre</h3>
              <form action="" class="form-inline">
                <div class="input-group">
                  <input type="email" name="email" class="form-control mr-1" placeholder="Votre email">
                  <button class="btn btn-danger" type="submit">Envoyer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-footer">
    <div class="container">
      <ul>
        <li><a href="#">Mentions légales</a></li>
        <li><a href="#">Conditions générales d'utilisation</a></li>
        <li><a href="#">Plan du site</a></li>
      </ul>
    </div>
  </div>
</footer>
