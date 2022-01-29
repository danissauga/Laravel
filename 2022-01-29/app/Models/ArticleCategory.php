<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    public function getArticle() {
        return $this->belongsTo(Article::class, 'article_id','id');
    }
    public function getArticleImage() {
        return $this->belongsTo(ArticleImage::class, 'image_id','id');
    }

}
