<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    public $kegiatan = 'kegiatan';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'image_kegiatan',
        'body',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
