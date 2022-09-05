<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" integrity="sha512-oL84kLQMEPIS350nZEpvFH1whU0HHGNUDq/X3WBdDAvKP7jn06gHTsCsymsoPYKF/duN8ZxzzvQgOaaZSgcYtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <!-- Icons for Chevron -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" /> -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom2.css')         }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css')        }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/carousel.css')       }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/keyboard.css')       }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/loading.css')        }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/loading2.css')       }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')  }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/gradient-rounded-border.css')  }}">


        <script src="{{url('js/carousel.js')}}">        </script>
        <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{url('js/require.js')}}">         </script>
        <script src="{{url('js/myscript.js')}}">        </script>
        <script src="{{url('js/sweetalert.js')}}">      </script>
        @livewireStyles
    </head>
    <body style="overflow:hidden;">

    <div id="loading" style="display:flex;">
    <canvas id="canvas"></canvas>
        <div style="position:absolute; top:45%; left:50%;">
            <div class="verdana" style="width:200px; margin:0 auto; text-align:center; margin-bottom:0.8rem; transform:translateX(-5.5rem);font-size:1.4rem;font-weight:600;">Welcome page...</div> 
            <div class="la-ball-fussion">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

        {{ $slot }}
        <x-livewire-alert::scripts />
        @livewireScripts
        <script src="{{url('js/confetti.js')}}">      </script>

    </body>
</html>