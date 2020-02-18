<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;

class Sample extends Model
{
    protected $fillable = [
      'name',
      'email',
      'post',
    ];

    public function scopeSearch($query, $keyword)
    {
      return $query -> where('name', 'like', '%'. $keyword .'%')
                    -> orwhere('email', 'like', '%'. $keyword .'%')
                    -> orwhere('post', 'like', '%'. $keyword .'%')
                    -> get();
    }
}
