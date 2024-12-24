@extends('blog_public.layouts.main')

@section('main')
    <div class="page-title wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-user-md bg-grey"></i> {{ $category->title }} <small
                            class="hidden-xs-down hidden-sm-down"> {{ $category->description }} </small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb hidden-xs-down">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        @foreach (Request::segments() as $key => $segment)
                            @if ($key + 1 === count(Request::segments()))
                                <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', $segment)) }}
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ url(implode('/', array_slice(Request::segments(), 0, $key + 1))) }}">
                                        {{ ucwords(str_replace('-', ' ', $segment)) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="portfolio row">
                            @foreach ($blogs as $blog)
                                <div class="col-md-4 mb-4"> <!-- 4 kolom per baris -->
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="single.html" title="">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt=""
                                                    class="img-fluid" style="object-fit: cover;">
                                                <div class="hovereffect">
                                                    <span></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <span class="bg-grey">
                                                <a href="blog-category-01.html"
                                                    title="">{{ $blog->categoryBlog->title }}</a>
                                            </span>
                                            <h4>
                                                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" title="">
                                                    {{ $blog->title }}
                                                </a>
                                            </h4>
                                            <small>
                                                <a href="blog-author.html" title="">By:
                                                    {{ $blog->author->full_name }}</a>
                                            </small>
                                            <small>
                                                <a href="blog-category-01.html" title="">
                                                    {{ $blog->created_at->translatedFormat('d F Y') }}
                                                </a>
                                            </small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            @endforeach
                        </div><!-- end portfolio -->
                    </div><!-- end page-wrapper -->


                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
