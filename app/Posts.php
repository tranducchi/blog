<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $primaryKey ='id';
    protected $table = 'posts';

    public function cat(){
        return $this->belongsTo('App\Categories', 'id_cat', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function comments(){
        return $this->hasMany('App\Comments', 'id_post', 'id');
    }
}
