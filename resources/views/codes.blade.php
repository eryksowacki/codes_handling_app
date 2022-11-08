<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <header>

            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/codes') }}"> Codes </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/codes/create') }}"> Create codes </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/codes/delete') }}"> Delete codes </a>
                    </li>

                </ul>

            </div>

        </nav>                
    </header>
        <ul>
            @foreach($codes as $code)
                <li>{{ $code -> id}}</li>
                <li>{{ $code -> code}}</li>
                <li>{{ $code -> date}}</li>
            @endforeach
            @if(empty($code))
                Brak kodów w bazie danych.
            @endif
        </ul>
        <div class="alert alert-success">
            @if(empty($successMsg))

            @else
                {{$successMsg}}
            @endif
        </div>           
    </body>
</html>
