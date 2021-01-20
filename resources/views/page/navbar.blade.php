<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <style>
        .resp-tabs-list {
            padding: 0px 0px 0 !important;
            display: flex;
            width: 100%;
            overflow: hidden;
            font-weight: 600;
        }

        .resp-tabs {
            border-left: none;
            border-right: none;
            border-top: none;
            margin: 0;
            text-transform: uppercase;
            line-height: normal;
            padding: 17px 20px 15px;
            border-bottom: 1px solid #eae4e4;
            font-style: normal;
            display: table-cell;
            width: 100%;
            text-align: center;
            list-style: none;
            cursor: pointer;
            color: rgb(141, 141, 141);
            float: left;
        }

        .resp-tab-content {
            opacity: 0;
            position: absolute;
        }
        .resp-tab-content-active {
            opacity: 1;
            z-index: 1;
            transition: 0.5s;
        }
        .resp-tabs-active {
            border-bottom: 1px solid {{$setting->color}} !important;
            color: {{$setting->color}};
            transition: 0.5s;
        }
        .resp-tabs-container{
            position: relative;
        }
        .aod_custom_tab.style1 {
            width: 500px;
            /* text-align: center; */
            margin: 0 auto;
            border: 1px solid #eae4e4;
            border-radius: 5px;
            padding: 0 7px;
            font-size: {{$setting->font_site}}px;
            background-color: {{$setting->background}};
            color: {{$setting->color}};
        }
    </style>
</head>
<body>
<div class="aod_custom_tab style1">
    <ul class="resp-tabs-list">
        @foreach($navbars as $navbar)
        <li id=".nav-{{$navbar->id}}-tab" class="resp-tabs">{{$navbar->name}}</li>
{{--        <li id=".nav-descrition1-tab" class="resp-tabs">descrition1</li>--}}
{{--        <li id=".nav-descrition2-tab" class="resp-tabs">descrition2</li>--}}
{{--        <li id=".nav-descrition3-tab" class="resp-tabs">descrition3</li>--}}
        @endforeach
    </ul>
    <div class="resp-tabs-container">
        @foreach($navbars as $navbar)
        <div class="resp-tab-content nav-{{$navbar->id}}-tab">
            <p>{!!$navbar->content!!}</p>
        </div>
{{--        <div class="resp-tab-content nav-descrition1-tab">--}}
{{--            <p>Nó sẽ tạo sẵn ra cho chúng ta các thành phần cần thiết của Vue. Sau đây sẽ bắt tay vào tạo phần giao diện--}}
{{--                nhé.--}}
{{--                Đầu tiên chúng ta tạo file chat.blade.php chứa layout cơ bản của ứng dụng.--}}
{{--                Các bạn xem code trên gist ở đây--}}
{{--                Trong đoạn code trên mình có tạo sẵn một cặp thẻ “chat-layout”, đây là component VueJS mà chúng ta sẽ--}}
{{--                nói ở phần sau nhé.--}}
{{--                Sau đó tạo một route để truy cập vào view này.</p>--}}
{{--        </div>--}}
{{--        <div class="resp-tab-content nav-descrition2-tab">--}}
{{--            <p>dolor enim et expedita facilis ipsa laudantium maxime minima nihil non obcaecati placeat quia, quibusdam--}}
{{--                similique, sunt suscipit temporibus vitae voluptate. Animi atque dignissimos facilis impedit numquam--}}
{{--                pariatur sunt, veniam? Culpa magnam nam q.</p>--}}
{{--        </div>--}}
{{--        <div class="resp-tab-content nav-descrition3-tab">--}}
{{--            <p>N--}}
{{--                Sau đó tạo một route để truy cập vào view này.</p>--}}
{{--        </div>--}}
        @endforeach
    </div>
    <script>
        $(function () {
            $(".resp-tabs").click(function (){
                $( ".resp-tabs" ).removeClass( "resp-tabs-active" );
                $(this).addClass( "resp-tabs-active" );
                $(".resp-tab-content").removeClass('resp-tab-content-active');
                $($(this).attr('id')).addClass('resp-tab-content-active');
                //alert($(this).attr('id'));
            });

        })
    </script>
</div>
</body>
</html>