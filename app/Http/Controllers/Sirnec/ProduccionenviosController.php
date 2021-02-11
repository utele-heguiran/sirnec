<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Produccionenvio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;


class ProduccionenviosController extends Controller
{
    public function index()
    {
        $data = DB::table('produccionenvios')
            ->join('departamentos', 'produccionenvios.departamento_id', '=', 'departamentos.id')
            ->select('produccionenvios.*', 'departamentos.name as nombredepartamento')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->get();
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.produccionenvios.index' , compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $produccionenvio = new Produccionenvio();
            $produccionenvio->departamento_id = auth()->user()->departamento_id;
            $produccionenvio->oficina_id = auth()->user()->oficina_id;
            $produccionenvio->fechinicial =  $request->fechinicial;
            $produccionenvio->fechfinal =  $request->fechfinal;
            $produccionenvio->feccreacion = Carbon::now()->format('Y-m-d');
            $produccionenvio->sts =  $request->sts;
            $produccionenvio->ts =  $request->ts;
            $produccionenvio->escaneo_pvc =  $request->escaneo_pvc;
            $produccionenvio->escaneo_renovc =  $request->escaneo_renovc;
            $produccionenvio->escaneo_rectc =  $request->escaneo_rectc;
            $produccionenvio->escaneo_dupc =  $request->escaneo_dupc;
            $produccionenvio->escaneo_pvt =  $request->escaneo_pvt;
            $produccionenvio->escaneo_renovt  =  $request->escaneo_renovt;
            $produccionenvio->escaneo_rectt =  $request->escaneo_rectt;
            $produccionenvio->escaneo_dupt =  $request->escaneo_dupt;
            $produccionenvio->escaneo_noprocesado =  $request->escaneo_noprocesado;
            $produccionenvio->escaneo_total =  $request->escaneo_total;
            $produccionenvio->comprobado_pvc =  $request->comprobado_pvc;
            $produccionenvio->comprobado_renovc =  $request->comprobado_renovc;
            $produccionenvio->comprobado_rectc =  $request->comprobado_rectc;
            $produccionenvio->comprobado_dupc =  $request->comprobado_dupc;
            $produccionenvio->comprobado_pvt =  $request->comprobado_pvt;
            $produccionenvio->comprobado_renovt =  $request->comprobado_renovt;
            $produccionenvio->comprobado_rectt =  $request->comprobado_rectt;
            $produccionenvio->comprobado_dupt =  $request->comprobado_dupt;
            $produccionenvio->comprobado_noprocesado =  $request->comprobado_noprocesado;
            $produccionenvio->comprobado_total =  $request->comprobado_total;
        $produccionenvio->save();

        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado la produccion y envio desde el  '.$request->fechinicial.' hasta el dia '.$request->fechfinal;
        $log->save();
        return redirect()->route('produccion_envios')->withSuccessMessage('Producion del dia '.$request->fechinicial.' hasta el dia '.$request->fechfinal.' Creada correctamente');
    }

    public function raft10pdf(Request $request)
    {
        $data = DB::table('produccionenvios')
            ->where('departamento_id', '=', auth()->user()->departamento_id)
            ->whereBetween('fechinicial',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('feccreacion', 'asc')
            ->get();

        $pdf = PDF::loadView('sirnec.pdf.raft10', compact('data'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-10.pdf');
        return redirect('produccion_envios');
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
