<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'university',
        'degree',
        'major',
        'graduation_year',
        'gpa',
        'skills',
        'bio',
        'resume_path',
    ];

    protected function casts(): array
    {
        return [
            'graduation_year' => 'integer',
            'gpa' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'applications')
            ->withPivot('status', 'cover_letter', 'resume_path', 'created_at')
            ->withTimestamps();
    }
}
