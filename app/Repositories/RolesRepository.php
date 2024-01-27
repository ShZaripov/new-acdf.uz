<?php 

namespace App\Repositories;

use App\User;
use App\Role;

class RolesRepository{

	public function getAll($limit = 10)
	{
		$data = Role::orderBy('id', 'desc')->paginate($limit);
		return $data;
	}

	public function getFindById($id)
	{
		$data = Role::whereId($id)->first();
		if (!$data) {
			abort(404);
		}
		return $data;
	}

	public function deleteModel($id)
	{
		return Role::whereId($id)->delete();
	}

	public function create($request)
	{
		$data = $request->except('_token');
		$model = new Role;
		return $model->fill($data)->save();
	}

	public function update($request, $model)
	{
		$data = $request->except('_token');
		return $model->fill($data)->update();
	}
}
