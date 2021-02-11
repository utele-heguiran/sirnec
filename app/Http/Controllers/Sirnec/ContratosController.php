<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Cargo;
use App\models\Clasecontrato;
use App\models\Contrato;
use App\models\Departamento;
use App\models\Funcionario;
use App\models\Log;
use App\models\Oficina;
use App\models\Ubicacioncargo;
use App\models\Usuario;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Contains;
use RealRashid\SweetAlert\Facades\Alert;

class ContratosController extends Controller
{

    public function index()
    {
        $contratovencido = Contrato::where('departamento_id', auth()->user()->departamento_id)->where('fechaterminacion', '<=', Carbon::now()->format('Y-m-d'))->get();
        //dd(count($contratovencido));
        if (count($contratovencido) >= 1) {
            foreach ($contratovencido as $key) {
                if ($key->clase_id == 1 || $key->clase_id == 2 || $key->clase_id == 3) {
                    Ubicacioncargo::where('funcionario_id', $key->funcionario_id)->update(['funcionario_id'=>null , 'estado_id'=>1]);
                    Contrato::where('id', $key->id)->update(['estado_id'=>2]);
                }
                if ($key->clase_id == 4 ) {
                    Ubicacioncargo::where('funcionarioclase4_id', $key->funcionario_id)->update(['funcionarioclase4_id'=>null , 'estado_id'=>1]);
                    Contrato::where('id', $key->id)->update(['estado_id'=>2]);
                }
                if ($key->clase_id == 5 ) {
                    Ubicacioncargo::where('funcionarioclase5_id', $key->funcionario_id)->update(['funcionarioclase5_id'=>null , 'estado_id'=>1]);
                    Contrato::where('id', $key->id)->update(['estado_id'=>2]);
                }
                if ($key->clase_id == 6 ) {
                    Ubicacioncargo::where('funcionarioclase6_id', $key->funcionario_id)->update(['funcionarioclase6_id'=>null , 'estado_id'=>1]);
                    Contrato::where('id', $key->id)->update(['estado_id'=>2]);
                }
            }
        }

        $data = Contrato::select('contratos.*', 'funcionarios.name as namefuncionario', 'oficinas.name as nameoficina', 'cargos.name as namecargo', 'cargos.codigo as codigocargo', 'cargos.grado as gradocargo', 'clascontratos.name as nombreclasecontrato')
        ->join('funcionarios', 'contratos.funcionario_id', '=', 'funcionarios.id')
        ->join('clascontratos', 'contratos.clascontrato_id', '=', 'clascontratos.id')
        ->join('oficinas', 'contratos.oficina_id', '=', 'oficinas.id')
        ->join('cargos', 'contratos.cargo_id', '=', 'cargos.id')
        ->get()->where('departamento_id', auth()->user()->departamento_id)->where('fechaterminacion', '>', Carbon::now()->format('Y-m-d'));

        $depart = Departamento::select('departamentos.name')->where('id', auth()->user()->departamento_id)->get();
        $funcionarios = Funcionario::orderBy('name', 'asc')->pluck('name', 'id');
        $clascontratos = Clasecontrato::orderBy('name', 'asc')->pluck('name', 'id');
        $oficinas = Oficina::where('departamento_id', auth()->user()->departamento_id)->where('claseoficina_id', '!=',  6)->orderBy('name', 'asc')->pluck('name', 'id');
        $ubicacioncargos = Ubicacioncargo::where('estado_id', 2)->orderBy('cargo_id', 'asc')->pluck('cargo_id', 'id');

        //dd($data);

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }

