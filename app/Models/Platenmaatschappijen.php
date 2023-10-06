<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platenmaatschappijen extends Model
{
    use HasFactory;

    protected $table = "platenmaatschapijen";
    protected $fillable = ["id", "platenmaatschappijen"];
}
//    public function allArtists(): HasMany
//    {
//        return $this->hasMany(ArtistInfo::class);
//    }
//}
