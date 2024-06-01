<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'strategies';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'ID_Strategy';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'Mastername',
        'Summary',
        'Today',
        'Tomorrow',
        'How',
        'Internal_alignment',
        'External_alignment',
        'Resource_needed',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function branch()
    {
        return $this->belongsTo(AllowedBranch::class);
    }

    // If Resource_needed is stored as JSON, cast it to array
    protected $casts = [
        'Resource_needed' => 'array',
    ];
}
