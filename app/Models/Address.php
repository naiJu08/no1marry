<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'city_id',
        'state_id',
        'country_id',
        'type',// Add this line
        'user_id',  // Add this line
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function state()
    {
        return $this->belongsTo(State::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }
}
