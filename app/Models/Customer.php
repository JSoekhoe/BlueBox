<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'branch_id',
    ];

    public function branch()
    {
        return $this->belongsTo(AllowedBranch::class);
    }
}
