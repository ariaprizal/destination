@extends('layouts.navbar')
@section('title', 'Edit Recomendation')

@section('content')

<div class="flex lg:flex-row flex-col w-screen h-full justify-center space-x-2">
    <!-- Left Side -->
    <div class="flex-1 flex flex-col items-center bg-green-100">
        <div class="pt-6">
            <h3 class="text-2xl font-semibold text-gray-700">Edit Information</h3>
        </div>
        <!-- Form Edit -->
        <div class=" h-full w-full mx-auto pt-10">
            <form action="{{route('post.edit',[ 'id' => $destination->id])}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class=" lg:mx-20 mx-8 pt-4">
                    <input class="rounded-md w-full h-10 pl-4 focus:outline-none" type="text" name="title" id="title" placeholder="Title" value="{{old('title', $destination->title)}}">
                    @error('title')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" lg:mx-20 mx-8 pt-4">
                    <select class="rounded-md w-full h-10 pl-4 text-gray-400 focus:outline-none" name="province" id="province">
                        <option value="{{$destination->title}}">{{$destination->province}}</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->name}}">{{$province->name}}</option>
                        @endforeach
                    </select>
                    @error('province')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" lg:mx-20 mx-8 pt-4">
                    <select class="rounded-md w-full h-10 pl-4 text-gray-400 focus:outline-none" name="city" id="city">
                        <option value="{{$destination->city}}">{{$destination->city}}</option>
                        @foreach($cities as $city)
                        <option value="{{$city->name}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" lg:mx-20 mx-8 pt-4">
                    <textarea class="rounded-md w-full h-32 pl-4 focus:outline-none pt-2 " name=" description" id="description" placeholder="Description" value="">{{old('description', $destination->description)}}</textarea>
                    @error('description')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" lg:mx-20 mx-8 pt-4 flex justify-center">
                    <img class=" h-52 object-cover preview" src="{{asset('storage/'. $destination->cover)}}" alt="Cover">
                </div>
                <div class=" lg:mx-20 mx-8 pt-4  ">
                    <input class=" w-full mb-2 pl-4 py-3 bg-gray-100 rounded-md" type="file" alt="" name="cover" id="cover">
                    @error('cover')
                    <div class="text-red-900">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mx-20  pt-4 mt-4">
                    <button class="w-full py-2 text-gray-700 rounded-md mb-4 text-2xl bg-gray-100" type="submit"> Update </button>
                </div>
            </form>
        </div>
        <!-- end Form Edit -->


    </div>
    <!-- end Left Side -->

    <!-- Right Side -->
    <div class="flex-1 flex flex-col items-center bg-green-100">
        <div class="pt-6 mb-4">
            <h3 class="text-2xl font-semibold text-gray-700">Add Gallery</h3>
        </div>
        <div class="flex flex-wrap w-full justify-center">
            @foreach($gallery as $gallery)
            <div class=" h-60 w-60 relative mx-2 my-2 overflow-hidden">
                <img class="h-60 w-60 absolute object-cover object-center inset-0 py-2" src="{{asset('storage/'. $gallery->image)}}" alt="Gallery">
                <a class="absolute text-red-600 bg-green-100 px-2 rounded-r-md" href="{{route('delete.image',['id'=> $gallery->id])}}">Delete</a>
            </div>
            @endforeach
        </div>
        <!-- Form Add Gallery -->
        <div class="w-full mx-4  ">
            <form action="{{route('add.gallery', ['id' => $destination->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($count as $count)
                <div class="bg-gray-100 w-3/5 mx-auto mt-4 ">
                    <input class="w-full  rounded-md mb-2 pl-4  py-3" type="file" alt="" multiple="true" name="image[]">
                </div>
                @endforeach

                <div class="w-full flex justify-center my-8">
                    <button class="px-12 rounded-md py-2 bg-green-200" type="submit">Add Image</button>
                </div>
            </form>
        </div>
        <!-- End Form Add Gallery -->
    </div>
    <!-- End Right Side -->
</div>



<script>
    const profile = document.getElementById('cover');
    const imageResult = document.querySelector('.preview');

    profile.addEventListener('change', function() {

        const file = this.files[0];

        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                imageResult.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);
        } else {

            imageResult.setAttribute('src', '')
        }
    });
</script>
@endsection