<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\category;
use App\Models\category_item;

class PDFcontroller extends Controller
{
    //
    public function print_pdf_category($id){
        $data = category::find($id);
        $data1 = category_item::where('category_id',$id)->get();
        // dd($data1);
        // dd($data);
        // return view('Layout/Store_dashboard', compact('data'));
        // $data = 'This is PDF test';
        // $data = ['title' => 'Welcome to Laravel PDF generation!'];
        $pdf =PDF::loadView('PDF/pdf_view',['data'=> $data1,'category_name'=>$data]); 

        // for downloading the pdf 
        // return $pdf->download('laravel_pdf.pdf');

        // for showing the pdf and the  
        return $pdf->stream('Category.pdf');
    }

}
