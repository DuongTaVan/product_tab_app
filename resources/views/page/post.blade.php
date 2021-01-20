<div class="content">
    <style>
        .row1 {
            font-family: 'Noto Sans', sans-serif;
        }

        h4 {
            padding: 0;
            margin: 0;
        }

        .summary {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
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
    @if(isset($posts))
        @foreach($posts as $post)
            <div class="row1">
                <div class="title"><a href="/apps/blogtest/post-all/detail/{{$post->id}}"><h4>{{$post->name}}</h4></a>
                </div>
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
    @else
        <div style="text-align: center"><h1>404</h1>
            <img src="http://duongtv.ngrok.io/{{$setting->thumbnail}}" alt=""></div>

    @endif
</div>