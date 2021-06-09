<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserShipments extends Model
{
    use SoftDeletes;

    protected $table = 'user_shipments';

    protected $fillable = [
        'user_id',
        'tracking_number',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
