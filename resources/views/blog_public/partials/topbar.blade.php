<div class="topbar-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                <div class="topsocial">
                    <a href="https://www.facebook.com/people/Nexgen/61562002382948/?mibextid=LQQJ4d" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                            class="fa fa-facebook"></i></a>
                    <a href="https://instagram.com/nexgen.id_" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                            class="fa fa-instagram"></i></a>
                    <a href="https://nex-gen.id" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                            class="fa fa-earth"></i></a>
                </div>
                <!-- end social -->
            </div>
            <!-- end col -->

            <div class="col-lg-4 hidden-md-down">
                <div class="topmenu text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="blog-category-01.html"><i class="fa fa-star"></i> Trends</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="blog-category-02.html"><i class="fa fa-bolt"></i> Hot Topics</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="page-contact.html"><i class="fa fa-user-circle-o"></i> Write for us</a>
                        </li>
                    </ul>
                    <!-- end ul -->
                </div>
                <!-- end topmenu -->
            </div>
            <!-- end col -->

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="d-flex justify-content-end gap-3">
                    <div class="topsearch text-right">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                    </div>
                    @if (Auth::guest())
                        <div class="topsearch text-right ml-1">
                            <a href="{{ route('login') }}"><i class="fa fa-user me-1"></i>Login</a>
                        </div>
                    @else
                        <div class="topsearch text-right ml-1">
                            <a href="{{ route('dashboard') }}"></i>Dashboard</a>
                        </div>
                    @endif
                </div>
                <!-- end search -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end header-logo -->
</div>
<!-- end topbar -->
