<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;

    protected $table = 'document'; 

    protected $fillable = [

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



}
