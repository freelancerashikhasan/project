<!DOCTYPE html>
<html lang="en" dir="ltr">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Steadfast IT') }}</title>
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
        <meta content="Spruko Technologies Private Limited" name="author">
        <meta name="keywords" content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

        <!-- Title -->
        <title>{{ config('app.name', 'Steadfast IT') }}</title>

        <!--Favicon -->
        <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!--Bootstrap css -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Style css -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/dark.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Animate css -->
        <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

        <!---Icons css-->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

        <!-- Simplebar css -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">

        <!-- Color Skin css -->
        <link id="theme" href="{{ asset('assets/colors/color1.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Switcher css -->
        <link rel="stylesheet" href="{{ asset('assets/switcher/css/switcher.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/switcher/demo.css') }}">
        <!-- Include DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <!-- Include DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
        <style>
            .select2{
                width: 100% !important;
            }
        </style>

    </head>

	<body class="app sidebar-mini">



		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader">
		</div>
		<div class="page">
			<div class="page-main">
				@include('layouts.sidebar')
				<!--aside closed-->				<!-- App-Content -->
				<div class="app-content main-content">
					<div class="side-app">
						@include('layouts.header')

                        @yield('content')

					</div>
				</div>
				<!-- End app-content-->
			</div>
						<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2020 <a href="index-2.html#">Admintro</a>. Designed by <a href="index-2.html#">Spruko Technologies Pvt.Ltd</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->		</div><!-- End Page -->
			<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

		<!-- Jquery js-->

		<!-- Bootstrap4 js-->
		<script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!--Othercharts js-->
		<script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

		<!-- Circle-progress js-->
		<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

		<!-- Jquery-rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

		<!--Sidemenu js-->
		<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- P-scroll js-->
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scroll.js') }}"></script>


        <!--INTERNAL Peitychart js-->
        <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>

        <!--INTERNAL Apexchart js-->
        <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

        <!--INTERNAL ECharts js-->
        <script src="{{ asset('assets/plugins/echarts/echarts.js') }}"></script>

        <!--INTERNAL Chart js -->
        <script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

        <!--INTERNAL Moment js-->
        <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

        <!--INTERNAL Index js-->
        <script src="{{ asset('assets/js/index1.js') }}"></script>

		<!-- Simplebar JS -->
		<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

		<!-- Switcher js-->
		<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>



        @stack('script')
    </body>

</html>
