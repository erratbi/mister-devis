{{--
  Template Name: Category Template
--}}

@extends('layouts.home')


@section('content')
  @include('partials.sub-header')

  <div id="category-page">

    <div class="container">
      @while(have_posts()) @php(the_post())
      @include('partials.content-page')
      @endwhile

      @if($sub_pages = App::sub_pages())
        <div class="sub-pages">
          <div class="row">
            @foreach($sub_pages as $page)
              <div class="col-4">
                <div class="page-item">
                  <div class="thumb">
                    <a href="{{App::permalink($page->ID)}}"><img src="{{get_the_post_thumbnail_url( $page->ID)}}"></a>
                  </div>
                  <div class="actions">
                    <a href="{{App::permalink($page->ID)}}" class="btn btn-sm btn-primary btn-orange btn-lg">Demande devis</a>
                    <h3>
                      <a href="{{App::permalink($page->ID)}}">{{$page->post_title}}</a>
                    </h3>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </div>

@endsection
