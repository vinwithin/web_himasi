<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    public $berita = 'berita';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'category_berita_id',
        'image_berita',
        'body',
    ];
    public function category_berita(){
        return $this->belongsTo(Category_berita::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
