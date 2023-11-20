<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application';
    
    protected $fillable = [
        'user_id',
        'document_id',
        'application_date',
        'application_no',
        'allocated_passport_number',
        'service_type',
        'traveldocument_type',
        'present_traveldocument_no',
        'nmrp_no',
        'nic_no',
        'district',
        'dateofbirth',
        'bc_number',
        'bc_district',
        'birth_place',
        'sex',
        'occupation',
        'dual_citizenship',
        'dual_citizenship_no',
        'applicant_signature',
        'status',
    ];

    protected $casts = [
        'dual_citizenship' => 'boolean',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
