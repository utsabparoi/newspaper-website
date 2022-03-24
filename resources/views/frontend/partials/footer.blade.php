<?php
 $info=DB::table('about_company')->first();
  $social_link=DB::table('social_links')->get();
  ?>
 @if(Request::path()!='media')
<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				<div class="footer-info">
					<div class="col-md-12 footer_menu text-center">
						<ul class="unstyled footer-social">
								<li class="listed">
									<a href="{{URL::to('lifestyle')}}">
										<span class="social-icon"><i>জীবনধারা</i></span>
									</a>
										<a href="{{URL::to('entertainment')}}">
										<span class="social-icon"><i>	বিনোদন</i></span>
									</a>
									<a href="{{URL::to('health')}}">
										<span class="social-icon"><i>স্বাস্থ্য তথ্য</i></span>
									</a>
									<a href="{{URL::to('sports')}}">
										<span class="social-icon"><i>খেলাধুলা</i></span>
									</a>
										<a href="{{URL::to('tech')}}">
										<span class="social-icon"><i class="tech">বিজ্ঞান ও প্রযুক্তি</i></span>
									</a>
										<a href="{{URL::to('arts-literature')}}">
										<span class="social-icon"><i>শিল্প ও সাহিত্য</i></span>
									</a>
									<a href="{{URL::to('priyo-probashi')}}">
										<span class="social-icon"><i>প্রিয় প্রবাসী</i></span>
									</a>
										<a href="{{URL::to('job-circular')}}">
										<span class="social-icon"><i>লাইফ হ্যাক</i></span>
									</a>
										<a href="{{URL::to('tutorial')}}">
										<span class="social-icon"><i>টিউটোরিয়াল</i></span>
									</a>
										<a href="{{URL::to('lifestyle')}}">
										<span class="social-icon"><i>জীবনধারা</i></span>
									</a>
										<a href="{{URL::to('job-circular')}}">
										<span class="social-icon"><i>চাকরি</i></span>
									</a>

								</li>
							</ul>

					</div>
					<div class="col-md-12 footer_logo_others">
						<div class="row">
							<div class="col-md-4 col-xs-12" id="middle_part1">
								<div style="max-width: 180px;min-width: 180px" class="footer-logo">
                                    <a href="{{ url('/') }}">
									    <img class="img-responsive" src="{{asset($info->logo)}}" alt="" />
                                    </a>
                                </div>

							</div>
							<div class="col-md-4 col-xs-12" id="middle_part2">
								<div class="footer_apple">
									<a href="#"><img class="img-responsive" src="{{asset('assets/frontend/images/download.png')}}" alt="" /></a>
								</div>
								<div  class="footer_playstore">
									<a href=""><img class="img-responsive" src="{{asset('assets/frontend/images/en_badge_web_generic.png')}}" alt="" /></a>
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="footer_icon text-right">
									<ul class="unstyled footer-social">
										<li>


											@foreach($social_link as $s_link)
											<a title="{{$s_link->name}}" href='{{URL::to("$s_link->link")}}'>
												<span class="social-icon"><i class="fa {{$s_link->icon_class}}"></i></span>
											</a>
											@endforeach



										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="footer_info_text text-center">

								<p><?php echo $info->short_description; ?></p>
								<!--<p class="footer-info-phone"><i class="fa fa-phone"></i> {{$info->mobile_no}}</p>-->
								<p class="footer-info-email"><i class="fa fa-envelope-o"></i> {{$info->email}}</p>
							<!--	<h2 class="text-center">{{$info->company_name}} | Chiff Editor: Shahidul Islam Mintu</h2>-->

							</div>
						</div>
					</div>


					<!-- Col end -->
				<!-- Row end -->
			<!-- Container end -->
		</div>



				</div><!-- Row end -->
			</div><!-- Container end -->


		<!-- Footer info end -->

	</footer><!-- Footer end -->
@endif
	<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="copyright-info">
							<span>All Rights Reserved by : <a href="{{ url('/') }}"> {{$info->company_name}}</a></span>

						</div>
					</div>
					<div class="col-xs-12 col-sm-2">
						<div align='center'>
							{{-- <img src='http://www.free-website-hit-counter.com/c.php?d=9&id=110464&s=36' border='0' title='free website hit counter'> --}}
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<p style="margin-left: 280px">Developed By:<a href="http://www.smartsoftware.com.bd" target="_blank" title="best web design & Development Company in Bangladesh, best Software Development Company in Bangladesh"><strong> Smart Software Ltd</strong> </a></p>
					</div>
				</div><!-- Row end -->

				<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
					<button class="btn btn-primary" title="Back to Top">
						<i class="fa fa-angle-up"></i>
					</button>
				</div>

			</div><!-- Container end -->
		</div>


	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.js')}}"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	<!-- Counter -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
	<!-- Color box -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.colorbox.js')}}"></script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/smoothscroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.minical.js')}}"></script>

	<script src="{{ asset('assets/frontend/jssocials/jssocials.min.js') }}"></script>
	<!-- Template custom -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/custom.js')}}"></script>
	<script type="text/javascript">


	jQuery("document").ready(function($){

	var nav = $('.fixed_menu');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 150) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});

});


	</script>
	<script>


$("form.demo-2 :text").minical({
        inline: true
      });

</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

	</div><!-- Body inner end -->
