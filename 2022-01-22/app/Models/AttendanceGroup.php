<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceGroup extends Model
{
    use HasFactory;
    public function schoolsList() {
        return $this->hasMany(Schools::class, 'school_id','id');
    }
    public function difficultiesList() {
        return $this->belongsTo(Difficulty::class, 'difficulty_id','id');
    }
}
