<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'countries';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'id';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'ISO2',
        'short_name',
        'official_name',
    ];
}
