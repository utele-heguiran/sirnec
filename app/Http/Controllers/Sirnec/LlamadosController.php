<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\facades\Excel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

use App\models\Municipio;
use App\models\Oficina;
use App\models\Claseoficina;
use App\models\Usuario;
use App\models\Barrio;
use App\Exports\UsuariosExport;
use App\Imports\ScrImport;
use App\Imports\RechazosImport;
use App\models\Cargo;
use App\models\Departamento;
use App\models\Especificacioncargo;
use App\models\Estudio;
use App\models\Familiar;
use App\models\Funcionario;
use App\models\Log;
use App\models\Lote;
use App\models\Materialanulado;
use App\models\Materialfaltante;
use App\models\Posgrabacion;
use App\models\Scr;
use App\models\Sts;
use App\models\Tipotramite;
use App\models\Titulodeformacion;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\DB as FacadesDB;
use LengthException;

class LlamadosController extends Controller
{
    public function getOficin($id)
    {
        $oficina = Oficina::find($id);
        return json_encode($oficina);
    }

    public function getDepartamentos($id)
    {
        $departamentos = Departamento::orderBy('name', 'asc')->where('pais_id', $id)->pluck('name', 'id');
        return json_encode($departamentos);
    }

    public function getMunucipios($id)
    {
        $municipios = Municipio::orderBy('name', 'asc')->where('departamento_id', $id)->pluck('name', 'id');
        return json_encode($municipios);
    }

    public function getCargo($id)
    {
        $cargo = Cargo::orderBy('descripcion', 'asc')->where('nivel_id', $id)->pluck('descripcion', 'id');
        return json_encode($cargo);
    }

    public function getEspecificacioncargo($id)
    {
        $espcargo =  Especificacioncargo::orderBy('jefeinmediato', 'asc')->where('cargo_id', $id)->pluck('jefeinmediato', 'id');
        return json_encode($espcargo);
    }

    public function getOficinas($id)
    {
        $oficinas = Oficina::orderBy('name', 'asc')->where('municipio_id', $id)->pluck('name', 'id');
        return json_encode($oficinas);
    }

    public function getOficinasregistraduria($id)
    {
        $oficinas = Oficina::orderBy('name', 'asc')->whereIn('claseoficina_id', [1, 2, 3, 4, 5, 7])->where('municipio_id', $id)->pluck('name', 'id');
        return json_encode($oficinas);
    }

    public function getClaseoficinas($id)
    {
        $oficina = Oficina::find($id);
        return json_encode($oficina);
    }

    public function exportUsuariosPdf()
   {
      $user =  Usuario::find(auth()->user()->id);
      $usuarios = DB::table('usuarios')->get()->where('departamento_id', '=', $user->departamento_id);
      $pdf = PDF::loadView('sirnec.pdf.usuarios', compact('usuarios'));
      return $pdf->download('usuarios-list.pdf');
   }

   public function exportusuariosExcel()
   {
      return Excel::download(new UsuariosExport, 'usuarios-list.xlsx');
   }

   public function getUsuarios($id)
    {
        $usuario = Usuario::where('cedula', $id)->pluck('name');
        return json_encode($usuario);
    }

    public function getEmail($id)
    {
        $email = Usuario::where('email', $id)->pluck('email');
        return json_encode($email);
    }

    public function getLogin($id)
    {
        $login = Usuario::where('login', $id)->pluck('login');
        return json_encode($login);
    }


    public function getTitulos($id)
    {
        $titulos = Titulodeformacion::orderBy('name', 'asc')->where('niveleducativo_id', $id)->pluck('name', 'id');
        return json_encode($titulos);
    }


    public function getBarrios($id)
    {
        $barrio = Barrio::where('name', $id)->pluck('name');
        return json_encode($barrio);
    }

    public function importscr(Request $request)
    {
        //iniciamos guardando el archivo en alguna direccion de tu proyecto
        $archivo = $request->file('file');
        $date = Carbon::now()->format('d-m-Y');
        $r1 = Storage::disk('local')->put("/scr/".$date.' - '.$archivo->getClientOriginalName(), \File::get($archivo) );
        //hasta aqui el guardado

        //ahora lo recuperamos para poder trabajar en el
        $ruta = storage_path('app') ."/scr/". $date.' - '.$archivo->getClientOriginalName();

        Excel::import(new ScrImport, $ruta);
        return redirect()->route('scr')->withSuccessMessage('Archivo SCR Cargado Satisfactoriamente');

    }

    public function getFuncionariosofic($id)
    {
        $empleados = Funcionario::where('oficina_id', $id)->pluck('name', 'id');
        return json_encode($empleados);
    }


