<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Clasetramite;
use App\models\Log;
use App\models\Sts;
use App\models\Tipotramite;
use Illuminate\Http\Request;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class StsacopioController extends Controller
{
    public function index()
    {
        //dd(auth()->user()->departamento_id);
        $data = DB::table('stss')
            ->join('departamentos', 'stss.departamento_id', '=', 'departamentos.id')
            ->join('oficinas', 'stss.oficina_id', '=', 'oficinas.id')
            ->join('tipotramites', 'stss.tipotramite_id', '=', 'tipotramites.id')
            ->select('stss.*', 'departamentos.name as nombredepartamento', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'tipotramites.name as nombretipotramite')
            ->get()->where('departamento_id', '=', auth()->user()->departamento_id);
        $clasetramites = Clasetramite::orderBy('name', 'asc')->pluck('name', 'id');
        $tipotramite = Tipotramite::orderBy('name', 'asc')->pluck('name', 'id');
        //dd($data);
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.acopio.sts.index', compact('data', 'tipotramite', 'clasetramites'));    
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $sts = new Sts(); 
            $sts->departamento_id = auth()->user()->departamento_id;
            $sts->oficina_id = auth()->user()->oficina_id;
            $sts->numsts = $request->numsts;
            $sts->feccreasts = $request->feccreasts;
            $sts->fecenvsts = $request->fecenvsts;
            $sts->tipotramite_id = $request->tipotramite_id;
            $sts->cantidadsts = $request->cantidadsts;
            $sts->estado_id = 1;
            $sts->observaciones = $request->observaciones;
            $sts->user_id = auth()->user()->id;
        $sts->save();  
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = auth()->user()->id; 
            $log->departamento_id = auth()->user()->departamento_id; 
            $log->oficina_id = auth()->user()->oficina_id; 
            $log->descripcion = 'Se ha creado el STS No.'.$request->numsts.' con '.$request->cantidadsts.' solicitudes';  
        $log->save();
        return redirect()->route('stsacopio')->withSuccessMessage('STS Creado correctamente');
    }

    public function raft08pdf(Request $request)
    {   
        $data = DB::table('stss')
            ->join('departamentos', 'stss.departamento_id', '=', 'departamentos.id')
            ->join('oficinas', 'stss.oficina_id', '=', 'oficinas.id')
            ->join('tipotramites', 'stss.tipotramite_id', '=', 'tipotramites.id')
            ->join('clasetramites', 'tipotramites.clasetramite_id', '=', 'clasetramites.id')
            ->select('stss.*', 'departamentos.name as nombredepartamento', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'tipotramites.name as nombretipotramite', 'clasetramites.name as nombreclasetramite')
            ->where('stss.departamento_id', '=', auth()->user()->departamento_id)
            ->whereBetween('feccreasts',array($request->input('fechainicial'),$request->input('fechafinal')))
            ->orderBy('feccreasts', 'asc')
            ->get();
        $pdf = PDF::loadView('sirnec.pdf.raft08', compact('data'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Raft-08.pdf');
        return redirect('stsacopio');  
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
