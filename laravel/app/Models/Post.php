<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'body',
        'file_id',
        'latitude',
        'longitude',
        'author_id',
        'visibility',        
    ];

    public function file()
    {
       return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function liked()
    {
       return $this->belongsToMany(User::class, 'likes');
    }
    
   
}
