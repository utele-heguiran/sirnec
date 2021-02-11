<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Log;
use App\models\Materialanulado;
use App\models\Motivosdestrucion;
use App\models\Oficina;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class DestruccionacopioController extends Controller
{
    
    public function index()
    {
        //dd(auth()->user()->departamento_id);
        $data = DB::table('materialesanulados')
        ->join('oficinas', 'materialesanulados.oficina_id', '=', 'oficinas.id')
        ->join('claseformatos', 'materialesanulados.claseformatos_id', '=', 'claseformatos.id')
        ->select('materialesanulados.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'claseformatos.name as formato')
        ->get()
        ->where('departamento_id', '=', auth()->user()->departamento_id)->where('estado_id', '=', 1); 
        $motivosdestrucciones = Motivosdestrucion::orderBy('id', 'asc')->pluck('name', 'id');
        //dd($data);

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.destruccion.index', compact('data', 'motivosdestrucciones'));    
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
    
    public function update(Request $request)
    {
        //return $request;
        $numregistros = count($request->id);
        $date = Carbon::now()->format('Y-m-d');
        //recorre el array y lo actualiza en la tabla de materiales anulados 
        for ($i = 0; $i < count($request->id); $i++) {
            $anulacion = Materialanulado::find($request->id[$i]);
                $anulacion->nuip = $request->nuip[$i];
                $anulacion->motivosdestrucciones_id = $request->motivosdestrucciones_id[$i];
                $anulacion->actadestruccion = $request->actadestruccion;
                $anulacion->fechadestruccion = $date;
                $anulacion->estado_id = 2;
            $anulacion->save(); 
        }
        //codigo del log de auditoria
        $log = new Log; 
            $log->usuario_id = auth()->user()->id; 
            $log->departamento_id = auth()->user()->departamento_id; 
            $log->oficina_id = auth()->user()->oficina_id; 
            $log->descripcion = 'Se ha creado el Acta de destruccion  '.$request->actadestruccion.' con '.count($request->id).' Decadactilares' ;  
        $log->save(); 
        //busca los registros del id que trae para generar el acta de destruccion 
        for ($iden = 0; $iden < count($request->id); $iden++) {
            $datos[] = Materialanulado::join("oficinas", "oficinas.id", "=", "materialesanulados.oficina_id")
                ->join("motivosdestrucciones", "motivosdestrucciones.id", "=", "materialesanulados.motivosdestrucciones_id")
                ->join("claseformatos", "claseformatos.id", "=", "materialesanulados.claseformatos_id")
                ->where('materialesanulados.id', $request->id[$iden])
                ->select('materialesanulados.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'motivosdestrucciones.name as motivodestruccion', 'claseformatos.name as claseformato')
                ->get();
        } 
        //dd($datos[0][0]->fechadestruccion); 
        $fechadestruccion =  Carbon::parse($datos[0][0]->fechadestruccion);
        $fechadestruccion =  $fechadestruccion->locale('es')->isoFormat('LL');
        

        $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select('usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
            ->get();    
        $date = Carbon::now()->locale('es')->isoFormat('LL'); 

        $pdf = PDF::loadView('sirnec.pdf.actadestrucion', compact('datos', 'user', 'date', 'fechadestruccion', 'numregistros'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('Acta-Destruccion.pdf');
        //return redirect()->route('destruccionacopio')->withSuccessMessage('Se Ha guardado con Exito El Acta de destruccion');
    }

    public function raft07pdf(Request $request)
    {   
        //return $request;
        $datos = DB::table('materialesanulados')
            ->join('oficinas', 'materialesanulados.oficina_id', '=', 'oficinas.id')
            ->join('claseformatos', 'materialesanulados.claseformatos_id', '=', 'claseformatos.id')
            ->join('motivosdestrucciones', 'materialesanulados.motivosdestrucciones_id', '=', 'motivosdestrucciones.id')
            ->select('materialesanulados.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'claseformatos.name as formato', 'motivosdestrucciones.name as motivodestruccion')
            ->where('materialesanulados.departamento_id', '=', auth()->user()->departamento_id)->where('materialesanulados.estado_id', '=', 2)
            ->whereBetween('fechadestruccion',array($request->input('fechainicial'),$request->input('fechafinal'))) 
            ->orderBy('fechadestruccion', 'asc')
            ->get();
        //dd($datos);

        $pdf = PDF::loadView('sirnec.pdf.raft07', compact('datos'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-07.pdf');
        return redirect('devolucionesacopio');  
    }


    
    public function destroy($id)
    {
        //
    }
}
