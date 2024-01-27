<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PublicationsRepository;
use App\Validators\Validators;

class PublicationsController extends Controller
{

	protected $repo;
	public function __construct(PublicationsRepository $repo)
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

      return view('admin.publications.index', $data);
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

      return view('admin.publications.create', $data);
      
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
      $validator = $validator->publications($request);
      if ($validator->fails()) {
          return redirect()->route('publications.create')
              ->withInput($request->input())
              ->withErrors($validator);
      }else{
          $res = $this->repo->create($request);
          if ($res) {
              $request->session()->flash('success', 'Success!');
              return redirect()->route('publications.index');
          }else{
              $request->session()->flash('error', 'Error!');
              return back();
          }
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Model  $model
   * @return \Illuminate\Http\Response
   */
  public function show($model)
  {
  		$model = $this->repo->getFindById($model);
      $data = [
          'model' => $model
      ];

      return view('admin.publications.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Model  $model
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

      $data = [
        'statuses' => $this->repo->getStatuses(),
        'model' => $model,
      ];

      return view('admin.publications.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Model  $model
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $model)
  {
  		$model = $this->repo->getFindById($model);
      $validator = new Validators;
      $validator = $validator->publications_update($request);
      if ($validator->fails()) {
          return redirect()->route('publications.edit', $model->id)
              ->withInput($request->input())
              ->withErrors($validator);
      }else{
          $res = $this->repo->update($request, $model);
          if ($res) {
              $request->session()->flash('success', 'Success!');
              return redirect()->route('publications.show', $model->id);
          }else{
              $request->session()->flash('error', 'Error!');
              return back();
          }
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model  $model
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $model)
  {
  		$result = $this->repo->delete($model);
      if ($result) {
          $request->session()->flash('success', 'Success!');
          return redirect()->route('publications.index');            
      }else{
          $request->session()->flash('error', 'Error!');
          return back();            
      }
  }

}