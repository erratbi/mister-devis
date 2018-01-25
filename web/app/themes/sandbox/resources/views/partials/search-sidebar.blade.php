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
