<link rel="stylesheet" href="https://duongtv.ngrok.io/css/demo.css">
<div class="content">

@foreach($categories as $category)
    <div class="row1">
        <img class="img" src="http://duongtv.ngrok.io/{{$category->image}}" alt="">

        <div class="nen"></div>
{{--        <div class="bar1"></div>--}}
{{--        <div class="bar2"></div>--}}
        <a href="">
            <div class="tit">{{$category->name}}</div>
        </a>
    </div>
    @endforeach
</div>