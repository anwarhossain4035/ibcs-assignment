<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeBulkImport;
use App\Imports\UsersImport;
use App\Models\Employee;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Facades\Excel;
// use Meneses\LaravelMpdf\Facades\LaravelMpdf as MPDF;
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

   public function employeeList(){
       $inTime='10:00';
       $employeeList=Employee::orderBy('id', 'DESC')->get();
       return view('welcome',compact('employeeList','inTime'));
   }

   // Generate Report PDF
   public function generatePdf()
   { 
    $allData=Employee::all();
    // $mpdf = new \Mpdf\Mpdf([
    //     'default_font' => 'ayar',
    //     'mode' => 'utf-8',
    //     'tempDir' => storage_path('temp')
    // ]);
    // $mpdf->allow_charset_conversion = true;
    // $mpdf->autoScriptToLang = true;
    // $mpdf->autoLangToFont = true;
    // $mpdf->WriteHTML($allData);
    // $mpdf->Output();
    $inTime='10:00';
    $employeeList=Employee::all();
       $pdf = PDF::loadView('employeePDF',compact('employeeList','inTime'));
  
       return $pdf->stream();
   }
}
