<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
public function recordPerPage()
{
    $records = array(
        '*'=>'All',
        '5'=>'5',
        '15'=>'15',
        '20'=>'20'
    );
    return $records;
    }
}
