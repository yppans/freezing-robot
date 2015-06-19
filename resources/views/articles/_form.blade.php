

<div class="form-group">
	{!! Form::label('title', 'Article Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'The Title']) !!}
</div>
<div class="form-group">
	{!! Form::label('tags', 'Article Category:') !!}
	{!! Form::text('tags', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Category']) !!}
</div>
<div class="form-group">
	{!! Form::label('body', 'Content:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) !!}
</div>
<div class="form-group">
	{!! Form::label('published', 'Publish Now?') !!}
	{!! Form::checkbox('published', '1', true) !!}
    <p class="help-block">Uncheck to save as draft</p>
</div>
<div class="form-group">
	{!! Form::label('image', 'Article Image:') !!}

	{!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>




