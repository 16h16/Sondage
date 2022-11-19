<?php

namespace App\Models;

use App\Models\Responses as Responses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    use HasFactory;

    public function Responses(){
        return $this->hasMany(Responses::class);
    }
}
