<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'requirements',
        'location',
        'type',
        'salary_min',
        'salary_max',
        'experience_level',
        'benefits',
        'is_active',
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'salary_min' => 'decimal:2',
            'salary_max' => 'decimal:2',
            'is_active' => 'boolean',
            'deadline' => 'datetime',
        ];
    }

    /**
     * RELATIONSHIPS
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'applications')
            ->withPivot('status', 'cover_letter', 'resume_path', 'created_at')
            ->withTimestamps();
    }

    /**
     * SCOPES
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeActive($query)
    {
        // ✅ Fix: this makes Job::active() work
        return $query->where('is_active', true);
    }
}
