<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'area', 'end_date', 'payment_terms', 'rebate', 'rebate_period',
        'paper_review', 'review_period', 'review_base', 'cto_type', 'cto_value',
        'sob', 'sob_value'
    ];

    
}
