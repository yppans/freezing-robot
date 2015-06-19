@extends('layouts.master')

@section('content')
@if (Session::has('author'))
    <div class="alert alert-info blacktext"><b>Displaying all articles by {{ Session::get('author') }}</b></div>
@endif
@if (Session::has('category'))
    <div class="alert alert-info blacktext"><b>Displaying all articles in the category {{ Session::get('category') }}</b></div>
@endif

@foreach ($articles->chunk(3) as $arts)
<div class="row">
@foreach ($arts as $article)
<?php
$date = $article->published_at;
$date = new DateTime($date);
$published = $date->format('M d, Y')
?>
<div class="col-4 col-lg-4 col-md-4 col-sm-12">
   <div class="panel panel-primary">
 <div class="panel-heading"><a class="whitelink" href="/articles/{{ $article->url }}">{{ $article->title }}</a></div>

 <div class="panel-body">
@if($article->image)
<img class="img img-circle pull-left" height="75" width="75" src="/uploads/images/articles/{!! $article->image !!}">
@else
<img class="img img-thumbnail pull-left" src="http://placehold.it/75x75">
@endif
<?php
$article->excerpt = substr($article->body, 0, 150);
?>



          <p>{!! $article->excerpt !!}...</p>
<p class="pull-right"><i><small>
<a class="btn btn-primary btn-xs" href="/articles/{{ $article->url }}"><i class="fa fa-chevron-circle-right"></i> Continue Reading</a>
</small></i></p>
 </div>

 <div class="panel-footer"><p>
<i class="fa fa-calendar"></i> {!! $published !!}
<i class="fa fa-comment"></i> <a href="http://candojax.com/articles/{!! $article->url !!}#disqus_thread">Comments</a>


</p>
    </div>

</div>
</div>
@endforeach
</div>
@endforeach

@stop

