@extends('layouts.master')

@section('content')
<div class="col-12 col-lg-12 col-md-12 col-sm-12">
  <div class="panel panel-primary">
<div class="panel-heading">Create a New Article</div>

<div class="panel-body">
{!! Form::open(['url' => 'article', 'files'=> 'true'], ['class' => 'form']) !!}
@include('articles._form')
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Save Article</button>
  </div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>


@stop
