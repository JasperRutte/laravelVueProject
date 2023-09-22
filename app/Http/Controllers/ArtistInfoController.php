<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Platenmaatschappijen;
use Illuminate\Http\Request;

class ArtistInfoController extends Controller
{
    public function index()
    {
        $allArtists = ArtistInfo::all(); //fetch all artists from DB
        return view('artists.index', [
            'allArtists' => $allArtists,
        ]); // return view with options to create an artist, and all the record labels

    }


    public function create()
    {
        $platenmaatschappij = Platenmaatschappijen::all(); // fetch all record labels
        return view('Artists', [
            'platenmaatschappij'=>$platenmaatschappij,
            ]);
    }


    public function store(Request $request)
    {
//        $validated = $request->validate([
//            'naam' => 'required|regex:/^[a-zA-Z ,]+$/u|max:255',
//            'bandleden' => 'required|regex:/^[a-zA-Z ,]+$/u|max:800',
//            'genre' => 'required',
//            'platenmaatschappij_id' => 'required',
//        ]); // need required for validations


//        dd([$request->platenmaatschappij_id, $validated]);

        $newArtist = ArtistInfo::create([
            'naam' => $request->naam,
            'bandleden' => $request->bandleden,
            'genre' => $request->genre,
            'platenmaatschappij_id' => $request->platenmaatschappij_id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArtistInfo $artistInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArtistInfo $artistInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArtistInfo $artistInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArtistInfo $artistInfo)
    {
        //
    }
}
