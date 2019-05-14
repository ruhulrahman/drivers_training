<?php

namespace App\Http\Controllers;

use PDF;
use Barryvdh\DomPDF\loadView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function export_pdf(){
    	$data = ['name' => 'Ruhul'];
    	// $file = view('index_page_content');
     //    $file = view('index', compact('file'));
  		$pdf = App::make('dompdf.wrapper');
		$pdf = PDF::loadView('invoice', compact('data'));
		return $pdf->stream('invoice.pdf');
    }
}
