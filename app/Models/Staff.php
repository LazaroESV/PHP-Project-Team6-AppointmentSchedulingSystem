<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_available'
    ];
}
