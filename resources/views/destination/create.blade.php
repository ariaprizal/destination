@extends('layouts.navbar')
@section('title', 'Create Recomendation')

@section('content')

<div class="h-auto w-screen flex justify-center">
    <!-- Header -->
    <div>
        <div class="w-64 bg-green-300 text-center py-3 rounded-md mt-10">
            <h3>Create New Recomendation</h3>
        </div>
    </div>
    <!-- End Header -->
</div>
<!-- Form -->
<div class="w-screen h-auto flex justify-center mt-4 mb-2">
    <div class="bg-green-600 lg:w-1/2 justify-items-center mx-auto pb-10 pt-10">
        <form action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="lg:mx-20 mx-8 pt-4">
                <input class="rounded-md w-full h-10 pl-4 focus:outline-none" type="text" name="title" id="title" placeholder="Title" value="{{old('title')}}">
                @error('title')
                <div class="text-red-900">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:mx-20 mx-8 pt-4">
                <select class="rounded-md w-full h-10 pl-4 text-gray-400 focus:outline-none" name="province" id="province">
                    <option value="">Provinsi</option>
                    @foreach($provinces as $province)
                    <option value="{{$province->name}} "> {{$province->name}} </option>
                    @endforeach
                </select>
                @error('province')
                <div class="text-red-900">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:mx-20 mx-8 pt-4">
                <select class="rounded-md w-full h-10 pl-4 text-gray-400 focus:outline-none" name="city" id="city">
                    <option value="">Kota</option>
                    @foreach($cities as $city)
                    <option value="{{$city->name}} "> {{$city->name}} </option>
                    @endforeach
                </select>
                @error('city')
                <div class="text-red-900">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:mx-20 mx-8 pt-4">
                <textarea class="rounded-md w-full h-32 pl-4 focus:outline-none pt-2 " name=" description" id="description" placeholder="Description" value="{{old('description')}}"></textarea>
                @error('description')
                <div class="text-red-900">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:mx-20 mx-8 pt-4  ">
                <input class=" w-full mb-2 pl-4 py-3 bg-gray-100 rounded-md" type="file" alt="" name="cover">
                @error('cover')
                <div class="text-red-900">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:mx-20 mx-8 pt-4 rounded-md">
                <h3 class="bg-gray-100 text-center py-3 rounded-md">Upload More Image For Gallery</h3>
            </div>

            <!-- Image Gallery -->
            <div class="lg:mx-20 mx-4 pt-4 mt-4  rounded-md lg:flex lg:flex-row flex-col lg:space-x-2">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
            </div>
            <div class="lg:mx-20 mx-4 pt-4 mt-4  rounded-md lg:flex lg:flex-row flex-col lg:space-x-2">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
            </div>
            <div class="lg:mx-20 mx-4 pt-4 mt-4  rounded-md lg:flex lg:flex-row flex-col lg:space-x-2">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
            </div>
            <div class="lg:mx-20 mx-4 pt-4 mt-4  rounded-md lg:flex lg:flex-row flex-col lg:space-x-2">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
                <input class=" w-full rounded-md mb-2 pl-4 bg-gray-100 py-3" type="file" alt="" multiple="true" name="image[]">
            </div>
            @error('image')
            <div class="text-red-900">{{ $message }}</div>
            @enderror
            <!-- End Image gallery -->

            <div class="mx-20 pt-4 mt-4">
                <button class="w-full py-2 text-gray-700 rounded-md mb-4 text-2xl bg-gray-100" type="submit"> Create </button>
            </div>
        </form>
    </div>

</div>


<!-- End Form -->

@endsection