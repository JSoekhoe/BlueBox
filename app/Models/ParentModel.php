<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = [
        'Mastername', 'Category', 'Contract_expiration', 'Contract_type', 
        'European_SM_short', 'European_SM_long', 'Partner', 'Focus', 'contract_id'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
