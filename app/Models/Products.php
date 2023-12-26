<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Category;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'slug',
        'image',
        'id_user',
        'id_category',
        ];

    protected function users() {
        return $this->belongsTo(Users::class, 'id_user');
    }

    protected function categories() {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
