<?php

namespace App\Repositories;

use App\Models\Product as Model;

/**
*  Class StoreProductCategoryRepository
*
*  @package App\Repositories
*/
class StoreProductRepository extends CoreRepository
{	

	/**
	* @return string
	*/
	protected function getModelClass()
	{
		return Model::class;
	}

	/**
	* Get a list of products to list
	* (Admin)
	*
	* @return LengthAwarePaginator
	*/
	public function getAllWithPaginate()
	{
		$columns = [
			'id',
			'title',
			'slug',
			'category_id',
			'created_at'
		];

		$result = $this->startConditions()
					   ->select($columns)
					   ->orderBy('id', 'DESC')
					   ->with([
					   		'category' => function ($query) {
					   			$query->select(['id', 'title']);
						},
						])
					   ->paginate(10);

		return $result;
		dd($result);
	}

	/**
	* Get a model for editing in the admin panel.
	*
	* @param int $id
	*
	* @return Model
	*/
	public function getEdit($id)
	{
		return $this->startConditions()->find($id);
	}
}
