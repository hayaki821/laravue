<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable = [
        'id' , 'post_id' , 'user_id'
    ];
}
