<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $table = 'uploads';

    protected $fillable = ['file_original_name', 'file_name', 'user_id'];
}
