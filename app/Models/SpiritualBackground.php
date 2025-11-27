<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpiritualBackground extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'religion_id',
        'caste_id',
        'family_value_id',// Add this line
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class)->withTrashed();
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class)->withTrashed();
    }

    public function sub_caste()
    {
        return $this->belongsTo(SubCaste::class)->withTrashed();
    }

    public function family_value()
    {
        return $this->belongsTo(FamilyValue::class)->withTrashed();
    }

}
