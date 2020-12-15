<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("https://i.postimg.cc/MZ18BRKN/bg.png");
                background-size: 100% 100%;
                background-repeat: no-repeat;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: auto;
                margin: 0;
            }

            .button-auth{
              border: solid #ffbe76 1px;
              background-color: #f0932b;
              border-radius: 10px;
            }

            .button-auth1{
              background-color: #487eb0;
              border: solid #487eb0 1px;
              border-radius: 10px;
              color: #ffffff;
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

            .log-res{
              margin-right: 1060px;
              margin-top: 120px;
              float: left;
              font-size: 50px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="left links">
                  <div class="log-res">
                    @auth
                        <a href="{{ url('/home') }}" class="button-auth" style="text-decoration: none;color: #fbc531;">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="button-auth" style="text-decoration: none;color: #fbc531;color: #ffffff;">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button-auth1" style="text-decoration: none;color: #ffffff;">Register</a>
                        @endif
                    @endauth
                  </div>
                </div>
            @endif
        </div>
    </body>
</html>
