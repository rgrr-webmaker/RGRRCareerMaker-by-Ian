<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'company_phone',
        'company_address',
        'industry',
        'company_size',
        'company_description',
        'logo_path',
    ];

    protected function casts(): array
    {
        return [
            'company_size' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
