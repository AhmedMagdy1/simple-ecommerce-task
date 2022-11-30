<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'category_id', 'image_path'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getShortDescriptionAttribute()
    {
        $length = 50;
        return (strlen($this->description) < $length) ? $this->description : substr($this->description, 0, $length) . '...';
    }

    public function scopeNameLike($query, $name) {
        return $query->where('name', 'like', '%' . $name . '%');
    }

}
