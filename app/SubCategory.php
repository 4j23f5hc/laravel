<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug','category_id',
    ];
	
	/// Relationships ///
	public function categ(){
        return $this->belongsTo('App\Category','category_id');
    }
}
