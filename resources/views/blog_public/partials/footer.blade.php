<footer class="footer text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Recent Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="upload/blog_square_01.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                    <small>12 Jan, 2016</small>
                                </div>
                            </a>

                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="upload/blog_square_02.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                    <small>11 Jan, 2016</small>
                                </div>
                            </a>

                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 last-item justify-content-between">
                                    <img src="upload/blog_square_03.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                    <small>07 Jan, 2016</small>
                                </div>
                            </a>
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="upload/blog_square_04.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </a>

                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="upload/blog_square_07.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </a>

                            <a href="single.html"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 last-item justify-content-between">
                                    <img src="upload/blog_square_06.jpg" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    @php
                        $categories = \App\Models\Category::all();
                        // var_dump($categories);
                    @endphp
                    <div class="link-widget">
                        <ul>
                            @foreach ($categories as $item)
                                <li><a href="#">{{ $item->title }}
                                        <span>({{ $item->posts->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="widget">
                    <div class="footer-text text-center">
                        <a href="index.html"><img src="{{ asset('storage/logo/genblog.png') }}" alt="" class="img-fluid"></a>
                        <p>Next Level Generation - Buat Website Mudah</p>
                        <div class="social">
                            <a href="https://www.facebook.com/people/Nexgen/61562002382948/?mibextid=LQQJ4d" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="https://instagram.com/nexgen.id_" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-center">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">Subscribe <i
                                        class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy; Copyright 2024. Design: <a href="https://nex-gen.id/">Nexgen</a>.
                </div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->
