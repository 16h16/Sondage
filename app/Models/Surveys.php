<?php

namespace App\Models;

use App\Models\Responses\Responses;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'owner', 'user_id'];
    //protected $guarded = [];

    public function responses(){
        return $this->hasMany(Responses::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
