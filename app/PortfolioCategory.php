<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolioCategory extends Model
{
    protected $fillable=
        [
        'title','portfolio'
        ];

    public function portfolio()
    {
        return $this->hasMany('App\Portfolio');
    }
}
