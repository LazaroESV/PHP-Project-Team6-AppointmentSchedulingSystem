<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone'
    ];
}
