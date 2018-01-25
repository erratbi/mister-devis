@if( $pages = App::sub_pages($post->post_parent, $post->ID))
  <div class="sibling-pages">
    <h1>Dans la même catégorie</h1>
    <h2>
      <i class="fa fa-angle-right"></i>
      <a href="{{App::permalink( $post->post_parent )}}">{{get_the_title( $post->post_parent )}}</a>
    </h2>
    <ul class="pages-list">

      @foreach( $pages as $page )
        <li class="d-flex">
          <div class="thumb">
            <img src="{{get_the_post_thumbnail_url( $page->ID, 'thumbnail' )}}" alt="{{$page->post_title}}">
          </div>
          <div>
            <a href="{{App::permalink( $page->ID )}}">{{$page->post_title}}</a> <br> <a href="{{App::permalink( $page->ID )}}" class="btn btn-sm btn-primary btn-orange">Demande devis</a>
          </div>
        </li>
      @endforeach

    </ul>
  </div>
@endif

<div id="side-banner">
  @if(count($pages) > 5)
    <a href="#"> <img src="@asset('images/short-banner.png')" alt="Voyager aux USA sans VISA"> </a>
  @else
    <a href="#"> <img src="@asset('images/long-banner.png')" alt="Voyager aux USA sans VISA"> </a>
  @endif
</div>

<!--
<div class="ask-for-call">
  <div class="heading d-flex">
    <img src="@asset('images/artisan-img2.png')" alt="Artisan">
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

@if( ! empty( $first_level_pages ) )
  <div id="cats-accordion">
    <h1>Toutes les catégories</h1>
    @foreach($first_level_pages as $page1)
      <div>
        <ul>
          <li>
            <a data-toggle="collapse" href="#panel-{{$page1->ID}}" aria-expanded="false" aria-controls="panel-{{$page1->ID}}">{{$page1->post_title}}</a>
          </li>
          @if($sub_level_pages = App::sub_pages($page1->ID))
            <ul class="collapse  {{$page1->ID === $post->post_parent ? 'show' : ''}}" id="panel-{{$page1->ID}}" data-parent="#cats-accordion">
              @foreach ($sub_level_pages as $page2 )
                <li><a href="{{App::permalink( $page2->ID )}}">{{$page2->post_title}}</a></li>
              @endforeach
            </ul>
          @endif
        </ul>
      </div>
    @endforeach
  </div>
@endif
