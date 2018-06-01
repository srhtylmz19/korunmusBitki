<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable=[
        'title','portfolioCategoryId',
    ];

    public function portfolioCategory()
    {
        return $this->belongsTo('App\portfolioCategory','portfolioCategoryId');
    }

    public function gallery()
    {
        return $this->hasMany('App\Gallery');
    }
}
