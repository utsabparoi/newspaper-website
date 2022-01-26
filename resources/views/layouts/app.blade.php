<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/custom.css" />
        {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('dashboard') }}/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="{{ asset('dashboard') }}/assets/js/html5shiv.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="{{ url('/') }}" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
                        {{-- <div class="my_div" style="display:flex">
                            <img src="{{ asset('uploads/logo').'/'.App\Models\Company::find(1)->company_logo }}" alt="image not found" width="40px" height="30px">
                            <small class="mt-5 ml-2" style="margin: 5px 0 0 5px">Hunger</small>
                        </div> --}}
                    </a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">



						<li class="light-blue dropdown-modal" >
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								{{-- <img class="nav-user-photo" src="{{ asset('uploads/admin_profile').'/'. auth()->user()->admin_image}}" width="100px" alt="Jason's Photo" /> --}}
								<span class="user-info">
									<small>Welcome,</small>
									<strong>{{ Auth()->user()->name }}</strong>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="{{ route('user_index') }}">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ace-icon fa fa-power-off"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>


				<ul class="nav nav-list">
                    {{-- three level view --}}
							{{-- <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Three Level Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item #1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											4th level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li> --}}
                    {{--
                     |--------------------------------------------------------------------------
                     | Dashboard list start
                     |--------------------------------------------------------------------------
                    --}}
					<li class="active">
						<a href="{{ url('/home') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Setting list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text"> Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            <li class="">
                                <a href="{{ route('user_index') }}">
                                    <i class=" fa fa-user"></i>
                                    <span class="menu-text"> User </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
							<li class="">
                                <a href="{{ route('company_index') }}">
                                    <i class=" fa fa-building"></i>
                                    <span class="menu-text"> Company </span>
                                </a>

                                <b class="arrow"></b>
                            </li>

						</ul>
					</li>




                    {{--
                     |--------------------------------------------------------------------------
                     | Category list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">
								Category
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            {{-- paste --}}
                            <li class="">
                                <a href="{{ route('category.create') }}">
                                    <i class=" fa fa-plus purple"></i>
                                    Add Category
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="{{ route('category.index') }}">
                                    <i class=" fa fa-eye pink"></i>
                                    View Category
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Sub Category
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('class-sub-category.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Sub Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('class-sub-category.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Sub Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Menu list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bars"></i>
							<span class="menu-text"> Menu </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            {{-- paste --}}
                            <li class="">
								<a href="{{ route('menu.create') }}">
									<i class="fa fa-plus purple"></i>
									Add Menu
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('menu.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Menu
								</a>

								<b class="arrow"></b>
							</li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Sub Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('sub-menu.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Sub Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('sub-menu.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Sub Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Sub Sub Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('sub-sub-menu.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Sub Sub Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('sub-sub-menu.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Sub Sub Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Blog list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-rss"></i>
							<span class="menu-text"> Blog </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            {{-- paste --}}
                            <li class="">
                                <a href="{{ route('admin-blog.create') }}">
                                    <i class=" fa fa-plus purple"></i>
                                    Add Blog
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="{{ route('admin-blog.index') }}">
                                    <i class=" fa fa-eye pink"></i>
                                    View Blog
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Blog Category
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('blog-category.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Blog Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('blog-category.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Blog Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Advertisement list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bullhorn"></i>
							<span class="menu-text"> Advertisement </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Ads Management
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('ads-management.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Ads
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('ads-management.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Ads
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Ads Position
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('ad-position.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Ads Position
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('ad-position.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Ads Position
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | News list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-newspaper-o"></i>
							<span class="menu-text"> News </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('manage-news.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add News
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('manage-news.index') }}">
									<i class=" fa fa-eye pink"></i>
									View News
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Page list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file"></i>
							<span class="menu-text"> Page </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            {{-- paste --}}
                            <li class="">
								<a href="{{ route('pages.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add Page
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('pages.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Page
								</a>

								<b class="arrow"></b>
							</li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Page Photo
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('page-photo.create') }}">
                                            <i class=" fa fa-plus purplet"></i>
                                            Add Page Photo
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('page-photo.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Page Photo
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Events list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Events </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('events.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add Events
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('events.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Events
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>


                    {{--
                     |--------------------------------------------------------------------------
                     | All Media list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-video-camera"></i>
							<span class="menu-text"> All Media </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('all-media.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add Media
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('all-media.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Media
								</a>

								<b class="arrow"></b>
							</li>
                            <li class="">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-leaf green"></i>

									Media Category
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
                                {{-- sub category --}}
								<ul class="submenu">
									<li class="">
                                        <a href="{{ route('media-category.create') }}">
                                            <i class=" fa fa-plus purple"></i>
                                            Add Media Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('media-category.index') }}">
                                            <i class=" fa fa-eye pink"></i>
                                            View Media Category
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
								</ul>
							</li>
						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Slider list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-sliders"></i>
							<span class="menu-text"> SLider </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('slider.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add SLider
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('slider.index') }}">
									<i class=" fa fa-eye pink"></i>
									View SLider
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>




                    {{--
                     |--------------------------------------------------------------------------
                     | Performer Schedule list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
                        <a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-clock-o"></i>
							<span class="menu-text"> Performer Schedule </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('schedule.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add Schedule
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('schedule.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Schedule
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>



                    {{--
                     |--------------------------------------------------------------------------
                     | Social Links list start
                     |--------------------------------------------------------------------------
                    --}}
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-share-square"></i>
							<span class="menu-text"> Social Links </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('social-links.create') }}">
									<i class=" fa fa-plus purple"></i>
									Add Social Links
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ route('social-links.index') }}">
									<i class=" fa fa-eye pink"></i>
									View Social Links
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
           {{--
            |--------------------------------------------------------------------------
            | Main Content area start
            |--------------------------------------------------------------------------
           --}}
			@yield('main_content')


           {{--
            |--------------------------------------------------------------------------
            | Footer area start
            |--------------------------------------------------------------------------
           --}}
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
                        <div class="row">
                            <div class="col-lg-6 left">
                                <span class="bigger-120 ">
                                    Copyright © {{ Carbon\Carbon::now()->format('Y') }} <span class="blue bolder">Company_name</span>
                                </span>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4 right">
                                <span class="bigger-120 ">
                                    Developed By: <span class="blue bolder">Smart Software Ltd</span>
                                </span>
                            </div>
                        </div>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
        {{-- <script src="{{ asset('dashboard') }}/assets/js/jquery-1.11.3.min.js"></script> --}}
	    {{-- <script src="{{ asset('dashboard') }}/assets/js/jquery-1.12.4.min.js"></script> --}}
		{{-- <script src="{{ asset('dashboard') }}/assets/js/jquery-3.6.0.min.js"></script> --}}
		<script src="{{ asset('dashboard') }}/assets/js/jquery-2.1.4.min.js"></script>
		{{-- <script src="{{ asset('dashboard') }}/assets/js/jquery.min.js"></script> --}}
        <script src="{{ asset('dashboard') }}/assets/js/bootstrap.min.js"></script>
		{{-- <script src="{{ asset('dashboard') }}/assets/js/popper.min.js"></script> --}}
		<!-- <![endif]-->



		<!--[if IE]>
        <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset("dashboard") }}/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>


		<!-- page specific plugin scripts -->


		<!--[if lte IE 8]>
		  <script src="{{ asset('dashboard') }}/assets/js/excanvas.min.js"></script>
		<![endif]-->


		<!-- jQuery Scripts file -->
		<script src="{{ asset('dashboard') }}/assets/js/jquery-ui.custom.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.easypiechart.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.sparkline.index.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.flot.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.flot.pie.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.flot.resize.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/jquery.flot.min.js"></script>
        <script src="{{ asset('dashboard') }}/assets/js/sweetalert2@11.js"></script>


        <!-- ace scripts -->
		<script src="{{ asset('dashboard') }}/assets/js/ace-elements.min.js"></script>
		<script src="{{ asset('dashboard') }}/assets/js/ace.min.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">

            // ajax basic start
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})

				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});


			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;

			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);

			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);


			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;

			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

			 });

				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});




				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}

				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}

				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}


				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});


				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });


				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}

				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});


				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();

					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});

			})
            @yield('ajax_dropdown')
		</script>


        {{-- Sweet Alert Scripts --}}
        @if (session()->has('success'))
            <script>
                Swal.fire({
                title: 'success!',
                text: "{{ session()->get('success') }}",
                icon: 'success'
            })
            </script>
        @endif
        @if (session()->has('error'))
            <script>
                Swal.fire({
                title: 'error!',
                text: "{{ session()->get('error') }}",
                icon: 'error'
            })
            </script>
        @endif
        @if (session()->has('warning'))
            <script>
                Swal.fire({
                title: 'warning!',
                text: "{{ session()->get('warning') }}",
                icon: 'warning'
            })
            </script>
        @endif
        @if (session()->has('delete'))
            <script>
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            </script>
        @endif


        {{-- Custom Scripts --}}
        @yield('footer_scripts')
        @yield('scripts')

	</body>
</html>
