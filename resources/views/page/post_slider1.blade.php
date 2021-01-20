<!DOCTYPE html>
<html lang="en">
<head>

    <!-- head -->
    <meta charset="utf-8">
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Basic usage demo">
    <meta name="author" content="David Deutsch">
    <title>
        Basic Demo | Owl Carousel | 2.3.4
    </title>
    <base href="{{asset('')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet'
          type='text/css'>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet"
          href="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/ico/favicon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Yeah i know js should not be in header. Its required for demos.-->

    <!-- javascript -->

    <script src="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script>
    <style>
        .row1 {
            font-family: 'Noto Sans', sans-serif;
        }

        h4 {
            padding: 0;
            margin: 0;
        }

        .summary, .title {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .content .row1 {
            width: 800px;
            margin: auto;
            border: 1px solid #d2c9c9;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .row1 a:hover {
            text-decoration: underline;
        }

        .category {
            text-transform: uppercase;
            font-size: 11px;
            /* margin-left: 10px; */
            margin-bottom: 10px;
            color: #971928;
        }
    </style>
</head>
<body>

<div class="owl-carousel owl-theme">
    @foreach($posts as $post)
        <div class="row1">
            <div class="title"><a href="https://dth99store.myshopify.com/apps/blogtest/post-all/detail/{{$post->id}}">
                    <h4>{{$post->name}}</h4></a></div>
            <span class="category">{{$post->category->name}}</span>
            <span>
                @if($now->diffInSeconds($post->created_at)<60)
                    {{$now->diffInSeconds($post->created_at)}}&#32; s
                @elseif($now->diffInMinutes($post->created_at)<60)
                    {{$now->diffInMinutes($post->created_at)}}&#32; minutes
                @elseif($now->diffInHours($post->created_at)<24)
                    {{$now->diffInHours($post->created_at)}}&#32; h
                @elseif($now->diffInDays($post->created_at)<30)
                    {{$now->diffInDays($post->created_at)}}&#32; day
                @elseif($now->diffInMonths($post->created_at)<12)
                    {{$now->diffInMonths($post->created_at)}}&#32; month
                @else
                    {{$now->diffInYears($post->created_at)}}&#32; s
                @endif
        </span>
            <div class="summary"><p>{{$post->description}}</p></div>
        </div>
    @endforeach
</div>

<!-- vendors -->
<script src="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/vendors/highlight.js"></script>
<script src="http://duongtv.ngrok.io/OwlCarousel2-2.3.4/docs/assets/js/app.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
</body>
</html>