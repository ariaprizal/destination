@extends('layouts.navbar')
@section('title', 'Profile')

@section('content')

<div class="flex w-screen  h-auto my-12 justify-center  text-center ">
    <div class="lg:flex-col ">
        <div class="lg:w-56 lg:h-56 px-auto lg:rounded-full bg-gray-400 justify-center overflow-hidden w-48 h-48 rounded-full">
            <img class="rounded-full" src="{{asset('storage/'.Auth::user()->profile)}}" alt="">
        </div>
        <div class="py-4">
            <h3 class="text-gray-800 lg:text-2xl uppercase text-xl">{{Auth::user()->name}}</h3>
        </div>
        <div class="bg-green-200 py-2 rounded-t-xl rounded-r-xl my-5 ">
            <a href="{{route('edit.profile', ['id'=> Auth::user()->id ])}}" class="text-xl">Edit Profile</a>
        </div>
        <div class="bg-green-200 py-2 rounded-t-xl rounded-r-xl">
            <a href="{{route('create')}}" class="text-xl">Create</a>
        </div>
    </div>
</div>
<hr class="h-1 bg-green-500 mb-8">
<div class="w-screen h-screen flex lg:mb-20 justify-center mb-80">
    <div class="flex-col w-screen justify-center">
        <div class=" w-72 rounded-md bg-red-400 mb-1 mx-auto">
            <h3 class="text-center text-white text-2xl py-2 px-4">Your Recomendation</h3>
        </div>

        <!-- Card Racomendation -->
        <div class="flex flex-wrap w-screen space-x-2 justify-center mt-8 ">
            @foreach($destinations as $desti)
            <div class="flex-col mb-16 ">
                <div class="w-60 h-64 border-2 border-green-400 relative">
                    <img class="w-60 h-64  object-cover " src="{{asset('storage/'.$desti->cover)}}" alt="">
                </div>
                <div class="absolute bg-gray-50 w-60 -mt-20 ">
                    <h3 class="text-xl text-center py-2  "> {{$desti->title}} </h3>
                    <h3 class=""> <i class="fas fa-map-marker-alt px-2"></i> {{$desti->city}} </h3>
                    <h3 class=" text-center text-gray-700"><a href="#"> More</a></h3>
                    <div class=" w-60 flex justify-between -mt-2 text-gray-700">
                        <h3 class=" text-center bg-green-200 py-1 px-4 rounded-lg"><a class="py-2" href="{{route('edit.destination', ['id'=> $desti->id ])}}">Edit</a></h3>
                        <h3 class=" text-center bg-green-200 py-1 px-4 rounded-lg"><a href="{{route('delete.destination', ['id'=> $desti->id ])}}">Delete</a></h3>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- End Card -->

    </div>
</div>

@endsection