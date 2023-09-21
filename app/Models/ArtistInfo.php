<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "naam",
        "bandleden",
        "genre",
        "platenmaatschappijen_id"
    ];

    public function platenmaatschappijen(){
        return $this -> hasOne(Platenmaatschappijen::class, "id", "platenmaatschappijen_id");
    }
};


