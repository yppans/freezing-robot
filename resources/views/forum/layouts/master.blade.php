@extends('layouts.master')
	@include('forum::partials.alerts')

	@section('content')

	<script>
	$('form a[data-submit]').click(function() {
		$(this).parent('form').submit();
	});

	$('form[data-confirm]').submit(function() {
		return confirm('{!! trans('forum::base.generic_confirm') !!}');
	});
	</script>
		@stop

