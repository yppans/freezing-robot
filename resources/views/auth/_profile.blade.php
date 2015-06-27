
<div class="form-group">
	{!! Form::label('phone', 'Phone Number:') !!}
	{!! Form::text('phone', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Phone Number']) !!}
</div>
<div class="form-group">
	{!! Form::label('website', 'Website:') !!}
	{!! Form::text('website', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Website']) !!}
</div>
<div class="form-group">
	{!! Form::label('bio', 'Your Bio:') !!}
	{!! Form::textarea('bio', null, ['class' => 'form-control', 'required' => '']) !!}
</div>

<div class="form-group">
	{!! Form::label('avatar', 'Avatar:') !!}

	{!! Form::file('avatar', null, ['class' => 'form-control']) !!}
</div>




