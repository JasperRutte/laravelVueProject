<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Platenmaatschappijen;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class ArtistInfoController extends Controller
{
    public function index()

    {
        $artist = ArtistInfo::all();
        return $artist;

    }

    public function create()
    {
        $platenmaatschappijen = Platenmaatschappijen::all();
        return ['platenmaatschappij_id' => $platenmaatschappijen];
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|regex:/^[a-zA-Z ,]+$/u|max:255',
            'bandleden' => 'required|regex:/^[a-zA-Z ,]+$/u|max:800',
            'genre' => 'required',
            'platenmaatschappij_id' => 'required'
        ]);

        $newArtist = new ArtistInfo;
        $newArtist->naam = $validated["naam"];
        $newArtist->bandleden = $validated["bandleden"];
        $newArtist->genre = $validated["genre"];
        $newArtist->platenmaatschappij_id = $validated['platenmaatschappij_id'];

        $newArtist->save();;
    }


    public function show($id)
    {
        $item = ArtistInfo::find($id);
        return response()->json(['item' => $item]);
    }


    public function edit(ArtistInfo $ArtistInfo, $id)
    {
        $item = ArtistInfo::find($id);
        return response()->json(['item' => $item]);

    }


    public function update(Request $request, ArtistInfo $artistInfo)
    {
        $validated = $request->validate([
            'naam' => 'required|regex:/^[a-zA-Z , .]+$/u|max:255',
            'bandleden' => 'required|regex:/^[a-zA-Z , .]+$/u|max:800',
            'genre' => 'required',
            'platenmaatschappij_id' => 'required'
        ]);

        $upDatedArtist = ArtistInfo::where("id", $request->id)->first();
        $upDatedArtist->naam = $request->naam;
        $upDatedArtist->bandleden = $request->bandleden;
        $upDatedArtist->genre = $request->genre;
        $upDatedArtist->platenmaatschappij_id = $request->platenmaatschappij_id;
        $upDatedArtist->save();
    }

    public function destroy($artist)
    {

        $deletedArtist = ArtistInfo::find($artist);

        $deletedArtist->delete();
    }
}
