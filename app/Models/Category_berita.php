<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_berita extends Model
{
    use HasFactory;
    protected $table = "category_berita";
    protected $fillable = [
        "name",
        "slug",
    ];
}
