<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $primaryKey = 'action_id';

    protected $fillable = [
        'strategy_id', 'Action', 'Who', 'Support', 'When', 'Status'
    ];

    public function strategy()
    {
        return $this->belongsTo(Strategy::class, 'strategy_id');
    }
}
