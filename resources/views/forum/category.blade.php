@extends('forum::layouts.master')

@section('content')
@include('forum::partials.breadcrumbs')

@if ($category->canPost)
<p>
	<a href="{!! $category->newThreadRoute !!}" class="btn btn-primary">{!! trans('forum::base.new_thread') !!}</a>
</p>
@endif

@if (!$category->subcategories->isEmpty())
		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
  <div class="panel panel-primary">
<div class="panel-heading"><a class="whitelink" href="{!! $category->Route !!}">{!! $category->title !!}</a></div>
<table class="table table-category">
	<thead>
	<tr><th colspan="3"><i class=" fa fa-angle-double-right"></i> <i>{!! $category->subtitle !!}</i></th></tr>
		<tr>
			<th>{!! trans('forum::base.category') !!}</th>
			<th>{!! trans('forum::base.threads') !!}</th>
			<th>{!! trans('forum::base.posts') !!}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($category->subcategories as $subcategory)

		<tr>
			<td>
				<a href="{!! $subcategory->route !!}">{!! $subcategory->title !!}</a>
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
	</tbody>
</table>
  </div></div>
@endif

{!! $category->pageLinks !!}
	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
  <div class="panel panel-primary">
<div class="panel-heading"><a class="whitelink" href="{!! $category->Route !!}"><i class=" fa fa-server"></i> {!! $category->title !!}</a></div>
<table class="table table-thread">
	<thead>
					<tr><th colspan="4"><i class=" fa fa-angle-double-right"></i> <i>{!! $category->subtitle !!}</i></th></tr>

		<tr>
			<th>{!! trans('forum::base.subject') !!}</th>
			<th>{!! trans('forum::base.reply') !!}</th>
			<th colspan="2">{!! trans('forum::base.last_post') !!}</th>
		</tr>
	</thead>
	<tbody>
		@if (!$category->threadsPaginated->isEmpty())
			@foreach ($category->threadsPaginated as $thread)
			<tr>
				<td>
					<a href="{!! $thread->Route !!}">
						@if ($thread->locked)
						[{!! trans('forum::base.locked') !!}]
						@endif
						@if ($thread->pinned)
						[{!! trans('forum::base.pinned') !!}]
						@endif
						{!! $thread->title !!}
					</a>
				</td>
				<td>
					{!! $thread->posts->count() !!}
				</td>
				<td>
					{!! $thread->lastPost->author->username !!}
				</td>
				<td>
					<a href="{!! URL::to( $thread->lastPostRoute ) !!}">{!! trans('forum::base.view_post') !!} &raquo;</a>
				</td>
			</tr>
			@endforeach
		@else
			<tr>
				<td>
					{!! trans('forum::base.no_threads') !!}
				</td>
				<td colspan="2">
					@if ($category->canPost)
					<a href="{!! $category->newThreadRoute !!}">{!! trans('forum::base.first_thread') !!}</a>
					@endif
				</td>
			</tr>
		@endif
	</tbody>
</table>
  </div></div>
{!! $category->pageLinks !!}

@if ($category->canPost)
<p>
	<a href="{!! $category->newThreadRoute !!}" class="btn btn-primary">{!! trans('forum::base.new_thread') !!}</a>
</p>
@endif
@overwrite
