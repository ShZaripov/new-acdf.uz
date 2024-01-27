<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Validators\Validators;

class UsersController extends Controller
{

    protected $repo;
    public function __construct(UsersRepository $repo)
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
        $users = $this->repo->getAll(20);
        $data = [
            'users' => $users,
        ];

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
          'roles' => $this->repo->getRolesList()
        ];

        return view('admin.users.create', $data);
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
        $validator = $validator->users($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('users.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else{
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('users.index');
            }else{
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = $this->repo->getFindById($user);
        $data = [
            'user' => $user,
        ];

        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = $this->repo->getFindById($user);
        $data = [
            'user' => $user,
            'roles' => $this->repo->getRolesList()
        ];

        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user = $this->repo->getFindById($user);
        $validator = new Validators;
        $validator = $validator->users_update($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('users.edit', $user->id)
                ->withInput($request->input())
                ->withErrors($validator);
        }else{
            $res = $this->repo->update($request, $user);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('users.show', $user->id);
            }else{
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $user)
    {
        $user = $this->repo->getFindById($user);
        $result = $user->delete();
        if ($result) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('users.index');            
        }else{
            $request->session()->flash('error', 'Error!');
            return back();            
        }
    }
}
