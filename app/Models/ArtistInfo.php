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
        "platenmaatschappij"
    ];

    public function platenmaatschappijen(){
        return $this -> hasOne(Platenmaatschappijen::class, "id", "platenmaatschappij");
    }
};


