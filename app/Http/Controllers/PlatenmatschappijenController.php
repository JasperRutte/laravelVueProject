<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Platenmaatschappijen;
use http\Env\Response;
use Illuminate\Http\Request;

class PlatenmatschappijenController extends Controller
{

    public function index()
    {
        return Platenmaatschappijen::all();

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required',
        ]);

        $newPlatenmaatschappij = new Platenmaatschappijen();
        $newPlatenmaatschappij->naam = $validated['naam'];
        $newPlatenmaatschappij->save();
    }


    public function edit(Platenmaatschappijen $platenmaatschappijen, $id)
    {
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
        $recordLabel = Platenmaatschappijen::find($platenmaatschappij);

        $recordLabelName = ArtistInfo::where('platenmaatschappij', $recordLabel->naam)->exists();
        if (!$recordLabelName){
            $deletedPlatenmaatschappij = Platenmaatschappijen::find($platenmaatschappij);
            $deletedPlatenmaatschappij->delete();
        } else {
            $errorMessage = "There is a artist with this record label";
            return response()->json(['error' => $errorMessage], 422);
        }
    }
}
