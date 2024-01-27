<?php

namespace App\Http\Controllers;

use App\Repositories\PublicationsRepository;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{

    protected $repo;
    public function __construct(PublicationsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
          'model' => $this->repo->getAllForSite(20),
        ];

        return view('publications.index', $data);
    }

    public function show($model)
    {
        $data = [
          'model' => $this->repo->getFindByIdSite($model)
        ];
        return view('publications.show', $data);
    }

}
