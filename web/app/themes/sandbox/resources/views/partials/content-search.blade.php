<article @php(post_class('d-flex'))>
  <div class="thumb">
    <a href="{{ get_permalink() }}"> <img src="{{get_the_post_thumbnail_url()}}" alt="{{ get_the_title() }}"> </a>
  </div>
  <div>
    <h1><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h1>
  </div>
</article>
