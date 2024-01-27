<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AlbumsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validators\Validators;
use App\Album;

class AlbumsController extends Controller
{
    protected $repo;

    public function __construct(AlbumsRepository $repo)
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
        return view('admin.albums.index', [
            'model' => $model,
        ]);
    }




//    public function getList()
//    {
//        $albums = Album::with('Photos')->get();
//        return view('index')->with('albums.albums',$albums);
//    }

//    public function getAlbum($id)
//    {
//        $album = Album::with('Photos')->find($id);
//        $albums = Album::with('Photos')->get();
//        //dd($album);
//        return view('album', ['album'=>$album, 'albums'=>$albums]);
//        //->with('album',$album);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create', [
            'statuses'      => $this->repo->getStatuses(),
            'visibleList'   => $this->repo->getVisibleList(),
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
        $validator = $validator->albums($request);
        if ($validator->fails()) {
            return redirect()->route('albums.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.index');
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
        $model = $this->repo->getFindById($model);
        return view('admin.albums.show', [
            'model'  => $model,
            'albums' => $this->repo->getAlbumList(),
            'photos' => $this->repo->getAlbumImages($model->id),
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
            'statuses'      => $this->repo->getStatuses(),
            'model'         => $model,
            'visibleList'   => $this->repo->getVisibleList(),
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
        $validator = $validator->albums_update($request);
        if ($validator->fails()) {
            return redirect()->route('albums.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.show', $model->id);
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $model)
    {
        $result = $this->repo->delete($model);
        if ($result) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('albums.index');
        }
        $request->session()->flash('error', 'Error!');
        return back();
    }
}
