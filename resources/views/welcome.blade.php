<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .bg-c-blue {
        /* background: linear-gradient(45deg, #4099ff, #73b4ff); */
    }

    body {
        background-image: linear-gradient(rgba(0, 114, 187, 0.7),
            rgba(0, 114, 187, 0.7)),
        url("{{asset('assets/img/84cd2a9fbc6cbd5522b2f048a56703a8.jpg')}}");
        background-size: cover;
    }

</style>
<body>
    <div class="container p-5">
        <div class="row ">
            @foreach ($links as $link)
            <div class="col-lg-4 p-2">
                <a href="{{$link->link_url}}" target="_blank" style="text-decoration: none;">
                    <div class="card border-info p-2 h-100 shadow d-flex flex-column bg-c-blue">
                        <div class="card-body text-center flex-fill">
                            <h2 class="text-primary">{{$link->title}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
