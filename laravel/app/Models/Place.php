<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Place extends Model
{
    use HasFactory, CrudTrait;

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

=======
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
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
>>>>>>> d68094f534fcc6a50c0669d6e78ebe2c2524982b
    public function author()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
}
=======
 
}
>>>>>>> d68094f534fcc6a50c0669d6e78ebe2c2524982b
