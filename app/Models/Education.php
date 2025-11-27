<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'degree',  
        'user_id',
        'present',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
