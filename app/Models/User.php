<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
	protected $guarded = [];
	public function Role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function Userextra(){
        return $this->belongsTo('App\Models\Userextra');
    }
}

?>