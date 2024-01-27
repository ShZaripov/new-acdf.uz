<?php

namespace App\Http\Controllers;

use App\Repositories\MainRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $repo;

    public function __construct(MainRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'programs' => $this->repo->getPrograms(6),
            'news' => $this->repo->getNews(5),
            'banners' => $this->repo->getBanners(),
        ];

        // if (\Auth::check()) {
        //   return view('main.index', $data);
        // }else{
        //   return view('main.block');
        // }
        return view('main.index', $data);
    }

    public function search(Request $request)
    {
        if ($request->q) {
            $data = $this->repo->search($request->q);
            return view('main.search', $data);
        }
        return redirect()->route('site.index');
    }

    public function contacts()
    {
        $data = [
            'contacts'  => $this->repo->getContacts(),
            'model'     => $this->repo->getContactList()
        ];
        return view('main.contacts', $data);
    }

    public function subscriber(Request $request)
    {
        $validator = new Validators;
        $validator = $validator->subscriber($request);
//        dd($request);
        if ($validator->fails()) {
            return redirect()->route('home')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->subscriber_create($request);
            if ($res) {
                return redirect()->route('home');
            } else {
                $request->session()->flash('error', __('main.subscriber_error'));
                return back();
            }
        }
    }

    public function block()
    {
        return view('main.block');
    }

    public function vacancies()
    {
        $model = $this->repo->getVacancies();
        $data  = [
            'model' => $model,
        ];
        return view('main.vacancies', $data);
    }

    public function contactSubmit(Request $request)
    {
       

        $validator = new Validators();
        $validator2 = $validator->contact_submit($request);
        //   dd($validator2->errors());
        if (count($validator2->errors()) > 0) {
            $request->session()->flash('error', 'Error!');
            return redirect()->route('site.contacts')
                ->withInput($request->input())
                ->withErrors($validator2);
        } else {
            $res = $this->repo->createContactRequest($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('site.contacts');
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }
}