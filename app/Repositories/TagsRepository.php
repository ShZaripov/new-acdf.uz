<?php

namespace App\Repositories;


use App\Models\Tag;

class TagsRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = new Tag();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

    public function getAllForSite($limit = 10)
    {
        $data = $this->model->where('title->' . \App::getLocale(), '!=', '')->orderBy('created_at', 'desc')->where('status', 1)->paginate($limit);
        return $data;
    }

    public function getFindByIdSite($id)
    {
        $data = $this->model->where('id', $id)->where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->first();
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function getFindByIdSiteName($name)
    {
        $data = $this->model->where('name', $name)->where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->first();
        if (!$data) {
            abort(404);
        }
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
        $data['created_by'] = $request->user()->id;
        $model = new Tag();
        return $model->fill($data)->save();
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');

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