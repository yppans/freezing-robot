<div class="panel panel-primary">
<div class="table-responsive">
<table class="table">
<tr>
	<td>
		{!! $post->author->username !!}
	</td>
	<td><p class="pull-left">
		{{ nl2br(e($post->content)) }}
	</p></td>
</tr>
<tr>
	<td>
		@if ($post->canEdit)
		<a href="{!! $post->editRoute !!}">{!! trans('forum::base.edit')!!}</a>
		@endif
		@if ($post->canDelete)
		{!! Form::inline($post->deleteRoute, ['method' => 'DELETE', 'data-confirm' => true], ['label' => trans('forum::base.delete')]) !!}
		@endif
	</td>
	<td>
		{!! trans('forum::base.posted_at') !!} {!! $post->posted !!}
		@if ($post->updated_at != null && $post->created_at != $post->updated_at)
			{!! trans('forum::base.last_update') !!} {!! $post->updated !!}
		@endif
	</td>
</tr>

</table>
</div>
</div>