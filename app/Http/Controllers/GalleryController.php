<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageAll = Gallery::all();
        return view("admin.gallery.index",compact("imageAll"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorieImage = Category::all();

        return view("admin.gallery.create",compact("categorieImage"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "nom" => ["required"],
        ]);

		$store = new  Gallery();
		$store->nom = $request->nom;
		// $store->url = $request->url;
        if ($request->url) {
            $request->file('url')->storePublicly('images/','public');
            $store->url = $request->file('url')->hashName();
        }else{
            $fichierURL = file_get_contents($request->srcURL);
            $lien = $request->srcURL;
            $token = substr($lien, strrpos($lien, '/') + 1);
            Storage::disk('public')->put('images/'.$token , $fichierURL);
            $store->url = $token;
        }

        // dd($request);
        $store->categorie_image_id = $request->categorie_image_id;

		$store->save();
		return  redirect()->back()->with('success', $request->nom . ' bien ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        // $this->authorize("isAdmin");

        // Storage
        $destination = "images/". $gallery->url;
        // dd($destination);
        Storage::disk("public")->delete($destination);
        // dd($destination);
        $gallery->delete();
        return redirect()->back()->with('warning', 'Image bien supprimé');
    }
}
