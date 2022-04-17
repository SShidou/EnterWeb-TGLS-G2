<html>
<head>
<style>
    .card {
        box-shadow: 3px 4px 8px indigo;
        transition: 0.5s;
        width: 40%;
        margin: auto;
        background-color: wheat
    }

    .card:hover {
        box-shadow: 3px 8px 16px indigo;
    }

    .container-alt {
        padding: 4px 16px;
        margin: auto
    }
</style>
</head>
<body>
    <div class="card">
        <img src="https://blog.logrocket.com/wp-content/uploads/2020/10/laravel.png" alt="Avatar" style="width:100%; margin:auto;">
        <div class="container-alt">
            <h4><b>{{ $details['title'] }}</b></h4>
            <p>{{ $details['body'] }} published by {{ $details['by'] }}.</p>
            <p>Thanks for reading</p>
        </div>
    </div>
</body>
</html>


