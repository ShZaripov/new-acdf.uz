<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeesRepository;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    protected $repo;
    public function __construct(EmployeesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
          'model' => $this->repo->getAllForSite(25),
        ];

        return view('employees.index', $data);
    }

}
