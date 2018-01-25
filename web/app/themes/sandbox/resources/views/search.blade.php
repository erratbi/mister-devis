@extends('layouts.home')

@section('content')
  @include('partials.sub-header')
  <div class="container">
    <div id="search-results">
      <h1 class="title">Résultats de recherche pour : {{get_search_query()}}</h1>
      <div class="row">
        <div class="col-sm">
          @if (!have_posts())
            <div class="alert alert-warning">
              {{  __('Désolé, aucun résultat n\'a été trouvé.', 'sage') }}
            </div>
            {!! get_search_form(false) !!}
          @endif

          <div class="search-items">
            @while(have_posts()) @php(the_post())
            @include('partials.content-search')
            @endwhile
          </div>
        </div>

        <div class="col" id="sub-category-sidebar">

          @include( 'partials.search-sidebar' )

        </div>
      </div>
    </div>
    {{--
      {!! get_the_posts_navigation() !!}
    --}}
  </div>
@endsection
