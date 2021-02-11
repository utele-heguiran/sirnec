<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Oficina;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LotesregistralesController extends Controller
{
    public function index()
    {
        $data = DB::table('lotes')
           ->join('oficinas', 'lotes.oficina_id', '=', 'oficinas.id')
           ->select('lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
           ->get()->where('oficina_id', '=', auth()->user()->oficina_id); 
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.registral.lotes.index', compact('data'));  
    }

    public function raft05pdf(Request $request)
    {   
        $lote = DB::table('lotes')
           ->join('oficinas', 'lotes.oficina_id', '=', 'oficinas.id')
           ->select('lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
           ->where('oficina_id', '=', auth()->user()->oficina_id)
           ->whereBetween('feccrealote',array($request->input('fechainicial'),$request->input('fechafinal')))
           ->orderBy('feccrealote', 'asc')
           ->get(); 

        $pdf = PDF::loadView('sirnec.pdf.raft05', compact('lote'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-05.pdf');
        return redirect('lotesregistrales'); 
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
