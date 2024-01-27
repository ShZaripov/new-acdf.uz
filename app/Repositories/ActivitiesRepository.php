<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Components\Filter;
use App\Models\Program;

class ActivitiesRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = new Activity();
    }

    public function getPrograms($limit = 3)
    {
        $programs = Program::where('title->'.\App::getLocale(),'!=','')->where('status',1)->orderBy('id', 'DESC')->limit($limit)->get();
        return $programs;
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
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }
        $data['created_by'] = $request->user()->id;
        $model = new Activity();
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