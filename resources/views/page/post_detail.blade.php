<style>
    .content {
        width: 800px;
        margin: 0 auto;
    }

    .content h1 {
        margin: 0;
        padding: 0;
    }

    .summary p {
        font-size: 21px;
    }

    .ts {
        padding: 3px;
        background-color: #971928;
        color: white;
    }

    .category {
        word-spacing: 2px;
        margin-left: 10px;
    }
</style>
<div class="content">
    <div class="header"><span class="ts">NEW</span><span class="category">&gt; &#32;{{$post->category->name}}</span>
    </div>
    <div class="title"><h1>{{$post->name}}</h1></div>
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
    <div class="summary"><p>{{$post->summary}}</p></div>
    <div class="description">{{$post->description}} </div>
</div>