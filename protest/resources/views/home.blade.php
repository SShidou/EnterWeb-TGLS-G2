@extends('layouts.app')
@section('content')
<h1>Why does this look like this?</h1>
<hr>
<div class="container">
    <h5 class="row justify-content-center text-uppercase">Most viewed</h5>
</div>
<hr>
<div class="container">
    <h5 class="text-center text-uppercase">Dashboard</h5><br>    
        @php
        $post = App\Models\Post::all();
        $comment = App\Models\Comment::all();
        $cate = App\Models\Category::all();
        $like = App\Models\Like::all();
        $dislike = App\Models\Dislike::all();
        @endphp
    <div id="container" class="col-lg-6"></div><br>
    <canvas id="postDeptChart" class="col-md-6" style="background: linear-gradient(#282828, #404040);"></canvas><br>
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
    #container, #postDeptChart {
        height: 300px;
        margin: auto;
        padding: 0;
        border-radius: 10px;
        color: white
    }
</style>
<script>
// chart 1 - total data
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
        ["Department", 4]
    ]};
// create the chart
    var chart = anychart.bar();
    chart.data(data);
    chart.title("Total statistic");
    chart.container("container");
    chart.draw();
});

// chart 2 - # post per dept
const data2 = {
    labels: ['IT', 'Academic', 'Office', 'Tester'],        
    datasets: [{            
        label: '# Posts',
        data: [1, 5, 4, 10],
        backgroundColor: [
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(153, 102, 255, 0.2)',
        ],
        borderColor: [
            'rgb(255, 206, 86)',
            'rgb(255, 206, 86)',
            'rgb(255, 206, 86)',
            'rgb(153, 102, 255)',
        ],
        borderWidth: 1.2,
        color: ['rgb(255, 206, 86)'], //not display   
    }]
};
const config2 = {
    type: 'bar',
    data: data2,
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
            x: {
                title: {
                    display: true,
                    text: 'Department',
                    color: 'wheat',
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: '# Posts / Department',
                color: 'aliceblue',
            }
        },            
        animations: {}
    }
};
const postDeptChart = new Chart(
    document.getElementById('postDeptChart'),
    config2
);
</script>
@endsection