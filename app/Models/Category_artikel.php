<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_artikel extends Model
{
    use HasFactory;
    protected $table = "category_artikel";
    protected $fillable = [
        "name",
        "slug",
    ];
    public function artikel(){
        return $this->hasMany(Artikel::class);
    }
}
