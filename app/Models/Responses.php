<?php

namespace App\Models;

use App\Models\Surveys as Surveys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;

    public function surveys(){
        return $this->belongsTo(Surveys::class);
    }
}
