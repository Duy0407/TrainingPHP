<?php 
namespace App\Repositories;
use App\Models\Facturer;

class FacturerRepository
{
	protected $facturer;
	public function __construct(Facturer $facturer)
	{
		$this->facturer = $facturer;
	}

	public function all()
	{
		return $this->facturer->all();
	}
}

?>