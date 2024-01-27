<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validators\Validators;
use App\Album;
use App\Image;

class ImageController extends Controller
{
    protected $repo;

    public function __construct(ImageRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.image.create', [
            'id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = new Validators;
        $validator = $validator->image($request);
        if ($validator->fails()) {
            return redirect()->route('image.create', 1)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.show', $request->get('albums_id'));
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model $model
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        return view('admin.albums.show', [
            'model' => $this->repo->getFindById($model)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model $model
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        $model = $this->repo->getFindById($model);
        if (isset($_GET['removeimage'])) {
            deleteImage($model->image);
            $model->image = '';
            $model->save();
            echo 'removed';
            exit;
        }

        return view('admin.albums.edit', [
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $model)
    {
        $model = $this->repo->getFindById($model);
        $validator = new Validators;
        $validator = $validator->image_update($request);
        if ($validator->fails()) {
            return redirect()->route('image.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.show', $model->albums_id);
            }
            $request->session()->flash('error', 'Error!');
            return back();
        }
    }

    /**
     * Post move
     *
     */
    public function move(Request $request, $id)
    {
        $model = $this->repo->getFindById($request->get('id'));
        $validator = new Validators;
        $validator = $validator->image_move($request);
        if ($validator->fails()) {
            return redirect()->route('albums.show', $id)
                ->withInput($request->input())
                ->withErrors($validator);
        }
        $res = $this->repo->update($request, $model);
        if ($res) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('albums.show', $id);
        }
        $request->session()->flash('error', 'Error!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $model)
    {
        $res = $this->repo->getFindById($model)->albums_id;
        if ($result = $this->repo->getFindById($model)->delete($model)) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('albums.show', $res);
        }
        $request->session()->flash('error', 'Error!');
        return back();
    }
}
