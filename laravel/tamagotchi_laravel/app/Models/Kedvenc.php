<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedvenc extends Model
{
    protected $casts = [
        'birth' => 'datetime:Y-m-d',
    ];
    protected $table = "pets";
    public function PetsAnimal(){
        return $this->belongsTo(Allat::class, "animals_id", "id");
    }
    public function PetsUser(){
        return $this->belongsTo(User::class,"users_id","id");
    }
}