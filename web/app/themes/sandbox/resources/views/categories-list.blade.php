{{--
  Template Name: Categories List Template
--}}

@extends('layouts.home')


@section('content')
  @include('partials.sub-header')

  <div id="category-page">

    @while(have_posts()) @php(the_post())
    <div class="container">
      @include('partials.content-page')
    </div>
    @endwhile

    <div class="container">
      @if(!empty($all_pages = App::sub_pages()))
        <div class="all-pages card-columns" style="column-count: 3">
          @foreach ($all_pages as $page )
            <div class="card">
              <div class="card-heading">
                <a href="{{App::permalink($page->ID)}}"><img src="{{get_the_post_thumbnail_url( $page->ID, 'post-thumbnail' )}}" class="card-img-top" alt="{{$page->post_title}}"></a>
              </div>

              <div class="card-body">
                <h2>{{$page->post_title}}</h2>
                @if(! empty( $sub_pages = App::sub_pages($page->ID)))
                  <ul>
                    @foreach($sub_pages as $sub_page)
                      <li><a href="{{App::permalink($sub_page->ID)}}">{{$sub_page->post_title}}</a></li>
                    @endforeach
                  </ul>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>


@endsection
