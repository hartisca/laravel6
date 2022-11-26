<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{

    public $timestamps=false;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    

    const Private  = 1;

    protected $fillable = [
        'user_id',
        'place_id'
    ];

    protected $table = 'favorites';
}