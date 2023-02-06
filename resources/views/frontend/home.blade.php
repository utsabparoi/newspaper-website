@extends('frontend.app')

@section('content')
    @include('frontend.partials.slider')
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="latest-news block color-red">
                        <div class="custom_item">

                            @foreach ($featurd_news as $key => $featured)
                                @if ($key >= 4)
                                    <div class="item  col-md-4 col-sm-4 col-xs-12 no-padding">

                                        <div class="post-block-style clearfix">
                                            <div class="post-thumb">
                                                <a href='{{ URL::to("article/$featured->id/$featured->link") }}'>
                                                    @if ($featured->photo)
                                                        @if (strpos($featured->photo, 'assets'))
                                                            <img style="max-height: 180px;min-height: 180px"
                                                                class="img-responsive" src="{{ asset($featured->photo) }}"
                                                                alt="{{ $featured->title }}" />
                                                        @else
                                                            <img style="max-height: 180px;min-height: 180px"
                                                                class="img-responsive"
                                                                src="{{ asset('img/news/' . $featured->photo) }}"
                                                                alt="news image" />
                                                        @endif
                                                    @else
                                                        <img style="max-height: 180px;min-height: 180px"
                                                            class="img-responsive" src="{{ asset('img/news/images.png') }}"
                                                            alt="image">
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="post-content home-post">
                                                <h2 class="post-title title-medium">
                                                    <a
                                                        href='{{ URL::to("article/$featured->id/$featured->link") }}'>{{ $featured->title }}</a>
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
                    </div>
                    <!--- Latest news end -->

                    <div class="gap-50"></div>

                    <div style="margin-bottom: 30px; padding: 0px" class="col-md-12 custom-image">

                        @foreach ($ads_manages as $ads_manage)
                            @if ($ads_manage->serial_num == 2)
                                @if ($ads_manage->script_image_status == 0)
                                    <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                        <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                        alt="Fix the adsimage position and serial no" />
                                    </a>
                                @elseif ($ads_manage->script_image_status == 1)
                                    {!! $ads_manage->script !!}
                                @else
                                    <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                        alt="" />
                                @endif
                            @endif
                        @endforeach

                    </div>

                    <!--- Featured Tab startet -->
                    <div class="row">


                    </div>

                    {{-- <p>this is section two</p> --}}



                    {{-- ------------------ CATEGORY 1 START ------------------ --}}
                    @foreach ($categories as $category)
                        @if ($category->serial_num == 1)
                            <div style="margin-top: 20px" class="featured-tab color-red">
                                <h3 class="block-title"><span>{{ $category->name }}</span></h3>

                                @if ($category != null)
                                    <ul class="nav nav-tabs">
                                        <?php $i = 0;
                                        $j = 0; ?>
                                        @foreach ($category->subcategories->take(7) as $c1_sub_cat)
                                            <?php $i++; ?>
                                            <li class="{{ $i > 1 ? '' : 'active' }}">
                                                <a class="animated fadeIn" href="#tab_{{ $i }}"
                                                    data-toggle="tab">
                                                    <span class="tab-head">
                                                        <span class="tab-text-title">{{ $c1_sub_cat->name }}</span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="tab-content">
                                    @foreach ($category->subcategories as $c1_sub_cat)
                                        <?php $j++; ?>
                                        <div class="tab-pane {{ $j > 1 ? '' : 'active' }} animated fadeInRight"
                                            id="tab_{{ $j }}">
                                            <div class="row">
                                                @foreach ($c1_sub_cat->news->take(5) as $key => $news)
                                                    @if ($key <= 0)
                                                        <div class="col-md-6 col-sm-6">
                                                            <div style="max-width: " class="post-block-style clearfix">
                                                                <div class="post-thumb">
                                                                    <a
                                                                        href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                        <?php if($news->photo){ ?>

                                                                        @if (strpos($news->photo, 'assets'))
                                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                                class="img-responsive"
                                                                                src="{{ asset($news->photo) }}"
                                                                                alt="{{ $news->title }}" />
                                                                        @else
                                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                                class="img-responsive"
                                                                                src="{{ asset('img/news/' . $news->photo) }}"
                                                                                alt="{{ $news->title }}" />
                                                                        @endif

                                                                        <?php } else{ ?>

                                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/images.png') }}"
                                                                            alt="image">
                                                                        <?php } ?>

                                                                    </a>
                                                                </div>

                                                                <div class="post-content">
                                                                    <h2 class="post-title">
                                                                        <a
                                                                            href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                                    </h2>

                                                                    <p>{{ $news->short_description }}...</p>
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
                                                                                <a
                                                                                    href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                                    <?php if($news->photo){ ?>

                                                                                    @if (strpos($news->photo, 'assets'))
                                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                            class="img-responsive"
                                                                                            src="{{ asset($news->photo) }}"
                                                                                            alt="{{ $news->title }}" />
                                                                                    @else
                                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                            class="img-responsive"
                                                                                            src="{{ asset('img/news/' . $news->photo) }}"
                                                                                            alt="{{ $news->title }}" />
                                                                                    @endif

                                                                                    <?php } else{ ?>


                                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                        class="img-responsive"
                                                                                        src="{{ asset('img/news/images.png') }}"
                                                                                        alt="image">
                                                                                    <?php } ?>
                                                                                </a>
                                                                            </div><!-- Post thumb end -->
                                                                            <!-- Post thumb end -->

                                                                            <div class="post-content">
                                                                                <h2 class="post-title title-small">
                                                                                    <a
                                                                                        href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                                                </h2>

                                                                            </div><!-- Post content end -->
                                                                        </div><!-- Post block style end -->
                                                                    </li>
                                                                </ul><!-- List post end -->
                                                            </div><!-- List post block end -->
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <!-- List post Col end -->
                                            </div>
                                            <!-- Tab pane Row 1 end -->
                                        </div>
                                    @endforeach

                                    <!-- Tab pane 1 end -->
                                    <!-- Tab pane 3 end -->
                                </div><!-- tab content -->
                        @endif
                    @endforeach
                    {{-- ------------------ CATEGORY 1 END ------------------ --}}



                </div>

                <div style="margin-bottom: 30px; padding: 0px" class="col-md-12 custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 3)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="gap-40"></div>





                {{-- <p>this is section threee</p> --}}



                {{-- ------------------ CATEGORY 2 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 2)
                        <div style="margin-top: 20px" class="featured-tab color-red">
                            <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                            @if ($category != null)
                                <ul class="nav nav-tabs">
                                    <?php $i = 0;
                                    $j = 0; ?>
                                    @foreach ($category->subcategories->take(7) as $c2_sub_cat)
                                        <?php $i++; ?>

                                        <li class="{{ $i > 1 ? '' : 'active' }}">
                                            <a class="animated fadeIn" href="#tab2_{{ $i }}"
                                                data-toggle="tab">
                                                <span class="tab-head">
                                                    <span class="tab-text-title">{{ $c2_sub_cat->name }}</span>
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach





                                </ul>
                            @endif

                            <div class="tab-content">


                                @foreach ($category->subcategories as $c2_sub_cat)
                                    <?php $j++; ?>
                                    <div class="tab-pane {{ $j > 1 ? '' : 'active' }} animated fadeInRight"
                                        id="tab2_{{ $j }}">


                                        <div class="row">
                                            @foreach ($c2_sub_cat->news->take(5) as $key => $news)
                                                @if ($key <= 0)
                                                    <div class="col-md-6 col-sm-6">

                                                        <div style="max-width: " class="post-block-style clearfix">
                                                            <div class="post-thumb">
                                                                <a href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                    <?php if($news->photo){ ?>

                                                                    @if (strpos($news->photo, 'assets'))
                                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset($news->photo) }}"
                                                                            alt="{{ $news->title }}" />
                                                                    @else
                                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/' . $news->photo) }}"
                                                                            alt="{{ $news->title }}" />
                                                                    @endif

                                                                    <?php } else{ ?>


                                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/images.png') }}"
                                                                        alt="image">
                                                                    <?php } ?>

                                                                </a>
                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title">
                                                                    <a
                                                                        href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                                </h2>

                                                                <p>{{ $news->short_description }}...</p>
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
                                                                            <a
                                                                                href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                                <?php if($news->photo){ ?>

                                                                                @if (strpos($news->photo, 'assets'))
                                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                        class="img-responsive"
                                                                                        src="{{ asset($news->photo) }}"
                                                                                        alt="{{ $news->title }}" />
                                                                                @else
                                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                        class="img-responsive"
                                                                                        src="{{ asset('img/news/' . $news->photo) }}"
                                                                                        alt="{{ $news->title }}" />
                                                                                @endif

                                                                                <?php } else{ ?>


                                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                    class="img-responsive"
                                                                                    src="{{ asset('img/news/images.png') }}"
                                                                                    alt="image">
                                                                                <?php } ?>
                                                                            </a>
                                                                        </div><!-- Post thumb end -->
                                                                        <!-- Post thumb end -->

                                                                        <div class="post-content">
                                                                            <h2 class="post-title title-small">
                                                                                <a
                                                                                    href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                                            </h2>

                                                                        </div><!-- Post content end -->
                                                                    </div><!-- Post block style end -->
                                                                </li>

                                                            </ul><!-- List post end -->
                                                        </div><!-- List post block end -->
                                                    </div>
                                                @endif
                                            @endforeach
                                            <!-- List post Col end -->
                                        </div>
                                        <!-- Tab pane Row 1 end -->
                                    </div>
                                @endforeach
                                <!-- Tab pane 1 end -->



                                <!-- Tab pane 3 end -->
                            </div><!-- tab content -->
                    @endif
                @endforeach

                {{-- ------------------ CATEGORY 1 END ------------------ --}}

            </div>


            <div style="margin-bottom: 30px; padding: 0px" class="col-md-12 custom-image">
                @foreach ($ads_manages as $ads_manage)
                    @if ($ads_manage->serial_num == 4)
                        @if ($ads_manage->script_image_status == 0)
                            <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                alt="Fix the adsimage position and serial no" />
                            </a>
                        @elseif ($ads_manage->script_image_status == 1)
                            {!! $ads_manage->script !!}
                        @else
                            <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                alt="" />
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="gap-40"></div>

            {{-- this is section four --}}

            {{-- ------------------ CATEGORY 5 START ------------------ --}}
            @foreach ($categories as $category)
                @if ($category->serial_num == 5)
                    <div style="margin-top: 20px" class="featured-tab color-red">
                        <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                        @if ($category != null)
                            <ul class="nav nav-tabs">
                                <?php ?>
                                @foreach ($category->subcategories->take(7) as $c5_sub_cat)
                                    <?php $i++; ?>

                                    <li class="{{ $i > 1 ? '' : 'active' }}">
                                        <a class="animated fadeIn" href="#tab52_{{ $i }}" data-toggle="tab">
                                            <span class="tab-head">
                                                <span class="tab-text-title">{{ $c5_sub_cat->name }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="tab-content">


                            @foreach ($category->subcategories as $key => $c5_sub_cat)
                                <?php $j++; ?>
                                <div class="tab-pane {{ $key == 0 ? 'active' : '' }} animated fadeInRight"
                                    id="tab52_{{ $j }}">


                                    <div class="row">
                                        @foreach ($c5_sub_cat->news->take(5) as $key => $news)
                                            @if ($key <= 0)
                                                <div class="col-md-6 col-sm-6">

                                                    <div style="max-width: " class="post-block-style clearfix">
                                                        <div class="post-thumb">
                                                            <a href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                <?php if($news->photo){ ?>

                                                                @if (strpos($news->photo, 'assets'))
                                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset($news->photo) }}"
                                                                        alt="{{ $news->title }}" />
                                                                @else
                                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/' . $news->photo) }}"
                                                                        alt="{{ $news->title }}" />
                                                                @endif

                                                                <?php } else{ ?>


                                                                <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                    class="img-responsive"
                                                                    src="{{ asset('img/news/images.png') }}"
                                                                    alt="image">
                                                                <?php } ?>

                                                            </a>
                                                        </div>

                                                        <div class="post-content">
                                                            <h2 class="post-title">
                                                                <a
                                                                    href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                            </h2>

                                                            <p>{{ $news->short_description }}...</p>
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
                                                                        <a
                                                                            href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                                            <?php if($news->photo){ ?>
                                                                            @if (strpos($news->photo, 'assets'))
                                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                    class="img-responsive"
                                                                                    src="{{ asset($news->photo) }}"
                                                                                    alt="{{ $news->title }}" />
                                                                            @else
                                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                    class="img-responsive"
                                                                                    src="{{ asset('img/news/' . $news->photo) }}"
                                                                                    alt="{{ $news->title }}" />
                                                                            @endif

                                                                            <?php } else{ ?>


                                                                            <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                class="img-responsive"
                                                                                src="{{ asset('img/news/images.png') }}"
                                                                                alt="image">
                                                                            <?php } ?>
                                                                        </a>
                                                                    </div><!-- Post thumb end -->
                                                                    <!-- Post thumb end -->

                                                                    <div class="post-content">
                                                                        <h2 class="post-title title-small">
                                                                            <a
                                                                                href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                                        </h2>

                                                                    </div><!-- Post content end -->
                                                                </div><!-- Post block style end -->
                                                            </li>

                                                        </ul><!-- List post end -->
                                                    </div><!-- List post block end -->
                                                </div>
                                            @endif
                                        @endforeach
                                        <!-- List post Col end -->
                                    </div>
                                    <!-- Tab pane Row 1 end -->
                                </div>
                            @endforeach
                            <!-- Tab pane 1 end -->



                            <!-- Tab pane 3 end -->
                        </div><!-- tab content -->
                @endif
            @endforeach
            {{-- ------------------ CATEGORY 5 END ------------------ --}}

        </div>

        <div style="margin-bottom: 30px; padding: 0px" class="col-md-12 custom-image">
            @foreach ($ads_manages as $ads_manage)
                @if ($ads_manage->serial_num == 5)
                    @if ($ads_manage->script_image_status == 0)
                        <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                            <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                            alt="Fix the adsimage position and serial no" />
                        </a>
                    @elseif ($ads_manage->script_image_status == 1)
                        {!! $ads_manage->script !!}
                    @else
                        <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                            alt="" />
                    @endif
                @endif
            @endforeach
        </div>
        <div class="gap-40"></div>
        </div><!-- Content Col end -->

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="sidebar sidebar-right">
                <div class="sidebar_ads1 custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 6)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach
                </div>

                <?php $info = DB::table('about_company')->First(); ?>
                <div class="widget color-red">
                    <h3 class="block-title"><span>নিউজ আপডেট পেতে লাইক দিন</span></h3>
                    <div class="fb-page" data-href="{{ $info->fb_link }}" data-tabs="timeline, messages"
                        data-height="250" data-small-header="false" data-adapt-container-width="false"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="{{ $info->fb_link }}" class="fb-xfbml-parse-ignore"><a
                                href="{{ $info->fb_link }}">Facebook</a></blockquote>
                    </div><!-- Newsletter end -->
                </div>

                {{-- ------------------ CATEGORY 7 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 7)
                        <div class="widget color-red">
                            <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                            @foreach ($category->subcategories->take(1) as $category7news)
                                @foreach ($category7news->news->take(4) as $key => $c_news7)
                                    @if ($key == 0)
                                        <div class="post-overaly-style clearfix">
                                            <div class="post-thumb">
                                                <a href="#">
                                                    <?php if($c_news7->photo){ ?>

                                                    @if (strpos($c_news7->photo, 'assets'))
                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive" src="{{ asset($c_news7->photo) }}"
                                                            alt="{{ $c_news7->title }}" />
                                                    @else
                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive"
                                                            src="{{ asset('img/news/' . $c_news7->photo) }}"
                                                            alt="{{ $c_news7->title }}" />
                                                    @endif

                                                    <?php } else{ ?>


                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                        class="img-responsive" src="{{ asset('img/news/images.png') }}"
                                                        alt="image">
                                                    <?php } ?>

                                                </a>
                                            </div>

                                            <div class="post-content">
                                                <h2 class="post-title">
                                                    <a
                                                        href='{{ URL::to("article/$c_news7->id/$c_news7->link") }}'>{{ $c_news7->title }}</a>
                                                </h2>

                                            </div><!-- Post content end -->
                                        </div>
                                    @endif

                                    <div class="list-post-block">
                                        <ul class="list-post">
                                            @if ($key >= 1)
                                                <li class="clearfix">
                                                    <div class="post-block-style post-float clearfix">
                                                        <div class="post-thumb">
                                                            <a href="#">
                                                                <?php if($c_news7->photo){ ?>

                                                                @if (strpos($c_news7->photo, 'assets'))
                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset($c_news7->photo) }}"
                                                                        alt="{{ $c_news7->title }}" />
                                                                @else
                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/' . $c_news7->photo) }}"
                                                                        alt="{{ $c_news7->title }}" />
                                                                @endif

                                                                <?php } else{ ?>


                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                    class="img-responsive"
                                                                    src="{{ asset('img/news/images.png') }}"
                                                                    alt="image">
                                                                <?php } ?>
                                                            </a>
                                                        </div><!-- Post thumb end -->

                                                        <div class="post-content">
                                                            <h2 class="post-title title-small">
                                                                <a
                                                                    href='{{ URL::to("article/$c_news7->id/$c_news7->link") }}'>{{ $c_news7->title }}</a>
                                                            </h2>

                                                        </div><!-- Post content end -->
                                                    </div><!-- Post block style end -->
                                                </li><!-- Li 1 end -->
                                            @endif







                                        </ul><!-- List post end -->
                                    </div><!-- List post block end -->
                                @endforeach
                            @endforeach
                        </div><!-- Popular news widget end -->
                    @endif
                @endforeach
                {{-- ------------------ CATEGORY 7 END ------------------ --}}


                <div class="widget text-center custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 7)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach

                </div><!-- Sidebar Ad end -->

                {{-- ------------------ CATEGORY 8 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 8)
                        <div class="widget color-red">
                            <h3 class="block-title"><span>{{ $category->name }}</span></h3>

                            <!-- Post Overaly Article end -->
                            @foreach ($category->subcategories->take(1) as $category8news)
                                @foreach ($category8news->news->take(4) as $key => $c_news8)
                                    @if ($key == 0)
                                        <div class="post-overaly-style clearfix">
                                            <div class="post-thumb">
                                                <a href="#">
                                                    <?php if($c_news8->photo){ ?>

                                                    @if (strpos($c_news8->photo, 'assets'))
                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive" src="{{ asset($c_news8->photo) }}"
                                                            alt="{{ $c_news8->title }}" />
                                                    @else
                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive"
                                                            src="{{ asset('img/news/' . $c_news8->photo) }}"
                                                            alt="{{ $c_news8->title }}" />
                                                    @endif

                                                    <?php } else{ ?>


                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                        class="img-responsive" src="{{ asset('img/news/images.png') }}"
                                                        alt="image">
                                                    <?php } ?>

                                                </a>
                                            </div>

                                            <div class="post-content">
                                                <h2 class="post-title">
                                                    <a
                                                        href='{{ URL::to("article/$c_news8->id/$c_news8->link") }}'>{{ $c_news8->title }}</a>
                                                </h2>

                                            </div><!-- Post content end -->
                                        </div>
                                    @endif


                                    <div class="list-post-block">
                                        <ul class="list-post">
                                            @if ($key >= 1)
                                                <li class="clearfix">
                                                    <div class="post-block-style post-float clearfix">
                                                        <div class="post-thumb">
                                                            <a href="#">
                                                                <?php if($c_news8->photo){ ?>

                                                                @if (strpos($c_news8->photo, 'assets'))
                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset($c_news8->photo) }}"
                                                                        alt="{{ $c_news8->title }}" />
                                                                @else
                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/' . $c_news8->photo) }}"
                                                                        alt="{{ $c_news8->title }}" />
                                                                @endif

                                                                <?php } else{ ?>


                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                    class="img-responsive"
                                                                    src="{{ asset('img/news/images.png') }}"
                                                                    alt="image">
                                                                <?php } ?>
                                                            </a>
                                                        </div><!-- Post thumb end -->

                                                        <div class="post-content">
                                                            <h2 class="post-title title-small">
                                                                <a
                                                                    href='{{ URL::to("article/$c_news8->id/$c_news8->link") }}'>{{ $c_news8->title }}</a>
                                                            </h2>

                                                        </div><!-- Post content end -->
                                                    </div><!-- Post block style end -->
                                                </li><!-- Li 1 end -->
                                            @endif


                                        </ul><!-- List post end -->
                                    </div><!-- List post block end -->
                                @endforeach
                            @endforeach

                        </div><!-- Trending news end -->
                    @endif
                @endforeach
                {{-- ------------------ CATEGORY 8 END ------------------ --}}

            </div><!-- Sidebar right end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->

    <section class="ad-content-area text-center no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 8)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach

                </div><!-- Col end -->
                <div class="col-sm-4 custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 9)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach

                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Ad content top end -->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">

                {{-- ------------------ CATEGORY 3 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 3)
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="block color-red">
                                <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                                @foreach ($category->subcategories->take(1) as $category5news)
                                    @foreach ($category5news->news->take(4) as $key => $c_news5)
                                        @if ($key == 0)
                                            <div class="post-overaly-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="#">
                                                        <?php if($c_news5->photo){ ?>

                                                        @if (strpos($c_news5->photo, 'assets'))
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset($c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @else
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @endif

                                                        <?php } else{ ?>


                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive"
                                                            src="{{ asset('img/news/images.png') }}" alt="image">
                                                        <?php } ?>

                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title">
                                                        <a
                                                            href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                    </h2>

                                                </div><!-- Post content end -->
                                            </div>
                                        @endif
                                        <!-- Post Overaly Article end -->

                                        <div class="list-post-block">
                                            <ul class="list-post">
                                                @if ($key >= 1)
                                                    <li class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                            <div class="post-thumb">
                                                                <a href="#">
                                                                    <?php if($c_news5->photo){ ?>

                                                                    @if (strpos($c_news5->photo, 'assets'))
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset($c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @else
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @endif
                                                                    <?php } else{ ?>


                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/images.png') }}"
                                                                        alt="image">
                                                                    <?php } ?>
                                                                </a>
                                                            </div><!-- Post thumb end -->

                                                            <div class="post-content">
                                                                <h2 class="post-title title-small">
                                                                    <a
                                                                        href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                                </h2>

                                                            </div><!-- Post content end -->
                                                        </div><!-- Post block style end -->
                                                    </li><!-- Li 1 end -->
                                                @endif


                                            </ul><!-- List post end -->
                                        </div>
                                    @endforeach
                                @endforeach
                                <!-- List post block end -->
                            </div><!-- Block end -->
                        </div><!-- Gadget Col end -->
                    @endif
                @endforeach
                {{-- ------------------ CATEGORY 3 END ------------------ --}}

                {{-- ------------------ CATEGORY 4 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 4)
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="block color-red">
                                <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                                @foreach ($category->subcategories->take(1) as $category5news)
                                    @foreach ($category5news->news->take(4) as $key => $c_news5)
                                        @if ($key == 0)
                                            <div class="post-overaly-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="#">
                                                        <?php if($c_news5->photo){ ?>

                                                        @if (strpos($c_news5->photo, 'assets'))
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset($c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @else
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @endif

                                                        <?php } else{ ?>


                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive"
                                                            src="{{ asset('img/news/images.png') }}" alt="image">
                                                        <?php } ?>

                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title">
                                                        <a
                                                            href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                    </h2>

                                                </div><!-- Post content end -->
                                            </div>
                                        @endif
                                        <!-- Post Overaly Article end -->

                                        <div class="list-post-block">
                                            <ul class="list-post">
                                                @if ($key >= 1)
                                                    <li class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                            <div class="post-thumb">
                                                                <a href="#">
                                                                    <?php if($c_news5->photo){ ?>

                                                                    @if (strpos($c_news5->photo, 'assets'))
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset($c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @else
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @endif
                                                                    <?php } else{ ?>


                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/images.png') }}"
                                                                        alt="image">
                                                                    <?php } ?>
                                                                </a>
                                                            </div><!-- Post thumb end -->

                                                            <div class="post-content">
                                                                <h2 class="post-title title-small">
                                                                    <a
                                                                        href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                                </h2>

                                                            </div><!-- Post content end -->
                                                        </div><!-- Post block style end -->
                                                    </li><!-- Li 1 end -->
                                                @endif


                                            </ul><!-- List post end -->
                                        </div>
                                    @endforeach
                                @endforeach
                                <!-- List post block end -->
                            </div><!-- Block end -->
                        </div><!-- Gadget Col end -->
                    @endif
                @endforeach
                {{-- ------------------ CATEGORY 4 END ------------------ --}}

                {{-- ------------------ CATEGORY 5 START ------------------ --}}
                @foreach ($categories as $category)
                    @if ($category->serial_num == 5)
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="block color-red">
                                <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                                @foreach ($category->subcategories->take(1) as $category5news)
                                    @foreach ($category5news->news->take(4) as $key => $c_news5)
                                        @if ($key == 0)
                                            <div class="post-overaly-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="#">
                                                        <?php if($c_news5->photo){ ?>

                                                        @if (strpos($c_news5->photo, 'assets'))
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset($c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @else
                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                alt="{{ $c_news5->title }}" />
                                                        @endif

                                                        <?php } else{ ?>


                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                            class="img-responsive"
                                                            src="{{ asset('img/news/images.png') }}" alt="image">
                                                        <?php } ?>

                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title">
                                                        <a
                                                            href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                    </h2>

                                                </div><!-- Post content end -->
                                            </div>
                                        @endif
                                        <!-- Post Overaly Article end -->

                                        <div class="list-post-block">
                                            <ul class="list-post">
                                                @if ($key >= 1)
                                                    <li class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                            <div class="post-thumb">
                                                                <a href="#">
                                                                    <?php if($c_news5->photo){ ?>

                                                                    @if (strpos($c_news5->photo, 'assets'))
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset($c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @else
                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/' . $c_news5->photo) }}"
                                                                            alt="{{ $c_news5->title }}" />
                                                                    @endif
                                                                    <?php } else{ ?>


                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                        class="img-responsive"
                                                                        src="{{ asset('img/news/images.png') }}"
                                                                        alt="image">
                                                                    <?php } ?>
                                                                </a>
                                                            </div><!-- Post thumb end -->

                                                            <div class="post-content">
                                                                <h2 class="post-title title-small">
                                                                    <a
                                                                        href='{{ URL::to("article/$c_news5->id/$c_news5->link") }}'>{{ $c_news5->title }}</a>
                                                                </h2>

                                                            </div><!-- Post content end -->
                                                        </div><!-- Post block style end -->
                                                    </li><!-- Li 1 end -->
                                                @endif


                                            </ul><!-- List post end -->
                                        </div>
                                    @endforeach
                                @endforeach
                                <!-- List post block end -->
                            </div><!-- Block end -->
                        </div><!-- Gadget Col end -->
                    @endif
                @endforeach
                {{-- ------------------ CATEGORY 5 END ------------------ --}}



            </div><!-- Row end -->
        </div><!-- Container end -->
    </section>

    <section class="block-wrapper custom_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 10)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    {{-- ------------------ CATEGORY 6 START ------------------ --}}
                    @foreach ($categories as $category)
                        @if ($category->serial_num == 6)
                            <div style="margin-top: 20px" class="featured-tab color-red">
                                <h3 class="block-title"><span>{{ $category->name }}</span></h3>
                                @if ($category != null)
                                    <ul class="nav nav-tabs">
                                        <?php $m = 6;
                                        $n = 6; ?>
                                        @foreach ($category->subcategories->take(7) as $c6_sub_cat)
                                            <?php $m++; ?>

                                            <li class="{{ $m > 7 ? '' : 'active' }}">
                                                <a class="animated fadeIn" href="#tab66_{{ $m }}"
                                                    data-toggle="tab">
                                                    <span class="tab-head">
                                                        <span class="tab-text-title">{{ $c6_sub_cat->name }}</span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="tab-content">


                                    @foreach ($category->subcategories as $c6_sub_cat)
                                        <?php $n++; ?>
                                        <div class="tab-pane {{ $n > 7 ? '' : 'active' }} animated fadeInRight"
                                            id="tab66_{{ $n }}">


                                            <div class="row">
                                                @foreach ($c6_sub_cat->news->take(5) as $key => $news6)
                                                    @if ($key <= 0)
                                                        <div class="col-md-6 col-sm-6">

                                                            <div style="max-width: " class="post-block-style clearfix">
                                                                <div class="post-thumb">
                                                                    <a
                                                                        href='{{ URL::to("article/$news6->id/$news6->link") }}'>
                                                                        <?php if($news6->photo){ ?>

                                                                        @if (strpos($news6->photo, 'assets'))
                                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                                class="img-responsive"
                                                                                src="{{ asset($news6->photo) }}"
                                                                                alt="{{ $news6->title }}" />
                                                                        @else
                                                                            <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                                class="img-responsive"
                                                                                src="{{ asset('img/news/' . $news6->photo) }}"
                                                                                alt="{{ $news6->title }}" />
                                                                        @endif

                                                                        <?php } else{ ?>


                                                                        <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                                            class="img-responsive"
                                                                            src="{{ asset('img/news/images.png') }}"
                                                                            alt="image">
                                                                        <?php } ?>

                                                                    </a>
                                                                </div>

                                                                <div class="post-content">
                                                                    <h2 class="post-title">
                                                                        <a
                                                                            href='{{ URL::to("article/$news6->id/$news6->link") }}'>{{ $news6->title }}</a>
                                                                    </h2>

                                                                    <p>{{ $news6->short_description }}...</p>
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
                                                                                <a
                                                                                    href='{{ URL::to("article/$news6->id/$news6->link") }}'>
                                                                                    <?php if($news6->photo){ ?>

                                                                                    @if (strpos($news6->photo, 'assets'))
                                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                            class="img-responsive"
                                                                                            src="{{ asset($news6->photo) }}"
                                                                                            alt="{{ $news6->title }}" />
                                                                                    @else
                                                                                        <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                            class="img-responsive"
                                                                                            src="{{ asset('img/news/' . $news6->photo) }}"
                                                                                            alt="{{ $news6->title }}" />
                                                                                    @endif
                                                                                    <?php } else{ ?>


                                                                                    <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                                        class="img-responsive"
                                                                                        src="{{ asset('img/news/images.png') }}"
                                                                                        alt="image">
                                                                                    <?php } ?>
                                                                                </a>

                                                                            </div><!-- Post thumb end -->
                                                                            <!-- Post thumb end -->

                                                                            <div class="post-content">
                                                                                <h2 class="post-title title-small">
                                                                                    <a
                                                                                        href='{{ URL::to("article/$news6->id/$news6->link") }}'>{{ $news6->title }}</a>
                                                                                </h2>

                                                                            </div><!-- Post content end -->
                                                                        </div><!-- Post block style end -->
                                                                    </li>

                                                                </ul><!-- List post end -->
                                                            </div><!-- List post block end -->
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <!-- List post Col end -->
                                            </div>
                                            <!-- Tab pane Row 1 end -->
                                        </div>
                                    @endforeach
                                    <!-- Tab pane 1 end -->
                                    <!-- Tab pane 3 end -->
                                </div><!-- tab content -->
                        @endif
                    @endforeach
                    {{-- ------------------ CATEGORY 6 END ------------------ --}}
                </div>

            </div>


            <div class="col-md-4 color-red">
                <h3 class="block-title "><span>Archive</span></h3>
                <form class="demo-2" id="calender">

                    <input id="changeDate" type='text' class="form-control">


                </form>
            </div>
        </div>
    </section>

    <!-- Video block end -->

    <!-- Footer Add -->

    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm- text-center custom-image">
                    @foreach ($ads_manages as $ads_manage)
                        @if ($ads_manage->serial_num == 11)
                            @if ($ads_manage->script_image_status == 0)
                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                    alt="Fix the adsimage position and serial no" />
                                </a>
                            @elseif ($ads_manage->script_image_status == 1)
                                {!! $ads_manage->script !!}
                            @else
                                <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                    alt="" />
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Add -->


@endsection

@section('script')
    <script type="text/javascript">
        $('#calender tr td a').on('click', function() {
            var date = $(this).parent().attr('class');
            var res = date.substring(12, 22);
            var res = res.replace(" ", "");

            var dateAr = res.split('_');
            var newDates = dateAr[1] + '-' + dateAr[0] + '-' + dateAr[2];
            var url = '{{ URL::to('archive') }}/' + newDates;
            window.location = url;

        });
    </script>
@endsection
