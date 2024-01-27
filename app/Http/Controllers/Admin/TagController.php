<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TagsRepository;
use App\Tag;
use App\Validators\Validators;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $repo;

    public function __construct(TagsRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->repo->getAll(20);
        $data = [
            'model' => $model,
        ];

        return view('admin.tags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'statuses' => $this->repo->getStatuses(),
        ];

        return view('admin.tags.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = new Validators;
        $validator = $validator->tags($request);
        if ($validator->fails()) {
            return redirect()
                ->route('tags.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('tags.index');
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $model = $this->repo->getFindById($model);
        $data = [
            'model' => $model
        ];

        return view('admin.tags.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {

        $model = $this->repo->getFindById($model);

        $data = [
            'statuses'  => $this->repo->getStatuses(),
            'model'     => $model,
        ];

        return view('admin.tags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $model)
    {
        $model = $this->repo->getFindById($model);
        $validator = new Validators;
        $validator = $validator->tags_update($request);
        if ($validator->fails()) {
            return redirect()
                ->route('tags.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('tags.show', $model->id);
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $model)
    {
        $result = $this->repo->delete($model);
        if ($result) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('tags.index');
        } else {
            $request->session()->flash('error', 'Error!');
            return back();
        }
    }
}
