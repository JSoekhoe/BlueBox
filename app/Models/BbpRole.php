<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BbpRole extends Model
{
    use HasFactory;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'bbp_roles';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'ID_BBP_roles';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'BBP_Roles',
        // Add any additional fields here
        // 'description',
        // 'additional_data',
    ];
}
