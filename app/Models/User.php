<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id',
        'branch_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function branch()
    {
        return $this->belongsTo(AllowedBranch::class);
    }
    public function isAdmin()
    {
        return $this->role_id === 1;
    }
    public function isModerator()
    {
        return $this->role->role_name === 'moderator';
    }
    public function isEmployee()
    {
        return $this->role->role_name === 'Employee';
    }
}
