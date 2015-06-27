<div class="form-group">
	{!! Form::label('username', 'Username:') !!}
	{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'email']) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'New Password:') !!}
	{!! Form::password('password', ['class' => 'form-control', 'required' => '']) !!}
</div>

