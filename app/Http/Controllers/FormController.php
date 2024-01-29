<?php

namespace App\Http\Controllers;
use App\Form;
use App\Exports\FormExport;
use Maatwebsite\Excel\Facades\Excel;
// use App\Form as AppForm;
// use App\Models\Form;
use App\Repositories\MainRepository;
use App\Validators\Validators;
use Dotenv\Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    protected $repo;

    public function __construct(MainRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.form');
    }


 
        // dd($request);

        // $validator = new Validators();
        // $validator2 = $validator->contact_form($request);
        // if (count($validator2->errors()) > 0) {
        //     $request->session()->flash('error', 'Error!');
        //     return redirect()->route('form.index')
        //         ->withInput($request->input())
        //         ->withErrors($validator2);
        // } else {
        //     $res = $this->repo->createContactRequest($request);
        //     if ($res) {
        //         $request->session()->flash('success', 'Success!');
        //         return redirect()->route('form.index');
        //     } else {
        //         $request->session()->flash('error', 'Error!');
        //         return back();
        //     }
        // }
    

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'form'  => $this->repo->getForm(),
            'model'     => $this->repo->getFormList()
        ];

        return view('form.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function exportExcel() {
        return Excel::download(new FormExport, 'form.xlsx');
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $validator = new Validators();
        $validator2 = $validator->contact_form($request);
        // dd($validator2->errors());
        if (count($validator2->errors()) > 0) {
            $request->session()->flash('error', 'Error!');
            return redirect()->route('form.index')
                ->withInput($request->input())
                ->withErrors($validator2);
        } else {
            $res = $this->repo->createFormRequest($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('form.index');
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
