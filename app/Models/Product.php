<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function images()
    {
        return $this->hasMany(File::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
