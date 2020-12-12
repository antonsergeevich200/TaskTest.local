<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Requests\StoreProductCreateRequest;
use App\Http\Requests\StoreProductUpdateRequest;
use App\Models\Product;
use App\Repositories\StoreProductCategoryRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;

/**
* Product management
* 
* @package App\Http\Controllers\Store\Admin
*/

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
        parent::__construct();

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

        return view('store.admin.products.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Product();
        $categoryList = $this->storeProductCategoryRepository->getForComboBox();

        return view('store.admin.products.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductCreateRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Product())->create($data);

        if ($item) {
            return redirect()->route('store.admin.products.edit', [$item->id])
                             ->with(['success' => 'Saved successfully']);
        } else {
            return back()->withErrors(['msg' => 'Save error'])
                         ->withInput();
        }
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
        $item = $this->storeProductRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $this->storeProductCategoryRepository->getForComboBox();

        return view('store.admin.products.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProductUpdateRequest  $request
     * @param  int                    $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductUpdateRequest $request, $id)
    {

        $item = $this->storeProductRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Record  id=[{$id}] not found"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('store.admin.products.edit', $item->id)
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
        $result = Product::destroy($id);

        if ($result) {
            return redirect()
                ->route('store.admin.products.index')
                ->with(['success' => "Record id[$id] deleted"]);
        } else {
            return back()->withErrors(['msg' => 'Delete error']);
        }
    }
}