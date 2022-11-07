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

            <!-- <a class="navbar-brand" href="index.html">Codes Handling App</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false"
            aria-label="Nav switch">

                <span class="navbar-toggler-icon"></span>
            
            </button> -->


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

    <!-- <script src="{{url('../js/codesGenerate.js')}}" type="text/javascript"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>     
    </body>
</html>