<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allat extends Model
{
    protected $table = "animals";
    public function petsanimaltype()
    {
        return $this->hasMany(Kedvenc::class,"animals_id","id");
    }
}