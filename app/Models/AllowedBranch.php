<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowedBranch extends Model
{
    use HasFactory;

    protected $fillable = ['branch_name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
