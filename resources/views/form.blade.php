<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <a style="margin-left:45%; margin-top: 5px;" href="{{ route('welcome') }}" type="button" class="btn btn-dark">Welcome Page</a>

    <div style="padding-top: 5%; padding-left:30%" class="container">
        <div class="row">

            <div class="col-lg-offset-4 col-lg-6">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email"/>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>

                </form>
                <br/>

            </div>
        </div>
    </div>

</body>
</html>
