@extends('layouts.master')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">{!! Session::get('message') !!}</div>
    @endif
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <h1>{!! $profile->name !!} <small>{!! $profile->username !!}</small></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        @if($profile->avatar)
            <img src="/uploads/images/users/avatars/{!! $profile->avatar !!}">
        @else
            <img src="/uploads/images/users/avatars/default.png">
        @endif            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <ul class="list-group">
                <li class="list-group-item">{!! $profile->phone !!}</li>
                <li class="list-group-item">{!! $profile->website !!}</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>       
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {!! $profile->name !!}'s Bio
                </div>
                <div class="panel-body">
                    {!! $profile->bio !!}
                </div>
            </div>
        </div>
    </div>
@stop
