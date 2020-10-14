<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gomac Knowledgebase</title>
    <!-- LOADING STYLESHEETS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid featured-area-white-border">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box border-right-1">
                    <a href="{{ route('login') }}">
                        <i class="fa fa-key"></i> Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGO -->
<div class="container">
    <div class="row">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
        </div>
    </div>
</div>
<!-- END LOGO-->

<!-- MAIN SECTION -->
<div class="container featured-area-default padding-30">
    <div class="row">
        <div class="col-md-8 padding-20">
            @yield('content')
        </div>
        <!-- END ARTICLES CATEOGIRES SECTION -->
        <!-- SIDEBAR STUFF -->
        <div class="col-md-4 padding-20">
            <div class="row margin-bottom-30">
                <div class="col-md-12 ">
                    <div class="support-container">
                        <h2 class="support-heading">Need more Support?</h2>
                        If you cannot find an answer in the knowledgebase, you can
                        <a href="#">contact us</a> for further help.
                    </div>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col-md-12">
                    <div class="fb-heading-small">
                        Latest Articles
                    </div>
                    <hr class="style-three">
                    <div class="fat-content-small padding-left-10">
                        <ul>
                            @foreach ($latestArticles as $latestArticle)
                                <li>
                                    <a href="{{ route('question', $latestArticle) }}">
                                        <i class="fa fa-file-text-o"></i> {{ $latestArticle->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- POPULAR TAGS (SHOW MAX 20 TAGS) -->
            <div class="row margin-top-20">
                <div class="col-md-12">
                    <div class="fb-heading-small">
                        Popular Tags
                    </div>
                    <hr class="style-three">
                    <div class="fat-content-tags padding-left-10">
                        @foreach ($popularTags as $popularTag)
                            <a href="{{ route('search') }}?tag_id={{ $popularTag->id }}" class="btn btn-default btn-o btn-sm">{{ $popularTag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- END POPULAR TAGS (SHOW MAX 20 TAGS) -->
        </div>
        <!-- END SIDEBAR STUFF -->
    </div>
</div>
<!-- END MAIN SECTION -->

<!-- ABOUT CONTAINER BOTTOM -->
<div class="container-fluid featured-area-grey padding-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fb-heading">
                    About Us
                </div>
                <div class="fb-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum ultricies magna sed tincidunt. Nullam aliquet est
                        eu magna suscipit ornare. Sed venenatis eget turpis imperdiet vulputate. Pellentesque in lectus
                        arcu. Vestibulum scelerisque, massa vitae suscipit accumsan, ex tellus eleifend ante, ut accumsan
                        quam risus eu leo. Phasellus vel diam id elit ultrices feugiat. Quisque sed massa in quam pulvinar
                        volutpat ut sed risus.
                    </p>
                    <p>
                        Sed eget ultricies lectus. Nulla in porttitor libero. Suspendisse potenti. Etiam iaculis in augue eu volutpat. Pellentesque
                        fringilla orci enim, ut vehicula mauris aliquet quis. Etiam sed rutrum justo. Etiam faucibus
                        consequat ipsum, a pharetra quam bibendum eget. Fusce a consequat mauris, vel vestibulum dolor.
                        Nam ornare enim eget ante pharetra condimentum. Donec feugiat arcu eu arcu faucibus, id ornare
                        enim venenatis. Suspendisse nisi felis, mattis in hendrerit a, pretium posuere mauris. Suspendisse
                        in ante in odio maximus ultrices.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT CONTAINER BOTTOM -->

<!-- COPYRIGHT INFO -->
<div class="container-fluid footer-copyright marg30">
    <div class="container">
        <div class="pull-left">
            Copyright © 2018 Sunny Gohil</a>
        </div>
        <div class="pull-right">
            <i class="fa fa-facebook"></i> &nbsp;
            <i class="fa fa-twitter"></i> &nbsp;
            <i class="fa fa-linkedin"></i>
        </div>
    </div>
</div>
<!-- END COPYRIGHT INFO -->

<!-- LOADING MAIN JAVASCRIPT -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.rawgit.com/VPenkov/okayNav/master/app/js/jquery.okayNav.js"></script>
</body>

</html>
