<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlideShow;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = SlideShow::orderBy('id','desc')->get();
        return view ('slideshow.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'status' => 'required',
        ]); 
        if ($image = $request->image_url) {
            $url = uploadImage($image, 'uploads');
            $input['image_url'] = $url;
        }
        // return $input;
        $images = SlideShow::create($input);
        if($images)
        {
            toastr()->success('image uploaded Successfully');
            return redirect()->route('slideshow.index');
        }
        else{
            toastr()->error('Something Went Wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image=SlideShow::find($id)->delete();
        toastr()->success('image deleted Successfully');
            return redirect()->route('slideshow.index');
    }
}
