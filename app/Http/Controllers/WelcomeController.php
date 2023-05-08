<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\FacturerService;

class WelcomeController extends Controller
{
    protected $cateService;
    protected $facturerServices;

    public function __construct(CategoryService $cateService, FacturerService $facturerServices){
        $this->cateService = $cateService;
        $this->facturerServices = $facturerServices;
    }

    public function index()
    {
        $categories = $this->cateService->getAllCategory();
        $facturers = $this->facturerServices->getAllFacturer();
        return view('welcome', compact('categories','facturers'));
    }
}
