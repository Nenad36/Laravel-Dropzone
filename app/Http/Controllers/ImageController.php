<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $image->move(public_path('images'), $avatarName);
        $imageUpload = new Image();
        $imageUpload->filename = $avatarName;
        $imageUpload->save();
        return response()->json(['success'=>$avatarName]);
    }

}
