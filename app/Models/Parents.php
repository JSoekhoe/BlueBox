<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parents';
    protected $primaryKey = 'ID_Master';

    protected $fillable = [
        'Mastername',
        'Category',
        'Contract_expiration',
        'Contract_type',
        'European_SM_short',
        'European_SM_long',
        'ID_Partner',
        'Partner',
        'Focus',
    ];

    protected $casts = [
        'Partner' => 'array',
        'Focus' => 'boolean',
    ];

    public function customer()
    {
        return $this->hasMany(Customer::class, 'parent_id');
    }

   

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'parent_id');
    }

    public function countries()
    {
        return $this->hasMany(Country::class, 'parent_id');
    }
}
