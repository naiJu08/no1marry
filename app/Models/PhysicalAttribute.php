<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhysicalAttribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'height',
        'weight',
        'disability',  // Add this line
        'user_id',  // Add this line
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
