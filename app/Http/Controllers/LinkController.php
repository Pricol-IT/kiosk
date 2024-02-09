<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkDetail;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = LinkDetail::orderBy('id','desc')->get();
        return view ('links.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "title"=> "required",
            "link_url"=> "required",
            "status"=> "required",
        ]);
        // return $input;
        $linkDetails = LinkDetail::create([
            "title"=> $request->title,
            "link_url"=> $request->link_url,
            "status"=> $request->status
        ]);
        if ($linkDetails){
            toastr()->success("New link is stored");
            return redirect()->route('links.index');
        } else{
            toastr()->error("something went wrong!");
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
        $link = LinkDetail::find($id);
        return view ('links.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            "title"=> "required",
            "link_url"=> "required",
            "status"=> "required",
        ]);
        $linkDetails = LinkDetail::find($id)->update($input);
        if ($linkDetails){
            toastr()->success("link is updated sucessfully");
            return redirect()->route('links.index');
        } else{
            toastr()->error("something went wrong!");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $linkDetails = LinkDetail::find($id)->delete();
        toastr()->success("Link is deleted");
        return back();
    }
}
