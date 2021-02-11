<?php

namespace App\Http\Controllers\sirnec;

use RealRashid\SweetAlert\Facades\Alert;
use App\models\Usuario;
use App\models\Devolucion;
use Carbon\Carbon;
use App\models\Log;
use DB;
use RealRashid\SweetAlert\Storage\AlertSessionStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('devoluciones')
            ->join('oficinas', 'devoluciones.oficina_id', '=', 'oficinas.id')
            ->join('municipios', 'oficinas.municipio_id', '=', 'municipios.id')
            ->join('tipotramites', 'devoluciones.tipotramite_id', '=', 'tipotramites.id')
            ->join('clasedevoluciones', 'devoluciones.clasedevolucion_id', '=', 'clasedevoluciones.id')
            ->select('devoluciones.*', 'oficinas.name as nombreoficina', 'municipios.name as nombremunicipio', 'tipotramites.name as nombretramite', 'clasedevoluciones.name as nombreclasdevolucion' )
            ->where('oficina_id', '=', auth()->user()->oficina_id)
            ->where('devoluciones.oficina_id', '=', auth()->user()->oficina_id)
            ->where('devoluciones.estado_id', '=',1)
            ->get();

        //dd($data);
        // muestra el mensaje de sweetalert que viene del metodo que lo envia
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.registral.devoluciones.index', compact('data', 'user'));
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
        $devolucion = DB::table('devoluciones')->where('id', '=', $id)->get();
        $departamento = DB::table('departamentos')->select('departamentos.name')->where('id', '=', $devolucion[0]->departamento_id)->get();
        $oficina = DB::table('oficinas')->where('id', '=', $devolucion[0]->oficina_id)->get();
        $municipio = DB::table('municipios')->select('municipios.name')->where('id', '=', $oficina[0]->municipio_id)->get();
        $tramite = DB::table('tipotramites')->select('tipotramites.name', 'tipotramites.clasetramite_id')->where('id', '=', $devolucion[0]->tipotramite_id)->get();
        $clasetramite = DB::table('clasetramites')->select('clasetramites.name')->where('id', '=', $tramite[0]->clasetramite_id)->get();
        $clasedevol = DB::table('clasedevoluciones')->select('clasedevoluciones.name')->where('id', '=', $devolucion[0]->clasedevolucion_id)->get();
        //dd($devolucion);
        $user =  Usuario::find(auth()->user()->id);
        return view('sirnec.registral.devoluciones.edit', compact('devolucion','user', 'departamento', 'oficina', 'municipio', 'tramite', 'clasetramite', 'clasedevol'));
    }


    public function update(Request $request, $id)
    {
        //return response()->json($request);
        //dd($request->id);
        $date = Carbon::now()->format('Y-m-d');
        $aviso = 0;

        if(!empty($request->observacion_1)) {
            $fec_observacion_1 = $date;
            $user1_id = $request->user_id;
            $registro = Devolucion::find($id);
                $registro->observacion_1 = $request->observacion_1;
                $registro->fec_observacion_1 = $fec_observacion_1;
                $registro->user1_id = $user1_id;
            $registro->save();
            $log = new Log;
                $log->usuario_id = $request->user_id;
                $log->departamento_id = $request->user_departamento;
                $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Se ha generado la primera Observacion a la devolucion con id : '.$request->id;
            $log->save();
            $aviso++;
        }elseif (!empty($request->observacion_2)) {
            $fec_observacion_2 = $date;
            $user2_id = $request->user_id;
            $registro = Devolucion::find($id);
                $registro->observacion_2 = $request->observacion_2;
                $registro->fec_observacion_2 = $fec_observacion_2;
                $registro->user2_id = $user2_id;
            $registro->save();
            $log = new Log;
                $log->usuario_id = $request->user_id;
                $log->departamento_id = $request->user_departamento;
                $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Se ha generado la Segunda Observacion a la devolucion con id : '.$request->id;
            $log->save();
            $aviso++;
        }elseif (!empty($request->observacion_3)) {
            $fec_observacion_3 = $date;
            $user3_id = $request->user_id;
            $registro = Devolucion::find($id);
                $registro->observacion_3 = $request->observacion_3;
                $registro->fec_observacion_3 = $fec_observacion_3;
                $registro->user3_id = $user3_id;
            $registro->save();
            $log = new Log;
                $log->usuario_id = $request->user_id;
                $log->departamento_id = $request->user_departamento;
                $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Se ha generado la Tercera Observacion a la devolucion con id : '.$request->id;
            $log->save();
            $aviso++;
        }elseif (!empty($request->descripcion_solucion)) {
            $fechacierre = $date;
            $userc_id = $request->user_id;
            $registro = Devolucion::find($id);
                $registro->descripcion_solucion = $request->descripcion_solucion;

                $registro->numoficiocierre = $request->numoficiocierre;
                $registro->numpreparacionremplazo = $request->numpreparacionremplazo;

                $registro->fechacierre = $fechacierre;
                $registro->userc_id = $userc_id;
                $registro->estado_id  = 2;
            $registro->save();
            $log = new Log;
                $log->usuario_id = $request->user_id;
                $log->departamento_id = $request->user_departamento;
                $log->oficina_id = $request->user_oficina;
                $log->descripcion = 'Se ha generado el cierre definitivo a la devolucion con id : '.$request->id;
            $log->save();
            $cierre = 1;
        }

        if($aviso > 0){
            return redirect()->route('devoluciones')->withSuccessMessage('Se Ha guardado con Exito la Observacion a la Devolucion');
        }elseif ($cierre > 0){
            return redirect()->route('devoluciones')->withSuccessMessage('Se Ha Efectuado Satisfactoriamente el cierre de la Devolucion');
        }else{
            return redirect()->route('devoluciones')->withErrorMessage('Por Favor Ingresar Observaciones a fin de poder ver el Avance en las Devoluciones');
        }

    }


    public function destroy($id)
    {
        //
    }
}
