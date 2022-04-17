@extends('layouts.app')
@section('content')
<h1>Why does this look like this?</h1>
<hr>
<div class="container">
    <h5 class="row justify-content-center text-uppercase">Most viewed</h5>
</div>
<hr>
<div class="container">
    <h5 class="text-center text-uppercase">Dashboard</h5>
    <br>
    <div id="container" class="col-lg-6"></div>
    <div class="col-md-6"></div>
    <br>
    <div class="col-md-4 offset-md-4">        
        @php
        $post = App\Models\Post::all();
        $comment = App\Models\Comment::all();
        $cate = App\Models\Category::all();
        $like = App\Models\Like::all();
        $dislike = App\Models\Dislike::all();
        @endphp
        <div class="row border border-2">
            <div class="col border border-1">
                <h6>Total tags: </h6>
                <h6>Total posts: </h6>
                <h6>Total comments: </h6>
                <h6>Likes: </h6>
                <h6>Dislikes: </h6>
            </div>
            <div class="col-2 justify-content-center">
                <h6>{{ $cate->count() }}</h6>
                <h6>{{ $post->count() }}</h6>
                <h6>{{ $comment->count() }}</h6>
                <h6>{{ $like->count() }}</h6>
                <h6>{{ $dislike->count() }}</h6>
            </div>
        </div>
    </div>
</div>
<hr style="color: none;">
<div class="container">
    <div class="row">
        <h5 class="text-center text-uppercase">About us</h5>
        <div class="col-lg-6 text-justify">A remarkable About page is genuine, approachable, and distinguished.
            It should give the visitor a glimpse into what working with you and your business might be like. You can include personal interests, stories, and photos that convey the unique story of your business.<br>
            Since About pages are creative and personal to you and your company, there are several ways to construct one, however, the process is generally the same. So, let's create an About page one step by step.
        </div>
        <div class="col-md-6">
            Team TGLS Participant:
            <li>Pham Quang Anh (GCS190327)</li>
            <li>Do Dinh Nguyen (GCS190370)</li>
            <li>Le Tri Bao (GCS18668)</li>
        </div>
    </div>
</div>

<style>
    hr {
        opacity: 0%;
    }
    .container {
        border: 1px solid purple;
        border-radius: 5px;
        box-shadow: 5px 10px 18px #888888;
        background-color: aliceblue;
    }
    #container {
        height: 300px;
        margin: auto;
        padding: 0
    }
</style>
<script>
anychart.onDocumentReady(function() {
    anychart.theme(anychart.themes.darkEarth);

// set the data
    var data = {
    header: ["Name", "Total number"],
    rows: [
        ["Tags", {{ $cate->count() }}],
        ["Posts", {{ $post->count() }}],
        ["Comments", {{ $comment->count() }}],
        ["Likes", {{ $like->count() }}],
        ["Dislikes", {{ $dislike->count() }}],
        ["Department", 3]
    ]};
// create the chart
    var chart = anychart.bar();
    chart.data(data);
    chart.title("Total statistic");
    chart.container("container");
    chart.draw();
});
</script>
@endsection