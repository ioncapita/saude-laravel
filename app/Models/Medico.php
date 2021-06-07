<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];


    public function speciality(){
        return $this->belongsTo(Speciality::class, 'speciality_id', 'id');
    }
}
