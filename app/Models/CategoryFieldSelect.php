<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryFieldSelect extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_field_id', 'name', 'value'];

    public function field()
    {
        return $this->belongsTo(CategoryField::class);
    }
}
