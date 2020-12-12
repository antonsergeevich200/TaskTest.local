<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'created_at',
    ];

    /**
    * Product category
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
    	//Product belongs to category
    	return $this->belongsTo(ProductCategory::class);
    }
}