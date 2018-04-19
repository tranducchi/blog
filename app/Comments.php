<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table ='comments';

    public function user(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function posts(){
    	return $this->belongsTo('App\Posts', 'id_post', 'id');
    }
}
