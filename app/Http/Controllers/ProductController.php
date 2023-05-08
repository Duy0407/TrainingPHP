<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\FacturerService;
use App\Services\ProductService;

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
