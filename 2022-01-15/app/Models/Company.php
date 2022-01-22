<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function companyClients() {
        return $this->hasMany(Client::class, 'company_id','id');
    }
    public function companyType() {
        return $this->belongsTo(Type::class, 'type_id','id');
    }
}
