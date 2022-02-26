<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; 

class Owner extends Model
{
    use HasFactory;
    use Sortable;   

    public $sortable = ['id','name','surename','email','phone','owner_id']; 

    public function ownerHasTask() {
        return $this->belongsTo(Task::class, 'id','owner_id');
    }

}
