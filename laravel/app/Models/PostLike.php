<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;


    public function post()
    {
        $this->belongsTo(Post::class);
    }
    
    public function user()
    {
        $this->belongsTo(User::class);
    }

}
