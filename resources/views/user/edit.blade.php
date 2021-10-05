@extends('layouts.navbar')
@section('title', 'Edit Profile')

@section('content')

<div class="w-scree h-full flex flex-col  items-center mb-20">
    <div>
        <div class="w-64 bg-green-300 text-center py-3 rounded-md mt-10">
            <h3>Edit Profile</h3>
        </div>
    </div>
    <!-- form edit -->
    <div class="lg:w-1/2 h-auto w-full  bg-green-300 mt-10 flex flex-col items-center pt-12 pb-12">
        <form class="lg:w-full space-y-6 " action="" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="w-full items-center flex flex-col">
                <input class="lg:w-1/2 w-full py-3 rounded-md pl-2 focus:outline-none " type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="w-full items-center flex flex-col">
                <input class="lg:w-1/2 w-full py-3 rounded-md pl-2 focus:outline-none" type=" email" name="email" value="{{Auth::user()->email}}">
            </div>
            <div class=" h-52 overflow-hidden w-auto items-center flex flex-col">
                <img class="h-52 object-contain preview" src="{{asset('storage/'. Auth::user()->profile)}}" alt="Profile">
            </div>
            <div class=" w-full items-center flex flex-col">
                <input class="lg:w-1/2 w-full py-3 rounded-md pl-2 focus:outline-none " type="file" name="profile" id="profile">
            </div>


            <div class=" w-full items-center flex flex-col">
                <a class="w-1/2 py-3 rounded-md pl-2 bg-gray-400 text-center" href="{{route('update.profile',[Auth::user()->id])}}"><button type="submit">Update</button></a>
            </div>


        </form>
    </div>
    <!-- End Form edit -->
</div>

<script>
    const profile = document.getElementById('profile');
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