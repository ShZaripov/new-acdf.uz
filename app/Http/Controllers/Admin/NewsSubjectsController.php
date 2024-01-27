<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsSubjectsRepository;
use App\Validators\Validators;

class NewsSubjectsController extends Controller
{

	protected $repo;
	public function __construct(NewsSubjectsRepository $repo)
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

      return view('admin.news-subjects.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $data = [
      ];

      return view('admin.news-subjects.create', $data);
      
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
      $validator = $validator->newssubjects($request);
      if ($validator->fails()) {
          return redirect()->route('news-subjects.create')
              ->withInput($request->input())
              ->withErrors($validator);
      }else{
          $res = $this->repo->create($request);
          if ($res) {
              $request->session()->flash('success', 'Success!');
              return redirect()->route('news-subjects.index');
          }else{
              $request->session()->flash('error', 'Error!');
              return back();
          }
      }
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
      $data = [
        'model' => $model,
      ];

      return view('admin.news-subjects.edit', $data);
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
      $validator = $validator->newssubjects($request);
      if ($validator->fails()) {
          return redirect()->route('news-subjects.edit', $model->id)
              ->withInput($request->input())
              ->withErrors($validator);
      }else{
          $res = $this->repo->update($request, $model);
          if ($res) {
              $request->session()->flash('success', 'Success!');
              return redirect()->route('news-subjects.index');
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
          return redirect()->route('news-subjects.index');            
      }else{
          $request->session()->flash('error', 'Error!');
          return back();            
      }
  }

}