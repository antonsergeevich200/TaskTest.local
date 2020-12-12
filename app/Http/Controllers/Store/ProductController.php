<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use App\Repositories\StoreProductCategoryRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;

class ProductController extends BaseController
{   
    
     /**
    * @var StoreProductRepository;
    */
    private $storeProductRepository;

    /**
    * @var StoreProductCategoryRepository;
    */
    private $storeProductCategoryRepository;

    /**
    * ProductController constructor.
    */
    public function __construct()
    {
        $this->storeProductRepository = app(StoreProductRepository::class);
        $this->storeProductCategoryRepository = app(StoreProductCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->storeProductRepository->getAllWithPaginate();

        return view('store.products.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
