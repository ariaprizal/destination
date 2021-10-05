@extends('layouts.navbar')
@section('title', 'All Destination')

@section('content')
<div class="h-full mb-80">
    <!-- header -->
    <div class="w-screen h-auto flex justify-center my-8 space-x-4">
        <div class="">
            <form action="{{route('search')}}" method="get">
                @csrf
                <input class="lg:w-96 h-10  w-64 border-2 border-green-300 focus:outline-none pl-2 rounded-md " type="text" name="search" id="search" placeholder="search">
        </div>
        <div>
            <a href=""><button class="text-2xl"><i class="fas fa-search"></i></button></a>
        </div>
            </form>
    </div>

    <!-- end Header -->
    <hr class="h-1 bg-green-500 mb-8 mt-8">
    <!-- content -->
    <div class="w-screen h-screen flex lg:mb-20 justify-center mb-80">
        <div class="flex-col w-screen justify-center">
            <div class=" w-72 rounded-md bg-red-400 mb-1 mx-auto">
                <h3 class="text-center text-white text-2xl py-2 px-4 uppercase">All Recomendation</h3>
            </div>
            <div class="flex flex-wrap w-screen space-x-2 justify-center mt-8 ">
                @foreach($destinations as $desti)
                <div class="flex-col mb-16 ">
                    <div class="w-60 h-64 border-2 border-green-400 relative">
                        <img class="w-60 h-64  object-cover " src="{{asset('storage/'.$desti->cover)}}" alt="">
                    </div>
                    <div class="absolute bg-gray-50 w-60 -mt-20 ">
                        <h3 class="text-xl text-center py-2  ">{{$desti->title}}</h3>
                        <h3 class=""> <i class="fas fa-map-marker-alt px-2"></i>{{$desti->city}}</h3>
                        <h3 class=" text-center text-gray-900"><a href="{{route('detail', ['id'=> $desti->id ])}}"> More</a></h3>
                        <h3 class=" text-center animate-bounce"><i class="fas fa-chevron-down "></i></h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end content -->
</div>


@endsection