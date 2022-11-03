<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'description'
        

        
    ];
    
    public function file(){

        return $this->hasOne(File::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }






}
