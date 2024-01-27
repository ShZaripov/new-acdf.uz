<?php 

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\ImagesRepository;

class PagesRepository{

	protected $model;
	public function __construct(Page $model)
  {
  		$this->model = $model;
  }

	public function getAll($limit = 10)
	{
		$data = $this->model->orderBy('id', 'desc')->paginate($limit);
		return $data;
	}

	public function getAllForSite($limit = 10)
	{
		$data = $this->model->where('title->'.\App::getLocale(),'!=','')->orderBy('date', 'desc')->paginate($limit);
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

	public function getFindByIdSite($name)
	{
		$data = $this->model->where('name',$name)->where('title->'.\App::getLocale(),'!=','')->where('status',1)->first();
		if (!$data) {
			abort(404);
		}
		return $data;
	}

	public function create($request)
	{
		$data = $request->except('_token');
		if (isset($data['image'])) {
			$image = ImagesRepository::upload($data['image']);
			$data['image'] = $image;
		}
		if (isset($data['name'])) {
			$data['name'] = toAscii($data['name']);
		}else{
			$data['name'] = $this->generateName(toAscii($data['title']));
		}
		$model = new Page;
		return $model->fill($data)->save();		
	}

	public function update($request, $model)
	{
		$data = $request->except('_token');
		if (isset($data['image'])) {
			$image = ImagesRepository::upload($data['image']);
			$data['image'] = $image;
		}
		if (isset($data['name'])) {
			$data['name'] = toAscii($data['name']);
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

	public function generateName($name)
	{
		$page = Page::where('name', $name)->first();
		if ($page) {
			$name = $name.'2';
			return $this->generateName($name);
		}else{
			return $name;
		}
	}

}