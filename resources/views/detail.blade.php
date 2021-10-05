@extends('layouts.navbar')
@section('title', 'Detail')
<style>
    .gallery {
        display: flex;
        width: 100%;
        height: 50%;
        justify-content: center;
    }

    .item {
        flex: 1;
        height: 100%;
        transition: flex 1s ease-in-out;
        padding-left: .1rem;
        padding-right: .1rem;
    }

    .item:hover {
        flex: 5;
        height: 120%;
        margin-top: -2.5%;
    }

    @media screen and (max-width:760px) {
        .gallery {
            flex-direction: column;
            margin-top: 10rem;
        }

        .item {
            width: 100%;
            height: 60%;
            padding-top: .1rem;
            padding-bottom: .1rem;
        }

        .item:hover {
            flex: 5;
            height: 150%;
            width: 100%;
        }
    }
</style>
@section('content')

<div class=" h-screen lg:-mb-20">
    <div class=" w-full h-1/2 relative ">
        <img class="absolute w-full h-full inset-0 object-cover object-center mb-auto" src="{{asset('storage/'.$destinations->cover)}}" alt="">
    </div>
    <div class=" relative w-screen h-auto py-4 text-center lg:-mt-36 space-y-4  text-gray-200 backdrop-filter backdrop-brightness-50 ">
        <h3 class=" text-6xl font-bold "> {{$destinations->title}} </h3>
        <h3 class=" text-4xl font-semibold"><i class="fas fa-map-marker-alt px-2"></i> {{$destinations->city}} </h3>
    </div>
    <div class="w-screen flex justify-center">
        <p class="lg:w-1/2 text-justify py-8 lg:px-0 px-6 text-lg "> {{$destinations->description}} </p>
    </div>
</div>
<div class="text-center bg-green-300 w-60 mx-auto rounded-lg lg:-mb-28 lg:mt-6 mt-40 mb-0">
    <h3 class="text-2xl text-white py-4 px-4 ">Gallery</h3>
</div>
<div class="lg:h-auto lg:mb-12 lg:mt-0 w-screen  justify-center lg:px-8 h-full  lg:py-40 py-40 mt-44 mb-72">
    <div class="gallery">   
        @foreach($gallery as $gallery)
        <div class="item ">
            <img class="w-full h-full inset-0 object-cover object-center mb-auto " src="{{asset('storage/'.$gallery->image)}}" alt="">
        </div>
        @endforeach
    </div>
</div>

@endsection