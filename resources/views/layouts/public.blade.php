<!DOCTYPE html>
<html>
<head>

	  @include('includes.header')
		<title>
			@yield('custom-head')
		</title>

</head>
<body id="top" class="scrollspy">

	@include('includes.preloader')

	@include('includes.navigation')

		@yield('page-content')


		@include('includes.footer')
    </body>

	<!--  Scripts-->
	<script src="{{ url('assets/material')}}/min/plugin-min.js"></script>
	<script src="{{ url('assets/material')}}/min/custom-min.js"></script>

	@yield('custom-scripts')
</html>
