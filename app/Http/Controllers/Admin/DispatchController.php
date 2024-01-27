<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DispatchRepository;
use App\Validators\Validators;

class DispatchController extends Controller
{

  protected $repo;
  public function __construct(DispatchRepository $repo)
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
    $data = [
      'subscribers' => $this->repo->getSubscribersCount(),
    ];

    return view('admin.dispatch.index', $data);
  }

  public function send(Request $request)
  {
    $validator = new Validators;
    $validator = $validator->dispatch($request);
    if ($validator->fails()) {
        return redirect()->route('dispatch')
            ->withInput($request->input())
            ->withErrors($validator);
    }else{
        $res = $this->repo->send($request);
        if ($res) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('dispatch');
        }else{
            $request->session()->flash('error', 'Error!');
            return back();
        }
    }
  }

  public function subscribers()
  {
    $data = [
      'subscribers' => $this->repo->getListSubscribers(50),
    ];
    
    return view('admin.dispatch.subscribers', $data);
  }

}