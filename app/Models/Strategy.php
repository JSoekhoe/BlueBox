<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_Strategy';

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
    
}
