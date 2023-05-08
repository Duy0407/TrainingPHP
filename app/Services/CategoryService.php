<?php
namespace App\Services;
use App\Repositories\CategoryRepository;

class CategoryService
{
	protected $cateRepository;
	public function __construct(CategoryRepository $cateRepository)
	{
		$this->cateRepository = $cateRepository;
	}

	public function getAllCategory(){
		return $this->cateRepository->getAllCategory();
	}
}
?>
