<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    const AUTHOR = 1;
    const EDITOR = 2;
    const ADMIN  = 3;

    protected $fillable = [
        'id',
        'name'
    ];
}