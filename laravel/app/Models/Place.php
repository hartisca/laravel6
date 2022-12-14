<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'file_id',
        'latitude',
        'longitude',
        'author_id',
        'visibility'
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
    
    public function favorited()
    {
       return $this->belongsToMany(User::class, 'favorites')->withPivot('active', 'created_by');
    }

    public function visibility()
    {
        return $this->belongsTo(Place::class);
    }
 
}
