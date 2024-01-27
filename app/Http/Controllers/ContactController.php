<?php

namespace App\Http\Controllers;

// use App\Models\Contacts;

use App\Models\Contacts;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request){
        
        $validator = Validator::make($request->all(), $this->rules());
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);

        $contact = new Contacts();
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->message = $request->message;
       
        $contact->save();
       

        return Redirect::back()->with('success', 'Ma\'lumotlar jo\'natildi. Tez orada siz bilan bog\'lanamiz.');
         
        
       


    }

        }


        public function rules()
        {
            return [
                'name' => 'required',
                // 'number' => 'required',
                // 'message' => 'required',
            ];
        }


        public function showMessages()
        {
            $messages = Contacts::query()->get();
            return view('admin.show_messages', ['messages' => $messages]);
        }


   

    



    public function store(Request $request)
    {
        
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
