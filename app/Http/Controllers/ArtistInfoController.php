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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(ArtistInfo $artistInfo)
    {
        //
    }


    public function edit(ArtistInfo $artistInfo)
    {
        //
    }


    public function update(Request $request, ArtistInfo $artistInfo)
    {
        //
    }


    public function destroy(ArtistInfo $artistInfo)
    {
        //
    }
}
