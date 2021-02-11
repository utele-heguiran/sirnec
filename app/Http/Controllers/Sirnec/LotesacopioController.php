<?php

namespace App\Http\Controllers\sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Lote;
use App\models\Materialanulado;
use App\models\Materialfaltante;
use App\models\Oficina;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class LotesacopioController extends Controller
{
    public function index()
    {
        //dd(auth()->user()->departamento_id);
        $data = DB::table('lotes')
           ->join('oficinas', 'lotes.oficina_id', '=', 'oficinas.id')
           ->select('lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
           ->get()->where('departamento_id', '=', auth()->user()->departamento_id);
        $oficinas = Oficina::where('departamento_id', auth()->user()->departamento_id)->where('claseoficina_id', '!=', 6)->where('claseoficina_id', '!=', 1)->orderBy('name', 'asc')->pluck('name', 'id');
        //dd($data);
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.lotes.index', compact('data', 'oficinas'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //dd($request->all());
        if(!isset($request->cantfaltantes)){$cantfaltantes = 0;}else{ $cantfaltantes = $request->cantfaltantes;}
        if(!isset($request->cantanulados)){$cantanulados = 0;}else{ $cantanulados = $request->cantanulados;}
        $fechacreacion = $request->fecenvlote;
        $fechareciboacopio = $request->fecrecacopio;
        $cantdiastrasporte = Carbon::parse($fechareciboacopio)->DiffInDays($fechacreacion);
        $lote = new Lote();
            $lote->departamento_id = auth()->user()->departamento_id;
            $lote->oficina_id = $request->oficina_id;
            $lote->numlote = $request->numlote;
            $lote->feccrealote = $request->feccrealote;
            $lote->fecenvlote = $request->fecenvlote;
            $lote->fecrecacopio  = $request->fecrecacopio;
            $lote->cantfaltantes  = $cantfaltantes;
            $lote->cantanulados  = $cantanulados;
            $lote->cantdiastrasporte = $cantdiastrasporte;
            $lote->cantdecasrecibidas = $request->cantdecasrecibidas;
            $lote->numoficenvio = $request->numoficenvio;
            $lote->novedad = $request->novedad;
            $lote->user_id = auth()->user()->id;
        $lote->save();

        $ultimoregistro = Lote::latest('id')->first();
        //dd($ultimoregistro->id); //ultimo registro de la tabla lotes

        if(isset($request->numpreparacionanulados)){
            $registros = count($request->numpreparacionanulados);
            for ($i = 0; $i < $registros; $i++) {
                $anulados = new Materialanulado();
                    $anulados->lote_id = $ultimoregistro->id;
                    $anulados->departamento_id = auth()->user()->departamento_id;
                    $anulados->oficina_id = $request->oficina_id;
                    $anulados->numlote = $request->numlote;
                    $anulados->feccrealote = $request->feccrealote;
                    $anulados->numpreparacion = $request->numpreparacionanulados[$i];
                    $anulados->numoficenvio = $request->numoficenvio;
                    $anulados->claseformatos_id = $request->claseformatosanulados[$i];
                    $anulados->estado_id = 1;
                    $anulados->user_id = auth()->user()->id;
                $anulados->save();
            }
        }
        if(isset($request->numpreparacionfaltantes)){
            $registros = count($request->numpreparacionfaltantes);
            for ($i = 0; $i < $registros; $i++) {
                $faltantes = new Materialfaltante();
                    $faltantes->lote_id = $ultimoregistro->id;
                    $faltantes->departamento_id = auth()->user()->departamento_id;
                    $faltantes->oficina_id = $request->oficina_id;
                    $faltantes->numlote = $request->numlote;
                    $faltantes->feccrealote = $request->feccrealote;
                    $faltantes->numoficenvio = $request->numoficenvio;
                    $faltantes->numpreparacion = $request->numpreparacionfaltantes[$i];
                    $faltantes->claseformatos_id = $request->claseformatosfaltantes[$i];
                    $faltantes->estado_id = 1;
                    $faltantes->user_id = auth()->user()->id;
                $faltantes->save();
            }
        }
        //codigo del log de auditoria
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado un lote con '.$cantfaltantes.' Faltantes y '.$cantanulados.' Anulados' ;
        $log->save();
        return redirect()->route('lotesacopio')->withSuccessMessage('Lote Generado Correctamente');


    }

    public function raft04pdf(Request $request)
    {
        //dd($request->all());
        $lote = DB::table('lotes')
           ->join('oficinas', 'lotes.oficina_id', '=', 'oficinas.id')
           ->select('lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
           ->where('lotes.departamento_id', '=', auth()->user()->departamento_id)
           ->whereBetween('feccrealote',array($request->input('fechainicial'),$request->input('fechafinal')))
           ->orderBy('feccrealote', 'asc')
           ->get();
        $pdf = PDF::loadView('sirnec.pdf.raft04', compact('lote'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-04.pdf');
        return redirect('lotesacopio');
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
