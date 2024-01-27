<?php 

namespace App\Repositories;

use App\Models\SocialNetwork;
use App\Repositories\ImagesRepository;

class SocialNetworksRepository{

	protected $model;
	public function __construct()
  {
  		$this->model = new SocialNetwork;
  }

	public function getAll()
	{
		$data = $this->model->orderBy('id', 'desc')->get();
		return $data;
	}

	public static function getAllForSite()
	{
		$data = SocialNetwork::orderBy('id', 'desc')->get();
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
//		if (isset($data['icon'])) {
//			$icon = $this->fileUpload($data['icon']);
//			$data['icon'] = $icon;
//		}
		$model = $this->model;
		return $model->fill($data)->save();		
	}

	public function update($request, $model)
	{
		$data = $request->except('_token');
//		if (isset($data['icon'])) {
//			$icon = $this->fileUpload($data['icon']);
//			$data['icon'] = $icon;
//		}
		return $model->fill($data)->update();	
	}

	public function delete($model)
	{
		$model = $this->getFindById($model);
		return $model->delete();
	}

  public function fileUpload($file)
  {
    $fileName = time().'-'.randomString().'.'.$file->getClientOriginalExtension();
    $path = $file->storeAs(
    	'public', $fileName
    );
    return $fileName;
  }

}