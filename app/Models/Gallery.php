<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
