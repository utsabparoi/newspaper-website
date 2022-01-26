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
						@if($key >= 2)
							<div class="item  col-md-4 col-sm-4 col-xs-12 no-padding">

								<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href='{{URL::to("article/$featured->id/$featured->link")}}'>
												<?php if($featured->photo){ ?>
												<img style="max-height: 180px;min-height: 180px" class="img-responsive" src="{{asset('img/news/'.$featured->photo)}}" alt="{{$featured->title}}" />
												<?php }else{ ?>
												<img style="max-height: 180px;min-height: 180px" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
												<?php } ?>
												</a>
											</div>
										
											<div class="post-content">
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

					<div style="margin-bottom: 30px" class="col-md-12">
						<img class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-one.jpg')}}" alt="" />
					</div>

					<!--- Featured Tab startet -->
					<div class="row">
						
						
					</div>

						<div style="margin-top: 20px" class="featured-tab color-blue">
							<h3 class="block-title"><span>{{$category_1->name}}</span></h3>
							@if(count($category_1)>0)
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

						
						@foreach($cat1_sub_cat_news as $key => $c1_sub_cat_news)


						<?php $j++; ?>
					      <div class="tab-pane {{($j>1)?'':'active'}} animated fadeInRight" id="tab_{{$j++}}">
					      	<div class="row">
						      	@if($key == 0)
						      	<div class="col-md-6 col-sm-6">

						      		<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget1.jpg')}}" alt="" />
												</a>
											</div>
											
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="#">title</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">John Doe</a></span>
									 				<span class="post-date">Feb 24, 2017</span>
									 			</div>
									 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
								 			</div><!-- Post content end -->
										</div>
										
						      	</div>
						      	@endif<!-- Col end -->
										<!-- Post Block style end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">
												

											<!-- Li 2 end -->

											<!-- Li 3 end -->
											@if($key >=1)
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget5.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Google Assistant starts calling out to all recent Android phones</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 27, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li>
												@endif<!-- Li 4 end -->
											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div><!-- List post Col end -->
					      	</div><!-- Tab pane Row 1 end -->
					      </div>
					      
					      @endforeach<!-- Tab pane 1 end -->

				        

				        	<!-- Tab pane 3 end -->	
						</div><!-- tab content -->
					</div>

					<div class="gap-40"></div>

					<div class="block color-orange">
						<h3 class="block-title"><span>{{$category_2->name}}</span></h3>
						@foreach($cat_news2 as $key => $c_news2)
						<div class="row">
							<div class="col-md-6 col-sm-6">
							@if($key == 0)
								<div class="post-overaly-style clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/travel1.jpg')}}" alt="" />
										</a>
									</div>
									
									<div class="post-content">
							 			
							 			<h2 class="post-title">
							 				<a href="#">{{$c_news2->title}}</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-date">Mar 03, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Overaly Article end -->
								@endif

								<div class="list-post-block">
									<ul class="list-post">
										

										

										

										<li class="clearfix">
											<div class="post-block-style post-float clearfix">
												<div class="post-thumb">
													<a href="#">
														<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/architecture2.jpg')}}" alt="" />
													</a>
													<a class="post-cat" href="#">Architecture</a>
												</div><!-- Post thumb end -->

												<div class="post-content">
										 			<h2 class="post-title title-small">
										 				<a href="#">Science meets architecture in robotically coven, solar-active str…</a>
										 			</h2>
										 			<div class="post-meta">
										 				<span class="post-date">Jan 07, 2017</span>
										 			</div>
									 			</div><!-- Post content end -->
											</div><!-- Post block style end -->
										</li><!-- Li 4 end -->

									</ul><!-- List post end -->
								</div><!-- List post block end -->
							</div><!-- Col 1 end -->

							<div class="col-md-6 col-sm-6">
								<div class="post-overaly-style last clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/architecture3.jpg')}}" alt="" />
										</a>
									</div>
									
									<div class="post-content">
							 			<a class="post-cat" href="#">Architecture</a>
							 			<h2 class="post-title">
							 				<a href="#">The bedroom keys to Bond villain chic: The best houses of 2017</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-date">Feb 06, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Overaly Article end -->

								<div class="list-post-block">
									<ul class="list-post">
										

										<li class="clearfix">
											<div class="post-block-style post-float clearfix">
												<div class="post-thumb">
													<a href="#">
														<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/travel5.jpg')}}" alt="" />
													</a>
													<a class="post-cat" href="#">Travel</a>
												</div><!-- Post thumb end -->

												<div class="post-content">
										 			<h2 class="post-title title-small">
										 				<a href="#">Hynopedia helps female travelers find health …</a>
										 			</h2>
										 			<div class="post-meta">
										 				<span class="post-date">Feb 27, 2017</span>
										 			</div>
									 			</div><!-- Post content end -->
											</div><!-- Post block style end -->
										</li><!-- Li 4 end -->

									</ul><!-- List post end -->
								</div><!-- List post block end -->
							</div><!-- Col 2 end -->
						</div>
						@endforeach<!-- Row end -->
					</div><!-- Block Lifestyle end -->
					


				</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">
						<div class="sidebar_ads1">
							<img style="min-height: 120px" class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-one.jpg')}}" alt="" />
						</div>
						

						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>

							<div class="post-overaly-style clearfix">
								<div class="post-thumb">
									<a href="#">
										<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/health4.jpg')}}" alt="" />
									</a>
								</div>
								
								<div class="post-content">
						 			<a class="post-cat" href="#">Health</a>
						 			<h2 class="post-title">
						 				<a href="#">Smart packs parking sensor tech and beeps when col…</a>
						 			</h2>
						 			<div class="post-meta">
						 				<span class="post-date">Feb 06, 2017</span>
						 			</div>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly Article end -->


							<div class="list-post-block">
								<ul class="list-post">
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget3.jpg')}}" alt="" />
												</a>
												<a class="post-cat" href="#">Gadgets</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Mar 13, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/travel5.jpg')}}" alt="" />
												</a>
												<a class="post-cat" href="#">Travel</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Hynopedia helps female travelers find health care...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Jan 11, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 2 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot5.jpg')}}" alt="" />
												</a>
												<a class="post-cat" href="#">Robotics</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Robots in hospitals can be quite handy to navigate around...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Feb 19, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 3 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/food1.jpg')}}" alt="" />
												</a>
												<a class="post-cat" href="#">Food</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Tacos ditched the naked chicken chalupa, so here's how…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Feb 27, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 4 end -->

								</ul><!-- List post end -->
							</div><!-- List post block end -->

						</div><!-- Popular news widget end -->

						<div class="widget text-center">
							<img class="banner img-responsive" src="{{asset('frontend/images/banner-ads/ad-sidebar.png')}}" alt="" />
						</div><!-- Sidebar Ad end -->

					<div class="widget color-default">
							<h3 class="block-title"><span>Trending News</span></h3>

							<div class="post-overaly-style clearfix">
								<div class="post-thumb">
									<a href="#">
										<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/health4.jpg')}}" alt="" />
									</a>
								</div>
								
								<div class="post-content">
						 			
						 			<h2 class="post-title">
						 				<a href="#">Smart packs parking sensor tech and beeps when col…</a>
						 			</h2>
						 			<div class="post-meta">
						 				<span class="post-date">Feb 06, 2017</span>
						 			</div>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly Article end -->


							<div class="list-post-block">
								<ul class="list-post">
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget3.jpg')}}" alt="" />
												</a>
												
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Mar 13, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/travel5.jpg')}}" alt="" />
												</a>
												
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Hynopedia helps female travelers find health care...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Jan 11, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 2 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot5.jpg')}}" alt="" />
												</a>
												
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Robots in hospitals can be quite handy to navigate around...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Feb 19, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 3 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/lifestyle/food1.jpg')}}" alt="" />
												</a>
												
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Tacos ditched the naked chicken chalupa, so here's how…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Feb 27, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 4 end -->

								</ul><!-- List post end -->
							</div><!-- List post block end -->

						</div><!-- Trending news end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	<section class="ad-content-area text-center no-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-one.jpg')}}" alt="" />
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Ad content top end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="block color-dark-blue">
						<h3 class="block-title"><span>{{$category_3->name}}</span></h3>
						
						@foreach($cat_news3 as $key => $c_news3)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news3->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news3->photo)}}" alt="{{$c_news3->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
									
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news3->id/$c_news3->link")}}'>{{$c_news3->title}}</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news3->created_at));
                                ?></span>
					 			</div>
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

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news3->photo)}}" alt="{{$c_news3->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news3->id/$c_news3->link")}}'>{{$c_news3->title}}</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news3->created_at));
                                ?></span>
								 			</div>
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
					<div class="block color-dark-blue">
						<h3 class="block-title"><span>{{$category_4->name}}</span></h3>
						
						@foreach($cat_news4 as $key => $c_news4)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news4->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news4->photo)}}" alt="{{$c_news4->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
									
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news4->id/$c_news4->link")}}'>{{$c_news4->title}}</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news4->created_at));
                                ?></span>
					 			</div>
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

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news4->photo)}}" alt="{{$c_news4->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news4->id/$c_news4->link")}}'>{{$c_news4->title}}</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news4->created_at));
                                ?></span>
								 			</div>
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
					<div class="block color-dark-blue">
						<h3 class="block-title"><span>{{$category_5->name}}</span></h3>
						
						@foreach($cat_news5 as $key => $c_news5)
						@if($key == 0)

						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
								<?php if($c_news5->photo){ ?>

										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news5->photo)}}" alt="{{$c_news5->title}}" />
										<?php } else{ ?>


										<img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
									
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news5->created_at));
                                ?></span>
					 			</div>
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

										<img style="max-height: 80px;min-height:80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/'.$c_news5->photo)}}" alt="{{$c_news5->title}}" />
										<?php } else{ ?>


										<img style="max-height: 80px;min-height: 80px;min-width: 100%" class="img-responsive" src="{{asset('img/news/images.png')}}" alt="image">
										<?php } ?>
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date"><?
                                echo date(' jS M Y',strtotime($c_news5->created_at));
                                ?></span>
								 			</div>
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
					<img class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-one.jpg')}}" alt="" />
				</div>
				
				<div class="col-md-4 coustom_ads">
					<img class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-one.jpg')}}" alt="" />
				</div>
			</div>
		</div>
	</section>

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
							<div style="margin-top: 20px" class="featured-tab color-blue">
							<h3 class="block-title"><span>Technology</span></h3>
							<ul class="nav nav-tabs">
							  	<li class="active">
							  		<a class="animated fadeIn" href="#tab1" data-toggle="tab">
							  			<span class="tab-head">
											<span class="tab-text-title">Gadgets</span>					
										</span>
							  		</a>
							  	</li>
							  	<li>
								  	<a class="animated fadeIn" href="#tab2" data-toggle="tab">
								  		<span class="tab-head">
											<span class="tab-text-title">Games</span>					
										</span>
								  	</a>
								</li>
							 	<li>
								  	<a class="animated fadeIn" href="#tab3" data-toggle="tab">
								  		<span class="tab-head">
											<span class="tab-text-title">Robotics</span>					
										</span>
								  	</a>
								</li>
							</ul>

						<div class="tab-content">
					      <div class="tab-pane active animated fadeInRight" id="tab1">
					      	<div class="row">
						      	<div class="col-md-6 col-sm-6">
						      		<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget1.jpg')}}" alt="" />
												</a>
											</div>
											<a class="post-cat" href="#">Gadgets</a>
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="#">The best MacBook Pro alternatives in 2017 for Apple users</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">John Doe</a></span>
									 				<span class="post-date">Feb 24, 2017</span>
									 			</div>
									 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
								 			</div><!-- Post content end -->
										</div><!-- Post Block style end -->
						      	</div><!-- Col end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget2.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Samsung Gear S3 review: A whimper, when smartwatches need a bang</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget3.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's dream</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Jan 11, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 2 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget4.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Soaring through Southern Patagonia with the Premium Byrd drone</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 19, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 3 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/gadget5.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Google Assistant starts calling out to all recent Android phones</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 27, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 4 end -->
											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div><!-- List post Col end -->
					      	</div><!-- Tab pane Row 1 end -->
					      </div><!-- Tab pane 1 end -->

				        	<div class="tab-pane animated fadeInRight" id="tab2">
					        	<div class="row">
						      	<div class="col-md-6 col-sm-6">
						      		<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/game1.jpg')}}" alt="" />
												</a>
											</div>
											<a class="post-cat" href="#">Games</a>
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="#">Historical heroes and robot dinosaurs: New games on our... </a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">John Doe</a></span>
									 				<span class="post-date">Feb 24, 2017</span>
									 			</div>
									 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
								 			</div><!-- Post content end -->
										</div><!-- Post Block style end -->
						      	</div><!-- Col end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/game2.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Lindie game plonks players in front of huge starship command cent…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/game3.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Meet Twitch: Mintendo’s new console mixes handheld and console…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Jan 11, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 2 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/game4.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Super Tario Run isn’t groundbreaking, but it has Mintendo charm</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 19, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 3 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/game5.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Oazer and Lacon bring eSport expertise to new PS4 controller…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 27, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 4 end -->
											</ul><!-- List post end -->
										</div><!-- List post block end -->
						      	</div><!-- List post Col end -->
					      	</div><!-- Tab pane Row 2 end -->
				       	</div><!-- Tab pane 2 end -->

				        	<div class="tab-pane animated fadeInLeft" id="tab3">

								<div class="row">
						      	<div class="col-md-6 col-sm-6">
						      		<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot1.jpg')}}" alt="" />
												</a>
											</div>
											<a class="post-cat" href="#">Robotics</a>
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="#">There's no escaping Watsone Dynamics' wheeled jumping robot</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">John Doe</a></span>
									 				<span class="post-date">Feb 24, 2017</span>
									 			</div>
									 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
								 			</div><!-- Post content end -->
										</div><!-- Post Block style end -->
						      	</div><!-- Col end -->

						      	<div class="col-md-6 col-sm-6">
						      		<div class="list-post-block">
											<ul class="list-post">
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot2.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Robot Life on Mars! Meet the Machines Exploring the Red Planet To…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot3.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Amaging China mech suit aims to assist with Lukushima cleanup</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Jan 11, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 2 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot4.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Taddler robot provides insights into early childhood learning</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 19, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 3 end -->

												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="{{asset('frontend/images/news/tech/robot5.jpg')}}" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Robots in hospitals can be quite handy to navigate around the ho…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 27, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 4 end -->
											</ul><!-- List post end -->

										</div><!-- List post block end -->
						      	</div><!-- List post Col end -->
					      	</div><!-- Tab pane Row 3 end -->
				        	</div><!-- Tab pane 3 end -->	
						</div><!-- tab content -->
					</div>
					
				</div>
				<div class="col-md-4">
					<h3 class="block-title"><span>Archive</span></h3>
					<form  class="demo-2" id="calender">

			        	<input id="changeDate" type='text' class="form-control">

			        
			      </form>
			     

					
						
									    

					
				
			</div>
		</div>
	</section>

	<!-- Video block end -->



<!-- 	<section class="ad-content-area text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img class="img-responsive" src="{{asset('frontend/images/banner-ads/ad-content-two.png')}}" alt="" />
				</div>
			</div>
		</div>
	</section> -->
           

         

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
