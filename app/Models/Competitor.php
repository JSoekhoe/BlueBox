<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'competitors';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'ID_Competitors';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'Competitor_name',
        // Add any additional fields here
        // 'contact_person',
        // 'website',
    ];
}
