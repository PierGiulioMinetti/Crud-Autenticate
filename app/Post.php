<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // MASS ASSIGNMENT
    protected $fillable = [
        'user_id', 
        'title', 
        'body',
        'slug'
    ];

    // RELAZIONE POST-USER
    public function user(){
        return $this->belongsTo('App\User');
    }
}
