<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    protected $primaryKey = 'strategy_id';

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
}
