<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Posgrabacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;


class PosgrabacionController extends Controller
{
    public function index()
    {
        $data = DB::table('posgrabaciones')
            ->join('oficinas', 'posgrabaciones.oficina_id', '=', 'oficinas.id')
            ->join('mes', 'posgrabaciones.mes_id', '=', 'mes.id')
            ->select('posgrabaciones.*', 'oficinas.name as nombreoficina', 'mes.name as mescargue')
            ->where('posgrabaciones.municipio_id', auth()->user()->municipio_id)
            ->get();
        //dd($data);
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.registral.posgrabaciones.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $total_rcn = $request->total_posgrabacion_rcn + $request->pos_regis_rcn ;
        $total_rcm = $request->total_posgrabacion_rcm + $request->pos_regis_rcm ;
        $total_rcd = $request->total_posgrabacion_rcd + $request->pos_regis_rcd ;

        $totalmodificaciones_rcn = $request->total_modificacion_rcn + $request->pos_modif_rcn ;
        $totalmodificaciones_rcm = $request->total_modificacion_rcm + $request->pos_modif_rcm ;
        $totalmodificaciones_rcd = $request->total_modificacion_rcd + $request->pos_modif_rcd ;

        $registro = Posgrabacion::find($request->id);

            $registro->total_posgrabacion_rcn = $total_rcn;
            $registro->total_posgrabacion_rcm = $total_rcm;
            $registro->total_posgrabacion_rcd = $total_rcd;
            $registro->total_modificacion_rcn = $totalmodificaciones_rcn;
            $registro->total_modificacion_rcm = $totalmodificaciones_rcm;
            $registro->total_modificacion_rcd = $totalmodificaciones_rcd;

        $registro->save();

        //codigo del log de auditoria
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha modificado la posgrabacion con el id No.  '.$request->id;
        $log->save();
        return redirect()->route('posgrabacion')->withSuccessMessage('Posgrabacion Creada Satisfactoriamente ');
    }

    public function reporteposgrabacionespdf(Request $request)
    {
        //dd($request->all());
        $fechainicial = $request->fechainicial;
        $fechafinal = $request->fechafinal;
        $data = DB::table('posgrabaciones')
            ->join('oficinas', 'posgrabaciones.oficina_id', '=', 'oficinas.id')
            ->join('mes', 'posgrabaciones.mes_id', '=', 'mes.id')
            ->select('posgrabaciones.*', 'oficinas.name as nombreoficina', 'mes.name as mescargue')
            ->where('posgrabaciones.municipio_id', auth()->user()->municipio_id)
            ->whereBetween('feccreacion',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('feccreacion', 'asc')
            ->get();
        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select('usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
            ->get();

        $date = Carbon::now()->locale('es')->isoFormat('LL');
        $pdf = PDF::loadView('sirnec.pdf.reporteposgrabacion', compact('data', 'user', 'fechainicial', 'fechafinal', 'date'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('reporteposgrabacion.pdf');
        return redirect('posgrabacion');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        //
    }






}
