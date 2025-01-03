@extends('blog_public.layouts.main')

@section('main')
    {{-- {{ $blog->title }}
    {!! $blog->body !!} --}}
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper rounded p-3" style="background-color: rgb(248, 248, 248)">
                        <div class="blog-title-area">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                @foreach (Request::segments() as $key => $segment)
                                    @if ($key + 1 === count(Request::segments()))
                                        <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', $segment)) }}
                                        </li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a
                                                href="{{ url(implode('/', array_slice(Request::segments(), 0, $key + 1))) }}">
                                                {{ ucwords(str_replace('-', ' ', $segment)) }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>


                            <span class="color-aqua"><a href="blog-category-01.html"
                                    title="">{{ $blog->categoryBlog->title }}</a></span>

                            <h3 style="font-family: 'Nunito', sans-serif;">{{ $blog->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="javascript:void(0);"
                                        title="">{{ $blog->created_at->translatedFormat('d F Y') }}</a></small>
                                <small><a href="blog-author.html" title="">{{ $blog->author->full_name }}</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i>
                                        {{ $clicks }}</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i
                                                class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            <div class="text-justify" style="font-family: 'Nunito', sans-serif;">
                                {!! $blog->body !!}
                            </div>
                        </div><!-- end content -->

                        <div class="blog-title-area">

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i
                                                class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1">


                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#">Jessica</a></h4>
                                    <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet,
                                        consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus
                                        odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Cloapedia!</p>

                                    <div class="topsocial">
                                        <a href="https://facebook.com/Nexgen" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="https://instagram.com/nexgen.id_" data-toggle="tooltip" data-placement="bottom"
                                            title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="https://nex-gen.id" data-toggle="tooltip" data-placement="bottom"
                                            title="Website"><i class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">3 Comments</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img src="upload/author.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading user_name">Amanda Martines <small>5 days
                                                        ago</small></h4>
                                                <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch
                                                    freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit
                                                    kale chips proident chillwave deep v laborum. Aliquip veniam delectus,
                                                    Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone
                                                    Kickstarter, drinking vinegar jean.</p>
                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small>
                                                </h4>

                                                <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo
                                                    biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko
                                                    tempor duis single-origin coffee. Banksy, elit small.</p>

                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                        <div class="media last-child">
                                            <a class="media-left" href="#">
                                                <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small>
                                                </h4>
                                                <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan
                                                    sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie
                                                    consequat flexitarian four loko tempor duis single-origin coffee.
                                                    Banksy, elit small.</p>

                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-wrapper">
                                        <input type="text" class="form-control" placeholder="Your name">
                                        <input type="text" class="form-control" placeholder="Email address">
                                        <input type="text" class="form-control" placeholder="Website">
                                        <textarea class="form-control" placeholder="Your comment"></textarea>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">Search</h2>
                            <form class="form-inline search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search on the site">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach ($blogs as $blog)
                                        <a href="single.html"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt=""
                                                    class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $blog->title }}</h5>
                                                <small>{{ $blog->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Advertising</h2>
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Instagram Feed</h2>
                            <div class="instagram-wrapper clearfix">
                                <a class="" href="#"><img src="upload/insta_01.jpeg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_02.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_03.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_04.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_05.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_06.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_07.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_08.jpeg" alt="" class="img-fluid"></a>
                                <a href="#"><img src="upload/insta_09.jpeg" alt="" class="img-fluid"></a>
                            </div><!-- end Instagram wrapper -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">Fahsion <span>(21)</span></a></li>
                                    <li><a href="#">Lifestyle <span>(15)</span></a></li>
                                    <li><a href="#">Art & Design <span>(31)</span></a></li>
                                    <li><a href="#">Health Beauty <span>(22)</span></a></li>
                                    <li><a href="#">Clothing <span>(66)</span></a></li>
                                    <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                    <li><a href="#">Food & Drink <span>(87)</span></a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->

                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
