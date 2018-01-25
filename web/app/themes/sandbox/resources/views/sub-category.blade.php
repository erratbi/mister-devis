{{--
  Template Name: Sub Category Template
--}}

@extends('layouts.home')


@section('content')
  @include('partials.sub-header')
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="subcategory-page">
          @while(have_posts()) @php(the_post())
          @include('partials.content-page')
          @endwhile

        </div>
      </div>
      <div class="col" id="sub-category-sidebar">

        @include( 'partials.sub-category-sidebar' )
      </div>
    </div>
  </div>
  <div class="container">
    <div class="page-footer row">
      <div class="col">
        <h5>Notre engagement</h5>
        <ul>
          <li>Nous vous proposons des Professionnels qualifiés</li>
          <li>Notre Service est sans engagement et Gratuit</li>
          <li>Vous permettre de comparer jusqu’à 5 Devis</li>
          <li>2 minutes pour enregistrer votre demande</li>
        </ul>
      </div>
      <div class="col">
        <h5>Nos artisans sont</h5>
        <ul>
          <li>A proximité de votre domicile</li>
          <li>Des entreprises à taille humaine</li>
          <li>Dépositaires de nombreux savoir-faire</li>
          <li>Homologués dans le métier exercé</li>
        </ul>
      </div>
      <div class="col">
        <h5>Confidentialité</h5>
        <ul>
          <li>Vos informations sont confidentielles</li>
          <li>Vos infos sont protégées</li>
          <li>C’est très simple, rapide et gratuit</li>
          <li>80 000 artisans professionnels qualifiés</li>
        </ul>
      </div>
    </div>
  </div>

@endsection
