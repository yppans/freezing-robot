@extends('layouts.master')

@section('content')
	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
  <div class="panel panel-primary">
<div class="panel-heading">Edit Your Account</div>

<div class="panel-body">
{!! Form::model($profile, ['method' => 'PATCH', 'route' => ['updateaccount'], 'files'=> 'true'], ['class' => 'form']) !!}
@include('auth._account')
@if($profile->avatar)
<div class="form-group">
	{!! Form::label('image', 'Current Image:') !!}
<img src="/uploads/images/articles/{!! $profile->avatar !!}">
</div>
@endif
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Save</button>
  </div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
@stop
