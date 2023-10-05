<?php

namespace App\Http\Controllers;

use App\Models\Platenmaatschappijen;
use Illuminate\Http\Request;

class PlatenmatschappijenController extends Controller
{

    public function index()
    {
        //fetch all artists from DB
        return Platenmaatschappijen::all(); // return view with options to create an artist, and all the record labels

    }

//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required',
        ]);

        $newPlatenmaatschappij = new Platenmaatschappijen();
        $newPlatenmaatschappij->platenmaatschappij = $validated['naam'];
//        $newArtist->genre = $validated["genre"];
        $newPlatenmaatschappij->save();
    }

    public function show(Platenmaatschappijen $platenmaatschappijen)
    {
        //
    }

    public function edit(Platenmaatschappijen $platenmaatschappijen)
    {
        //
    }

    public function update(Request $request, Platenmaatschappijen $platenmaatschappijen)
    {
        //
    }

    public function destroy(Platenmaatschappijen $platenmaatschappijen)
    {
        //
    }
}
