<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passporttracker extends Model
{
    use HasFactory;

    protected $table = 'passport_tracker'; 

    protected $fillable = [
        'estdelivery',
        'status',
        'location',
        'application_id',
    ];

    //relationship
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
