<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
        'title','portfolioId','image',
    ];


    public function portfolio()
    {
        return $this->belongsTo('App\Portfolio','portfolioId');
    }
    public function image()
    {
        return $this->hasMany('App\Image');
    }
}
