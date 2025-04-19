<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [

        'patient_id',
        'doctor_id',
        'disease',
        'phone',
        'name',
        'advice',
        'medicines',
    ];
    protected $primaryKey = 'ticket_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
