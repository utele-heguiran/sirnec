<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Cargo;
use App\models\Departamento;
use App\models\Especificacioncargo;
use App\models\Log;
use App\models\Municipio;
use App\models\Nivel;
use App\models\Oficina;
use App\models\Ubicacioncargo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UbicacionesController extends Controller
{
    public function index()
    {
        $data = Ubicacioncargo::select('ubicacioncargos.*', 'oficinas.name as nombreoficina', 'cargos.name as nombrecargo', 'cargos.codigo as codigocargo', 'cargos.grado as gradocargo', 'departamentos.name as nombredepartamento', 'niveles.name as nombrenivel', 'municipios.name as nombremunicipio', 'especificacioncargos.areafuncional as especificacionareafuncional')
        ->join('oficinas', 'ubicacioncargos.oficina_id', '=', 'oficinas.id')
        ->join('cargos', 'ubicacioncargos.cargo_id', '=', 'cargos.id')
        ->join('departamentos', 'oficinas.departamento_id', '=', 'departamentos.id')
        ->join('municipios', 'oficinas.municipio_id', '=', 'municipios.id')
        ->join('niveles', 'cargos.nivel_id', '=', 'niveles.id')
        ->join('especificacioncargos', 'ubicacioncargos.especificacioncargos_id', '=', 'especificacioncargos.id')
        ->get();
        $departamentos = Departamento::orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::orderBy('name', 'asc')->pluck('name', 'id');
        $oficinas = Oficina::whereIn('claseoficina_id', [1, 2, 3, 4, 5, 7, 8])->orderBy('name', 'asc')->pluck('name', 'id');
        $niveles = Nivel::orderBy('name', 'asc')->pluck('name', 'id');
        $cargos = Cargo::orderBy('name', 'asc')->pluck('name', 'id');
        $especificacioncargo = Especificacioncargo::orderBy('areafuncional', 'asc')->pluck('areafuncional', 'id');

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }

        return view('sirnec.admin.ubicaciones.index', compact('data', 'departamentos', 'municipios', 'oficinas', 'niveles', 'cargos', 'especificacioncargo'));
    }

    public function eliminar($id)
    {
        $ubicacion = Ubicacioncargo::find($id);

            if ($ubicacion->estado_id == 1) {
                $ubicacion->delete();

                /*codigo del log de auditoria*/
                $log = new Log;
                    $log->usuario_id = auth()->user()->id;
                    $log->departamento_id = auth()->user()->departamento_id;
                    $log->oficina_id = auth()->user()->oficina_id;
                    $log->descripcion = 'Se ha eliminado la Ubicacion del Cargo con id '.$id;
                $log->save();

                return redirect()->route('ubicaciones')->withSuccessMessage('Ubicacion eliminada Satisfactoriamente');
            }else {
                return redirect()->route('ubicaciones')->withErrorMessage('No Fue Posible Eliminar la ubicacion debido a que tiene un Contrato Activo ');
            }

    }

    public function store(Request $request)
    {
        $ubicacion = new Ubicacioncargo();
            $ubicacion->oficina_id = $request->input('oficina_id');
            $ubicacion->cargo_id = $request->input('cargo_id');
            $ubicacion->especificacioncargos_id = $request->input('especificacioncargos_id');
            $ubicacion->estado_id = 1;
        $ubicacion->save();
        //codigo del log de auditoria
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado el cargo '.$request->input('cargo_id').' en la Ubicacion :'.$request->input('oficina_id');
        $log->save();
        return redirect()->route('ubicaciones')->withSuccessMessage('Ubicacion del Cargo Creado Satisfactoriamente');
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
