<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected  $fillable = ['title','description','url'];


    public function getOriginalImageAttribute()
    {
        return asset("/storage/images/portfolio/original/" . $this->attributes['id'].'.png');
    }

    public function getSmallImageAttribute()
    {
        return asset("/storage/images/portfolio/small/" . $this->attributes['id'].'.png');
    }
}
