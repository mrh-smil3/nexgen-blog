@extends('blog_public.layouts.main')

@section('main')
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="container">
                    <div class="row ">
                        @foreach ($allBogsPost->take(2) as $blog)
                            <div class="col-lg-6">
                                <div class="masonry-box post-media " style="border-radius: 20px">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="img-fluid"
                                        style="height: 300px; object-fit: cover; border-radius: 20px;" />

                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-aqua"><a
                                                        href="{{ route('blog.show', $blog->categoryBlog->slug) }}"
                                                        title="">{{ $blog->categoryBlog->title }}</a></span>
                                                <h4>
                                                    <a href="{{ route('blog.show', $blog->slug) }}"
                                                        title="">{{ $blog->title }}</a>
                                                </h4>
                                                <small><a href="{{ route('blog.show', $blog->slug) }}"
                                                        title="">{{ $blog->created_at->translatedFormat('d F Y') }}</a></small>
                                                <small><a href="blog-author.html" title="">by
                                                        {{ $blog->author->full_name }}</a></small>
                                            </div>
                                            <!-- end meta -->
                                        </div>
                                        <!-- end shadow-desc -->
                                    </div>
                                    <!-- end shadow -->
                                </div>
                            </div>
                            <!-- end post-media -->
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="blog-list clearfix">
                                    <div class="section-title my-3">
                                        <p class="text-white py-2 px-3 fw-bold text-lg" style="background-color: #FA4D71">
                                            All Post</p>
                                    </div><!-- end title -->

                                    @foreach ($allBogsPost->skip(2) as $item)
                                        <div class="blog-box row">
                                            <div class="col-md-4">
                                                <div class="post-media">
                                                    <a href="{{ route('blog.show', $item->slug) }}" title="">
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                            class="img-fluid">
                                                        <div class="hovereffect"></div>
                                                    </a>
                                                </div><!-- end media -->
                                            </div><!-- end col -->

                                            <div class="blog-meta big-meta col-md-8">
                                                <h4><a href="{{ route('blog.show', $item->slug) }}"
                                                        title="">{{ $item->title }}</a></h4>
                                                <p>
                                                    {!! $item->tagline !!}
                                                </p>
                                                <small><a href="blog-category-01.html"
                                                        title="">{{ $item->categoryBlog->title }}</a></small>
                                                <small><a href="{{ route('blog.show', $item->slug) }}" title="">21
                                                        July, 2017</a></small>
                                                <small><a href="blog-author.html" title="">by
                                                        {{ $item->author->full_name }}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    @endforeach
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 " style="background-color: #E8E5E6">
                                <div class="section-title my-3">
                                    <p class="text-white py-2 px-3 fw-bold text-lg" style="background-color: #FA4D71">
                                        Trending Post</p>
                                </div><!-- end title -->

                                @foreach ($trendingBlogs as $trendingBlog)
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="single.html" title="">
                                                <img src="{{ asset('storage/' . $trendingBlog->image) }}" alt=""
                                                    class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class="videohover"></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h5 class=""><a href="{{ route('blog.show', $trendingBlog->slug) }}"
                                                    title="">{{ $trendingBlog->title }}</a></h5>
                                            <small class="" style="font-size: 11px"> <a href="blog-category-01.html"
                                                    title="">{{ $trendingBlog->categoryBlog->title }}</a></small>
                                            <small class="" style="font-size: 11px"><a href="blog-category-01.html"
                                                    title="">{{ $trendingBlog->created_at->translatedFormat('d F Y') }}</a></small>
                                            <small class="" style="font-size: 11px"><a href="#" title=""><i class="fa fa-eye"></i>
                                                    {{ $trendingBlog->total_clicks }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="">
                                @endforeach
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div>
                <!-- end left-side -->

            </div>
            <!-- end masonry -->
        </div>
    </section>
@endsection
