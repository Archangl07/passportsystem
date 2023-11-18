<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;

    protected $fillable = [

        'report_id',
        'user_id',
        'birth_certificate',
        'NIC',
        'Medical_certificate',
        'Fingerprint',
        'Digitalphoto',
        
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->belongsTo();
    }


}
