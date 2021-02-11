<?php

namespace App\Http\Controllers\sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Reproceso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class BitacoraacopioController extends Controller
{
    public function index()
    {
        $data = DB::table('reprocesos')
            ->join('departamentos', 'reprocesos.departamento_id', '=', 'departamentos.id')
            ->select('reprocesos.*', 'departamentos.name as nombredepartamento')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->where('estado_id', '=', 2)
            ->get();
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.bitacoras.index', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $reproceso = new Reproceso();
            $reproceso->departamento_id = auth()->user()->departamento_id;
            $reproceso->oficina_id = auth()->user()->oficina_id;
            $reproceso->feccreacion = Carbon::now()->format('Y-m-d');
            $reproceso->factor = $request->factor;
            $reproceso->observaciones = $request->observaciones;
            $reproceso->estado_id = 2;
            $reproceso->user_id = auth()->user()->id;
        $reproceso->save();
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado una anotacion a la bitacora del centro de acopio';
        $log->save();
        return redirect()->route('bitacora')->withSuccessMessage('Bitacora Creada correctamente');
    }

    public function raft42pdf(Request $request)
    {
        $data = DB::table('reprocesos')
            ->join('departamentos', 'reprocesos.departamento_id', '=', 'departamentos.id')
            ->select('reprocesos.*', 'departamentos.name as nombredepartamento')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->where('estado_id', '=', 2)
            ->whereBetween('feccreacion',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('feccreacion', 'asc')
            ->get();

        $pdf = PDF::loadView('sirnec.pdf.raft42', compact('data'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-42.pdf');
        return redirect('bitacora');
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
