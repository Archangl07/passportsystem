<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'branch',
        'date',
        'message',
        'status',
        'user_id',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
