<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\FacturerService;
use App\Services\ProductService;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $cateService;
    protected $facturerServices;
    protected $productService;

    public function __construct(CategoryService $cateService, FacturerService $facturerServices, ProductService $productService){
        $this->cateService = $cateService;
        $this->facturerServices = $facturerServices;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $categoryId = intval($request['category']);
        
        $manufacturerId = $request['manufacturer'];


        $categories = $this->cateService->getAllCategory();
        $facturers = $this->facturerServices->getAllFacturer();
        $products = $this->productService->getAllProduct($keyword, $categoryId, $manufacturerId);


        return view('manager', compact('categories','facturers','products'));
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
        $this->productService->createProduct($request->all());
        return redirect()->back()->with('success', 'Thêm thành công');
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
        $categories = $this->cateService->getAllCategory();
        $facturers = $this->facturerServices->getAllFacturer();
        $edit = $this->productService->findProduct($id);
        $imgSliderProducts = $this->productService->GetAllImgSliderProduct($id);
        return view("update_product", compact('categories','facturers', 'edit', 'imgSliderProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->updateProduct($request->all(), $id);
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('product.index')->with('successDelete', 'Xóa sản phẩm thành công');
    }
}
