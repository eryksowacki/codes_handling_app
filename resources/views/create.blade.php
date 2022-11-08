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
        <nav class="navbar navbar-light navbar-expand-md">
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
        <main>
            <form action="{{ url('/codes/create') }}" method="post">
                @csrf
                Podaj liczbę kodów do wygenerowania (1-10): 
                <input type="number" min="1" max="10" id="codesQuantity" name="codesQuantity"> <br>
                <input type="submit" value="Generuj">
            </form>
        </main>   
    </body>
</html>