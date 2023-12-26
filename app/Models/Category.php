<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
    'categoryName',
    'description',
    ];

    public function products(){
        return $this->hasMany(Products::class, 'id_category', 'id');
    }
}
