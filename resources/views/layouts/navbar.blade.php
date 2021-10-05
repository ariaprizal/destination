<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>@yield('title')</title>
</head>

<body class="font-poppins overflow-x-hidden">
    <div class="bg-gray-300 flex px-10 py-6 justify-around lg:bg-transparent lg:sticky lg:top-0 lg:z-10 lg:bg-gray-50 ">
        <div class=" flex-1 lg:z-10 items-center">
            <h1 class="logo font-semibold text-2xl xl:text-2xl lg:px-10 lg:text-gray-600"><a href="{{route('home')}}">Destination</a> </h1>
        </div>
        <div class="  hidden flex-1 absolute space-x-3 text-xl lg:block lg:relative lg:text-gray-600">
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('destination')}}">Destination</a>
            @auth
            <a href="{{route('profile')}}">Profile</a>
            @endauth

        </div>
        <div class=" lg:text-gray-600 text-xl lg:flex space-x-3 ">
            @auth
            <form class="hidden lg:block" action=" {{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="hidden lg:block lg:z-10 ">Log Out</button>
            </form>
            @endauth
            @guest

            <a class="hidden lg:flex lg:z-10 " href="{{route('login')}}">Login</a>
            <a class="hidden lg:flex lg:z-10" href="{{route('register')}}">Signup</a>
            @endguest

            <button class="burger text-xl items-center mt-2 lg:hidden"><i class="fa fa-bars"></i></button>
        </div>
        <div class=" transform -translate-x-full  transition duration-1000 ease-in-out flex-col mt-20 z-30 w-3/4 items-center justify-items-center absolute text-2xl bg-gray-400 h-3/4 left-0 top-0 space-y-9 pl-20 pt-28 text-gray-50" id="menu">
            <div>
                <a href="{{route('home')}}">Home</a>
            </div>
            <div>
                <a href="{{route('destination')}}">Destination</a>
            </div>

            @auth
            <div>
                <a href="{{route('profile')}}">Profile</a>
            </div>
            <div class="pt-20">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class=" lg:z-10 ">Log Out</button>
                </form>
            </div>
            @else
            <div>
                <a href="{{route('login')}}">Login</a>
            </div>
            <div>
                <a class=" lg:z-10" href="{{route('register')}}">Signup</a>
            </div>
            @endauth

        </div>
    </div>
    <main class="relative">
        @yield('content')
    </main>

    @extends('layouts.footer')


    <script>
        const burger = document.querySelector('.burger');
        const ic = document.querySelector('.fa');
        const menu = document.getElementById('menu');

        burger.addEventListener('click', () => {
            menu.classList.toggle('-translate-x-full');
            ic.classList.toggle('fa-times');
        })
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>