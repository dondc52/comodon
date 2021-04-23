<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallerys';
    protected $fillable = ['image',];

    public function showAllGallery(){
        return $this::all('id', 'image');
    }
    public function showGallery(){
        return $this::select('id', 'image')->where('id', 2)->get();
    }  
}
