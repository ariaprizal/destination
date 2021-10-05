<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\image;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('destination', ['destinations' => $destinations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $provinces = DB::table('indonesia_provinces')->orderBy('name', 'asc')->get();
        $cities = DB::table('indonesia_cities')->orderBy('name', 'asc')->get();
        
        return view('destination.create', ['provinces' => $provinces, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'province' => 'required',
            'city' => 'required',
            'description' => 'required',
            'cover' => 'image|required',
        ]);


        if ($request->file('cover')) {
            $data['cover'] = $request->file('cover')->store('destination-images');
        }
        $data['user_id'] = Auth::user()->id;

        $des = Destination::create($data);

        if ($request->file('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                $file = $file->store('gallery-images');

                $set = [
                    'image' => $file,
                    'destination_id' => $des->id
                ];
                image::create($set);
            }
        }
        return redirect('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);
        $gallery = image::where('destination_id', $destination->id)->get();

        $count = 8 - count($gallery);
        for ($i = 0; $i < $count; $i++) {
            $array[] = $i;
        }

        return view('destination.edit', ['destination' => $destination, 'gallery' => $gallery, 'provinces' => Province::all(), 'cities' => Regency::all(), 'count' => $array]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        $data = $request->validate([
            'title' => 'required',
            'province' => 'required',
            'city' => 'required',
            'description' => 'required',
            'cover' => 'image|required',
        ]);

        if ($request->file('cover')) {
            Storage::delete($destination->cover);
            $data['cover'] = $request->file('cover')->store('destination-images');
        }
        // $data['user_id'] = Auth::user()->id;

        $destination->update($data);

        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);

        $images = image::where('destination_id', $destination->id)->get();
        foreach ($images as $image) {
            Storage::delete($image->image);
            $image->delete();
        }

        Storage::delete($destination->cover);

        $destination->delete();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($id)
    {
        $image = image::find($id);
        Storage::delete($image->image);

        $image->delete();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function addGallery(Request $request, $id)
    {

        if ($request->file('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                $file = $file->store('gallery-images');

                $data = [
                    'image' => $file,
                    'destination_id' => $id
                ];
                image::create($data);
            }
        }
        return redirect()->back();
    }
}
