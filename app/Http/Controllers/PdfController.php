<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
      $data = ['name' =>'revi'];
      $pdf = PDF::loadView('pdf', compact('data'));
      return $pdf->download('invoice.pdf');
    }
}
