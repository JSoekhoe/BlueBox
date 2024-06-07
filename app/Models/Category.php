<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'ID_Cat';

    protected $fillable = [
        'Category',
        'Description',
    ];
}