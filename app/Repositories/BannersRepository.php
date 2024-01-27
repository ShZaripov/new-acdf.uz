<?php 

namespace App\Repositories;

use App\Models\TextBlock;
use App\Repositories\ImagesRepository;

class BannersRepository{

	protected $model;
	public function __construct()
  {
  		$this->model = new TextBlock;
  }

	public function getAll($limit = 10)
	{
		$data = $this->model->where('name','like','%mainbanner%')->orderBy('id', 'desc')->paginate($limit);
		return $data;
	}

	public function getAllSite()
	{
		$data = $this->model->where('status',1)->orderBy('title->ru', 'asc')->get();
		if ($data) {
			return $data;
		}
		return false;
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
		$image = ImagesRepository::upload($data['image']);
		$data['image'] = $image;
		$data['name'] = 'mainbanner.'.$image;
		$data['title'] = [
			'ru' => $data['title'],
			'uz' => $data['title'],
			'en' => $data['title']
		];
		$model = new TextBlock;
		return $model->fill($data)->save();		
	}

	public function update($request, $model)
	{
		$data = $request->except('_token');
		if (isset($data['image'])) {
			$image = ImagesRepository::upload($data['image']);
			$data['image'] = $image;
		}
		return $model->fill($data)->update();	
	}

	public function getStatuses()
	{
		return \Config::get('settings.statuses');
	}

	public function delete($model)
	{
		$model = $this->getFindById($model);
		return $model->delete();
	}

}