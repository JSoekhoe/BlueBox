<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'ID_Master',
        'gender',
        'first_name',
        'last_name',
        'role',
        'email',
        'phone',
        'location',
    ];

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'ID_Master', 'ID_Master');
    }
}
