<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'summary', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
