<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable= ['id', 'type_id', 'title', 'description'];  

    public function articleHasType() {
        return $this->belongsTo(Type::class, 'type_id','id');
    }
    public function articleHasTypes() {
        return $this->hasMany(Type::class, 'id','type_id');
    }
}
