<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        /* these styles will animate bootstrap alerts. */
        .alert{
            z-index: 99;
            top: 60px;
            right:18px;
            min-width:30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }
        @keyframes slide {
            100% { top: 30px; }
        }
        @media screen and (max-width: 668px) {
            .alert{ /* center the alert on small screens */
                left: 10px;
                right: 10px; 
            }
        }
    </style>

    <title>USER AREA</title>
</head>
<body>

    @include('user.layouts.inc.navbar')
    <main class="container mt-4">
        @yield('content')
    </main>

    <script src="{{asset('js/app.js')}}"></script>
    
    {{-- Success Alert --}}
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <script>


        function formValidation(){
            var validation = true;
            var name = document.forms["contact-form"]["name"].value;
            var email = document.forms["contact-form"]["email"].value;
            var city = document.forms["contact-form"]["city"].value;
            var phone = document.forms["contact-form"]["phone"].value;
            var message = document.forms["contact-form"]["message"].value;
            if(name == ""){
                document.getElementById('name_err').innerHTML = "name is mandatory";
                        validation = false;
            }
             if(email == ""){
              document.getElementById('email_err').innerHTML = "name is mandatory";
               validation = false;
            }
             if(city == "select"){
               document.getElementById('city_err').innerHTML = "city is mandatory";
               validation = false;
            }
             if(phone == ""){
               document.getElementById('phone_err').innerHTML = "phone is mandatory";
               validation = false;
            }
             if(message == ""){
               document.getElementById('message_err').innerHTML = "message is mandatory";
               validation = false;
            }
            return validation;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