        return view('sirnec.talento.contratos.index', compact('data', 'funcionarios', 'oficinas', 'clascontratos',  'ubicacioncargos', 'depart'));
    }

    public function getGuardarcontrato(Request $request)
    {
        //return json_encode($request->all()); //devuelve lo que le llego
        $oficinilla = intval($request->oficina_id);
        $id_ubicacion = intval($request->ubicacioncargo_id);
        $cargo_id = Ubicacioncargo::select('ubicacioncargos.*')->where('oficina_id', $oficinilla)->where('id', $id_ubicacion)->get();

        if ($request->funcionario2_id == NULL) {
            $oficina2 = NULL;
        }else {
            $oficina2 = Ubicacioncargo::select('ubicacioncargos.oficina_id')->where('funcionario_id', $request->funcionario2_id)->get();
        }

        if (intval($request->clase_id) == 4 || intval($request->clase_id) == 5 || intval($request->clase_id) == 6) {
            $dato = Contrato::where('funcionario_id', $request->funcionario2_id)->get();
            $oficina_id = $dato[0]->oficina_id;
            $ubicacioncargo_id = $dato[0]->ubicacioncargo_id;
            $cargo_id = Ubicacioncargo::select('ubicacioncargos.*')->where('oficina_id', $oficina_id)->where('id', $ubicacioncargo_id)->get();
        } else {
            $oficina_id = $request->oficina_id;
            $ubicacioncargo_id = $request->ubicacioncargo_id;
        }

        $contratacion = new Contrato();
            $contratacion->funcionario_id = $request->funcionario_id;
            $contratacion->clascontrato_id = $request->clascontrato_id;
            $contratacion->departamento_id = auth()->user()->departamento_id;
            $contratacion->oficina_id = $oficina_id;
            $contratacion->ubicacioncargo_id = $ubicacioncargo_id;
            $contratacion->cargo_id = $cargo_id[0]->cargo_id;
            $contratacion->especificacioncargos_id  = $cargo_id[0]->especificacioncargos_id;
            $contratacion->fechaviavilidad = $request->fechaviavilidad;
            $contratacion->clase_id = $request->clase_id;
            $contratacion->numactaposecion = null;
            $contratacion->fechaactaposesion = null;
            $contratacion->numresolucion = $request->numresolucion;
            $contratacion->fecharesolucion = $request->fecharesolucion;
            $contratacion->numcertificacion = null;
            $contratacion->fechacertificacion = null;
            $contratacion->oficpostulacion = $request->oficpostulacion;
            $contratacion->fechaoficiopostulacion = $request->fechaoficiopostulacion;
            $contratacion->fechainicial = $request->fechainicial;
            $contratacion->fechaterminacion = $request->fechaterminacion;
            $contratacion->certdiciplinariosprocuraduria = null;
            $contratacion->certantecedentespolicia = null;
            $contratacion->certresponsabilidadfiscalcontraloria = null;
            $contratacion->certmedidascorrectivaspolicia = null;
            $contratacion->funcionario2_id = $request->funcionario2_id;
            $contratacion->cargo2_id = $request->cargo2_id;

            if ($request->funcionario2_id == NULL) {
                $contratacion->oficina2_id = null;
            } else {
                $contratacion->oficina2_id = $oficina2[0]->oficina_id;
            }

            $contratacion->notaencargodespachos = $request->notaencargodespachos;
            $contratacion->delegado1_id = $request->delegado1_id;
            $contratacion->delegado2_id = $request->delegado2_id;
            $contratacion->cordinador_id = $request->cordinador_id;

            if ($request->registrador_id == NULL) {
                $contratacion->registrador_id = null;
            } else {
                $contratacion->registrador_id = $request->registrador_id;
            }

            $contratacion->estado_id = 1;
            $contratacion->user_id = auth()->user()->id;
        $contratacion->save();

        if ($request->clase_id == 4) {
            DB::table('ubicacioncargos')
            ->where('funcionario_id', $request->funcionario2_id)
            ->update(['funcionarioclase4_id' => $request->funcionario_id]);
        } elseif ($request->clase_id == 5) {
            DB::table('ubicacioncargos')
            ->where('funcionario_id', $request->funcionario2_id)
            ->update(['funcionarioclase5_id' => $request->funcionario_id]);
        } elseif ($request->clase_id == 6) {
            DB::table('ubicacioncargos')
            ->where('funcionario_id', $request->funcionario2_id)
            ->update(['funcionarioclase6_id' => $request->funcionario_id]);
        }

        DB::table('ubicacioncargos')
            ->where('id', $id_ubicacion)
            ->update(['funcionario_id' => $request->funcionario_id]);

        DB::table('ubicacioncargos')
              ->where('id', $id_ubicacion)
              ->update(['estado_id' => 2]);

        DB::table('funcionarios')
              ->where('id', $request->funcionario_id)
              ->update(['departamento_id' => auth()->user()->departamento_id]);

        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha creado el contrato al funcionario No.'.$request->funcionario_id;
        $log->save();
        return response()->json(['mensaje'=>'Registro Guardado Exitosamente' ]);
    }

    public function getCargos($id)
    {
        $ubicaciones = Ubicacioncargo::select('ubicacioncargos.*', 'cargos.name as nomcargo')
        ->join('cargos', 'ubicacioncargos.cargo_id', '=', 'cargos.id')->where('oficina_id', $id)->where('estado_id', 1)->pluck('nomcargo', 'id');
        return json_encode($ubicaciones);
    }

    public function getFuncionariocontrato($id)
    {
        $ubicacioncargo_id = Ubicacioncargo::where('funcionario_id', $id)->pluck('id');
        $ubicacioncargo1_id = Ubicacioncargo::where('funcionarioclase4_id', $id)->pluck('id');
        $ubicacioncargo2_id = Ubicacioncargo::where('funcionarioclase5_id', $id)->pluck('id');
        $ubicacioncargo3_id = Ubicacioncargo::where('funcionarioclase6_id', $id)->pluck('id');

        $num =  count($ubicacioncargo_id) + count($ubicacioncargo1_id) + count($ubicacioncargo2_id) + count($ubicacioncargo3_id);
        return json_encode($num);
    }

    public function getFuncionariocontratoactivo($id)
    {
        $ubicacioncargo_id = Ubicacioncargo::where('funcionario_id', $id)->get();
        $ubicacioncargo1_id = Ubicacioncargo::where('funcionarioclase4_id', $id)->pluck('id');
        $ubicacioncargo2_id = Ubicacioncargo::where('funcionarioclase5_id', $id)->pluck('id');
        $ubicacioncargo3_id = Ubicacioncargo::where('funcionarioclase6_id', $id)->pluck('id');

        $num =  count($ubicacioncargo_id) + count($ubicacioncargo1_id) + count($ubicacioncargo2_id) + count($ubicacioncargo3_id);
        return json_encode($num);
    }

    public function resolucionnombramientopdf(Request $request)
     {  // return $request->resolucionnumero;
        $datos = DB::table('contratos as c')
            ->select('c.*', 'f1.name as nombrefunc1', 'f1.cedula as cedulafuncionario', 'car.name as cargofunc', 'car.codigo as codigofunc', 'car.grado as gradofunc', 'car.sueldo as sueldofunc', 'ofic.name as nombreoficina', 'd1.name as nombredelegado1' , 'dep.name as nombredepartamento', 'clascontrato.name as clascontrato' )
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->where('c.numresolucion', $request->resolucionnumero)
            ->where('c.fechaterminacion', '>=', Carbon::now()->format('Y-m-d'))
            ->where('c.departamento_id', auth()->user()->departamento_id)
            ->whereIn('c.clase_id', [1, 3, 4, 5, 6])
            ->orderBy('cedulafuncionario', 'asc')
            ->get();
            foreach ($datos as $dato) {
                $delegado2datos = Funcionario::select('funcionarios.name')->find($dato->delegado2_id);
            }

        $datos2 = DB::table('contratos as c')
            ->select('c.*', 'f1.name as nombrefunc1', 'f1.cedula as cedulafuncionario', 'car.name as cargofunc', 'car.codigo as codigofunc', 'car.grado as gradofunc', 'car.sueldo as sueldofunc', 'ofic.name as nombreoficina', 'd1.name as nombredelegado1' , 'dep.name as nombredepartamento', 'clascontrato.name as clascontrato' )
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->where('c.numresolucion', $request->resolucionnumero)
            ->where('c.fechaterminacion', '>=', Carbon::now()->format('Y-m-d'))
            ->where('c.departamento_id', auth()->user()->departamento_id)
            ->where('c.funcionario2_id', NULL)
            ->where('c.clase_id', 2)
            ->orderBy('cedulafuncionario', 'asc')
            ->get();
            foreach ($datos2 as $dato) {
                $delegado2datos2 = Funcionario::select('funcionarios.name')->find($dato->delegado2_id);
            }

        $dataencargos = DB::table('contratos as c')
            ->select('c.*', 'f1.name as nombrefunc1','ofic2.name as nombreoficina2','f1.cedula as cedulafuncionario','f2.name as nombrefunc2', 'car1.name as cargofunc1','car1.codigo as codigofunc1', 'car1.grado as gradofunc1', 'car1.sueldo as sueldofunc1','car.name as cargofunc2', 'car.codigo as codigofunc2', 'car.grado as gradofunc2', 'car.sueldo as sueldofunc2', 'd1.name as nombredelegado1', 'dep.name as nombredepartamento', 'ofic.name as nombreoficina' )
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as f2','f2.id','=','c.funcionario2_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car1','car1.id','=','c.cargo_id')
            ->join('cargos as car','car.id','=','c.cargo2_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('oficinas as ofic2','ofic2.id','=','c.oficina2_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->where('c.numresolucion', $request->resolucionnumero)
            ->where('c.fechaterminacion', '>=', Carbon::now()->format('Y-m-d'))
            ->where('c.departamento_id', auth()->user()->departamento_id)
            ->where('c.clase_id', 2)
            ->orderBy('cedulafuncionario', 'asc')
            ->get();
            foreach ($dataencargos as $dato2) {
                $delegado2encargos = Funcionario::select('funcionarios.name')->find($dato2->delegado2_id);
            }
        //dd($dataencargos);

        $dataincapacidad = DB::table('contratos as c')
            ->select('c.*', 'f1.name as nombrefunc1', 'f1.cedula as cedulafuncionario', 'f2.name as nombrefunc2', 'f2.cedula as cedulafuncionario2','car.name as cargofunc', 'car.codigo as codigofunc', 'car.grado as gradofunc', 'car.sueldo as sueldofunc', 'ofic.name as nombreoficina', 'd1.name as nombredelegado1' , 'dep.name as nombredepartamento', 'clascontrato.name as clascontrato' )
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as f2','f2.id','=','c.funcionario2_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->where('c.numresolucion', $request->resolucionnumero)
            ->where('c.fechaterminacion', '>=', Carbon::now()->format('Y-m-d'))
            ->where('c.departamento_id', auth()->user()->departamento_id)
            ->whereIn('c.clase_id', [4, 5, 6])
            ->orderBy('cedulafuncionario', 'asc')
            ->get();
            foreach ($dataincapacidad as $dato3) {
                $delegado3datos = Funcionario::select('funcionarios.name')->find($dato3->delegado2_id);
            }

        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
           ->get();

        $uno = 0; $dos = 0; $tres = 0; $cuatro = 0; $cinco = 0; $seis =0; $siete =0;
        foreach ($datos as $row) {
            if ($row->clase_id == 1) { $uno += 1; }
            if ($row->clase_id == 2) { $dos += 1; }
            if ($row->clase_id == 3) { $tres += 1; }
            if ($row->clase_id == 4) { $cuatro += 1; }
            if ($row->clase_id == 5) { $cinco += 1; }
            if ($row->clase_id == 6) { $seis += 1; }
            if ($row->clascontrato_id == 3) { $siete += 1; }
        }

        $dosE = 0;
        foreach ($dataencargos as $rows) {
            if ($rows->clase_id == 2) { $dosE += 1; }
        }
        $dosE2 = 0;
        foreach ($datos2 as $rown) {
            if ($rown->clase_id == 2) { $dosE2 += 1; }
        }

        if (count($datos) == 0 && count($dataencargos) == 0 && count($datos2) == 0 && $siete == 0 ) { //ok
            return redirect()->route('contratos')->witherrorMessage('No Existen Datos con el Numero de resolucion dada');
        }
        elseif (count($datos) ==  $tres && count($dataencargos) == 0 && count($datos2) ==  0  && $siete == 0) { // hernan ok //// NOMBRAMIENTO libre remosion
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento06', compact('datos', 'user', 'delegado2datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $seis && count($dataencargos) == 0 && count($datos2) ==  0 && $siete == 0) { // NOMBRAMIENTO POR INCAPACIDADE OKOKK
        $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento07', compact('dataincapacidad', 'user', 'delegado3datos' ));
        $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $cinco && count($dataencargos) == 0 && count($datos2) ==  0 && $siete == 0) { // NOMBRAMIENTO POR maternidad   ????8
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento08', compact('dataincapacidad', 'user', 'delegado3datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $cuatro && count($dataencargos) == 0 && count($datos2) ==  0 && $siete == 0 ) { // NOMBRAMIENTO POR LICENCIA NO REMUNERADA ????9
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento09', compact('dataincapacidad', 'user', 'delegado3datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $uno  && count($dataencargos) == 0 && count($datos2) ==  0 && $siete == count($datos)) { // SUPERNUMERARIOS KOKK
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento10', compact('datos', 'datos2', 'dataencargos', 'user', 'delegado2datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) == $uno && count($dataencargos) == 0 && count($datos2) == 0 && $siete == 0) { // hernan ok //nombramientos en planta de vacancias definitivas todos  okok
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento01', compact('datos', 'user', 'delegado2datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) == 0 && count($dataencargos) == 0 && count($datos2) == $dosE2 && $siete == 0) { //encargo con vaCANCIA DEFINITIVA  okokokok
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento04', compact( 'datos2', 'user', 'delegado2datos2' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) == 0 && count($dataencargos) == $dosE && count($datos2) == 0 && $siete == 0)  { //ENCARGO MUIENTRAS DURE EN ELCARGO QUE SOLTO ALGUIEN OKOKOK
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento02', compact('datos', 'dataencargos', 'user', 'delegado2encargos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  0 && count($dataencargos) == $dosE && count($datos2) ==  $dosE2  && $siete == 0) { // ENCARGO EN VACANCIA DEFGINITIVA Y ESCALERA EN ENCARGO MIENTRAS DURE OKOKK

            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento03', compact('datos', 'datos2', 'dataencargos', 'user', 'delegado2datos2' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $uno && count($dataencargos) == 0 && count($datos2) ==  $dosE2  && $siete == 0) { // nombramiento  y encargo  OKOKK
            //dd($dataencargos);
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento11', compact('datos', 'datos2', 'dataencargos', 'user', 'delegado2datos2' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $uno && count($dataencargos) == $dosE && count($datos2) ==  0  && $siete == 0) { // nombramiento encargo  dependiente

            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento12', compact('datos', 'datos2', 'dataencargos', 'user', 'delegado2datos' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }
        elseif (count($datos) ==  $uno && count($dataencargos) == $dosE && count($datos2) ==  $dosE2  && $siete == 0) { // nombramiento encargo y escalera  OKOKK
            //dd($dataencargos);
            $pdf = PDF::loadView('sirnec.pdf.resolucionnombramiento05', compact('datos', 'datos2', 'dataencargos', 'user', 'delegado2datos2' ));
            $pdf->setPaper('legal', 'portrait'); //oficio vertical
            return $pdf->download('Resolucion_Nombramiento.pdf');
        }

    }


    public function actasdeposesion(Request $request)
    {
        //return $request->all();
        $actualiza = Contrato::where('id', $request->identificador)->get();

        if ($actualiza[0]->numactaposecion == null) {
            DB::table('contratos')
           ->where('id', $request->identificador)
           ->update(['numactaposecion' => $request->numactaposecion, 'fechaactaposesion' => $request->fechaactaposesion , 'numcertificacion' => $request->numcertificacion , 'fechacertificacion' => $request->fechacertificacion , 'certdiciplinariosprocuraduria' => $request->certdiciplinariosprocuraduria , 'certantecedentespolicia' => $request->certantecedentespolicia , 'certresponsabilidadfiscalcontraloria' => $request->certresponsabilidadfiscalcontraloria , 'certmedidascorrectivaspolicia' => $request->certmedidascorrectivaspolicia]);
        }

        $data = DB::table('contratos as c')
            ->select('c.*', 'f1.name as funcionario', 'f1.cedula as cedulafuncionario',
            'car.name as cargo', 'car.codigo as codigo', 'car.grado as grado', 'car.sueldo as sueldo', 'ofic.name as oficina', 'd1.name as delegado1', 'd1.cedula as delegado1cedula', 'd1.expedicion as delegado1expedicion'
            , 'dep.name as departamento', 'clascontrato.name as clascontrato'
              , 'espcargo.educacion as educacion', 'espcargo.equivalencias as equivalencias', 'espcargo.experiencia as experiencia', 'espcargo.funcionesesenciales as funcionesesenciales', 'espcargo.proposito as proposito', 'espcargo.areafuncional as areafuncional')
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->join('especificacioncargos as espcargo','espcargo.id','=','c.especificacioncargos_id')
            ->where('c.id', $request->identificador)
            ->get();

            foreach ($data as $data) {
                $delegado2 = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion' )->find($data->delegado2_id);
                $cordinador = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion')->find($data->cordinador_id);
                $registrador = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion')->find($data->registrador_id);
            }
        //dd($data);
        $funcionario = DB::table('funcionarios as f')
            ->select('f.*','dep.name as deparcedula', 'munic.name as municcedula', 'pais.name as paisnacimiento', 'dep1.name as deparnacimiento', 'munic1.name as municnacimiento', 'estcivil.name as estadocivil', 'ban.name as banco', 'tc.name as tipocuenta', 'rh.name as rh', 'clasmil.name as clasmilitar','eps.name as eps', 'fp.name as pension', 'cajcom.name as caja', 'arl.name as arl', 'genero.name as genero', 'barrio.name as nombrebarrio')
            ->join('departamentos as dep','dep.id','=','f.deparcedula_id')
            ->join('departamentos as dep1','dep1.id','=','f.deparnacimiento_id')
            ->join('municipios as munic','munic.id','=','f.municcedula_id')
            ->join('municipios as munic1','munic1.id','=','f.municnacimiento_id')
            ->join('generos as genero','genero.id','=','f.genero_id')
            ->join('estadosciviles as estcivil','estcivil.id','=','f.estadocivil_id')
            ->join('claslibmils as clasmil','clasmil.id','=','f.clasmilitar_id')
            ->join('bancos as ban','ban.id','=','f.banco_id')
            ->join('tipocuentas as tc','tc.id','=','f.tipocuenta_id')
            ->join('rhs as rh','rh.id','=','f.rh_id')
            ->join('epss as eps','eps.id','=','f.eps_id')
            ->join('fondopensiones as fp','fp.id','=','f.pension_id')
            ->join('compensacioncajas as cajcom','cajcom.id','=','f.caja_id')
            ->join('arls as arl','arl.id','=','f.arl_id')
            ->join('paises as pais','pais.id','=','f.paisnacimiento_id')
            ->join('barrios as barrio', 'barrio.id','=','f.barrio_id')
            ->where('f.id', $data->funcionario_id)->get();

        $estudios = DB::table('estudios as e')
            ->select('e.*', 'ne.name as niveleducativo', 'tf.name as titulosdeformacion')
            ->join('niveleseducativos as ne','ne.id','=','e.niveleducativo_id')
            ->join('titulosdeformacion as tf','tf.id','=','e.titulosdeformacion_id')
            ->where('e.funcionario_id', $data->funcionario_id)
            ->orderBy('e.niveleducativo_id', 'desc')
            ->get();

        $familiares = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.porcentpoliza','>', 0)
            ->get();

        $familiares2 = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.porcentpolizacontingente','>', 0)
            ->get();

        $familia = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->get();

        $hermanos = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.parentesco_id', 6)
            ->get();

        $hijos = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.parentesco_id', 7)
            ->get();

        $historialaboral =  DB::table('hislaborales as hl')
            ->select('hl.*', 'pais.name as pais', 'dep4.name as departamento', 'munic4.name as municipio' )
            ->join('paises as pais','pais.id','=','hl.pais_id')
            ->join('departamentos as dep4','dep4.id','=','hl.departamento_id')
            ->join('municipios as munic4','munic4.id','=','hl.municipio_id')
            ->where('hl.funcionario_id', $data->funcionario_id)->get();

        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
            ->get();

        //dd($hermanos);

        $pdf = PDF::loadView('sirnec.pdf.actaposesion', compact('data', 'user', 'delegado2', 'cordinador', 'registrador', 'funcionario', 'estudios', 'hermanos', 'hijos', 'familia', 'familiares', 'familiares2','historialaboral' ));
        $pdf->setPaper('legal', 'portrait'); //oficio vertical
        return $pdf->download('Acta_Posesion.pdf');

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

    public function update(Request $request, $id)
    {
        //
    }
    public function imprimiracta($id)
    {
        //dd($id);

        $data = DB::table('contratos as c')
            ->select('c.*', 'f1.name as funcionario', 'f1.cedula as cedulafuncionario',
            'car.name as cargo', 'car.codigo as codigo', 'car.grado as grado', 'car.sueldo as sueldo', 'ofic.name as oficina', 'd1.name as delegado1', 'd1.cedula as delegado1cedula', 'd1.expedicion as delegado1expedicion'
            , 'dep.name as departamento', 'clascontrato.name as clascontrato'
              , 'espcargo.educacion as educacion', 'espcargo.equivalencias as equivalencias', 'espcargo.experiencia as experiencia', 'espcargo.funcionesesenciales as funcionesesenciales', 'espcargo.proposito as proposito', 'espcargo.areafuncional as areafuncional')
            ->join('funcionarios as f1','f1.id','=','c.funcionario_id')
            ->join('funcionarios as d1','d1.id','=','c.delegado1_id')
            ->join('cargos as car','car.id','=','c.cargo_id')
            ->join('oficinas as ofic','ofic.id','=','c.oficina_id')
            ->join('departamentos as dep','dep.id','=','c.departamento_id')
            ->join('clascontratos as clascontrato','clascontrato.id','=','c.clascontrato_id')
            ->join('especificacioncargos as espcargo','espcargo.id','=','c.especificacioncargos_id')
            ->where('c.id', $id)
            ->get();

            foreach ($data as $data) {
                $delegado2 = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion' )->find($data->delegado2_id);
                $cordinador = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion')->find($data->cordinador_id);
                $registrador = Funcionario::select('funcionarios.name', 'funcionarios.cedula', 'funcionarios.expedicion')->find($data->registrador_id);
            }
        //dd($data);
        $funcionario = DB::table('funcionarios as f')
            ->select('f.*','dep.name as deparcedula', 'munic.name as municcedula', 'pais.name as paisnacimiento', 'dep1.name as deparnacimiento', 'munic1.name as municnacimiento', 'estcivil.name as estadocivil', 'ban.name as banco', 'tc.name as tipocuenta', 'rh.name as rh', 'clasmil.name as clasmilitar','eps.name as eps', 'fp.name as pension', 'cajcom.name as caja', 'arl.name as arl', 'genero.name as genero', 'barrio.name as nombrebarrio')
            ->join('departamentos as dep','dep.id','=','f.deparcedula_id')
            ->join('departamentos as dep1','dep1.id','=','f.deparnacimiento_id')
            ->join('municipios as munic','munic.id','=','f.municcedula_id')
            ->join('municipios as munic1','munic1.id','=','f.municnacimiento_id')
            ->join('generos as genero','genero.id','=','f.genero_id')
            ->join('estadosciviles as estcivil','estcivil.id','=','f.estadocivil_id')
            ->join('claslibmils as clasmil','clasmil.id','=','f.clasmilitar_id')
            ->join('bancos as ban','ban.id','=','f.banco_id')
            ->join('tipocuentas as tc','tc.id','=','f.tipocuenta_id')
            ->join('rhs as rh','rh.id','=','f.rh_id')
            ->join('epss as eps','eps.id','=','f.eps_id')
            ->join('fondopensiones as fp','fp.id','=','f.pension_id')
            ->join('compensacioncajas as cajcom','cajcom.id','=','f.caja_id')
            ->join('arls as arl','arl.id','=','f.arl_id')
            ->join('paises as pais','pais.id','=','f.paisnacimiento_id')
            ->join('barrios as barrio', 'barrio.id','=','f.barrio_id')
            ->where('f.id', $data->funcionario_id)->get();

        $estudios = DB::table('estudios as e')
            ->select('e.*', 'ne.name as niveleducativo', 'tf.name as titulosdeformacion')
            ->join('niveleseducativos as ne','ne.id','=','e.niveleducativo_id')
            ->join('titulosdeformacion as tf','tf.id','=','e.titulosdeformacion_id')
            ->where('e.funcionario_id', $data->funcionario_id)
            ->orderBy('e.niveleducativo_id', 'desc')
            ->get();

        $familiares = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.porcentpoliza','>', 0)
            ->get();

        $familiares2 = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.porcentpolizacontingente','>', 0)
            ->get();

        $familia = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->get();

        $hermanos = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.parentesco_id', 6)
            ->get();

        $hijos = DB::table('familiares as fam')
            ->select('fam.*', 'paren.name as parentesco' )
            ->join('parentescos as paren','paren.id','=','fam.parentesco_id')
            ->where('fam.funcionario_id', $data->funcionario_id)
            ->where('fam.parentesco_id', 7)
            ->get();

        $historialaboral =  DB::table('hislaborales as hl')
            ->select('hl.*', 'pais.name as pais', 'dep4.name as departamento', 'munic4.name as municipio' )
            ->join('paises as pais','pais.id','=','hl.pais_id')
            ->join('departamentos as dep4','dep4.id','=','hl.departamento_id')
            ->join('municipios as munic4','munic4.id','=','hl.municipio_id')
            ->where('hl.funcionario_id', $data->funcionario_id)->get();

        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
            ->get();

        //dd($hermanos);

        $pdf = PDF::loadView('sirnec.pdf.actaposesion', compact('data', 'user', 'delegado2', 'cordinador', 'registrador', 'funcionario', 'estudios', 'hermanos', 'hijos', 'familia', 'familiares', 'familiares2','historialaboral' ));
        $pdf->setPaper('legal', 'portrait'); //oficio vertical
        return $pdf->download('Acta_Posesion.pdf');


    }
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
            Contrato::where('id', $id)->update(['estado_id'=>2]);
            if ($contrato->clase_id == 1 || $contrato->clase_id == 2 || $contrato->clase_id == 3) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionario_id'=>null , 'estado_id'=>1]); }
            if ($contrato->clase_id == 4) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase4_id'=>null , 'estado_id'=>1]); }
            if ($contrato->clase_id == 5) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase5_id'=>null , 'estado_id'=>1]); }
            if ($contrato->clase_id == 6) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase6_id'=>null , 'estado_id'=>1]); }
        $contrato->delete();
        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha Eliminado el contrato id:'.$id.'del funcionario '.$contrato->funcionario_id.'en la ubicacion No.'.$contrato->ubicacioncargo_id ;
        $log->save();
        return redirect()->route('contratos')->withSuccessMessage('Contrato Eliminado Satisfactoriamente');

    }

    public function cancelarcontrato($id)
    {
        $contrato = Contrato::find($id);
        $hoy = Carbon::now()->format('Y-m-d');

        Contrato::where('id', $id)->update(['estado_id'=>2, 'fechaterminacion'=>$hoy ]);
        if ($contrato->clase_id == 1 || $contrato->clase_id == 2 || $contrato->clase_id == 3) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionario_id'=>null , 'estado_id'=>1]); }
        if ($contrato->clase_id == 4) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase4_id'=>null , 'estado_id'=>1]); }
        if ($contrato->clase_id == 5) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase5_id'=>null , 'estado_id'=>1]); }
        if ($contrato->clase_id == 6) { Ubicacioncargo::where('funcionario_id', $contrato->funcionario_id)->update(['funcionarioclase6_id'=>null , 'estado_id'=>1]); }

        /*codigo del log de auditoria*/
        $log = new Log;
            $log->usuario_id = auth()->user()->id;
            $log->departamento_id = auth()->user()->departamento_id;
            $log->oficina_id = auth()->user()->oficina_id;
            $log->descripcion = 'Se ha Cancelado el Contrato con id :'.$id.'del funcionario '.$contrato->funcionario_id.'en la ubicacion No.'.$contrato->ubicacioncargo_id ;
        $log->save();
        return redirect()->route('contratos')->withSuccessMessage('Contrato Cancelado Satisfactoriamente');

    }



}
