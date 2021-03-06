@extends('layouts.master')

@section('content')
@if (Session::has('message'))
    <div class="alert alert-info blacktext"><b>{{ Session::get('message') }}</b></div>
@endif
<div class="table-responsive">

                
              <table id="mytable" class="table table-bordered table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Article</th>
                    <th>Author</th>
                     <th>Updated</th>
                     <th>Status</th>
                     <th>Category</th>
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
    <tbody>

@foreach ($articles as $article)



    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><a href="/articles/{{ $article->url }}">{{ $article->title }}</a></td>
    <td><a href="/articles/author/{{ $article->author }}/edit">{{ $article->author }}</a></td>
    <td>{{ $article->published_at }}</td>
    <td>Published</td>
    <td><a href="/articles/category/{{ $article->tags }}">{{ $article->tags }}</a></td>
    <td><a href="/article/{{ $article->id }}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-lg fa-edit"></i></button></p></a></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fa fa-lg fa-trash"></i></button></p></td>
    </tr> 

@endforeach
    </tbody>
        
</table>


        
    
   


<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
        
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <a href="/article/{{ $article->id }}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

@stop
