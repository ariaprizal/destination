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

    <title>Login</title>
</head>

<body class="bg-gray-100">

    <div class="flex w-screen h-screen justify-center lg:items-center justify-item-center  ">
        <div class="flex lg:h-full overflow-hidden relative">
            <img class="-mt-10 object-cover lg:my-2" src="{{asset('/images/bg-login.jpg')}}" alt="">
        </div>
        <div class="absolute bg-gray-200  lg:h-1/4  w-auto px-8 flex-col lg:my-auto lg:bottom-60 bottom-32 -mx-8 rounded-md py-4">
            <div class="grid grid-cols-3 justify-between text-gray-700">
                <a class="text-2xl -mt-4 -ml-5 py-1" href="{{route('home')}}"><i class="fas fa-home"></i></a>
                <h3 class="text-center text-3xl lg:py-0 lg:pb-5 py-4 text-gray-700  ">Log In</h3>
                <h3 class="-mt-4 -mr-5 w-auto text-right py-1">or <a class="font-semibold" href="{{route('register')}}">Sign Up</a></h3>
            </div>
            <div class="flex-col h-auto w-72 bg-white rounded-lg py-2">
                <form action="{{route('post.login')}}" method="post">
                    @csrf
                    @if(session('message'))
                    <h3 class="text-base text-center text-gray-600">{{session('message')}}</h3>
                    @endif
                    @if(session('error'))
                    <h3 class="text-base text-center text-red-600 font-semibold">{{session('error')}}</h3>
                    @endif
                    <div class="px-4 py-2">
                        <input class="w-full h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="email" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="px-4 py-2 ">
                        <input class="w-full h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="password" placeholder="Password" name="password" id="password">
                    </div>
                    <div class="px-4 py-2 text-base">
                        <input class="ml-2" type="checkbox" name="remember" id="remember">
                        <label for="remember" class="ml-4 space-x-2">Remeber Me</label>
                    </div>
            </div>
            <div class="text-center py-2 ">
                <button class="bg-green-400 py-2 w-full rounded-lg" type="submit">Log In</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>