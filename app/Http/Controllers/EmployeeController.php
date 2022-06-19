<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeBulkImport;
use App\Imports\UsersImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    use Importable;

    // Upload XL File

   public function fileUpload(Request $request){

    if(!empty($request->file('excelFile'))){
        $bulkFile=$request->file('excelFile');
        Excel::import(new UsersImport, $request->file('excelFile')->store('temp'));
        return back();
    }

   }

   // Get All Employee Data 

   public function index(){
       $alldata=Employee::all();
       return view('welcome',compact('alldata'));
   }

   // Generate Report PDF
   public function generatePdf()
   { 
    $allData=Employee::all();
       $pdf = PDF::loadView('employeePDF',compact('allData'));
       return $pdf->stream();
   }
}
