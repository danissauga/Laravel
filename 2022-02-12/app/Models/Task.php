<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['id','title','description','status_id'];

    public function getTaskStatus() {
        return $this->belongsTo(TaskStatus::class, 'status_id','id');
    }
    
}
