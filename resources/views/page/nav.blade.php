<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/css/docs.css')}}"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/css/pygments-manni.css')}}"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/icon-fonts/elusive-icons-2.0.0/css/elusive-icons.min.css')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/icon-fonts/map-icons-2.1.0/css/map-icons.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css"/>
    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <style>
        * {
            @if($setting->font_family == 0)
               font-family: Arapey, serif;
            @elseif($setting->font_family == 1)
               font-family: sans-serif, Arial;
            @else
               font-family: Consolas, Menlo;
            @endif
           font-size: {{$setting->font_size}}
        }

        .nav-tabs .nav-link {
            background-color: {{$setting->background_title}};
            color: {{$setting->color_title}};
        }

        .ndn-nav {
            color: rgb(141, 141, 141);
            text-transform: uppercase;
        }

        .active {
            color: rgb(0, 0, 0);
        }

        .ndn-pane {
            background-color: {{$setting->background}};
            padding: 5px;
            color: {{$setting->color}};
        }
    </style>
</head>
<body>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($navbars as $navbar)
        @if( in_array($product_id, json_decode($navbar->product_id) ))
            <li class="nav-item">
                <a class="nav-link ndn-nav" id="{{$navbar->id}}-tab" data-toggle="tab" href="#{{$navbar->id}}"
                   role="tab"
                   aria-controls="home"
                   aria-selected="true"><i class="{{$navbar->icon}}"></i>{{$navbar->name}}</a>
            </li>
        @endif
    @endforeach
</ul>
<div class="tab-content" id="myTabContent">
    @foreach($navbars as $navbar)
        @if( in_array($product_id, json_decode($navbar->product_id) ))
            <div class="tab-pane ndn-pane" id="{{$navbar->id}}" role="tabpanel"
                 aria-labelledby="{{$navbar->id}}-tab">{!! $navbar->content !!}
            </div>
        @endif
    @endforeach
</div>
<script type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ secure_asset('/bootstrap-iconpicker-1.10.0/dist/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
</body>
</html>