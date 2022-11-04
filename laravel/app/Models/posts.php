<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'latitude',
        'longitude',
        'file_id',
        'visibility_id',
        'author_id',
        
    ];

    public function file()
    {
        return $this->hasOne(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


}
