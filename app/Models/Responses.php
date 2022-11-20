<?php

namespace App\Models;

use App\Models\Surveys\Surveys;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'surveys_id', 'count'];

    public function surveys(){
        return $this->belongsTo(Surveys::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
