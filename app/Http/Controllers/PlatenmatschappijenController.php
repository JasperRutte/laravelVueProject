<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Platenmaatschappijen;
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
        $test = Platenmaatschappijen::find($platenmaatschappij);
//        dd($test->naam);

        $ttest = ArtistInfo::where('platenmaatschappij', $test->naam)->exists();
        if (!$ttest){
            $deletedPlatenmaatschappij = Platenmaatschappijen::find($platenmaatschappij);
            $deletedPlatenmaatschappij->delete();
        }
    }
}
