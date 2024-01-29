<?php

namespace App\Exports;

use App\Form;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
class FormExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Form::all();
    // }

    public function view(): View
    {
        return view('admin.showMessage.exportExcel', [
            'showMessages' => Form::all()
        ]);
    }
}
