<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ProfilePayment extends Model
{
    protected $fillable = [
        'user_id',
        'profile_id',
        'payment_id',
        'amount',
        'payment_method',
        'status',
    ];
    
    // In ProfilePayment model
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function profile()
{
    return $this->belongsTo(User::class, 'profile_id');
}


}
