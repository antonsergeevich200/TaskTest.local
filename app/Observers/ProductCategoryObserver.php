<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryObserver
{
    /**
     * Handle the product category "created" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function created(ProductCategory $productCategory)
    {
        //
    }

    /**
     * @param  $productCategory  $productCategory
     */
    public function creating(ProductCategory $productCategory)
    {
        $this->setSlug($productCategory);
    }

    /**
     *If the slug is empty, then fill it with conversion of the header.
     *
     * @param  ProductCategory  $model
     */
    protected function setSlug(ProductCategory $productCategory)
    {
        if (empty($productCategory->slug)) {
            $productCategory->slug = Str::slug($productCategory->title);
        }
    }

    /**
     * Handle the product category "updated" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function updated(ProductCategory $productCategory)
    {
        //
    }

    /**
     * @param  ProductCategory  $productCategory
     */
    public function updating(ProductCategory $productCategory)
    {
        $this->setSlug($productCategory);
    }

    /**
     * Handle the product category "deleted" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function deleted(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "restored" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function restored(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "force deleted" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function forceDeleted(ProductCategory $productCategory)
    {
        //
    }
}
