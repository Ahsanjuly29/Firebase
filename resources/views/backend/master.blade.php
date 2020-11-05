<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
        <title>List of Products - E-Dokani</title>
		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}" />
		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
        <![endif]-->
        @yield('inline-css')
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							E-Dokani
						</small>
					</a>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar responsive ace-save-state">
                <script>
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
                <ul class="nav nav-list">
                    <li class="">
                        <a href="dashboard.html">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> POS </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="pos.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Index
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Customer </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="customer.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Customer Info
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="addCustomer.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Customer
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <li class="active open">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Product </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('products.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Product
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="active">
                                <a href="{{ route('products.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Product List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Seller </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="Seller.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Seller info
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="addSeller.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Seller
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                </ul><!-- /.nav-list -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
            </div>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Product</a>
                            </li>
                            <li class="active">Product List</li>
                        </ul><!-- /.breadcrumb -->
                    </div>
                    @yield('main-content')
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    {{-- </div><!-- /.main-content --> --}}
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="blue bolder">Smart Dokani</span>
						&copy; 2020
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
		<!-- <![endif]-->
		<!--[if IE]>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<!-- page specific plugin scripts -->
		<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/js/buttons.flash.min.js') }}"></script>
		<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

		<!-- ace scripts -->
		<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('assets/js/ace.min.js') }}"></script>
        @yield('inline-js')
	</body>
</html>
