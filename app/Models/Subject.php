<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function studentMarks(): HasMany
    {
        return $this->hasMany(StudentMarks::class);
    }
    public function teacherSubject(): HasMany
    {
        return $this->hasMany(TeacherSubject::class);
    }
    public function subjectClass(): HasMany
    {
        return $this->hasMany(SubjectClass::class);
    }
}
