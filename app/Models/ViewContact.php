<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewContact extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
