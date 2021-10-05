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

    <title>Sign Up</title>
</head>

<body>
    <div class="w-full h-screen lg:flex items-center justify-center">
        <div class="lg:w-1/4 lg:h-4/5 overflow-hidden rounded-l-md h-full">
            <img class="object-cover relative" src="{{asset('/images/bg-signup.jpg')}}" alt="">
            <div class="absolute lg:-mt-80  lg:w-1/4 -mt-96">
                <h3 class="text-white text-4xl font-bold ml-2 ">Unlock Your Story Here</h3>
                <a href="{{route('login')}}" class="text-white text-xl font-bold ml-2 "><span class="font-semibold text-green-300">Already Unlock?</span> Sign In</a>
            </div>
        </div>
        <div class="lg:w-1/4 lg:h-4/5 bg-gray-400 lg:-mt-0 lg:relative lg:flex-col text-center lg:py-28 rounded-r-md -mt-80 py-4 z-20 absolute">

            <div class="mb-8">
                <h3 class="text-gray-100 font-bold text-2xl">Sign Up</h3>
            </div>
            <form action="{{route('post.register')}}" method="post">
                @csrf
                <div class="mx-4   text-center ">
                    <input class="w-full rounded-t-md h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="text" name="name" class="@error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Nama Lengkap">
                    @error('name')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror

                    <input class="w-full rounded-t-md h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="email" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                    @error('email')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror

                    <input class="w-full rounded-t-md h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror

                    <input class="w-full rounded-t-md h-12 pl-2 border-b-2 border-green-400 focus:outline-none focus:border-green-700 " type="password" name="password_confirmation" class="@error('password') is-invalid @enderror" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center py-2 mx-4">
                    <button class="bg-green-400 py-2 w-full rounded-lg" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>