<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filesize',
        'filepath'
        
    ];
    public function place(){

        return $this->belongsTo(Place::class);
    }
    public function places(){

        return $this->hasMany(Place::class);
    }






}
