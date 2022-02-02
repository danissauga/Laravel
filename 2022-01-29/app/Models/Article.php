<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function getArticleImage() {
        return $this->belongsTo(ArticleImage::class, 'image_id','id');
    }
    public function getAllArticleImages() {
        return $this->hasMany(ArticleImage::class, 'id','image_id');
    }
}
