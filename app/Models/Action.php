<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'actions';

    protected $primaryKey = 'ID_Action';

    protected $fillable = [
        'ID_Strategy',
        'Action',
        'Who',
        'Support',
        'When',
        'Status',
    ];

    public function strategy()
    {
        return $this->belongsTo(Strategy::class, 'ID_Strategy', 'ID_Strategy');
    }

    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'Who', 'id');
    // }

    // public function supporter()
    // {
    //     return $this->belongsTo(User::class, 'Support', 'id');
    // }
}
