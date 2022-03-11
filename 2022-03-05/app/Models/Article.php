<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function articleHasType() {
        return $this->belongsTo(Type::class, 'type_id','id');
    }
    public function articleHasTypes() {
        return $this->hasMany(Type::class, 'id','type_id');
    }
}
