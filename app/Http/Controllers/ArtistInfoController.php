<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Platenmaatschappijen;
use Illuminate\Http\Request;

class ArtistInfoController extends Controller
{
    public function index()

    {
        $artist = ArtistInfo::all(); //fetch all artists from DB
        return $artist; // return view with options to create an artist, and all the record labels

    }


//    public function create()
//    {
//
//        return view( 'ArtistCreate');
//    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|regex:/^[a-zA-Z ,]+$/u|max:255',
            'bandleden' => 'required|regex:/^[a-zA-Z ,]+$/u|max:800',
            'genre' => 'required',
//            'platenmaatschappij' => 'required',
        ]); // need `required` for validations
//
//        dd($validated);
        $newArtist = new ArtistInfo;
        $newArtist->naam = $validated["naam"];
        $newArtist->bandleden = $validated["bandleden"];
        $newArtist->genre = $validated["genre"];

        $newArtist->save();
    }


    public function show($id)
    {
        $item = ArtistInfo::find($id);
        return response()->json(['item' => $item]);
    }


    public function edit(ArtistInfo $ArtistInfo, $id)// edit an artist
    {
        $item = ArtistInfo::find($id);
        return response()->json(['item' => $item]);
//
//        $ArtistInfo = ArtistInfo::all();
//        $platenmaatschappij = Platenmaatschappij::all();
//        return $ArtistInfo;
//            'test1' => $ArtistInfo,
//            'artist' => $ArtistInfo,
//            'platenmaatschappij'=> $platenmaatschappij
//  //returns the edit view with the post

    }


    public function update(Request $request, ArtistInfo $artistInfo)
    {
        //
    }


    public function destroy(ArtistInfo $artistInfo)
    {
        $artistInfo->delete();
    }
}
