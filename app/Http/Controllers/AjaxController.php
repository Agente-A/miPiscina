<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Piscina;

class AjaxController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $piscina = Piscina::where('id_piscina',$data['id'])->first();
        $mediciones = $piscina->mediciones();
        return view('Piscina.dataTable', compact('mediciones'));
    }
}
