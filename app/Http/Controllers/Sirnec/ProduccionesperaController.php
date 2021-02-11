<?php

namespace App\Http\Controllers\sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Produccionespera;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ProduccionesperaController extends Controller
{
    public function index()
    {
        $data = DB::table('produccionespera')
            ->join('departamentos', 'produccionespera.departamento_id', '=', 'departamentos.id')
            ->select('produccionespera.*', 'departamentos.name as nombredepartamento')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->get();

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.produccionespera.index' , compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $produccionespera = new Produccionespera();
            $produccionespera->departamento_id = auth()->user()->departamento_id;
            $produccionespera->oficina_id = auth()->user()->oficina_id;
            $produccionespera->fechinicial =  $request->fechinicial;
            $produccionespera->fechfinal =  $request->fechfinal;
            $produccionespera->feccreacion = Carbon::now()->format('Y-m-d');
            $produccionespera->matsinrecepcionarcomprob =  $request->matsinrecepcionarcomprob;
            $produccionespera->matsinrecepcionarescaneo =  $request->matsinrecepcionarescaneo;
            $produccionespera->escaneo_pvc =  $request->escaneo_pvc;
            $produccionespera->escaneo_renovc =  $request->escaneo_renovc;
            $produccionespera->escaneo_rectc =  $request->escaneo_rectc;
            $produccionespera->escaneo_dupc =  $request->escaneo_dupc;
            $produccionespera->escaneo_pvt =  $request->escaneo_pvt;
            $produccionespera->escaneo_renovt  =  $request->escaneo_renovt;
            $produccionespera->escaneo_rectt =  $request->escaneo_rectt;
            $produccionespera->escaneo_dupt =  $request->escaneo_dupt;
            $produccionespera->escaneo_noprocesado =  $request->escaneo_noprocesado;
            $produccionespera->escaneo_total =  $request->escaneo_total;
            $produccionespera->comprobado_pvc =  $request->comprobado_pvc;
            $produccionespera->comprobado_renovc =  $request->comprobado_renovc;
            $produccionespera->comprobado_rectc =  $request->comprobado_rectc;
            $produccionespera->comprobado_dupc =  $request->comprobado_dupc;
            $produccionespera->comprobado_pvt =  $request->comprobado_pvt;
            $produccionespera->comprobado_renovt =  $request->comprobado_renovt;
            $produccionespera->comprobado_rectt =  $request->comprobado_rectt;
            $produccionespera->comprobado_dupt =  $request->comprobado_dupt;
            $produccionespera->comprobado_noprocesado =  $request->comprobado_noprocesado;
            $produccionespera->comprobado_total =  $request->comprobado_total;
        $produccionespera->save();

        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado la produccion en espera desde el  '.$request->fechinicial.' hasta el dia '.$request->fechfinal;
        $log->save();
        return redirect()->route('produccion_espera')->withSuccessMessage('Producion en espera del dia '.$request->fechinicial.' hasta el dia '.$request->fechfinal.' Creada correctamente');
    }

    public function raft11pdf(Request $request)
    {
        $data = DB::table('produccionespera')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->whereBetween('fechinicial',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('feccreacion', 'asc')
            ->get();

        $pdf = PDF::loadView('sirnec.pdf.raft11', compact('data'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-11.pdf');
        return redirect('produccion_espera');
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
