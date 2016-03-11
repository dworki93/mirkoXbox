<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MirkoGaming - @yield('title')</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/default.css">

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">MirkoBox</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/platform/xone">Xbox one</a></li>
                <li><a href="/platform/x360">Xbox 360</a></li>
                <li><a href="/platform/ps4">Ps4</a></li>
                <li><a href="/platform/ps3">Ps3</a></li>
                <li><a href="/platform/steam">Steam</a></li>
                @if(Auth::check())
                    <li><a href="/profile/edit">Edytuj profil</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="/logout"><i class="fa fa-sign-out"></i>{{ Auth::user()->wykopNick }}</a></li>
                @else
                    <li><a href="/loginLink"><i class="fa fa-sign-in"></i> Zaloguj się przez Wypok</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">@yield('content')</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('ul.nav > li > a[href="' + document.location.pathname + '"]').parent().addClass('active');
</script>
</body>
</html>