@extends('layouts.master')
@section('content')
    <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">User Management</div>
    <div class="table-responsive">

                
              <table id="mytable" class="table table-hover table-striped">
                   
                   <thead>
                   <th>Name</th>
                    <th>Username</th>
                     <th>Email</th>
                     <th>Role</th>
                      <th>Edit</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
    @foreach($users as $user)
    <td>{!! $user->name !!}</td>
    <td>{!! $user->username !!} </td>
    <td>{!! $user->email !!}</td>
    <td>{!! $user->role !!}</td>
    <td><a href="/usermanager/{!! $user->id !!}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr> 
    @endforeach
    </tbody>
        </table>
    </div>
    </div>
@stop