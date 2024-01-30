<?php

namespace App\Http\Controllers;
use App\Form;
// use App\Models\ContactRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMessageController extends Controller
{
    public function index(){
        $showMessages = DB::table('form')->orderBy("id", "DESC")->paginate(15);
        // $showMessages = DB::table("form")->orderBy("id", "DESC")->get();
        return view("showMessage.index", compact(["showMessages"]));
    }

    public function show(){
        
    }

    public function edit(){
        
    }
    public function delete(){
        DB::delete('showMessage', ['id']);
    }

}
