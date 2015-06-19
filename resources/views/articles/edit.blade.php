@extends('layouts.master')

@section('content')
{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id], 'files'=> 'true'], ['class' => 'form']) !!}
@include('articles._form')
@if($article->image)
<div class="form-group">
	{!! Form::label('image', 'Current Image:') !!}
<img src="/uploads/images/articles/{!! $article->image !!}">
</div>
@endif
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Save Article</button>
  </div>
</div>
{!! Form::close() !!}
@stop