    public function importrechazos(Request $request)
    {
        //iniciamos guardando el archivo en alguna direccion de tu proyecto
        $archivo = $request->file('file');
        $date = Carbon::now()->format('d-m-Y');
        $r1 = Storage::disk('local')->put("/rechazos/".$date.' - '.$archivo->getClientOriginalName(),  \File::get($archivo) );
        //hasta aqui el guardado

        //ahora lo recuperamos para poder trabajar en el
        $ruta = storage_path('app') ."/rechazos/". $date.' - '.$archivo->getClientOriginalName();

        Excel::import(new RechazosImport, $ruta);
        return redirect()->route('scr')->withSuccessMessage('Archivo de Rechazos Cargado Satisfactoriamente');

    }

    public function getDevoluciones($id)
    {
        $user =  Usuario::find(auth()->user()->id);
        $id = Scr::where('serial_np', $id)->pluck('id');
        $devolucion = Scr::find($id)->where('departamento_id', $user->departamento_id);
        return json_encode($devolucion);
    }


    // public function getPolizas($id)
    // {
    //     $familiares = Familiar::where('funcionario_id', $id)->select('familiares.porcentpoliza')->get();
    //     return json_encode($familiares);
    // }



    public function getFuncionario($id)
    {
        $id = Funcionario::where('cedula', $id)->pluck('id');
        $funcionario = Funcionario::find($id);
        return json_encode($funcionario);
    }

    public function getLote($id)
    {
        $lote = Lote::join("oficinas", "oficinas.id", "=", "lotes.oficina_id")->where('lotes.id', '=', $id)
            ->select('lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
            ->get();
        return json_encode($lote);
    }

    public function getAnulados($id)
    {
        $anulados = Materialanulado::join("claseformatos", "claseformatos.id", "=", "materialesanulados.claseformatos_id")->where('materialesanulados.lote_id', '=', $id)
            ->select('materialesanulados.*', 'claseformatos.name as nombreclaseformato')
            ->get();
        return json_encode($anulados);
    }

    public function getFaltantes($id)
    {
        $faltantes = Materialfaltante::join("claseformatos", "claseformatos.id", "=", "materialesfaltantes.claseformatos_id")->where('materialesfaltantes.lote_id', '=', $id)
            ->select('materialesfaltantes.*', 'claseformatos.name as nombreclaseformato')
            ->get();
        return json_encode($faltantes);
    }

    public function getAnuladosacta(Request $request)
    {
        $registros = $request->input('id');
        $num =  count($registros);
            for ($x = 0; $x < $num; $x++) {
               $reporte[] = Materialanulado::where('id', $registros[$x])->get();
            }
        return json_encode($reporte);
    }

    public function getTipotramite($id)
    {
        $tipotramites = Tipotramite::where('clasetramite_id', $id)->pluck('name', 'id');
        return json_encode($tipotramites);
    }

    public function getValidadossts(Request $request)
    {
        //return json_encode($request->all());
        $registros = $request->input('id');
        //return json_encode($registros);
        $num =  count($registros);
            for ($x = 0; $x < $num; $x++) {

                $registro = Sts::find($registros[$x]);
                    $registro->estado_id = 2;
                    $registro->fecverifists =  Carbon::now()->format('Y-m-d');
                $registro->save();
                $log = new Log;
                    $log->usuario_id = auth()->user()->id;
                    $log->departamento_id = auth()->user()->departamento_id;
                    $log->oficina_id = auth()->user()->oficina_id;
                    $log->descripcion = 'Se ha Validado el STS con id No.'.$registros[$x];
                $log->save();
            }
        return json_encode(1);
    }

    public function getPosgrabacion(Request $request)
    {
        $posgrabacion = Posgrabacion::find($request->id);
        return json_encode($posgrabacion);
    }




}








    // ejemplo de un join para envio de datos por ajax mediante json

    // public function getLoteanulados($id)
    // {
    //     $lote = Lote::join("oficinas", "oficinas.id", "=", "lotes.oficina_id")
    //         ->join("materialesanulados", "materialesanulados.lote_id", "=", "lotes.id")
    //         ->join("claseformatos", "claseformatos.id", "=", "materialesanulados.claseformatos_id")
    //         ->where('lotes.id', '=', $id)
    //         ->select('claseformatos.name as nombreclaseformatoanulado','materialesanulados.numpreparacion as numprepanulado','materialesanulados.claseformatos_id as claseformatoanulado', 'lotes.*', 'oficinas.name as nombreoficina', 'oficinas.codpmt as codpmt', 'oficinas.diastrasporte as tiempomaxtransporte')
    //         ->get();
    //     return json_encode($lote);

    // }




