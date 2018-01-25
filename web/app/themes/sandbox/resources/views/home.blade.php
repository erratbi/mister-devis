{{--
  Template Name: Home Template
--}}

@extends('layouts.home')

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.home-page')
  @endwhile
@endsection
