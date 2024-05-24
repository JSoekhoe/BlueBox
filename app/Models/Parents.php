<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'parents';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'ID_Master';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'Mastername',
        'Category',
        'Contract_expiration',
        'Contract_type',
        'European_SM_short',
        'European_SM_long',
        'ID_Partner',
        'Partner',
        'Focus',
    ];

    // If Partner is stored as JSON, cast it to array
    protected $casts = [
        'Partner' => 'array',
    ];
}
