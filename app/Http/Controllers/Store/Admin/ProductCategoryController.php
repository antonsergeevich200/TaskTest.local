<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Requests\StoreProductCategoryCreateRequest;
use App\Http\Requests\StoreProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use App\Repositories\StoreProductCategoryRepository;

/**
* Category management
*
* @param App\Http\Controllers\Store\Admin
*/

class ProductCategoryController extends BaseController
{
    
    /**
    * @var StoreProductCategoryRepository
    */
    private $storeProductCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->storeProductCategoryRepository = app(StoreProductCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->storeProductCategoryRepository->getAllWithPaginate(5);

        return view('store.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ProductCategory();
        $categoryList = $this->storeProductCategoryRepository->getForComboBox();

        return view('store.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryCreateRequest $request)
    {
        $data = $request->input();

        // Will create an object and add it to the database
        $item = (new ProductCategory())->create($data);

        if ($item) {
            return redirect()->route('store.admin.categories.edit', [$item->id])
                ->with(['success' => 'Saved successfully']);
        } else {
            return back()->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  StoreProductCategoryRepository $categoryRepository  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->storeProductCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList 
            = $this->storeProductCategoryRepository->getForComboBox();

        return view('store.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProductCategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductCategoryUpdateRequest $request, $id)
    {

        $item = ProductCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Record id=[{$id}] not found"])
                ->withInput();
        }

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['title']);
        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('store.admin.categories.edit', $item->id)
                ->with(['success' => 'Saved successfully']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deletion (remains in the database)
        $result = ProductCategory::destroy($id);

        if ($result) {
            return redirect()
                ->route('store.admin.categories.index')
                ->with(['success' => "Record id[$id] deleted"]);
        } else {
            return back()->withErrors(['msg' => 'Delete error']);
        }
    }
}