<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;




class Customer extends Model
{
    
    use HasApiTokens, HasFactory, Notifiable;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'customers';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'id';

    // Specify the columns that can be mass-assigned
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
    
    public function strategies()
    {
        return $this->hasMany(Strategy::class);
    }

    public function ParentModel()
    {
        return $this->belongsTo(ParentModel::class);
    }

    // Define the relationship with branch
 
}
