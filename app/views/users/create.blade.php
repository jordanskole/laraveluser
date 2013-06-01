@extends('layouts.index')

@section('content')
	<div class="row">
		<div class="span6 offset3 top100">
			@if($errors->has())
				{{ var_dump($errors)}}
			@endif
			{{ Form::open(array('route'=>'users.store', 'class'=>'well form-horizontal'))}}
				{{ Form::token() }}
				<div class="control-group top20">
					{{ Form::label('email', 'Email Address', array('class'=>'control-label')) }}
					<div class="controls">
						{{ Form::text('email') }}
					</div><!-- /controls -->
				</div><!-- /control group -->
				<div class="control-group">
					{{ Form::label('password', 'Password', array('class'=>'control-label')) }}
					<div class="controls">
						{{ Form::password('password') }}
					</div><!-- /controls -->
				</div><!-- /control group -->
				<div class="control-group">
					<div class="controls">
						{{ Form::submit('Register', array('class'=>'btn btn-primary')) }}
					</div><!-- /controls -->
				</div><!-- /control group -->
			{{ Form::close() }}
		</div><!-- /span4 offset4 -->
	</div><!-- /row -->
@stop