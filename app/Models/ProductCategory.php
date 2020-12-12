<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{	
	use SoftDeletes;
	
    /**
	* Root id
    */
	const ROOT = 1;

    protected $fillable = [
    	'title',
    	'slug',
    	'parent_id',
    	'description',
    	];
    /**
    * Get parent category
	* 
	* @return ProductCategory
	*/
	public function parentCategory()
	{
		return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
	}

	/**
	* Accessory example (Accessor)
	*
	* @return string
	*/
	public function getParentTitleAttribute()
	{
		$title = $this->parentCategory->title
			?? ($this->isRoot()
				? 'Root'
				: '???'
				);
		return $title;
	}

	/**
	* Is the current object the root
	*
	* @return bool
	*/
	public function isRoot()
	{
		return $this->id === ProductCategory::ROOT;
	}
}