@extends('frontend.app')

@section('content')
@include('frontend.partials.slider')
       <section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="latest-news block color-red">
						<div class="custom_item">
						@foreach($featurd_news as $key => $featured)
						@if($key >= 4)
							<div class="item  col-md-4 col-sm-4 col-xs-12 no-padding">

								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href='{{URL::to("article/$featured->id/$featured->link")}}'>
                                            @if ($featured->photo)
                                                <img style="max-height: 180px;min-height: 180px" class="img-responsive" src="{{asset($featured->photo)}}" alt="{{$featured->title}}" />
                                            @else
                                                <img style="max-height: 180px;min-height: 180px" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
                                            @endif
										</a>
									</div>

									<div class="post-content home-post">
							 			<h2 class="post-title title-medium">
							 				<a href='{{URL::to("article/$featured->id/$featured->link")}}'>{{$featured->title}}</a>
							 			</h2>
							 			<!-- <div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Jan 12, 2017</span>
							 			</div> -->
						 			</div><!-- Post content end -->
								</div><!-- List post 2 end -->

							</div><!-- Item 2 end -->
								@endif
							@endforeach






							<!-- Item 4 end -->
						</div><!-- Latest News owl carousel end-->
					</div><!--- Latest news end -->

					<div class="gap-50"></div>

					<div style="margin-bottom: 30px; padding: 0px" class="col-md-12" >
					<?php if($ads1) {
							echo $ads1->script;
							} else{ ?>
								<img style="width: 100%;" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
							<?php 	}?>

					</div>

					<!--- Featured Tab startet -->
					<div class="row">


					</div>

					{{--<p>this is section two</p>--}}




						<div style="margin-top: 20px" class="featured-tab color-red">
							<h3 class="block-title"><span>{{$category_1->name}}</span></h3>
							@if($category_1!=null)
							<ul class="nav nav-tabs">
							<?php $i=0;$j=0; ?>
							@foreach($cat1_sub_cat as $c1_sub_cat)

							 <?php $i++; ?>

							  	<li class="{{($i>1)?'':'active'}}">
							  		<a class="animated fadeIn" href="#tab_{{$i}}" data-toggle="tab">
							  			<span class="tab-head">
											<span class="tab-text-title">{{$c1_sub_cat->name}}</span>
										</span>
							  		</a>
							  	</li>
							  	@endforeach





							</ul>
								@endif

						<div class="tab-content">


						@foreach($cat1_sub_cat as $c1_sub_cat)


						<?php $j++; ?>
					      <div class="tab-pane {{($j>1)?'':'active'}} animated fadeInRight" id="tab_{{$j}}">


					      	<div class="row">
					      	@foreach($cat1_sub_cat_news[$c1_sub_cat->id] as $key=> $news)
						      @if($key<= 0)
						      	<div class="col-md-6 col-sm-6">

						      		<div style="max-width: " class="post-block-style clearfix">
											<div class="post-thumb">
								<a href='{{URL::to("article/$news->id/$news->link")}}'>
								<?php if($news->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
									 			</h2>

									 			<p>{{$news->short_description}}...</p>
								 			</div><!-- Post content end -->
										</div>

						      	</div>
						      	@else

						      	<!-- Col end -->
										<!-- Post Block style end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">


											<!-- Li 2 end -->

											<!-- Li 3 end -->

												<li style="margin-bottom: 30px" class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
											<a href='{{URL::to("article/$news->id/$news->link")}}'>
												<?php if($news->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end --><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
												 			</h2>

											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li>

											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div>
						      	@endif
						      	@endforeach<!-- List post Col end -->
					      	</div>
					      	<!-- Tab pane Row 1 end -->
					      </div>

					      @endforeach<!-- Tab pane 1 end -->



				        	<!-- Tab pane 3 end -->
						</div><!-- tab content -->
					</div>
					<div style="margin-bottom: 30px; padding: 0px" class="col-md-12" >
                        <?php if($ads2) {
                            echo $ads2->script;
                        } else{ ?>
						<img style="width: 100%;" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
                        <?php 	}?>

					</div>
					<div class="gap-40"></div>





					{{--<p>this is section threee</p>--}}




					<div style="margin-top: 20px" class="featured-tab color-red">
							<h3 class="block-title"><span>{{$category_2->name}}</span></h3>
							@if($category_2!=null)
							<ul class="nav nav-tabs">
							<?php $i=0;$j=0; ?>
							@foreach($cat2_sub_cat as $c2_sub_cat)

							 <?php $i++; ?>

							  	<li class="{{($i>1)?'':'active'}}">
							  		<a class="animated fadeIn" href="#tab2_{{$i}}" data-toggle="tab">
							  			<span class="tab-head">
											<span class="tab-text-title">{{$c2_sub_cat->name}}</span>
										</span>
							  		</a>
							  	</li>
							  	@endforeach





							</ul>
								@endif

						<div class="tab-content">


						@foreach($cat2_sub_cat as $c2_sub_cat)


						<?php $j++; ?>
					      <div class="tab-pane {{($j>1)?'':'active'}} animated fadeInRight" id="tab2_{{$j}}">


					      	<div class="row">
					      	@foreach($cat2_sub_cat_news[$c2_sub_cat->id] as $key=> $news)
						      @if($key<= 0)
						      	<div class="col-md-6 col-sm-6">

						      		<div style="max-width: " class="post-block-style clearfix">
											<div class="post-thumb">
								<a href='{{URL::to("article/$news->id/$news->link")}}'>
								<?php if($news->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
									 			</h2>

									 			<p>{{$news->short_description}}...</p>
								 			</div><!-- Post content end -->
										</div>

						      	</div>
						      	@else

						      	<!-- Col end -->
										<!-- Post Block style end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">


											<!-- Li 2 end -->

											<!-- Li 3 end -->

												<li style="margin-bottom: 30px" class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
											<a href='{{URL::to("article/$news->id/$news->link")}}'>
												<?php if($news->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end --><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
												 			</h2>

											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li>

											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div>
						      	@endif
						      	@endforeach<!-- List post Col end -->
					      	</div>
					      	<!-- Tab pane Row 1 end -->
					      </div>

					      @endforeach<!-- Tab pane 1 end -->



				        	<!-- Tab pane 3 end -->
						</div><!-- tab content -->
					</div>


					<div style="margin-bottom: 30px; padding: 0px" class="col-md-12" >
                        <?php if($ads3) {
                            echo $ads3->script;
                        } else{ ?>
						<img style="width: 100%;" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
                        <?php 	}?>

					</div>
					<div class="gap-40"></div>

					{{--this is section four--}}


					<div style="margin-top: 20px" class="featured-tab color-red">
							<h3 class="block-title"><span>{{$category_5->name}}</span></h3>
							@if($category_5!=null)
							<ul class="nav nav-tabs">
							<?php  ?>
							@foreach($cat5_sub_cat as $c5_sub_cat)

							 <?php $i++; ?>

							  	<li class="{{($i>1)?'':'active'}}">
							  		<a class="animated fadeIn" href="#tab2_{{$i}}" data-toggle="tab">
							  			<span class="tab-head">
											<span class="tab-text-title">{{$c5_sub_cat->name}}</span>
										</span>
							  		</a>
							  	</li>
							  	@endforeach
							</ul>
								@endif

						<div class="tab-content">


						@foreach($cat5_sub_cat as $key=>$c5_sub_cat)


						<?php $j++; ?>
					      <div class="tab-pane {{($key == 0)?'active':''}} animated fadeInRight" id="tab2_{{$j}}">


					      	<div class="row">
					      	@foreach($cat5_sub_cat_news[$c5_sub_cat->id] as $key=> $news)
						      @if($key<= 0)
						      	<div class="col-md-6 col-sm-6">

						      		<div style="max-width: " class="post-block-style clearfix">
											<div class="post-thumb">
								<a href='{{URL::to("article/$news->id/$news->link")}}'>
								<?php if($news->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
									 			</h2>

									 			<p>{{$news->short_description}}...</p>
								 			</div><!-- Post content end -->
										</div>

						      	</div>
						      	@else

						      	<!-- Col end -->
										<!-- Post Block style end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">


											<!-- Li 2 end -->

											<!-- Li 3 end -->

												<li style="margin-bottom: 30px" class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
											<a href='{{URL::to("article/$news->id/$news->link")}}'>
												<?php if($news->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($news->photo)}}" alt="{{$news->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end --><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href='{{URL::to("article/$news->id/$news->link")}}'>{{$news->title}}</a>
												 			</h2>

											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li>

											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div>
						      	@endif
						      	@endforeach<!-- List post Col end -->
					      	</div>
					      	<!-- Tab pane Row 1 end -->
					      </div>

					      @endforeach<!-- Tab pane 1 end -->



				        	<!-- Tab pane 3 end -->
						</div><!-- tab content -->
					</div>

					<div style="margin-bottom: 30px; padding: 0px" class="col-md-12" >
                        <?php if($ads4) {
                        echo $ads4->script;
                        } else{ ?>
						<img style="width: 100%;" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
                        <?php 	}?>


					</div>
					<div class="gap-40"></div>
				</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">
						<div class="sidebar_ads1">
						<?php if($ads5) {
							echo $ads5->script;
							} else{ ?>
								<img style="min-height: 120px" class="img-responsive" src="{{asset('img/ads-image/download.jpg')}}" alt="" />
							<?php 	}?>


						</div>

						<?php $info=DB::table('about_company')->First(); ?>
						<div class="widget color-red">
							<h3 class="block-title"><span>নিউজ আপডেট পেতে লাইক দিন</span></h3>
							  <div class="fb-page" data-href="{{$info->fb_link}}" data-tabs="timeline, messages" data-height="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$info->fb_link}}" class="fb-xfbml-parse-ignore"><a href="{{$info->fb_link}}">Facebook</a></blockquote></div><!-- Newsletter end -->
						</div>

						<div class="widget color-red">
							<h3 class="block-title"><span>{{$category_7->name}}</span></h3>
							@foreach($cat_news7 as $key => $c_news7)
							@if($key == 0)
							<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news7->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($c_news7->photo)}}" alt="{{$c_news7->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news7->id/$c_news7->link")}}'>{{$c_news7->title}}</a>
					 			</h2>

				 			</div><!-- Post content end -->
						</div>
							@endif


							<div class="list-post-block">
								<ul class="list-post">
								@if($key >= 1)
									<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<?php if($c_news7->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($c_news7->photo)}}" alt="{{$c_news7->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news7->id/$c_news7->link")}}'>{{$c_news7->title}}</a>
								 			</h2>

							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
									@endif







								</ul><!-- List post end -->
							</div><!-- List post block end -->
							@endforeach

						</div><!-- Popular news widget end -->


						<div class="widget text-center">
						<?php if($ads6) {
							echo $ads6->script;
							} else{ ?>
								<img class="img-responsive" src="{{asset('img/ads-image/300.png')}}" alt="" />
							<?php 	}?>

						</div><!-- Sidebar Ad end -->

					<div class="widget color-red">
							<h3 class="block-title"><span>{{$category_8->name}}</span></h3>

							<!-- Post Overaly Article end -->
							@foreach($cat_news8 as $key => $c_news8)
							@if($key == 0)
							<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news8->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($c_news8->photo)}}" alt="{{$c_news8->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news8->id/$c_news8->link")}}'>{{$c_news8->title}}</a>
					 			</h2>

				 			</div><!-- Post content end -->
						</div>
							@endif


							<div class="list-post-block">
								<ul class="list-post">
								@if($key >= 1)
									<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<?php if($c_news8->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($c_news8->photo)}}" alt="{{$c_news8->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news8->id/$c_news8->link")}}'>{{$c_news8->title}}</a>
								 			</h2>

							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
									@endif







								</ul><!-- List post end -->
							</div><!-- List post block end -->
							@endforeach




						</div><!-- Trending news end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	<section class="ad-content-area text-center no-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
				<?php if($ads7) {
							echo $ads7->script;
							} else{ ?>
								<img class="img-responsive" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
							<?php 	}?>

				</div><!-- Col end -->
				<div class="col-sm-4">
				<?php if($ads8) {
							echo $ads8->script;
							} else{ ?>
								<img class="img-responsive" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
							<?php 	}?>

				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Ad content top end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="block color-red">
						<h3 class="block-title"><span>{{$category_3->name}}</span></h3>

						@foreach($cat_news3 as $key => $c_news3)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news3->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($c_news3->photo)}}" alt="{{$c_news3->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news3->id/$c_news3->link")}}'>{{$c_news3->title}}</a>
					 			</h2>

				 			</div><!-- Post content end -->
						</div>
						@endif<!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
							@if($key >= 1)
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<?php if($c_news3->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($c_news3->photo)}}" alt="{{$c_news3->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news3->id/$c_news3->link")}}'>{{$c_news3->title}}</a>
								 			</h2>

							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
								@endif


							</ul><!-- List post end -->
						</div>
						@endforeach<!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Travel Col end -->

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="block color-red">
						<h3 class="block-title"><span>{{$category_4->name}}</span></h3>

						@foreach($cat_news4 as $key => $c_news4)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news4->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($c_news4->photo)}}" alt="{{$c_news4->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news4->id/$c_news4->link")}}'>{{$c_news4->title}}</a>
					 			</h2>

				 			</div><!-- Post content end -->
						</div>
						@endif<!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
							@if($key >= 1)
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<?php if($c_news4->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($c_news4->photo)}}" alt="{{$c_news4->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news4->id/$c_news4->link")}}'>{{$c_news4->title}}</a>
								 			</h2>

							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
								@endif


							</ul><!-- List post end -->
						</div>
						@endforeach<!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Gadget Col end -->

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="block color-red">
						<h3 class="block-title"><span>{{$category_5->name}}</span></h3>

						@foreach($cat_news5 as $key => $c_news5)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news5->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($c_news5->photo)}}" alt="{{$c_news5->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
					 			</h2>

				 			</div><!-- Post content end -->
						</div>
						@endif<!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
							@if($key >= 1)
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<?php if($c_news5->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($c_news5->photo)}}" alt="{{$c_news5->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
								 			</h2>

							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
								@endif


							</ul><!-- List post end -->
						</div>
						@endforeach<!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Gadget Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section>

	<section class="block-wrapper custom_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				<?php if($ads9) {
							echo $ads9->script;
							} else{ ?>
								<img class="img-responsive" src="{{asset('img/ads-image/730x90-placeholder.png')}}" alt="" />
							<?php 	}?>



				</div>


		</div>

	</section>

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div style="margin-top: 20px" class="featured-tab color-red">
							<h3 class="block-title"><span>{{$category_6->name}}</span></h3>
							@if($category_6!=null)
							<ul class="nav nav-tabs">
							<?php $m=6;$n=6; ?>
							@foreach($cat6_sub_cat as $c6_sub_cat)

							 <?php $m++; ?>

							  	<li class="{{($m>7)?'':'active'}}">
							  		<a class="animated fadeIn" href="#tab_{{$m}}" data-toggle="tab">
							  			<span class="tab-head">
											<span class="tab-text-title">{{$c6_sub_cat->name}}</span>
										</span>
							  		</a>
							  	</li>
							  	@endforeach
							</ul>
								@endif

						<div class="tab-content">


						@foreach($cat6_sub_cat as $c6_sub_cat)


						<?php $n++; ?>
					      <div class="tab-pane {{($n>7)?'':'active'}} animated fadeInRight" id="tab_{{$n}}">


					      	<div class="row">
					      	@foreach($cat6_sub_cat_news[$c6_sub_cat->id] as $key=> $news6)
						      @if($key<= 0)
						      	<div class="col-md-6 col-sm-6">

						      		<div style="max-width: " class="post-block-style clearfix">
											<div class="post-thumb">
								<a href='{{URL::to("article/$news6->id/$news6->link")}}'>
								<?php if($news6->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset($news6->photo)}}" alt="{{$news6->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>

								</a>
							</div>

											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href='{{URL::to("article/$news6->id/$news6->link")}}'>{{$news6->title}}</a>
									 			</h2>

									 			<p>{{$news6->short_description}}...</p>
								 			</div><!-- Post content end -->
										</div>

						      	</div>
						      	@else

						      	<!-- Col end -->
										<!-- Post Block style end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">


											<!-- Li 2 end -->

											<!-- Li 3 end -->

												<li style="margin-bottom: 30px" class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
											<a href='{{URL::to("article/$news6->id/$news6->link")}}'>
												<?php if($news6->photo){ ?>

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset($news6->photo)}}" alt="{{$news6->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>

										</div><!-- Post thumb end --><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href='{{URL::to("article/$news6->id/$news6->link")}}'>{{$news6->title}}</a>
												 			</h2>

											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li>

											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div>
						      	@endif
						      	@endforeach<!-- List post Col end -->
					      	</div>
					      	<!-- Tab pane Row 1 end -->
					      </div>

					      @endforeach<!-- Tab pane 1 end -->



				        	<!-- Tab pane 3 end -->
						</div><!-- tab content -->
					</div>

				</div>


				<div class="col-md-4 color-red">
					<h3 class="block-title "><span>Archive</span></h3>
					<form  class="demo-2" id="calender">

			        	<input id="changeDate" type='text' class="form-control">


			      </form>
				</div>
		</div>
	</section>

	<!-- Video block end -->

<!-- Footer Add -->

	<section class="ad-content-area text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="http://www.smartsoftware.com.bd/" target="_blank"><img class="img-responsive" src="{{asset('assets/frontend/images/adManager/banner1.jpg')}}" alt="" /> </a>
				</div>
			</div>
		</div>
	</section>

<!-- Footer Add -->


@endsection

@section('script')
<script type="text/javascript">
	$('#calender tr td a').on('click',function(){
		var date=$(this).parent().attr('class');
		var res = date.substring(12,22);
		var res = res.replace(" ", "");

		var dateAr = res.split('_');
		var newDates = dateAr[1] + '-' + dateAr[0] + '-' + dateAr[2];
		var url= '{{URL::to("archive")}}/'+newDates;
		window.location=url;

	});


</script>
@endsection
