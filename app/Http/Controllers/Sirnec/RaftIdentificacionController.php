<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\models\Mes;
use App\models\Usuario;
use App\models\Estadisticaregistro;
use App\models\Log;
use App\models\Posgrabacion;
use DB;
use PDF;
use Auth;

class RaftIdentificacionController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('estadisticaregistros')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->select('oficinas.name', 'estadisticaregistros.*')
            ->where('oficina_id', $user->oficina_id)
            ->get();
        $meses = Mes::orderBy('id', 'asc')->pluck('name', 'id');

        // muestra el mensaje de sweetalert que viene del metodo que lo envia
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.registral.raftidentificacion.index', compact('data', 'user', 'meses'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $raft = new Estadisticaregistro();
            $raft->fechainic = $request->fechainic;
            $raft->fechafin = $request->fechafin;
            $raft->fechacreacion = $request->fechacreacion;
            $raft->mes_id = $request->mes_id;
            $raft->ano = $request->ano;
            $raft->departamento_id = auth()->user()->departamento_id;
            $raft->municipio_id = auth()->user()->municipio_id;
            $raft->oficina_id = $request->oficina_id;
            $raft->rcn_masculino = $request->rcn_masculino;
            $raft->rcn_femenino = $request->rcn_femenino;
            $raft->rcn_mayores = $request->rcn_mayores;
            $raft->rcn_menores = $request->rcn_menores;
            $raft->rcn_indigenas = $request->rcn_indigenas;
            $raft->rcn_afro = $request->rcn_afro;
            $raft->rcn_decreto290 = $request->rcn_decreto290;
            $raft->rcn_certificaciones = $request->rcn_certificaciones;
            $raft->rcn_rango_1_inic = $request->rcn_rango_1_inic;
            $raft->rcn_rango_1_fin = $request->rcn_rango_1_fin;
            $raft->rcn_rango_2_inic = $request->rcn_rango_2_inic;
            $raft->rcn_rango_2_fin = $request->rcn_rango_2_fin;
            $raft->rcn_rango_3_inic = $request->rcn_rango_3_inic;
            $raft->rcn_rango_3_fin = $request->rcn_rango_3_fin;
            $raft->rcn_rango_4_inic = $request->rcn_rango_4_inic;
            $raft->rcn_rango_4_fin = $request->rcn_rango_4_fin;
            $raft->rcn_rango_5_inic = $request->rcn_rango_5_inic;
            $raft->rcn_rango_5_fin = $request->rcn_rango_5_fin;
            $raft->rcn_malos = $request->rcn_malos;
            $raft->rcn_reg_malos = $request->rcn_reg_malos;
            $raft->rcm_inscritos = $request->rcm_inscritos;
            $raft->rcm_certificaciones = $request->rcm_certificaciones;
            $raft->rcm_rango_1_inic = $request->rcm_rango_1_inic;
            $raft->rcm_rango_1_fin = $request->rcm_rango_1_fin;
            $raft->rcm_rango_2_inic = $request->rcm_rango_2_inic;
            $raft->rcm_rango_2_fin = $request->rcm_rango_2_fin;
            $raft->rcm_rango_3_inic = $request->rcm_rango_3_inic;
            $raft->rcm_rango_3_fin = $request->rcm_rango_3_fin;
            $raft->rcm_malos = $request->rcm_malos;
            $raft->rcm_reg_malos = $request->rcm_reg_malos;
            $raft->rcd_masculino = $request->rcd_masculino;
            $raft->rcd_femenino = $request->rcd_femenino;
            $raft->rcd_mayores = $request->rcd_mayores;
            $raft->rcd_menores = $request->rcd_menores;
            $raft->rcd_indigenas = $request->rcd_indigenas;
            $raft->rcd_afro = $request->rcd_afro;
            $raft->rcd_certificaciones = $request->rcd_certificaciones;
            $raft->rcd_rango_1_inic = $request->rcd_rango_1_inic;
            $raft->rcd_rango_1_fin = $request->rcd_rango_1_fin;
            $raft->rcd_rango_2_inic = $request->rcd_rango_2_inic;
            $raft->rcd_rango_2_fin = $request->rcd_rango_2_fin;
            $raft->rcd_rango_3_inic = $request->rcd_rango_3_inic;
            $raft->rcd_rango_3_fin = $request->rcd_rango_3_fin;
            $raft->rcd_malos = $request->rcd_malos;
            $raft->rcd_reg_malos = $request->rcd_reg_malos;
            $raft->rcn1danado = $request->rcn1danado;
            $raft->rcn2danado = $request->rcn2danado;
            $raft->rcn3danado = $request->rcn3danado;
            $raft->rcn4danado = $request->rcn4danado;
            $raft->rcn5danado = $request->rcn5danado;
            $raft->rcn6danado = $request->rcn6danado;
            $raft->rcn7danado = $request->rcn7danado;
            $raft->rcn8danado = $request->rcn8danado;
            $raft->rcn9danado = $request->rcn9danado;
            $raft->rcn10danado = $request->rcn10danado;
            $raft->rcn11danado = $request->rcn11danado;
            $raft->rcm1danado = $request->rcm1danado;
            $raft->rcm2danado = $request->rcm2danado;
            $raft->rcm3danado = $request->rcm3danado;
            $raft->rcm4danado = $request->rcm4danado;
            $raft->rcm5danado = $request->rcm5danado;
            $raft->rcm6danado = $request->rcm6danado;
            $raft->rcm7danado = $request->rcm7danado;
            $raft->rcm8danado = $request->rcm8danado;
            $raft->rcm9danado = $request->rcm9danado;
            $raft->rcm10danado = $request->rcm10danado;
            $raft->rcm11danado = $request->rcm11danado;
            $raft->rcd1danado = $request->rcd1danado;
            $raft->rcd2danado = $request->rcd2danado;
            $raft->rcd3danado = $request->rcd3danado;
            $raft->rcd4danado = $request->rcd4danado;
            $raft->rcd5danado = $request->rcd5danado;
            $raft->rcd6danado = $request->rcd6danado;
            $raft->rcd7danado = $request->rcd7danado;
            $raft->rcd8danado = $request->rcd8danado;
            $raft->rcd9danado = $request->rcd9danado;
            $raft->rcd10danado = $request->rcd10danado;
            $raft->rcd11danado = $request->rcd11danado;

        $raft->save();

        if(!isset($request->totalnacimientos)){ $request->totalnacimientos = 0;}
        if(!isset($request->totaldefuncion)){ $request->totaldefuncion = 0;}

        $posgrabacion = new Posgrabacion();
            $posgrabacion->departamento_id = auth()->user()->departamento_id;
            $posgrabacion->municipio_id = $request->municipio_id;
            $posgrabacion->oficina_id = auth()->user()->oficina_id;
            $posgrabacion->mes_id = $request->mes_id;
            $posgrabacion->ano = $request->ano;
            $posgrabacion->feccreacion = Carbon::now()->format('Y-m-d');
            $posgrabacion->totalinscritosrcn = $request->totalnacimientos;
            $posgrabacion->totalinscritosrcm = $request->rcm_inscritos;
            $posgrabacion->totalinscritosrcd = $request->totaldefuncion;
            $posgrabacion->total_posgrabacion_rcn = 0;
            $posgrabacion->total_posgrabacion_rcm = 0;
            $posgrabacion->total_posgrabacion_rcd = 0;
            $posgrabacion->total_modificacion_rcn = 0;
            $posgrabacion->total_modificacion_rcm = 0;
            $posgrabacion->total_modificacion_rcd = 0;
            $posgrabacion->user_id = auth()->user()->id;
        $posgrabacion->save();

        //codigo del log de auditoria
        $log = new Log;
            $log->usuario_id = $request->user_id;
            $log->departamento_id = $request->user_departamento;
            $log->oficina_id = $request->user_oficina;
            $log->descripcion = 'Se ha creado el Raft 30 correspondiente al periodo entre '.$request->get('fechainic').' al '.$request->get('fechafin');
        $log->save();

        return redirect()->route('raft')->withSuccessMessage('Raft 29/30 Creado correctamente');
    }


    public function raft30($id)
    {
        //dd($id);
        $reporte = DB::table('estadisticaregistros')
            ->join('mes', 'estadisticaregistros.mes_id', '=', 'mes.id')
            ->join('departamentos', 'estadisticaregistros.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'estadisticaregistros.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->select('mes.name as mesnombre', 'estadisticaregistros.*', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.name as name', 'claseoficinas.name as clasoficinanombre', 'claseoficinas.id as clasoficina_id' )
            ->where('estadisticaregistros.id', $id)
            ->get();

        //dd($reporte);
        $pdf = PDF::loadView('sirnec.pdf.raft30', compact('reporte'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('RAFT-30.pdf');
    }

    public function raft29($id)
    {
        //dd($id);
        $reporte = DB::table('estadisticaregistros')
            ->join('mes', 'estadisticaregistros.mes_id', '=', 'mes.id')
            ->join('departamentos', 'estadisticaregistros.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'estadisticaregistros.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->select('mes.name as mesnombre', 'estadisticaregistros.*', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.name as name', 'claseoficinas.name as clasoficinanombre', 'claseoficinas.id as clasoficina_id' )
            ->where('estadisticaregistros.id', $id)
            ->get();

        //dd($reporte);
        $pdf = PDF::loadView('sirnec.pdf.raft29', compact('reporte'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('RAFT-29.pdf');
    }

    public function update30(Request $request)
    {
        //dd($request->all());
        //pregunta si viene archivo de la vista
        if($request->hasFile('file30')){
            $file = $request->file('file30');
            $pathfile = Storage::disk('public')->put('sirnec/raft30', $file);
           //actualiza el campo en la bd con el nombre del archivo
            $raft = Estadisticaregistro::find($request->identificador);
                $raft->raft30 = $pathfile;
            $raft->save();
            // /*codigo del log de auditoria*/
            $log = new Log; $log->usuario_id = $request->user_id; $log->departamento_id = $request->user_departamento; $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Ha Cargado el Raft 30 con nombre '.$pathfile;
            $log->save();
            return redirect()->route('raft')->withSuccessMessage('Se Ha Cargado el Archivo Satisfactoriamente');
        }

    }

    public function update29(Request $request)
    {
        //dd(intval($id)); //convierte a int un string
        //dd($request->all());
        //pregunta si viene archivo de la vista
        if($request->hasFile('file29')){
            $file = $request->file('file29');
            $pathfile = Storage::disk('public')->put('sirnec/raft29', $file);
           //actualiza el campo en la bd con el nombre del archivo
            $raft = Estadisticaregistro::find($request->identificador);
                $raft->raft29 = $pathfile;
            $raft->save();

            // /*codigo del log de auditoria*/
            $log = new Log; $log->usuario_id = $request->user_id; $log->departamento_id = $request->user_departamento; $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Ha Cargado el Raft 29 con nombre '.$pathfile;
            $log->save();
            return redirect()->route('raft')->withSuccessMessage('Se Ha Cargado el Archivo Satisfactoriamente');
        }




    }



}
