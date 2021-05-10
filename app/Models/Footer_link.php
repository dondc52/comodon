<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer_link extends Model
{
    use HasFactory;
    protected $table = 'footer_links';
    protected $fillable = [
        'parent_id', 'link_name', 'link_content',
    ];
    public function children()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }
    public function parent(){
        return $this->hasOne($this, 'id', 'parent_id')->value('link_name');
    }
}
