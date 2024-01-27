<?php 

namespace App\Repositories;

use App\Models\NewsSubject;
use App\Repositories\ImagesRepository;

class NewsSubjectsRepository{

	protected $model;
	public function __construct(NewsSubject $model)
  {
  		$this->model = $model;
  }

	public function getAll($limit = 10)
	{
		$data = $this->model->orderBy('id', 'desc')->paginate($limit);
		return $data;
	}

	public function getFindById($id)
	{
		$data = $this->model->find($id);
		if (!$data) {
			abort(404);
		}
		return $data;
	}

	public function create($request)
	{
		$data = $request->except('_token');
		$model = new NewsSubject;
		return $model->fill($data)->save();		
	}

	public function update($request, $model)
	{
		$data = $request->except('_token');
		return $model->fill($data)->update();	
	}

	public function delete($model)
	{
		$model = $this->getFindById($model);
		return $model->delete();
	}

}