<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Pdf;

class TestController extends Controller
{
    public function index()
    {

        return view('test.print')->with(
            ['title' => 'test']
        );
    }

    public function download(){
        $data = ['dfsg'];
        $pdf = Pdf::loadView('test.print', $data);
        return $pdf->setPaper('a9')->download('invoice.pdf');

         // Pdf::loadHTML($data)->setPaper('a4', 'potrait')->setWarnings(false)->save('test.pdf');
    }
}