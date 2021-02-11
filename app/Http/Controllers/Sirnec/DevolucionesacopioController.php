<?php

namespace App\Http\Controllers\sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\models\Devolucion;
use App\models\Clasedevolucion;
use App\models\Usuario;
use App\models\Log;
use DB;
use PDF;
use Auth;


class DevolucionesacopioController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('devoluciones')
           ->join('oficinas', 'devoluciones.oficina_id', '=', 'oficinas.id')
           ->join('clasedevoluciones', 'devoluciones.clasedevolucion_id', '=', 'clasedevoluciones.id')
           ->join('municipios', 'oficinas.municipio_id', '=', 'municipios.id')
           ->select('devoluciones.*', 'oficinas.name as nombreoficina', 'clasedevoluciones.name as nombredevolucion', 'municipios.name as nombremunicipio' )
           ->get()
           ->where('departamento_id', '=', $user->departamento_id)->where('estado_id', '=', 1); 

        //return $data;
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }

        return view('sirnec.acopio.devoluciones.index', compact('user', 'data' ));
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //return $request;
        $registros = count($request->clasedevolucion_id);
        $date = Carbon::now()->format('Y-m-d');
        for ($i = 0; $i < $registros; $i++) {
            
            $devolucion = new Devolucion(); 
                $devolucion->departamento_id = $request->departamento_id[$i];
                $devolucion->numpreparacion = $request->numpreparacion[$i];
                $devolucion->numdocumento = $request->numdocumento[$i];
                $devolucion->name = $request->name[$i];
                $devolucion->clasedevolucion_id  = $request->clasedevolucion_id[$i];
                $devolucion->clasetramite_id  = $request->clasetramite_id[$i];
                $devolucion->tipotramite_id  = $request->tipotramite_id[$i];
                $devolucion->oficina_id = $request->oficina_id[$i];
                $devolucion->fecpreparacion = $request->fecpreparacion[$i];
                $devolucion->estado_id = 1;
                $devolucion->fecdevolucion = $date; 
            $devolucion->save(); 
        }
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado un grupo de devoluciones' ;  
        $log->save();

    return redirect()->route('devolucionesacopio')->withSuccessMessage('Devoluciones de material Creados Correctamente');
        
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

    public function oficiodevolucion(Request $request)
    {
        //return $request->all();
        //return $request->numoficiodevolucion;
        $numoficio = $request->numoficiodevolucion;
        $registros = $request->registro_checkbox;
        if(isset ($request->registro_checkbox)){
            $num =  count($registros);    
            for ($x = 0; $x < $num; $x++) {
                $reporte[] = DB::table('devoluciones')
                    ->join('departamentos', 'devoluciones.departamento_id', '=', 'departamentos.id')
                    ->join('oficinas', 'devoluciones.oficina_id', '=', 'oficinas.id')
                    ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
                    ->join('clasedevoluciones', 'devoluciones.clasedevolucion_id', '=', 'clasedevoluciones.id')
                    ->join('clasetramites', 'devoluciones.clasetramite_id', '=', 'clasetramites.id')
                    ->join('tipotramites', 'devoluciones.tipotramite_id', '=', 'tipotramites.id')
                    ->select('devoluciones.*', 'departamentos.name as departamentonombre', 'oficinas.name as nameoficina', 'claseoficinas.name as clasoficinanombre', 'oficinas.*','clasedevoluciones.name as nameclasdevolucion', 'clasetramites.name as nameclastramite', 'tipotramites.name as nombretipotramite' )
                    ->where('devoluciones.id', $registros[$x])
                    ->get();
            } 
            //dd($reporte);
            $date = Carbon::now()->format('Y-m-d');
            for ($x = 0; $x < $num; $x++) {
                DB::table('devoluciones')->where('id', $registros[$x])->update(['numoficiodevolucion' => $request->numoficiodevolucion]);
                DB::table('devoluciones')->where('id', $registros[$x])->update(['fecenvio' => $date]);
            }
            $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select('usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
            ->get();    
            $date = Carbon::now()->locale('es')->isoFormat('LL');  
              
            $pdf = PDF::loadView('sirnec.pdf.oficiodevoluciones', compact('reporte', 'user', 'date', 'numoficio'));
            $pdf->setPaper('letter', 'portrait');
            return $pdf->stream('Oficio-Devoluciones.pdf');
            //return redirect()->route('devolucionesacopio')->withSuccessMessage('Se Ha Generado el Oficio Remisorio No. '+$request->numoficiodevolucion+' con '+$num+' Registros'); 
            
        }else{
            return redirect()->route('devolucionesacopio')->withErrorMessage('Por Favor Seleccione los Item´s de las Devoluciones a las cuales se les generara el Oficio Remisorio');
        }
        
    }

    public function generaroficiodevolucion($id)
    {   
        //dd($id);
        $devoluciones = DB::table('devoluciones')
            ->select('devoluciones.numoficiodevolucion' )
            ->where('devoluciones.id', $id)
            ->get();
        //dd($devoluciones[0]->numoficiodevolucion); 
        $reporte = DB::table('devoluciones')
            ->join('departamentos', 'devoluciones.departamento_id', '=', 'departamentos.id')
            ->join('oficinas', 'devoluciones.oficina_id', '=', 'oficinas.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->join('clasedevoluciones', 'devoluciones.clasedevolucion_id', '=', 'clasedevoluciones.id')
            ->join('clasetramites', 'devoluciones.clasetramite_id', '=', 'clasetramites.id')
            ->join('tipotramites', 'devoluciones.tipotramite_id', '=', 'tipotramites.id')
            ->select('devoluciones.*', 'devoluciones.name as nombreciudadano', 'departamentos.name as departamentonombre', 'oficinas.name as nameoficina', 'claseoficinas.name as clasoficinanombre', 'oficinas.*' ,'clasedevoluciones.name as nameclasdevolucion', 'clasetramites.name as nameclastramite','tipotramites.name as nombretipotramite'  )
            ->where('devoluciones.numoficiodevolucion', $devoluciones[0]->numoficiodevolucion)
            ->get();
        //dd($reporte);
        $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select('usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
            ->get();    
        $date = Carbon::now()->locale('es')->isoFormat('LL');  
        $pdf = PDF::loadView('sirnec.pdf.generaroficiodevolucion', compact('reporte', 'user', 'date'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Oficio-Devoluciones.pdf');
    }


    public function raft06pdf(Request $request)
    {   
        //return $request;
        //dd(auth()->user()->departamento_id);
        $user =  Usuario::find(auth()->user()->id);
        $devoluciones = DB::table('devoluciones')
            ->join('oficinas', 'devoluciones.oficina_id', '=', 'oficinas.id')
            ->join('clasedevoluciones', 'devoluciones.clasedevolucion_id', '=', 'clasedevoluciones.id')
            ->join('clasetramites', 'devoluciones.clasetramite_id', '=', 'clasetramites.id')
            ->join('tipotramites', 'devoluciones.tipotramite_id', '=', 'tipotramites.id')
            ->select('devoluciones.*', 'oficinas.name as nameoficina', 'oficinas.codpmt', 'oficinas.direccion', 'clasedevoluciones.name as nameclasdevolucion', 'clasetramites.name as nameclastramite', 'tipotramites.name as nombretipotramite')
            ->where('devoluciones.departamento_id', auth()->user()->departamento_id)
            ->whereBetween('fecdevolucion',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('fecdevolucion', 'asc')
            ->get();
        //dd($devoluciones);
        $pdf = PDF::loadView('sirnec.pdf.raft06', compact('devoluciones', 'user'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-06.pdf');
        return redirect('devolucionesacopio');  
    }

    public function updatepath(Request $request)
    {   
        //dd($request->all());
        //pregunta si viene archivo de la vista 
        if($request->hasFile('path')){
            $file = $request->file('path');
            $pathfile = Storage::disk('public')->put('sirnec/devoluciones', $file);
           //actualiza el campo en la bd con el nombre del archivo
            
            $devolucion = Devolucion::find($request->identificador);
                $devolucion->path = $pathfile;
            $devolucion->save();
            
            // /*codigo del log de auditoria*/    
            $log = new Log; $log->usuario_id = $request->user_id; $log->departamento_id = $request->user_departamento; $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Ha Cargado el Material de Identificacion Devuelto por el Centro de Acopio con nombre '.$pathfile;  
            $log->save();
            return redirect()->route('devolucionesacopio')->withSuccessMessage('Se Ha Cargado el Archivo Satisfactoriamente');
        }
    }

}