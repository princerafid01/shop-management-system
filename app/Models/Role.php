<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function __construct()
    {
    }
   public function Users(){
       return $this->hasMany('App\Models\User');
   }
}
