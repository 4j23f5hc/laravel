<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug',
    ];
	
	/// Relationships ///
	 public function subCateg(){
        return $this->hasMany('App\SubCategory','category_id');
    }

}
