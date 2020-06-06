<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\SalarySheet;
class WpsSheetExports implements FromView 
{
    var $sheet_id;
    public function __construct($id)
    {
        $this->sheet_id = $id;
    }
    public function view(): View
    {
        $salary_sheet = SalarySheet::find($this->sheet_id);
        return view('admin.exports.wps',['salary_sheet'=>$salary_sheet]);
    }
}