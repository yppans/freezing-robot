@extends('forum::layouts.master')

@section('content')
@include('forum::partials.breadcrumbs')
<?php
var_dump($auth);
?>
@foreach ($categories as $category)
	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
  <div class="panel panel-primary">
<div class="panel-heading"><a class="whitelink" href="{!! $category->Route !!}"><i class=" fa fa-tasks"></i> {!! $category->title !!}</a></div>


<table class="table table-index table-striped">

				

	<thead>
	<tr><th colspan="3"><i class=" fa fa-angle-double-right"></i> <i>{!! $category->subtitle !!}</i></th></tr>
		<tr>
			<th>{!! trans('forum::base.category') !!}</th>
			<th>{!! trans('forum::base.threads') !!}</th>
			<th>{!! trans('forum::base.posts') !!}</th>
		</tr>
	</thead>
	<tbody>
		@if (!$category->subcategories->isEmpty())
		@foreach ($category->subcategories as $subcategory)
		<tr>
			<td>
				<a href="{!! $subcategory->Route !!}">{!! $subcategory->title !!}</a>
				<br>
				{!! $subcategory->subtitle !!}
				@if ($subcategory->newestThread)
				<br>
				{{ trans('forum::base.newest_thread') }}: <a href="{!! $subcategory->newestThread->route !!}">{!! $subcategory->newestThread->title !!}</a>
				({!! $subcategory->newestThread->author->username !!})
				<br>
				{{ trans('forum::base.last_post') }}: <a href="{!! $subcategory->latestActiveThread->lastPost->route !!}">{!! $subcategory->latestActiveThread->title !!}</a>
				({!! $subcategory->latestActiveThread->lastPost->author->username !!})
				@endif
			</td>
			<td>{!! $subcategory->threadCount !!}</td>
			<td>{!! $subcategory->replyCount !!}</td>
		</tr>
		@endforeach
		@else
		<tr>
			<th colspan="3">
				{!! trans('forum::base.no_categories') !!}
			</th>
		</tr>
		@endif
	</tbody>
</table>

</div>
</div>
@endforeach
@overwrite
