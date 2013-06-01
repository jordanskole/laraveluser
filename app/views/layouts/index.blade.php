<!doctype HTML>
<html>
<head>
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="/css/lg-style.css" rel="stylesheet">

	@yield('head')
</head>
<body class="public">

	<div class="navbar navbar-public navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="/">Laravel Gallery</a>
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar martop15" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>					
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						@if(!Auth::check())
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"></i> Login<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li>
										<div class="pad10">
											{{ Form::open(array('route'=>'users.login', 'class'=>'margin0')) }}
												<fieldset>
													<label>
														<span>Email:</span>
														{{ Form::text('email', Input::old('email'), array('class'=>'login-field', 'placeholder'=>'Enter your email', 'id'=>'email', 'value'=>'')) }}
													</label>
													<label>
														<span>Password:</span>
														{{ Form::password('password', array('class'=>'login-field', 'value'=>'', 'placeholder'=>'Password', 'id'=>'login-pass')) }}
													</label>
												</fieldset>
												<fieldset class="text-right">
													<button class="btn btn-primary">Login</button>
													<p class="pull-left text-left">
														{{ HTML::linkRoute('users.create', 'Register an account?', array(), array('class'=>'')) }}
														<br>
														<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Not ready yet...">Forgot password?</a>
													</p>
												</fieldset>
											{{ Form::close() }}
										</div><!-- /pad10 -->
									</li>
								</ul>
							</li>
						@else
							<li><a href="/logout">Logout <i class="icon-hand-right icon-white"></i></a></li>
						@endif
					</ul><!-- /pull-right -->
				</div><!-- /nav collapse -->
			</div><!-- container -->
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<!--==============================================-->

	<div class="container">
		@yield('content')		
	</div><!-- /container -->
	
	<!-- Load JS here for greater good =============================-->
	<script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="/js/jquery.dropkick-1.0.0.js"></script>
    <script src="/js/custom_checkbox_and_radio.js"></script>
    <script src="/js/custom_radio.js"></script>
    <script src="/js/jquery.tagsinput.js"></script>
    <script src="/js/bootstrap-tooltip.js"></script>
    <script src="/js/jquery.placeholder.js"></script>
    <script src="/js/application.js"></script>
    <!--[if lt IE 8]>
      <script src="js/icon-font-ie7.js"></script>
      <script src="js/icon-font-ie7-24.js"></script>
    <![endif]-->
	@yield('scripts')

</body>
</html>