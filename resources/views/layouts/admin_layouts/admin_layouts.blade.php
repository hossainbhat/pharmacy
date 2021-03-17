
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
    @include("layouts.admin_layouts.admin_css")
    @yield('style')
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include("layouts.admin_layouts.sitebar")
		<!--end sidebar wrapper -->
		<!--start header -->
        @include("layouts.admin_layouts.header")
		<!--end header -->
		<!--start page wrapper -->
        @yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include("layouts.admin_layouts.footer")
	</div>
	<!--end wrapper-->
	<!--start switcher-->
    @include("layouts.admin_layouts.thims_color")
	<!--end switcher-->
    @include("layouts.admin_layouts.admin_js")
    @yield('script')
</body>
</html>