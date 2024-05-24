<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BBP_Employer extends Model
{
    use HasFactory;

    protected $table = 'bbp_employers';

    protected $primaryKey = 'ID_BBP';

    protected $fillable = [
        'Gender',
        'First_Name',
        'Last_Name',
        'BBP_Role',
        'Email',
        'Phone',
    ];
}
