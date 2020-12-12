<?php

namespace App\Observers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductObserver
{

    /**
     * 
     * Practice BEFORE creating a record
     *
     * @param  Product  $product
     * 
     */
    public function creating(Product $product)
    {
        $this->setSlug($product);

        $this->setHtml($product);
    }

    /**
     * Processing BEFORE updating a record
     *
     * @param  Product  $product
     * 
     */
    public function updating(Product $product)
    {

        $this->setSlug($product);
    }

    /**
     * If the slug field is empty, then fill it in with header conversion.
     *
     * @param  Product  $product
     * 
     */
    protected function setSlug(Product $product)
    {
        if (empty($product->slug)) {
            $product->slug = Str::slug($product->title);
        }
    }

    /**
     * Setting the value to the content_html field relative to the content_raw field
     *
     * @param  Product  $product
     * 
     */
    protected function setHtml(Product $product)
    {
        if ($product->isDirty('content_raw')) {
            $product->content_html = $product->content_raw;
        }
    }

    /**
     * Handle the product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * 
     * @param  \App\Models\Product  $product
     * 
     */
    public function deleting(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
