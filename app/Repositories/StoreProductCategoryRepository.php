<?php

namespace App\Repositories;

use App\Models\ProductCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
*  Class StoreProductCategoryRepository
*
*  @package App\Repositories
*/
class StoreProductCategoryRepository extends CoreRepository
{	

	/**
	* @return string
	*/
	protected function getModelClass()
	{
		return Model::class;
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

	/**
	* Get a list of categories to display in the dropdown list.
	*
	* @return Collection
	*/
	public function getForComboBox()
	{

		$columns = implode(', ', [
			'id',
			'CONCAT (id, ". ", title) AS id_title',
		]);

		$result = $this
			->startConditions()
			->selectRaw($columns)
			->toBase()
			->get();

		return $result;
	}

	/**
	* Get output categories by the paginator.
	*
	* @param int|null $perPage
	*
	* @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	*/
	public function getAllWithPaginate($perPage = null)
	{
		$columns = ['id', 'title', 'parent_id'];

		$result = $this
			->startConditions()
			->select($columns)
			->orderBy('id', 'DESC')
			->with([
				'parentCategory:id,title',
			])
			->paginate($perPage);

		return $result;
	}
}
