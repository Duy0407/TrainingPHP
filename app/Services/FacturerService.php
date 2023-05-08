<?php 
namespace App\Services;
use App\Repositories\FacturerRepository;

class FacturerService
{
	protected $facturerServices;
	public function __construct(FacturerRepository $facturerServices){
		$this->facturerServices = $facturerServices;
	}

	public function getAllFacturer(){
		return $this->facturerServices->all();
	}
}

?>