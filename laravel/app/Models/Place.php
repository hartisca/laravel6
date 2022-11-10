<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'description',
        'file_id',
        'visibility_id',
        'author_id',
            
        ];
    
    public function file(){

        return $this->belongsTo(File::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }





}
