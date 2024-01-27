<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    public $berita = 'artikel';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'category_artikel_id',
        'image_artikel',
        'body',
    ];
    public function category_artikel(){
        return $this->belongsTo(Category_artikel::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
