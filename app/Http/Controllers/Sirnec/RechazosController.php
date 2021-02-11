<?php

namespace App\Http\Controllers\sirnec;

use RealRashid\SweetAlert\Facades\Alert;
use App\models\Usuario;
use App\models\Estadisticarechazo;
use Carbon\Carbon;
use App\models\Log;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Storage\AlertSessionStore;

class RechazosController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('estadisticarechazos')
            ->join('municipios', 'estadisticarechazos.municipio_id', '=', 'municipios.id')
            ->join('tipotramites', 'estadisticarechazos.tipotramite_id', '=', 'tipotramites.id')
            ->join('origenrechazos', 'estadisticarechazos.origenrechazo_id', '=', 'origenrechazos.id')
            ->select('estadisticarechazos.*', 'municipios.name as nombremunicipio', 'tipotramites.name as nombretramite', 'origenrechazos.name as nombreorigen')
            ->where([ ['oficina_id', '=', $user->oficina_id],['estado_id', '=', 1],])->get();
        
        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Excelente!', session('success_message'));
        }

        if(session('error_message')){
            Alert::error('Error!', session('error_message'));
        }

        return view('sirnec.registral.rechazos.index', compact('data', 'user'));
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
        $rechazo = DB::table('estadisticarechazos')->where('id', '=', $id)->get();
        $departamento = DB::table('departamentos')->select('departamentos.name')->where('id', '=', $rechazo[0]->departamento_id)->get();
        $municipio = DB::table('municipios')->select('municipios.name')->where('id', '=', $rechazo[0]->municipio_id)->get();
        $origen = DB::table('origenrechazos')->select('origenrechazos.name')->where('id', '=', $rechazo[0]->origenrechazo_id)->get();
        $tramite = DB::table('tipotramites')->select('tipotramites.name', 'tipotramites.clasetramite_id')->where('id', '=', $rechazo[0]->tipotramite_id)->get();
        $clasetramite = DB::table('clasetramites')->select('clasetramites.name')->where('id', '=', $tramite[0]->clasetramite_id)->get();
        //dd($rechazo[0]->departamento_id);

        $user =  Usuario::find(auth()->user()->id);
        return view('sirnec.registral.rechazos.edit', compact('rechazo','user', 'departamento', 'municipio', 'origen', 'tramite', 'clasetramite'));
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
            $registro = Estadisticarechazo::find($id); 
                $registro->observacion_1 = $request->observacion_1;
                $registro->fec_observacion_1 = $fec_observacion_1;
                $registro->user1_id = $user1_id;
            $registro->save();
            $log = new Log; 
                $log->usuario_id = $request->user_id; 
                $log->departamento_id = $request->user_departamento; 
                $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Se ha generado la primera Observacion al rechazo con id : '.$request->id;  
            $log->save();
            $aviso++;
        }elseif (!empty($request->observacion_2)) {
            $fec_observacion_2 = $date; 
            $user2_id = $request->user_id;
            $registro = Estadisticarechazo::find($id); 
                $registro->observacion_2 = $request->observacion_2;
                $registro->fec_observacion_2 = $fec_observacion_2;
                $registro->user2_id = $user2_id;
            $registro->save();
            $log = new Log; 
                $log->usuario_id = $request->user_id; 
                $log->departamento_id = $request->user_departamento; 
                $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Se ha generado la Segunda Observacion al rechazo con id : '.$request->id;
            $log->save();
            $aviso++;
        }elseif (!empty($request->observacion_3)) {
            $fec_observacion_3 = $date; 
            $user3_id = $request->user_id;
            $registro = Estadisticarechazo::find($id); 
                $registro->observacion_3 = $request->observacion_3;
                $registro->fec_observacion_3 = $fec_observacion_3;
                $registro->user3_id = $user3_id;
            $registro->save();
            $log = new Log; 
                $log->usuario_id = $request->user_id; 
                $log->departamento_id = $request->user_departamento; 
                $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Se ha generado la Tercera Observacion al rechazo con id : '.$request->id;
            $log->save();
            $aviso++;
        }elseif (!empty($request->descripcion_solucion)) {
            $fechacierre = $date; 
            $userc_id = $request->user_id;
            $registro = Estadisticarechazo::find($id); 
                $registro->descripcion_solucion = $request->descripcion_solucion;
                $registro->fechacierre = $fechacierre;
                $registro->userc_id = $userc_id;
                $registro->estado_id  = 2;
            $registro->save();
            $log = new Log; 
                $log->usuario_id = $request->user_id; 
                $log->departamento_id = $request->user_departamento; 
                $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Se ha generado el cierre definitivo al rechazo con id : '.$request->id;
            $log->save();
            $cierre = 1;
        }
        
        if($aviso > 0){
            return redirect()->route('rechazos')->withSuccessMessage('Se Ha guardado con Exito la Observacion al Rechazo');
        }elseif ($cierre > 0){
            return redirect()->route('rechazos')->withSuccessMessage('Se Ha Efectuado Satisfactoriamente el cierre del Rechazo');
        }else{
            return redirect()->route('rechazos')->withErrorMessage('Por Favor Ingresar Observaciones a fin de poder ver el Avance de los rechazos');
        }

    }

    
    public function destroy($id)
    {
        //
    }
}
