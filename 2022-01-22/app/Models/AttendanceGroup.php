<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceGroup extends Model
{
    use HasFactory;
    public function schoolName() {
        return $this->belongsTo(School::class, 'school_id','id');
    }
    public function schoolsCount() {
        return $this->hasMany(School::class, 'id','school_id');
    }
    public function difficultiesList() {
        return $this->belongsTo(Difficulty::class, 'difficulty_id','id');
    }
    public function studentsList() {
        return $this->hasMany(Student::class, 'group_id','id');
    }
}
