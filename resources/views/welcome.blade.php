<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: black;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle{
                font-size: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrieren</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Videoplattform
                </div>
                @if(\Illuminate\Support\Facades\Auth::guest())
                <p class="subtitle">Um eine neue Lektion zu erstellen müssen Sie angemeldet sein</p>
                @endif

                @if(!\Illuminate\Support\Facades\Auth::guest())
                <div class="links">
                 <form method="post" action="/lessons/create">
                     {{csrf_field()}}
                     <button name="" type="submit"> Neue Lektion erstellen</button>
                 </form>
                </div>
                @endif

                <form method="get" action="/lessons/index">
                        {{csrf_field()}}
                        <button name="" type="submit"> Alle Lektionen ansehen</button>
                    </form>

                @if(isset($message))
                    <p style="font-size: 30px">{{$message}}</p> <br>
                @endif
            </div>
        </div>
    </body>
</html>
