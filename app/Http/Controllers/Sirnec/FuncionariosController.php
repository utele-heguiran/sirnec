<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Arl;
use App\models\Banco;
use App\models\Barrio;
use App\models\Claslibmil;
use App\models\Compensacioncajas;
use Illuminate\Http\Request;
use App\models\Departamento;
use App\models\Eps;
use App\models\Municipio;
use App\models\Oficina;
use App\models\Genero;
use App\models\Estadocivil;
use App\models\Estudio;
use App\models\Familiar;
use App\models\Fondopension;
use App\models\Funcionario;
use App\models\Hislaboral;
use App\models\Pais;
use App\models\Rh;
use App\models\Log;
use App\models\Niveleducativo;
use App\models\Parentesco;
use App\models\Tipocuenta;
use App\models\Titulodeformacion;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\DB as FacadesDB;
use Luecano\NumeroALetras\NumeroALetras;

class FuncionariosController extends Controller
{

    public function index()
    {
        $data = DB::table('funcionarios')
        ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.id')
        ->select('funcionarios.*', 'departamentos.name as nombredepartamento' )
        ->get()->where('departamento_id', '=', auth()->user()->departamento_id);

        $departamentos = Departamento::where('pais_id', 42)->orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::orderBy('name', 'asc')->pluck('name', 'id');
        $barrios = Barrio::where('departamento_id', auth()->user()->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::orderBy('name', 'asc')->pluck('name', 'id');
        $municnacimiento = Municipio::orderBy('name', 'asc')->pluck('name', 'id');
        $paises = Pais::orderBy('name', 'asc')->pluck('name', 'id');
        $generos = Genero::orderBy('name', 'asc')->pluck('name', 'id');
        $estadocivils = Estadocivil::orderBy('name', 'asc')->pluck('name', 'id');
        $rhs = Rh::orderBy('name', 'asc')->pluck('name', 'id');
        $clasmils = Claslibmil::pluck('name', 'id');
        $eps = Eps::orderBy('name', 'asc')->pluck('name', 'id');
        $pension = Fondopension::orderBy('name', 'asc')->pluck('name', 'id');
        $caja = Compensacioncajas::orderBy('name', 'asc')->pluck('name', 'id');
        $arl = Arl::orderBy('name', 'asc')->pluck('name', 'id');
        $bancos = Banco::orderBy('name', 'asc')->pluck('name', 'id');
        $tipocuentas = Tipocuenta::orderBy('name', 'asc')->pluck('name', 'id');
        $funcionarios = Funcionario::where('departamento_id', '=', auth()->user()->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }


        return view('sirnec.talento.funcionarios.index', compact( 'data', 'departamentos', 'municipios', 'oficina', 'municnacimiento', 'paises', 'generos', 'estadocivils', 'rhs', 'clasmils', 'eps', 'pension', 'caja', 'arl', 'bancos', 'tipocuentas', 'barrios', 'funcionarios' ));
    }

    public function create()
    {
        //
    }

    public function storehistoriaslaborales(Request $request)
    {
       // dd($request->all());
            $histlaboral = new Hislaboral();
                $histlaboral->funcionario_id = $request->funcionario_id;
                $histlaboral->name   =  $request->name;
                $histlaboral->tipoempresa   =  $request->tipoempresa;
                $histlaboral->pais_id  =  $request->pais_id;
                $histlaboral->departamento_id  =  $request->departamento_id;
                $histlaboral->municipio_id  =  $request->municipio_id;
                $histlaboral->email =  $request->email;
                $histlaboral->telefono_fijo  =  $request->telefono_fijo;
                $histlaboral->movil  =  $request->movil;
                $histlaboral->fechaingreso  =  $request->fechaingreso;
                $histlaboral->fecharetiro  =  $request->fecharetiro;
                $histlaboral->cargo  =  $request->cargo;
                $histlaboral->dependencia  =  $request->dependencia;
                $histlaboral->direccion   =  $request->direccion ;
            $histlaboral->save();
            /*codigo del log de auditoria*/
            $log = new Log;
                $log->usuario_id = auth()->user()->id;
                $log->departamento_id = auth()->user()->departamento_id;
                $log->oficina_id = auth()->user()->oficina_id;
                $log->descripcion = 'Se ha cargado un trabajo al Funcionario con id :'.$request->funcionario_id;
            $log->save();
            return redirect()->route('funcionarios_historialab', ['id' => $request->funcionario_id ])->withSuccessMessage('Historia Laboral Cargada con Exito');
    }


    public function storefamiliares(Request $request)
    {
        //dd($request->all());
        $funcionarioescogido = intval($request->funcionario_id);
        $polizas = DB::table('familiares')->where('funcionario_id', $funcionarioescogido)->get();
        //dd($polizas);

        $totalpolizas = 0;
        $totalpolizascontingente = 0;

        foreach ($polizas as $row) {
            $totalpolizas += $row->porcentpoliza;
            $totalpolizascontingente += $row->porcentpolizacontingente;
        }
        $totalpolizas = intval($totalpolizas)+intval($request->porcentpoliza);
        $totalpolizascontingente = intval($totalpolizascontingente)+intval($request->porcentpolizacontingente);
        //dd($totalpolizascontingente);

        if ($totalpolizas <= 100 && $totalpolizascontingente <= 100 ) {

            $familiar = new Familiar();
                $familiar->funcionario_id = $request->funcionario_id;
                $familiar->parentesco_id = $request->parentesco_id;
                $familiar->cedula = $request->cedula;
                $familiar->name = $request->name;
                $familiar->nacimiento = $request->nacimiento;
                $familiar->movil = $request->movil;
                $familiar->direccion = $request->direccion;
                $familiar->porcentpoliza = $request->porcentpoliza;
                $familiar->porcentpolizacontingente = $request->porcentpolizacontingente;
                $familiar->ocupacion = $request->ocupacion;
            $familiar->save();
            /*codigo del log de auditoria*/
            $log = new Log;
                $log->usuario_id = auth()->user()->id;
                $log->departamento_id = auth()->user()->departamento_id;
                $log->oficina_id = auth()->user()->oficina_id;
                $log->descripcion = 'Se ha cargado el familiar al Funcionario :'.$request->funcionario_id;
            $log->save();
            return redirect()->route('funcionarios_familia', ['id' => $request->funcionario_id ])->withSuccessMessage('Familiar Creado con Exito');
        }else {
            return redirect()->route('funcionarios_familia', ['id' => $request->funcionario_id ])->witherror_message('No Pudo ser Creado el familiar porque la sumatoria de las polizas exeden el 100%');
        }
    }


    public function store(Request $request)
    {
        dd($request->all());
        $funcionario = new Funcionario();
            $funcionario->cedula = $request->input('cedula');
            $funcionario->deparcedula_id = $request->input('deparcedula_id');
            $funcionario->municcedula_id = $request->input('municcedula_id');
            $funcionario->expedicion = $request->input('expedicion');
            $funcionario->departamento_id = auth()->user()->departamento_id;
            $funcionario->municipio_id = $request->input('municipio_id');
            $funcionario->oficina_id = $request->input('oficina_id');
            $funcionario->name = $request->input('name');
            $funcionario->nacimiento = $request->input('nacimiento');
            $funcionario->paisnacimiento_id = $request->input('paisnacimiento_id');
            $funcionario->deparnacimiento_id = $request->input('deparnacimiento_id');
            $funcionario->municnacimiento_id = $request->input('municnacimiento_id');
            $funcionario->genero_id = $request->input('genero_id');
            $funcionario->estadocivil_id = $request->input('estadocivil_id');
            $funcionario->clasmilitar_id = $request->input('clasmilitar_id');
            $funcionario->libreta_militar = $request->input('libreta_militar');
            $funcionario->distrito = $request->input('distrito');
            $funcionario->rh_id = $request->input('rh_id');
            $funcionario->direccion = $request->input('direccion');
            $funcionario->barrio_id = $request->input('barrio_id');
            $funcionario->telefono_fijo = $request->input('telefono_fijo');
            $funcionario->movil = $request->input('movil');
            $funcionario->emailpersonal = $request->input('emailpersonal');
            $funcionario->emailcorporativo = $request->input('emailcorporativo');
            $funcionario->estado_id = 2;
            $funcionario->name_contacto = $request->input('name_contacto');
            $funcionario->movil_contacto = $request->input('movil_contacto');
            $funcionario->personasacargo = $request->input('personasacargo');
            $funcionario->incrementoantiguedad = $request->input('incrementoantiguedad');
            $funcionario->auxiliotrasporte = $request->input('auxiliotrasporte');
            $funcionario->ley4ta = $request->input('ley4ta');
            $funcionario->primatecnicafs = $request->input('primatecnicafs');
            $funcionario->primatecnicanfs = $request->input('primatecnicanfs');
            $funcionario->primageografica = $request->input('primageografica');
            $funcionario->auxilioalimentacion = $request->input('auxilioalimentacion');
            $funcionario->banco_id = $request->input('banco_id');
            $funcionario->tipocuenta_id = $request->input('tipocuenta_id');
            $funcionario->numcuentabanco = $request->input('numcuentabanco');
            $funcionario->eps_id = $request->input('eps_id');
            $funcionario->pension_id = $request->input('pension_id');
            $funcionario->caja_id = $request->input('caja_id');
            $funcionario->arl_id = $request->input('arl_id');
        $funcionario->save();
        // //codigo del log de auditoria
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado el funcionario de Nombre :'.$request->get('name');
        $log->save();
        return redirect()->route('funcionarios')->withSuccessMessage('Funcionarios Creado Satisfactoriamente');
    }


    public function show($id)
    {
        //
    }



    public function edithistorialaboral($id)
    {
        //dd($id);
        $data  = Hislaboral::find($id);

        $paises = Pais::orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::orderBy('name', 'asc')->pluck('name', 'id');

        $funcionario = Funcionario::where('id', $data->funcionario_id)->get();
        //dd($funcionario[0]->id);

        return view('sirnec.talento.funcionarios.edithislaboral', compact( 'data', 'funcionario', 'paises', 'departamentos', 'municipios'));

    }


    public function editfamilia($id)
    {
        //dd($id);
        $data  = Familiar::find($id);
        $funcionario = Funcionario::where('id', $data->funcionario_id)->get();
        //dd($funcionario[0]->id);
        $parentescos = Parentesco::orderBy('name', 'asc')->pluck('name', 'id');
        return view('sirnec.talento.funcionarios.editfamilia', compact( 'data', 'parentescos', 'funcionario'));

    }

    public function edit($id)
    {
        $data  =  Funcionario::find($id);
        //dd($data);
        $departamentos = Departamento::where('pais_id', 42)->orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::orderBy('name', 'asc')->pluck('name', 'id');
        $municnacimiento = Municipio::orderBy('name', 'asc')->pluck('name', 'id');
        $barrios = Barrio::where('departamento_id', auth()->user()->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $paises = Pais::orderBy('name', 'asc')->pluck('name', 'id');
        $generos = Genero::orderBy('name', 'asc')->pluck('name', 'id');
        $estadocivils = Estadocivil::orderBy('name', 'asc')->pluck('name', 'id');
        $rhs = Rh::orderBy('name', 'asc')->pluck('name', 'id');
        $clasmils = Claslibmil::pluck('name', 'id');
        $eps = Eps::orderBy('name', 'asc')->pluck('name', 'id');
        $pension = Fondopension::orderBy('name', 'asc')->pluck('name', 'id');
        $caja = Compensacioncajas::orderBy('name', 'asc')->pluck('name', 'id');
        $arl = Arl::orderBy('name', 'asc')->pluck('name', 'id');
        $bancos = Banco::orderBy('name', 'asc')->pluck('name', 'id');
        $tipocuentas = Tipocuenta::orderBy('name', 'asc')->pluck('name', 'id');

        return view('sirnec.talento.funcionarios.edit', compact( 'data', 'departamentos', 'municipios', 'oficina', 'municnacimiento', 'paises', 'generos', 'estadocivils', 'rhs', 'clasmils', 'eps', 'pension', 'caja', 'arl', 'bancos', 'tipocuentas', 'barrios' ));

    }

    public function cargeestudios($id)
    {
        //dd($id);
        $funcionario = Funcionario::find($id);
        $data = Estudio::select('estudios.*', 'niveleseducativos.name as nombreniveleducativo', 'titulosdeformacion.name as nombretitulosdeformacion')
        ->join('niveleseducativos', 'estudios.niveleducativo_id', '=', 'niveleseducativos.id')
        ->join('titulosdeformacion', 'estudios.titulosdeformacion_id', '=', 'titulosdeformacion.id')
        ->get()->where('funcionario_id', '=', $id);
        //dd($data);

        $niveleducativo = Niveleducativo::orderBy('name', 'asc')->pluck('name', 'id');
        $titulos = Titulodeformacion::orderBy('name', 'asc')->pluck('name', 'id');
        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.talento.funcionarios.estudios', compact( 'funcionario', 'data', 'niveleducativo', 'titulos'));
    }

    public function getBarrios(Request $request)
    {
        //return json_encode($request->all()); //devuelve lo que le llego
        $barrio = new Barrio();
            $barrio->departamento_id = $request->departamentobarrio_id;
            $barrio->municipio_id = $request->municipiobarrio_id;
            $barrio->name = $request->namebarrio;
        $barrio->save();
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado el Barrio de Nombre :'.$request->namebarrio;
        $log->save();

        return response()->json(['mensaje'=>'Registro Guardado Exitosamente']);

    }



    public function getEstudios(Request $request)
    {
        //return json_encode($request->all()); //devuelve lo que le llego
        $estudio = new Estudio();
            $estudio->funcionario_id = $request->funcionario_id;
            $estudio->niveleducativo_id = $request->niveleducativo_id;
            $estudio->titulosdeformacion_id = $request->titulosdeformacion_id;
            $estudio->fechainicio = $request->fechainicio;
            $estudio->fechafinal = $request->fechafinal;
            $estudio->institucion = $request->institucion;
            $estudio->obtuvotitulo = $request->obtuvotitulo;
            $estudio->semestres = $request->semestres;
        $estudio->save();
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha cargado estudios al funcionario de Nombre :'.$request->funcionario_id;
        $log->save();

        return response()->json(['mensaje'=>'Registro Guardado Exitosamente' ]);

    }

    public function cargehistorialab($id)
    {
        //dd($id);
        $data = DB::table('hislaborales')
        ->join('paises', 'hislaborales.pais_id', '=', 'paises.id')
        ->join('departamentos', 'hislaborales.departamento_id', '=', 'departamentos.id')
        ->join('municipios', 'hislaborales.municipio_id', '=', 'municipios.id')
        ->select('hislaborales.*', 'paises.name as nombrepais', 'departamentos.name as nombredepartamento', 'municipios.name as nombremunicipio' )
        ->where('funcionario_id', '=', intval($id))->orderBy('fechaingreso', 'desc')->get();
        //dd($data);

        $funcionario = Funcionario::find($id);
        $paises = Pais::orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::orderBy('name', 'asc')->pluck('name', 'id');

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }

        return view('sirnec.talento.funcionarios.hislaboral', compact( 'data', 'funcionario', 'paises', 'departamentos', 'municipios'));
    }

    public function cargefamilia($id)
    {
        //dd($id);
        $data = DB::table('familiares')
        ->join('parentescos', 'familiares.parentesco_id', '=', 'parentescos.id')
        ->select('familiares.*', 'parentescos.name as nombreparentesco' )
        ->get()->where('funcionario_id', '=', $id);
        //dd($data);
        $funcionario = Funcionario::find($id);
        $parentescos = Parentesco::orderBy('name', 'asc')->pluck('name', 'id');

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }

        return view('sirnec.talento.funcionarios.familia', compact( 'data', 'funcionario', 'parentescos'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        Funcionario::findOrFail($request->id)->update($request->all());
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha Actualizado el funcionario id:'.$request->id;
        $log->save();
        return redirect()->route('funcionarios')->withSuccessMessage('Familiar Modificado con Exito');
    }



    public function updatehistlaboral(Request $request, $id)
    {
        //dd($request->all());
        Hislaboral::findOrFail($request->id)->update($request->all());
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha Actualizado la historia laboral id :'.$request->id;
        $log->save();
        return redirect()->route('funcionarios_historialab', ['id' => $request->funcionario_id ])->withSuccessMessage('Historia Laboral Modificado con Exito');
    }



    public function updatefamiliar(Request $request, $id)
    {
        //dd($request->all());
        $funcionarioescogido = intval($request->funcionario_id);
        $polizas = DB::table('familiares')->where([['funcionario_id', '=', $funcionarioescogido],['id', '!=', intval($request->familiar_id)],])->get();

        $totalpolizas = 0;
        $totalpolizascontingente = 0;

        foreach ($polizas as $row) {
            $totalpolizas += $row->porcentpoliza;
            $totalpolizascontingente += $row->porcentpolizacontingente;
        }
        $totalpolizas = intval($totalpolizas)+intval($request->porcentpoliza);
        $totalpolizascontingente = intval($totalpolizascontingente)+intval($request->porcentpolizacontingente);
        //dd($totalpolizascontingente);

        if ($totalpolizas <= 100 && $totalpolizascontingente <= 100) {
            Familiar::findOrFail($request->id)->update($request->all());
            /*codigo del log de auditoria*/
            $log = new Log;
                $log->usuario_id = auth()->user()->id;
                $log->departamento_id = auth()->user()->departamento_id;
                $log->oficina_id = auth()->user()->oficina_id;
                $log->descripcion = 'Se ha Actualizado el familiar con id :'.$request->id;
            $log->save();
            return redirect()->route('funcionarios_familia', ['id' => $request->funcionario_id ])->withSuccessMessage('Familiar Modificado con Exito');
        }else {
            return redirect()->route('funcionarios_familia', ['id' => $request->funcionario_id ])->witherror_message('No Pudo ser Modificado el familiar porque la sumatoria de las polizas exeden el 100%');
        }


    }


    public function destroy($id)
    {
        $estudio = Estudio::find($id);
        //dd($estudio);
        $estudio->delete();
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha Eliminado el estudio :'.$estudio->id;
        $log->save();
        return redirect()->route('funcionarios_estudios', ['id' => $estudio->funcionario_id ])->withSuccessMessage('Estudio Eliminado con Exito');

    }

    public function certificar(Request $request)
    {
        //dd($request->all());
        //crea instancia para formatear numeros en letras
        $formatter = new NumeroALetras();

        $clase = $request->certi_id;
        $numcerti = $request->numcertificacion;
        $notas = $request->notaencargodespachos;
        $delegado1 = Funcionario::select('name')->find($request->delegado1_id);
        $delegado2 = Funcionario::select('name')->find($request->delegado2_id);
        $cordinador = Funcionario::select('name')->find($request->cordinador_id);
        //dd($clase);

        $funcionario = DB::table('funcionarios as f')
            ->select('f.*', 'munc.name as municipiocedula' )
            ->join('municipios as munc','f.municcedula_id','=','munc.id')
            ->where('f.id', $request->id)
            ->get();

        $data = DB::table('contratos as c')
            ->select('c.*', 'f1.name as funcionario', 'f1.cedula as cedulafuncionario',
            'car.name as cargo', 'car.codigo as codigo', 'car.grado as grado', 'car.sueldo as sueldo', 'ofic.name as oficina', 'dep.name as departamento', 'clascontrato.name as clascontrato', 'munic.name as nombremunicipiolabora')
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->join('municipios as munic','munic.id','=','ofic.municipio_id')
            ->where('c.funcionario_id', $request->id)
            ->orderBy('c.fechainicial', 'asc')
            ->get();

        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
           ->get();

        //dd($data);

        if (count($data) > 0) {
            if ($request->certi_id == 2) {
                $pdf = PDF::loadView('sirnec.pdf.certificaciontiemposervicio', compact('data', 'funcionario', 'user', 'numcerti', 'notas', 'delegado1', 'delegado2', 'cordinador', 'clase','formatter'));
                $pdf->setPaper('letter', 'portrait'); //oficio vertical
                return $pdf->download('Tiempo_Servicio.pdf');
            } else {
                $pdf = PDF::loadView('sirnec.pdf.certificaciontiemposervicio', compact('data', 'funcionario', 'user', 'numcerti', 'notas', 'delegado1', 'delegado2', 'cordinador', 'clase','formatter'));
                $pdf->setPaper('letter', 'portrait'); //oficio vertical
                return $pdf->download('Certificado_Laboral.pdf');
            }
        }else{
            return redirect()->route('funcionarios')->withErrorMessage('El Funcionario No tiene Historial Laboral');
        }
    }





}
