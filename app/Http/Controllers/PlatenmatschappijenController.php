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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required',
        ]);

        $newPlatenmaatschappij = new Platenmaatschappijen();
        $newPlatenmaatschappij->naam = $validated['naam'];
//        $newArtist->genre = $validated["genre"];
        $newPlatenmaatschappij->save();
    }


    public function edit(Platenmaatschappijen $platenmaatschappijen, $id)
    {
//        dd($id);
        $item = Platenmaatschappijen::find($id);
        return response()->json(['item' => $item]);

    }

    public function update(Request $request, Platenmaatschappijen $platenmaatschappijen)
    {
        $validated = $request->validate(["naam" =>'required|regex:/^[a-zA-Z , .]+$/u|max:255']);

        $updatedPlatenmaatschappij = Platenmaatschappijen::where("id", $request->id)->first();
        $updatedPlatenmaatschappij->naam = $request->naam;
        $updatedPlatenmaatschappij->save();
    }


    public function destroy($platenmaatschappij)
    {
        $deletedPlatenmaatschappij = Platenmaatschappijen::find($platenmaatschappij);

        $deletedPlatenmaatschappij->delete();
    }
}
