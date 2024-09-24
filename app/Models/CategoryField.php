<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryField extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_id', 'name', 'type'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function selects()
    {
        return $this->hasMany(CategoryFieldSelect::class);
    }
}
