
@section('content')
    @extends('layouts.app2')
@section('content')

    <!-- Hero Area Start-->
    <div class="slider-area hero-overly">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <!-- Hero Caption -->
                        <div class="hero__caption">
                            <span>Bathe in music</span>
{{--                            Bathe in music 音楽を浴びる--}}
{{--                            ボツ ふと、「音楽が聴きたい」と思ったことありませんか？--}}
                            <h1>Lives</h1>
                        </div>

                        <!--Hero form -->
                        <div class="center">
                            <div class="text-center" id="searchLives">
                                {{--            自分の位置情報と会場の位置情報で半径5kmのライブを検索する--}}
                                {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}
                                {{--            隠しフォームでlivescontrollerに位置情報を渡す--}}
                                {{--            lat用--}}
                                {!! Form::hidden('lat','lat',['id' => 'lat_id']) !!}
                                {{--            lng用--}}
                                {!! Form::hidden('lng','lng',['id' => 'lng_id']) !!}

                                {!! Form::submit("この周辺の今日のライブを探す", ['class' => "btn btn-success btn-block"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}

                                <div class="form-group row">
                                    {!! Form::label('freeword', 'フリーワード:',['class'=>"col-2 col-form-label"]) !!}
                                    {!! Form::text('freeword', old('title'), ['class' => 'col-10 form-control','placeholder' => 'フリーワード']) !!}
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('date', '日にち:',['class'=>"col-2 col-form-label date"]) !!}
                                    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) !!}
                                </div>

                                {{--            一旦場所は考えない--}}
                                {{-- デフォルトで現在地を選択した状態で検索する--}}
                                {{--             <div class="form-group row">--}}
                                {{--             {!! Form::label('location', '場所:',['class'=>"col-2 col-form-label"]) !!}--}}
                                {{--             {!! Form::text('location', old('location'), ['class' => 'col-10 form-control' ,'placeholder' => '現在地周辺']) !!}--}}
                                {{--             </div>--}}
                                {{--隠しフォームでlivescontrollerに位置情報を渡す--}}
                                {{--lat用--}}
                                {!! Form::hidden('lat','lat',['id' => 'lat_id']) !!}
                                {{--lng用--}}
                                {!! Form::hidden('lng','lng',['id' => 'lng_id']) !!}

                                {{--デフォルトで全カテゴリーを設定した状態で検索する--}}
                                <div class="form-group row">
                                    {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                                    {!! Form::text('category', old('category'), ['class' => 'col-10 form-control' ,'placeholder' => 'すべてのカテゴリー']) !!}
                                </div>
                            </div>
                            <div class="col-6 search">
                                {!! Form::submit('検索',['class' => 'btn btn-primary btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Hero Area End-->
    <!-- Popular Locations Start -->
{{--    <div class="popular-location section-padding30">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle text-center mb-80">--}}
{{--                        <span>Most visited places</span>--}}
{{--                        <h2>Popular Locations</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>New York</p>--}}
{{--                            <a href="#" class="location-btn">65 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>Paris</p>--}}
{{--                            <a href="#" class="location-btn">60 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location3.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>Rome</p>--}}
{{--                            <a href="#" class="location-btn">50 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location4.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>Italy</p>--}}
{{--                            <a href="#" class="location-btn">28 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location5.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>Nepal</p>--}}
{{--                            <a href="#" class="location-btn">99 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-location mb-30">--}}
{{--                        <div class="location-img">--}}
{{--                            <img src="/assets/img/gallery/location6.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="location-details">--}}
{{--                            <p>indonesia</p>--}}
{{--                            <a href="#" class="location-btn">78 <i class="ti-plus"></i> Location</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- More Btn -->--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="room-btn pt-20">--}}
{{--                    <a href="catagori.html" class="btn view-btn1">View All Places</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Popular Locations End -->--}}
{{--    <!-- Services Area Start -->--}}
{{--    <div class="services-area pt-150 pb-150 section-bg" data-background="/assets/img/gallery/section_bg02.jpg">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle section-tittle2 text-center mb-80">--}}
{{--                        <span>Easy to explore</span>--}}
{{--                        <h2>How It Works</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row justify-content-between">--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="single-services text-center mb-50">--}}
{{--                        <div class="services-icon">--}}
{{--                            <span class="flaticon-list"></span>--}}
{{--                        </div>--}}
{{--                        <div class="services-cap">--}}
{{--                            <h5><a href="#">1. Choose a Category</a></h5>--}}
{{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
{{--                        </div>--}}
{{--                        <!-- Shpape -->--}}
{{--                        <img class="shape1 d-none d-lg-block" src="/assets/img/icon/serices1.png" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="single-services text-center mb-50">--}}
{{--                        <div class="services-icon">--}}
{{--                            <span class="flaticon-problem"></span>--}}
{{--                        </div>--}}
{{--                        <div class="services-cap">--}}
{{--                            <h5><a href="#">2. what you want</a></h5>--}}
{{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
{{--                        </div>--}}
{{--                        <img class="shape2 d-none d-lg-block" src="/assets/img/icon/serices2.png" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="single-services text-center mb-50">--}}
{{--                        <div class="services-icon">--}}
{{--                            <span class="flaticon-respect"></span>--}}
{{--                        </div>--}}
{{--                        <div class="services-cap">--}}
{{--                            <h5><a href="#">3. Go out & Explore</a></h5>--}}
{{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Services Area End -->--}}
{{--    <!-- Categories Area Start -->--}}
{{--    <div class="categories-area section-padding30">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle text-center mb-80">--}}
{{--                        <span>We are offering for you</span>--}}
{{--                        <h2>Featured Categories</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                    <div class="single-cat text-center mb-50">--}}
{{--                        <div class="cat-icon">--}}
{{--                            <span class="flaticon-bed"></span>--}}
{{--                        </div>--}}
{{--                        <div class="cat-cap">--}}
{{--                            <h5><a href="catagori.html">Leving Hotel</a></h5>--}}
{{--                            <p>Must explain your how this keind denoun pleasure</p>--}}
{{--                            <a href="catagori.html">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                    <div class="single-cat text-center mb-50">--}}
{{--                        <div class="cat-icon">--}}
{{--                            <span class="flaticon-drink"></span>--}}
{{--                        </div>--}}
{{--                        <div class="cat-cap">--}}
{{--                            <h5><a href="catagori.html">Night Life</a></h5>--}}
{{--                            <p>Must explain your how this keind denoun pleasure</p>--}}
{{--                            <a href="catagori.html">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                    <div class="single-cat text-center mb-50">--}}
{{--                        <div class="cat-icon">--}}
{{--                            <span class="flaticon-home"></span>--}}
{{--                        </div>--}}
{{--                        <div class="cat-cap">--}}
{{--                            <h5><a href="catagori.html">Culture Place</a></h5>--}}
{{--                            <p>Must explain your how this keind denoun pleasure</p>--}}
{{--                            <a href="catagori.html">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                    <div class="single-cat text-center mb-50">--}}
{{--                        <div class="cat-icon">--}}
{{--                            <span class="flaticon-food"></span>--}}
{{--                        </div>--}}
{{--                        <div class="cat-cap">--}}
{{--                            <h5><a href="catagori.html">Resturent</a></h5>--}}
{{--                            <p>Must explain your how this keind denoun pleasure</p>--}}
{{--                            <a href="catagori.html">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Categories Area End -->--}}
{{--    <!-- peoples-visit Start -->--}}
{{--    <div class="peoples-visit dining-padding-top">--}}
{{--        <!-- Single Left img -->--}}
{{--        <div class="single-visit left-img">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-end">--}}
{{--                    <div class="col-lg-8">--}}
{{--                        <div class="visit-caption">--}}
{{--                            <span>We are offering for you</span>--}}
{{--                            <h3>Every Month, Millions of People--}}
{{--                                visit this site We’ve Built.</h3>--}}
{{--                            <p>Unlike what its name implies, dry cleaning is not actually a 'dry' process. Clothes are soaked in a different solvent.</p>--}}
{{--                            <!--Single Visit categories -->--}}
{{--                            <div class="visit-categories mb-40">--}}
{{--                                <div class="visit-location">--}}
{{--                                    <span class="flaticon-travel"></span>--}}
{{--                                </div>--}}
{{--                                <div class="visit-cap">--}}
{{--                                    <h4>Great places in the world</h4>--}}
{{--                                    <p>Unlike what its name implies, dry cleaning is not actu  process. Clothes soaked differentent.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Single Visit categories -->--}}
{{--                            <div class="visit-categories">--}}
{{--                                <div class="visit-location">--}}
{{--                                    <span class="flaticon-work"></span>--}}
{{--                                </div>--}}
{{--                                <div class="visit-cap">--}}
{{--                                    <h4>Biggest category listing</h4>--}}
{{--                                    <p>Unlike what its name implies, dry cleaning is not actu  process. Clothes soaked differentent.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- peoples-visit End -->--}}
{{--    <!-- Testimonial Start -->--}}
{{--    <div class="testimonial-area testimonial-padding">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle text-center mb-80">--}}
{{--                        <span>Our client testimonials</span>--}}
{{--                        <h2>What our client say</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-11 col-md-11">--}}
{{--                    <div class="h1-testimonial-active">--}}
{{--                        <!-- Single Testimonial -->--}}
{{--                        <div class="single-testimonial text-center">--}}
{{--                            <!-- Testimonial Content -->--}}
{{--                            <div class="testimonial-caption ">--}}
{{--                                <div class="testimonial-top-cap">--}}
{{--                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore mas. </p>--}}
{{--                                </div>--}}
{{--                                <!-- founder -->--}}
{{--                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">--}}
{{--                                    <div class="founder-img">--}}
{{--                                        <img src="/assets/img/testmonial/Homepage_testi.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="founder-text">--}}
{{--                                        <span>Oliva jems</span>--}}
{{--                                        <p>UIX designer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Single Testimonial -->--}}
{{--                        <div class="single-testimonial text-center">--}}
{{--                            <!-- Testimonial Content -->--}}
{{--                            <div class="testimonial-caption ">--}}
{{--                                <div class="testimonial-top-cap">--}}
{{--                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore mas. </p>--}}
{{--                                </div>--}}
{{--                                <!-- founder -->--}}
{{--                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">--}}
{{--                                    <div class="founder-img">--}}
{{--                                        <img src="/assets/img/testmonial/Homepage_testi.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="founder-text">--}}
{{--                                        <span>Oliva jems</span>--}}
{{--                                        <p>UIX designer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Testimonial End -->--}}
{{--    <!-- Subscribe Area Start -->--}}
{{--    <div class="subscribe-area section-bg pt-150 pb-150" data-background="/assets/img/gallery/section_bg04.jpg">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-xl-6 col-lg-8">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle section-tittle2 text-center mb-40">--}}
{{--                        <span>Subscribe out newslatter</span>--}}
{{--                        <h2>Subscribe For Newsletter</h2>--}}
{{--                    </div>--}}
{{--                    <!--Hero form -->--}}
{{--                    <form action="#" class="search-box">--}}
{{--                        <div class="input-form">--}}
{{--                            <input type="text" placeholder="What are you looking for?">--}}
{{--                        </div>--}}
{{--                        <div class="search-form">--}}
{{--                            <a href="#">Send Now</a>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Subscribe Area End -->--}}
{{--    <!-- Blog Ara Start -->--}}
{{--    <div class="home-blog-area section-padding30">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <!-- Section Tittle -->--}}
{{--                    <div class="section-tittle text-center mb-70">--}}
{{--                        <span>Our blog</span>--}}
{{--                        <h2>News and tips</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-team mb-30">--}}
{{--                        <div class="team-img">--}}
{{--                            <img src="/assets/img/gallery/home_blog1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="team-caption">--}}
{{--                            <span>HEALTH & CARE</span>--}}
{{--                            <h3><a href="blog.html">The Best SPA Salons For--}}
{{--                                    Your Relaxation</a></h3>--}}
{{--                            <p>October 6, 2020by Steve</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-team mb-30">--}}
{{--                        <div class="team-img">--}}
{{--                            <img src="/assets/img/gallery/home_blog2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="team-caption">--}}
{{--                            <span>HEALTH & CARE</span>--}}
{{--                            <h3><a href="blog.html">The Best SPA Salons For--}}
{{--                                    Your Relaxation</a></h3>--}}
{{--                            <p>October 6, 2020by Steve</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="single-team mb-30">--}}
{{--                        <div class="team-img">--}}
{{--                            <img src="/assets/img/gallery/home_blog3.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="team-caption">--}}
{{--                            <span>HEALTH & CARE</span>--}}
{{--                            <h3><a href="blog.html">The Best SPA Salons For--}}
{{--                                    Your Relaxation</a></h3>--}}
{{--                            <p>October 6, 2020by Steve</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Blog Ara End -->--}}


@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/SetLocation.js') }}"></script>
@endsection



