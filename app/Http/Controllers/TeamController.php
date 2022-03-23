<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        $houseKeeper = Team::where("fonction_id",1)->first();

        return view("admin.team.index",compact("team","houseKeeper"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::all();
        $fonctionAll = Fonction::all();

        return view("admin.team.create",compact("team","fonctionAll"));
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
        "fullname" => ["required"],
        "description" => ["required"],
        "img" => ["required"],
    ]);

    $store = new  Team();
    $store->fullname = $request->fullname;
    $store->description = $request->description;
    // $store->url = $request->url;
    if ($request->img) {
        $request->file('img')->storePublicly('images/','public');
        $store->img = $request->file('img')->hashName();
    }else{
        $fichierURL = file_get_contents($request->srcURL);
        $lien = $request->srcURL;
        $token = substr($lien, strrpos($lien, '/') + 1);
        Storage::disk('public')->put('images/'.$token , $fichierURL);
        $store->img = $token;
    }

    // dd($request);
    $store->fonction_id = $request->fonction_id;

    $store->save();
    return  redirect()->back()->with('success', $request->fullname . ' bien ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $teams = Team::all();
        return view("admin.team.edit",compact("teams"));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'img' => 'required',
            'fullname' => 'required',
            'description' => 'required',
        ]);

        // $teams->img = $request->img;

        if ($request->img) {
            $request->file('img')->storePublicly('images/','public');
            $team->img = $request->file('img')->hashName();
        }else{
            $fichierURL = file_get_contents($request->srcURL);
            $lien = $request->srcURL;
            $token = substr($lien, strrpos($lien, '/') + 1);
            Storage::disk('public')->put('images/'.$token , $fichierURL);
            $team->img = $token;
        }

        $team->fullname = $request->fullname;
        $team->description = $request->description;
        $team->save();
        return redirect()->route('team.index')->with('success', 'categorie ' . $request->nom .' modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $image = Team::find($team);

        // $this->authorize("isAdmin");

        // Storage
        $destination = "images/". $image->img;
        // dd($destination);
        Storage::disk("public")->delete($destination);
        // dd($destination);
        $image->delete();
        return redirect()->back()->with('warning', 'Image bien supprimé');
    }
}
