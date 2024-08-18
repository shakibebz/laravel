<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_cat', 'article_id', 'category_id');
    }

    public function hasCategory($id)
    {
        return in_array($id, $this->categories()->pluck('id')->toArray());

    }
    use HasFactory;
}
