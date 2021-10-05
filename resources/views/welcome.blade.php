@extends('layouts.navbar')
<link rel="stylesheet" href="{{asset('/css/home.css')}}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@section('title', 'Home')

@section('content')


<div class="container-home lg:pb-40">
    <div class="jumbotron lg:h-5/6 lg:overflow-hidden ">
        <div class=" mb-80">
            <h3 class="lg:text-3xl lg:text-gray-600 lg:font-normal lg:mt-0 text-center lg:pt-8 lg:pb-8 text-5xl lg:relative  absolute z-10 mt-64 text-white font-extrabold w-full pr-4">Find Your Next Destination</h3>
        </div>
        <div class="image-area lg:h-full  ">
            <img class="w-full h-full object-cover lg:pb-10" src="{{asset('/images/jumbotron.jpg')}}" alt="" data-aos="flip-left" data-aos-duration="2000">
        </div>
    </div>
    <!-- Content -->
    <section class="content  w-full pb-20 bg-gray-50 mt-10">
        <div class="grid-flow-col lg:pt-32 ">
            <div class="w-full h-4/6 justify-center lg:grid lg:grid-cols-2 lg:space-x-20 items-center ">
                <div class="lg:ml-60 ml-16">
                    <img src="{{asset('/images/create.png')}}" alt="" class="lg:w-96 w-80 ">
                    <img src="{{asset('/images/create-2.svg')}}" alt="" class="lg:w-80 w-64 -mt-36 z-0 -ml-10">
                </div>
                <div class="grid-flow-row grid-cols-2 lg:h-auto lg:items-center lg:mt-52 mt-8 h-full px-4 space-y-4 text-gray-600">
                    <h3 class="text-2xl uppercase">Create Your Recomendation</h3>
                    <p class="lg:w-9/12 text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt consectetur officia pariatur possimus fugit commodi earum iusto omnis ipsam, corrupti animi numquam nisi ad dicta expedita ipsum ducimus voluptate. Explicabo?</p>
                </div>
            </div>
            <div class="w-full h-4/6 lg:justify-center lg:grid lg:grid-cols-2 lg:space-x-20 lg:items-center mt-32 ">
                <div class="lg:ml-60 order-last ml-20">
                    <img src="{{asset('/images/find.svg')}}" alt="" class="lg:w-80 w-64">
                    <img src="{{asset('/images/find-2.svg')}}" alt="" class="lg:w-80 w-64 -mt-36 z-0 -ml-10">
                </div>
                <div class="grid-flow-row grid-cols-2 lg:h-auto lg:items-center lg:mb-80 lg:pl-20 space-y-4 text-gray-600 mt-8 px-4">
                    <h3 class="text-2xl uppercase">find recommendations for you</h3>
                    <p class="lg:w-9/12 text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt consectetur officia pariatur possimus fugit commodi earum iusto omnis ipsam, corrupti animi numquam nisi ad dicta expedita ipsum ducimus voluptate. Explicabo?</p>
                </div>
            </div>
        </div>
    </section>
    <section class="lg:w-full lg:grid-flow-col lg:grid-cols-3  lg:bg-gray-50 lg:items-center lg:justify-center lg:pt-20">
        <div class="lg:mx-96 rounded-md bg-red-400 mb-1 mx-4 ">
            <h3 class="text-center text-white text-2xl py-2 ">Recomendation For You</h3>
        </div>
        <div class="flex flex-wrap w-screen h-auto justify-center pb-10 lg:px-56">
            @foreach($destinations as $destination)
            <div class="overflow-hidden mx-2 lg:w-64 lg:h-80 h-64 w-40 mt-8" data-aos="flip-left  " data-aos-duration="2000">
                <img class="relative lg:h-80 lg:w-64 object-cover h-40 w-40" src="{{asset('/storage/'.$destination->cover)}}" alt="">
                <div class="absolute  bg-gray-500 lg:w-64 lg:h-28  w-40 opacity-70">
                    <h3 class="text-xl text-center py-2 text-white ">{{$destination->title}}</h3>
                    <h3 class="text-white lg:text-left text-center"> <i class="fas fa-map-marker-alt px-2"></i>{{$destination->city}}</h3>
                    <h3 class=" text-center text-white"><a href="{{route('detail', ['id'=> $destination->id ])}}"> More</a></h3>
                    <h3 class="text-white text-center animate-bounce"><i class="fas fa-chevron-down "></i></h3>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</div>


@endsection