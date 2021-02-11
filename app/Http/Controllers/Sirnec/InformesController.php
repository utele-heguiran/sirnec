<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use App\models\Analisisrasra14;
use App\models\Codigosrechazo;
use App\models\Estadisticarechazo;
use App\models\Estadisticaregistro;
use App\models\Oficina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class InformesController extends Controller
{
    public function index()
    {
        $data = DB::table('departamentos')
            ->where('id', '=', auth()->user()->departamento_id)
            ->get();

        $date = Carbon::now()->locale('es')->isoFormat('LLLL');
        $año = intval(date("Y"));

        $analisisrasra14 = DB::table('analisisrasra14')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 1)->get();
        $contaranalisisrasra14 = count($analisisrasra14);
        if ($contaranalisisrasra14 == 0) {
            $analisisrasra14 = new Analisisrasra14();
                $analisisrasra14->departamento_id = auth()->user()->departamento_id;
                $analisisrasra14->ano = $año;
                $analisisrasra14->clase14o13 = 1;
                $analisisrasra14->feccreacion = Carbon::now();
                $analisisrasra14->user_id = auth()->user()->id;
            $analisisrasra14->save();
        }
        $dataanalisisrasra14 = DB::table('analisisrasra14')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 1)->get();

        //dd($dataanalisisrasra14[0]->id);

        $analisisrasra13 = DB::table('analisisrasra14')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 0)->get();
        $contaranalisisrasra13 = count($analisisrasra13);
        if ($contaranalisisrasra13 == 0) {
            $analisisrasra13 = new Analisisrasra14();
                $analisisrasra13->departamento_id = auth()->user()->departamento_id;
                $analisisrasra13->ano = $año;
                $analisisrasra13->clase14o13 = 0;
                $analisisrasra13->feccreacion = Carbon::now();
                $analisisrasra13->user_id = auth()->user()->id;
            $analisisrasra13->save();
        }
        $dataanalisisrasra13 = DB::table('analisisrasra14')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 0)->get();

        $depar = DB::table('departamentos')->select('id')->get();
        foreach ($depar as $key => $value) {
            $producion = DB::table('scrs')->where('departamento_id', '=', $value->id)->get();
            $resulprod[] = collect([ 'id' => $value->id, 'cantidad' => count($producion) ])->toArray();
        }
        //dd($resulprod);

        if(session('success_message')){ Alert::success('Excelente!', session('success_message'));}
        if(session('error_message')){ Alert::error('Error!', session('error_message')); }
        return view('sirnec.informe.index', compact('data', 'dataanalisisrasra14', 'dataanalisisrasra13', 'resulprod'));
    }

    public function informe_raft30pdf(Request $request)
    {
        $oficregis = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->where('estado_id', '=', 1)->whereIn('claseoficina_id', [2, 3, 4, 5, 7])->orderBy('name', 'asc')->get();
        $oficnotar = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->where('estado_id', '=', 1)->where('claseoficina_id', '=', 6)->orderBy('name', 'asc')->get();

        foreach ($oficregis as $oficina) {

            $rcn_indigenas = 0;
            $rcn_afro = 0;
            $rcn_decreto290 = 0;
            $rcn_mayores = 0;
            $rcn_menores = 0;
            $rcn_masculino = 0;
            $rcn_femenino = 0;
            $rcn_total = 0;
            $rcn_certificaciones = 0;
            $rcm_inscritos = 0;
            $rcm_certificaciones = 0;
            $rcd_masculino = 0;
            $rcd_femenino = 0;
            $rcd_mayores = 0;
            $rcd_menores = 0;
            $rcd_indigenas = 0;
            $rcd_afro = 0;
            $rcd_total = 0;
            $rcd_certificaciones = 0;

            $data =  DB::table('estadisticaregistros')
                ->select('estadisticaregistros.*')
                ->where('estadisticaregistros.oficina_id', '=', $oficina->id)
                ->whereBetween('estadisticaregistros.fechainic',array($request->input('fechainicial'),$request->input('fechafinal')))
                ->get();

                foreach ($data as $row) {

                    $rcn_indigenas += $row->rcn_indigenas;
                    $rcn_afro += $row->rcn_afro;
                    $rcn_decreto290 += $row->rcn_decreto290;
                    $rcn_mayores += $row->rcn_mayores;
                    $rcn_menores += $row->rcn_menores;
                    $rcn_masculino += $row->rcn_masculino;
                    $rcn_femenino += $row->rcn_femenino;
                    $rcn_total += $row->rcn_masculino + $row->rcn_femenino;
                    $rcn_certificaciones += $row->rcn_certificaciones;
                    $rcm_inscritos += $row->rcm_inscritos;
                    $rcm_certificaciones += $row->rcm_certificaciones;
                    $rcd_indigenas += $row->rcd_indigenas;
                    $rcd_afro += $row->rcd_afro;
                    $rcd_menores += $row->rcd_menores;
                    $rcd_mayores += $row->rcd_mayores;
                    $rcd_masculino += $row->rcd_masculino;
                    $rcd_femenino += $row->rcd_femenino;
                    $rcd_total += $row->rcd_masculino + $row->rcd_femenino;
                    $rcd_certificaciones+= $row->rcd_certificaciones;

                }
                $dataregis[] = collect([ 'id' => $oficina->id, 'codpmt' => $oficina->codpmt, 'nombre' => $oficina->name, 'rcn_indigenas' => $rcn_indigenas, 'rcn_afro'=> $rcn_afro, 'rcn_decreto290' => $rcn_decreto290, 'rcn_mayores'=> $rcn_mayores, 'rcn_menores'=>$rcn_menores, 'rcn_masculino'=> $rcn_masculino, 'rcn_femenino'=>$rcn_femenino, 'rcn_total'=>$rcn_total, 'rcn_certificaciones'=>$rcn_certificaciones,  'rcm_inscritos'=>$rcm_inscritos, 'rcm_certificaciones'=>$rcm_certificaciones, 'rcd_indigenas' => $rcd_indigenas, 'rcd_afro'=> $rcd_afro, 'rcd_menores'=>$rcd_menores, 'rcd_mayores'=> $rcd_mayores,  'rcd_masculino'=> $rcd_masculino, 'rcd_femenino'=>$rcd_femenino, 'rcd_total'=>$rcd_total, 'rcd_certificaciones'=>$rcd_certificaciones  ])->toArray();
        }

        //dd($dataregis);

        foreach ($oficnotar as $oficina) {

            $rcn_indigenas = 0;
            $rcn_afro = 0;
            $rcn_decreto290 = 0;
            $rcn_mayores = 0;
            $rcn_menores = 0;
            $rcn_masculino = 0;
            $rcn_femenino = 0;
            $rcn_total = 0;
            $rcn_certificaciones = 0;
            $rcm_inscritos = 0;
            $rcm_certificaciones = 0;
            $rcd_masculino = 0;
            $rcd_femenino = 0;
            $rcd_mayores = 0;
            $rcd_menores = 0;
            $rcd_indigenas = 0;
            $rcd_afro = 0;
            $rcd_total = 0;
            $rcd_certificaciones = 0;

            $data =  DB::table('estadisticaregistros')
                ->select('estadisticaregistros.*')
                ->where('estadisticaregistros.oficina_id', '=', $oficina->id)
                ->whereBetween('estadisticaregistros.fechainic',array($request->input('fechainicial'),$request->input('fechafinal')))
                ->get();

                foreach ($data as $row) {

                    $rcn_indigenas += $row->rcn_indigenas;
                    $rcn_afro += $row->rcn_afro;
                    $rcn_decreto290 += $row->rcn_decreto290;
                    $rcn_mayores += $row->rcn_mayores;
                    $rcn_menores += $row->rcn_menores;
                    $rcn_masculino += $row->rcn_masculino;
                    $rcn_femenino += $row->rcn_femenino;
                    $rcn_total += $row->rcn_masculino + $row->rcn_femenino;
                    $rcn_certificaciones += $row->rcn_certificaciones;
                    $rcm_inscritos += $row->rcm_inscritos;
                    $rcm_certificaciones += $row->rcm_certificaciones;
                    $rcd_indigenas += $row->rcd_indigenas;
                    $rcd_afro += $row->rcd_afro;
                    $rcd_menores += $row->rcd_menores;
                    $rcd_mayores += $row->rcd_mayores;
                    $rcd_masculino += $row->rcd_masculino;
                    $rcd_femenino += $row->rcd_femenino;
                    $rcd_total += $row->rcd_masculino + $row->rcd_femenino;
                    $rcd_certificaciones+= $row->rcd_certificaciones;

                }
                $datanotar[] = collect([ 'id' => $oficina->id, 'codpmt' => $oficina->codpmt, 'nombre' => $oficina->name, 'rcn_indigenas' => $rcn_indigenas, 'rcn_afro'=> $rcn_afro, 'rcn_decreto290' => $rcn_decreto290, 'rcn_mayores'=> $rcn_mayores, 'rcn_menores'=>$rcn_menores, 'rcn_masculino'=> $rcn_masculino, 'rcn_femenino'=>$rcn_femenino, 'rcn_total'=>$rcn_total, 'rcn_certificaciones'=>$rcn_certificaciones,  'rcm_inscritos'=>$rcm_inscritos, 'rcm_certificaciones'=>$rcm_certificaciones, 'rcd_indigenas' => $rcd_indigenas, 'rcd_afro'=> $rcd_afro, 'rcd_menores'=>$rcd_menores, 'rcd_mayores'=> $rcd_mayores,  'rcd_masculino'=> $rcd_masculino, 'rcd_femenino'=>$rcd_femenino, 'rcd_total'=>$rcd_total, 'rcd_certificaciones'=>$rcd_certificaciones  ])->toArray();
        }

        //dd($datanotar);

        $user = DB::table('usuarios')
            ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
            ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
            ->where('usuarios.id', auth()->user()->id)
           ->get();

        //dd($user);

        $fechainicial = $request->input('fechainicial');
        $fechafinal = $request->input('fechafinal');

        $oficinas = Oficina::oficinasdepartamentoact()->whereIn('claseoficina_id', [2, 3, 4, 5, 6, 7])->get();
        foreach ($oficinas as $key => $oficina) {
            $dato = Estadisticaregistro::regpordep()->where('estadisticaregistros.oficina_id', '=', $oficina->id)->whereBetween('estadisticaregistros.fechainic',array($request->input('fechainicial'),$request->input('fechafinal')))->get();
            if (count($dato) < 1 ) {
               $faltantes[] =  $oficina->name;
            }
        }
        //dd($faltantes);

        $date = Carbon::now()->locale('es')->isoFormat('LLLL');
        $pdf = PDF::loadView('sirnec.pdf.inf_raft30', compact('dataregis', 'datanotar', 'date', 'user', 'fechainicial', 'fechafinal', 'faltantes'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Inf-Raft-30.pdf');

    }

    public function informe_rechazospdf(Request $request)
    {
        $oficinas = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->whereIn('claseoficina_id', [2, 3, 4, 5, 7])->get();
        $codrechazos = DB::table('codigosrechazos')->get();

        $totalgeninherentes = 0;
        foreach ($oficinas as $oficina) {
            $cod1000 = 0;
            $cod1001 = 0;
            $cod1002 = 0;
            $cod1012 = 0;
            $cod1015 = 0;
            $cod1016 = 0;
            $cod1022 = 0;
            $cod1031 = 0;
            $cod1043 = 0;
            $cod1050 = 0;
            $cod1061 = 0;
            $cod1070 = 0;
            $cod2011 = 0;
            $cod2021 = 0;
            $cod2022 = 0;
            $cod3000 = 0;
            $cod4003 = 0;
            $totalofic = 0;
            $totalinh = 0;

            foreach ($codrechazos as $codrechazo) {
                $data =  DB::table('estadisticarechazos')
                    ->select('estadisticarechazos.codigosrechazo_id')
                    ->where('estadisticarechazos.oficina_id', '=', $oficina->id)
                    ->where('estadisticarechazos.codigosrechazo_id', '=', $codrechazo->id)
                    ->whereBetween('estadisticarechazos.fecrechazo',array($request->input('fechainicial'),$request->input('fechafinal')))
                    ->get();

                    if ($codrechazo->id == 1000) {
                       $cod1000 = count($data);
                    }if ($codrechazo->id == 1001) {
                        $cod1001 = count($data);
                    }if ($codrechazo->id == 1002) {
                        $cod1002 = count($data);
                    }if ($codrechazo->id == 1012) {
                        $cod1012 = count($data);
                    }if ($codrechazo->id == 1015) {
                        $cod1015 = count($data);
                    }if ($codrechazo->id == 1016) {
                        $cod1016 = count($data);
                    }if ($codrechazo->id == 1022) {
                        $cod1022 = count($data);
                    }if ($codrechazo->id == 1031) {
                        $cod1031 = count($data);
                    }if ($codrechazo->id == 1043) {
                        $cod1043 = count($data);
                    }if ($codrechazo->id == 1050) {
                        $cod1050 = count($data);
                    }if ($codrechazo->id == 1061) {
                        $cod1061 = count($data);
                    }if ($codrechazo->id == 1070) {
                        $cod1070 = count($data);
                    }if ($codrechazo->id == 2011) {
                        $cod2011 = count($data);
                    }if ($codrechazo->id == 2021) {
                        $cod2021 = count($data);
                    }if ($codrechazo->id == 2022) {
                        $cod2022 = count($data);
                    }if ($codrechazo->id == 3000) {
                        $cod3000 = count($data);
                    }if ($codrechazo->id == 4003) {
                        $cod4003 = count($data);
                    }

                    $totalofic = $cod1000 + $cod1001 + $cod1002 + $cod1012 + $cod1015 + $cod1016 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod1061 + $cod1070 + $cod2011 + $cod2021 + $cod2022 + $cod3000 + $cod4003;
                    $totalinhofic = $cod1012 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod2011;
            }
            $totalgeninherentes += $totalinhofic;
            $resultados[] = collect([ 'id' => $oficina->id, 'codpmt' => $oficina->codpmt, 'nombre' => $oficina->name,  'cod1000' => $cod1000, 'cod1001' => $cod1001, 'cod1002' => $cod1002, 'cod1012' => $cod1012, 'cod1015' => $cod1015, 'cod1016' => $cod1016, 'cod1022' => $cod1022, 'cod1031' => $cod1031, 'cod1043' => $cod1043, 'cod1050' => $cod1050, 'cod1061' => $cod1061, 'cod1070' => $cod1070, 'cod2011' => $cod2011, 'cod2021' => $cod2021, 'cod2022' => $cod2022, 'cod3000' => $cod3000, 'cod4003' => $cod4003, 'totalofic'=> $totalofic, 'totalinhofic'=>$totalinhofic, 'totalgeninherentes'=>$totalgeninherentes ])->toArray();
        }

        //dd($resultados);

        foreach ($resultados as $val) {
            $valortotalinherentes = $val['totalgeninherentes'];
        }

            // lo recorre y lo ordena por el campo totalinhofic'
            foreach ($resultados as $key => $row) {
                $aux[$key] = $row['totalinhofic'];
            }
            array_multisort($aux, SORT_DESC, $resultados);
            //fin de la organizacion del array multidimenncional

            if ($valortotalinherentes != 0) {
                foreach ($resultados as $key => $value) {
                    $unico[] = collect([ 'id'=> $value['id'], 'codpmt'=>$value['codpmt'], 'nombre'=>$value['nombre'], 'cod1000'=>$value['cod1000'], 'cod1001'=>$value['cod1001'], 'cod1002'=>$value['cod1002'], 'cod1012'=>$value['cod1012'], 'cod1015'=>$value['cod1015'], 'cod1016'=>$value['cod1016'], 'cod1022'=>$value['cod1022'], 'cod1031'=>$value['cod1031'], 'cod1043'=>$value['cod1043'], 'cod1050'=>$value['cod1050'], 'cod1061'=>$value['cod1061'], 'cod1070'=>$value['cod1070'], 'cod2011'=>$value['cod2011'], 'cod2021'=>$value['cod2021'], 'cod2022'=>$value['cod2022'], 'cod3000'=>$value['cod3000'], 'cod4003'=>$value['cod4003'], 'totalofic'=>$value['totalofic'], 'totalinhofic'=>$value['totalinhofic'], 'porcentaje'=> number_format( $value['totalinhofic']/$valortotalinherentes * 100, 2, ",", ".")." %"  ])->toArray();
                }
            }

            $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
                ->get();

            $fechainicial = $request->input('fechainicial');
            $fechafinal = $request->input('fechafinal');
            $date = Carbon::now()->locale('es')->isoFormat('LLLL');

            $pdf = PDF::loadView('sirnec.pdf.inf_ranking_rechazos', compact('unico', 'user', 'fechainicial', 'fechafinal', 'date', 'codrechazos'  ));
            $pdf->setPaper('letter', 'landscape');
            return $pdf->download('Inf-Ranking_Rechazos.pdf');
    }

    public function informe_devolucionespdf(Request $request)
    {
        //dd($request->fechainicial);
        $oficinas = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->whereIn('claseoficina_id', [2, 3, 4, 5, 7])->get();
        $coddevoluciones = DB::table('clasedevoluciones')->get();

        foreach ($oficinas as $oficina) {

            $a_dev = 0;
            $b_dev = 0;
            $c_dev = 0;
            $d_dev = 0;
            $e_dev = 0;
            $f_dev = 0;
            $g_dev = 0;
            $h_dev = 0;
            $k_dev = 0;
            $l_dev = 0;
            $m_dev = 0;
            $n_dev = 0;
            $o_dev = 0;
            $p_dev = 0;
            $q_dev = 0;
            $r_dev = 0;
            $s_dev = 0;
            $t_dev = 0;
            $u_dev = 0;
            $v_dev = 0;
            $w_dev = 0;
            $totalgeneralofic = 0;
            $valortotal = 0;

            foreach ($coddevoluciones as $coddevolucion) {
                $data =  DB::table('devoluciones')
                        ->select('devoluciones.clasedevolucion_id')
                        ->where('devoluciones.oficina_id', '=', $oficina->id)
                        ->where('devoluciones.clasedevolucion_id', '=', $coddevolucion->id)
                        ->whereBetween('devoluciones.fecdevolucion',array($request->input('fechainicial'),$request->input('fechafinal')))
                        ->get();

                    if ($coddevolucion->id == 1) { $a_dev = count($data); }
                    if ($coddevolucion->id == 2) { $b_dev = count($data); }
                    if ($coddevolucion->id == 3) { $c_dev = count($data); }
                    if ($coddevolucion->id == 4) { $d_dev = count($data); }
                    if ($coddevolucion->id == 5) { $e_dev = count($data); }
                    if ($coddevolucion->id == 6) { $f_dev = count($data); }
                    if ($coddevolucion->id == 7) { $g_dev = count($data); }
                    if ($coddevolucion->id == 8) { $h_dev = count($data); }
                    if ($coddevolucion->id == 9) { $k_dev = count($data); }
                    if ($coddevolucion->id == 10) { $l_dev = count($data); }
                    if ($coddevolucion->id == 11) { $m_dev = count($data); }
                    if ($coddevolucion->id == 12) { $n_dev = count($data); }
                    if ($coddevolucion->id == 13) { $o_dev = count($data); }
                    if ($coddevolucion->id == 14) { $p_dev = count($data); }
                    if ($coddevolucion->id == 15) { $q_dev = count($data); }
                    if ($coddevolucion->id == 16) { $r_dev = count($data); }
                    if ($coddevolucion->id == 17) { $s_dev = count($data); }
                    if ($coddevolucion->id == 18) { $t_dev = count($data); }
                    if ($coddevolucion->id == 19) { $u_dev = count($data); }
                    if ($coddevolucion->id == 20) { $v_dev = count($data); }
                    if ($coddevolucion->id == 21) { $w_dev = count($data); }

                    $totalofic = $a_dev + $b_dev + $c_dev + $d_dev + $e_dev + $f_dev + $g_dev + $h_dev + $k_dev + $l_dev + $m_dev + $n_dev + $o_dev + $p_dev + $q_dev + $r_dev + $s_dev + $t_dev + $u_dev + $v_dev + $w_dev;
            }

            $resultados[] = collect([ 'id' => $oficina->id, 'codpmt' => $oficina->codpmt, 'nombre' => $oficina->name,  'a' => $a_dev,  'b' => $b_dev,  'c' => $c_dev,  'd' => $d_dev,  'e' => $e_dev,  'f' => $f_dev,  'g' => $g_dev,  'h' => $h_dev,  'k' => $k_dev,  'l' => $l_dev,  'm' => $m_dev,  'n' => $n_dev,  'o' => $o_dev,  'p' => $p_dev,  'q' => $q_dev,  'r' => $r_dev,  's' => $s_dev,  't' => $t_dev,  'u' => $u_dev,  'v' => $v_dev,  'w' => $w_dev, 'totalofic'=> $totalofic ])->toArray();
        }
        //dd($resultados);

            // lo recorro para totalizar el 100% de las oficinas
            foreach ($resultados as $val) {
                $valortotal += $val['totalofic'];
            }

        //dd($valortotal);

            // lo recorre y lo ordena por el campo totalinhofic'
                foreach ($resultados as $key => $row) {
                    $aux[$key] = $row['totalofic'];
                }
                array_multisort($aux, SORT_DESC, $resultados);
            //fin de la organizacion del array multidimenncional

            if ($valortotal != 0) {
                foreach ($resultados as $key => $value) {
                    $unico[] = collect([ 'id'=> $value['id'], 'codpmt'=>$value['codpmt'], 'nombre'=>$value['nombre'], 'a'=>$value['a'], 'b'=>$value['b'], 'c'=>$value['c'], 'd'=>$value['d'], 'e'=>$value['e'], 'f'=>$value['f'], 'g'=>$value['g'], 'h'=>$value['h'], 'k'=>$value['k'], 'l'=>$value['l'], 'm'=>$value['m'], 'n'=>$value['n'], 'o'=>$value['o'], 'p'=>$value['p'], 'q'=>$value['q'], 'r'=>$value['r'], 's'=>$value['s'], 't'=>$value['t'], 'u'=>$value['u'], 'v'=>$value['v'], 'w'=>$value['w'], 'totalofic'=>$value['totalofic'], 'porcentaje'=> number_format( $value['totalofic']/$valortotal * 100, 2, ",", ".")." %"  ])->toArray();
                }
            }

        //dd($unico);

        $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
                ->get();

            $fechainicial = $request->input('fechainicial');
            $fechafinal = $request->input('fechafinal');
            $date = Carbon::now()->locale('es')->isoFormat('LLLL');

            $pdf = PDF::loadView('sirnec.pdf.inf_ranking_devoluciones', compact( 'user', 'fechainicial', 'fechafinal', 'date', 'unico', 'coddevoluciones' ));
            $pdf->setPaper('letter', 'landscape');
            return $pdf->download('Inf-Ranking_Devoluciones.pdf');
    }

    public function informe_rasra14pdf(Request $request)
    {
        //dd($request->all());
        $date = Carbon::now()->locale('es')->isoFormat('LLLL');
        $año = date("Y");
        $id = intval($request->id);
        $user = auth()->user()->id;
        //dd($user);

        if (!is_null($request->analisis1trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id1trim' => $user]); }
        if (!is_null($request->analisis2trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id2trim' => $user]); }
        if (!is_null($request->analisis3trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id3trim' => $user]); }
        if (!is_null($request->analisis4trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id4trim' => $user]); }

        // actualiza el registro de los analisis hechos al rasra14
        Analisisrasra14::findOrFail($id)->update($request->all());

        $oficinas = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->whereIn('claseoficina_id', [2, 3, 4, 5, 7])->orderBy('name', 'asc')->get();
        $codrechazos = DB::table('codigosrechazos')->get();

        $totalgeninherentes1trim = 0;   $totalgenoficinas1trim = 0;     $totalgeninherentes2trim = 0;   $totalgenoficinas2trim = 0;
        $totalgeninherentes3trim = 0;   $totalgenoficinas3trim = 0;     $totalgeninherentes4trim = 0;   $totalgenoficinas4trim = 0;

        foreach ($oficinas as $oficina) {

            //recorre el primer trimestre
            $cod1000 = 0;   $cod1001 = 0;   $cod1002 = 0;   $cod1012 = 0;   $cod1015 = 0;   $cod1016 = 0;
            $cod1022 = 0;   $cod1031 = 0;   $cod1043 = 0;   $cod1050 = 0;   $cod1061 = 0;   $cod1070 = 0;
            $cod2011 = 0;   $cod2021 = 0;   $cod2022 = 0;   $cod3000 = 0;   $cod4003 = 0;

            $totalofic1t = 0;      $totalinh1t = 0;    $totalofic2t = 0;      $totalinh2t = 0;
            $totalofic3t = 0;      $totalinh3t = 0;    $totalofic4t = 0;      $totalinh4t = 0;

            foreach ($codrechazos as $codrechazo) {
                $data =  DB::table('estadisticarechazos')
                    ->select('estadisticarechazos.codigosrechazo_id')
                    ->where('estadisticarechazos.oficina_id', '=', $oficina->id)
                    ->where('estadisticarechazos.codigosrechazo_id', '=', $codrechazo->id)
                    ->whereBetween('estadisticarechazos.fecrechazo',array("$año-01-01","$año-03-31"))
                    ->get();

                    if ($codrechazo->id == 1000) {  $cod1000 = count($data); }if ($codrechazo->id == 1001) {  $cod1001 = count($data);}
                    if ($codrechazo->id == 1002) {  $cod1002 = count($data); }if ($codrechazo->id == 1012) {  $cod1012 = count($data);}
                    if ($codrechazo->id == 1015) {  $cod1015 = count($data); }if ($codrechazo->id == 1016) {  $cod1016 = count($data);}
                    if ($codrechazo->id == 1022) {  $cod1022 = count($data); }if ($codrechazo->id == 1031) {  $cod1031 = count($data);}
                    if ($codrechazo->id == 1043) {  $cod1043 = count($data); }if ($codrechazo->id == 1050) {  $cod1050 = count($data);}
                    if ($codrechazo->id == 1061) {  $cod1061 = count($data); }if ($codrechazo->id == 1070) {  $cod1070 = count($data);}
                    if ($codrechazo->id == 2011) {  $cod2011 = count($data); }if ($codrechazo->id == 2021) {  $cod2021 = count($data);}
                    if ($codrechazo->id == 2022) {  $cod2022 = count($data); }if ($codrechazo->id == 3000) {  $cod3000 = count($data);}
                    if ($codrechazo->id == 4003) {  $cod4003 = count($data);}

                    $totalofic1t = $cod1000 + $cod1001 + $cod1002 + $cod1012 + $cod1015 + $cod1016 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod1061 + $cod1070 + $cod2011 + $cod2021 + $cod2022 + $cod3000 + $cod4003;
                    $totalinhofic1t = $cod1012 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod2011;
            }

            $totalgeninherentes1trim += $totalinhofic1t;
            $totalgenoficinas1trim += $totalofic1t;

            //recorre el segundo trimestre
            $cod1000 = 0;   $cod1001 = 0;   $cod1002 = 0;   $cod1012 = 0;   $cod1015 = 0;   $cod1016 = 0;
            $cod1022 = 0;   $cod1031 = 0;   $cod1043 = 0;   $cod1050 = 0;   $cod1061 = 0;   $cod1070 = 0;
            $cod2011 = 0;   $cod2021 = 0;   $cod2022 = 0;   $cod3000 = 0;   $cod4003 = 0;

            foreach ($codrechazos as $codrechazo) {
                $data =  DB::table('estadisticarechazos')
                    ->select('estadisticarechazos.codigosrechazo_id')
                    ->where('estadisticarechazos.oficina_id', '=', $oficina->id)
                    ->where('estadisticarechazos.codigosrechazo_id', '=', $codrechazo->id)
                    ->whereBetween('estadisticarechazos.fecrechazo',array("$año-04-01","$año-06-30"))
                    ->get();

                    if ($codrechazo->id == 1000) {  $cod1000 = count($data); }if ($codrechazo->id == 1001) {  $cod1001 = count($data);}
                    if ($codrechazo->id == 1002) {  $cod1002 = count($data); }if ($codrechazo->id == 1012) {  $cod1012 = count($data);}
                    if ($codrechazo->id == 1015) {  $cod1015 = count($data); }if ($codrechazo->id == 1016) {  $cod1016 = count($data);}
                    if ($codrechazo->id == 1022) {  $cod1022 = count($data); }if ($codrechazo->id == 1031) {  $cod1031 = count($data);}
                    if ($codrechazo->id == 1043) {  $cod1043 = count($data); }if ($codrechazo->id == 1050) {  $cod1050 = count($data);}
                    if ($codrechazo->id == 1061) {  $cod1061 = count($data); }if ($codrechazo->id == 1070) {  $cod1070 = count($data);}
                    if ($codrechazo->id == 2011) {  $cod2011 = count($data); }if ($codrechazo->id == 2021) {  $cod2021 = count($data);}
                    if ($codrechazo->id == 2022) {  $cod2022 = count($data); }if ($codrechazo->id == 3000) {  $cod3000 = count($data);}
                    if ($codrechazo->id == 4003) {  $cod4003 = count($data);}

                    $totalofic2t = $cod1000 + $cod1001 + $cod1002 + $cod1012 + $cod1015 + $cod1016 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod1061 + $cod1070 + $cod2011 + $cod2021 + $cod2022 + $cod3000 + $cod4003;
                    $totalinhofic2t = $cod1012 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod2011;
                }

            $totalgeninherentes2trim += $totalinhofic2t;
            $totalgenoficinas2trim += $totalofic2t;

            //recorre el tercer trimestre
            $cod1000 = 0;   $cod1001 = 0;   $cod1002 = 0;   $cod1012 = 0;   $cod1015 = 0;   $cod1016 = 0;
            $cod1022 = 0;   $cod1031 = 0;   $cod1043 = 0;   $cod1050 = 0;   $cod1061 = 0;   $cod1070 = 0;
            $cod2011 = 0;   $cod2021 = 0;   $cod2022 = 0;   $cod3000 = 0;   $cod4003 = 0;

            foreach ($codrechazos as $codrechazo) {
                $data =  DB::table('estadisticarechazos')
                    ->select('estadisticarechazos.codigosrechazo_id')
                    ->where('estadisticarechazos.oficina_id', '=', $oficina->id)
                    ->where('estadisticarechazos.codigosrechazo_id', '=', $codrechazo->id)
                    ->whereBetween('estadisticarechazos.fecrechazo',array("$año-07-01","$año-09-30"))
                    ->get();

                    if ($codrechazo->id == 1000) {  $cod1000 = count($data); }if ($codrechazo->id == 1001) {  $cod1001 = count($data);}
                    if ($codrechazo->id == 1002) {  $cod1002 = count($data); }if ($codrechazo->id == 1012) {  $cod1012 = count($data);}
                    if ($codrechazo->id == 1015) {  $cod1015 = count($data); }if ($codrechazo->id == 1016) {  $cod1016 = count($data);}
                    if ($codrechazo->id == 1022) {  $cod1022 = count($data); }if ($codrechazo->id == 1031) {  $cod1031 = count($data);}
                    if ($codrechazo->id == 1043) {  $cod1043 = count($data); }if ($codrechazo->id == 1050) {  $cod1050 = count($data);}
                    if ($codrechazo->id == 1061) {  $cod1061 = count($data); }if ($codrechazo->id == 1070) {  $cod1070 = count($data);}
                    if ($codrechazo->id == 2011) {  $cod2011 = count($data); }if ($codrechazo->id == 2021) {  $cod2021 = count($data);}
                    if ($codrechazo->id == 2022) {  $cod2022 = count($data); }if ($codrechazo->id == 3000) {  $cod3000 = count($data);}
                    if ($codrechazo->id == 4003) {  $cod4003 = count($data);}

                    $totalofic3t = $cod1000 + $cod1001 + $cod1002 + $cod1012 + $cod1015 + $cod1016 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod1061 + $cod1070 + $cod2011 + $cod2021 + $cod2022 + $cod3000 + $cod4003;
                    $totalinhofic3t = $cod1012 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod2011;
                }

            $totalgeninherentes3trim += $totalinhofic3t;
            $totalgenoficinas3trim += $totalofic3t;

            //recorre el cuarto trimestre
            $cod1000 = 0;   $cod1001 = 0;   $cod1002 = 0;   $cod1012 = 0;   $cod1015 = 0;   $cod1016 = 0;
            $cod1022 = 0;   $cod1031 = 0;   $cod1043 = 0;   $cod1050 = 0;   $cod1061 = 0;   $cod1070 = 0;
            $cod2011 = 0;   $cod2021 = 0;   $cod2022 = 0;   $cod3000 = 0;   $cod4003 = 0;

            foreach ($codrechazos as $codrechazo) {
                $data =  DB::table('estadisticarechazos')
                    ->select('estadisticarechazos.codigosrechazo_id')
                    ->where('estadisticarechazos.oficina_id', '=', $oficina->id)
                    ->where('estadisticarechazos.codigosrechazo_id', '=', $codrechazo->id)
                    ->whereBetween('estadisticarechazos.fecrechazo',array("$año-10-01","$año-12-31"))
                    ->get();

                    if ($codrechazo->id == 1000) {  $cod1000 = count($data); }if ($codrechazo->id == 1001) {  $cod1001 = count($data);}
                    if ($codrechazo->id == 1002) {  $cod1002 = count($data); }if ($codrechazo->id == 1012) {  $cod1012 = count($data);}
                    if ($codrechazo->id == 1015) {  $cod1015 = count($data); }if ($codrechazo->id == 1016) {  $cod1016 = count($data);}
                    if ($codrechazo->id == 1022) {  $cod1022 = count($data); }if ($codrechazo->id == 1031) {  $cod1031 = count($data);}
                    if ($codrechazo->id == 1043) {  $cod1043 = count($data); }if ($codrechazo->id == 1050) {  $cod1050 = count($data);}
                    if ($codrechazo->id == 1061) {  $cod1061 = count($data); }if ($codrechazo->id == 1070) {  $cod1070 = count($data);}
                    if ($codrechazo->id == 2011) {  $cod2011 = count($data); }if ($codrechazo->id == 2021) {  $cod2021 = count($data);}
                    if ($codrechazo->id == 2022) {  $cod2022 = count($data); }if ($codrechazo->id == 3000) {  $cod3000 = count($data);}
                    if ($codrechazo->id == 4003) {  $cod4003 = count($data);}

                    $totalofic4t = $cod1000 + $cod1001 + $cod1002 + $cod1012 + $cod1015 + $cod1016 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod1061 + $cod1070 + $cod2011 + $cod2021 + $cod2022 + $cod3000 + $cod4003;
                    $totalinhofic4t = $cod1012 + $cod1022 + $cod1031 + $cod1043 + $cod1050 + $cod2011;
                }

            $totalgeninherentes4trim += $totalinhofic4t;
            $totalgenoficinas4trim += $totalofic4t;

            $resultados[] = collect(['codpmt' => $oficina->codpmt, 'nombre' => $oficina->name,  'Variable_A1t' => $totalinhofic1t, 'Variable_B1t'=>$totalofic1t, 'Variable_A2t' => $totalinhofic2t, 'Variable_B2t'=>$totalofic2t, 'Variable_A3t' => $totalinhofic3t, 'Variable_B3t'=>$totalofic3t, 'Variable_A4t' => $totalinhofic4t, 'Variable_B4t'=>$totalofic4t ])->toArray();

        }

        $totales[] = collect(['totalVariable_A1t' => $totalgeninherentes1trim, 'totalVariable_B1t'=>$totalgenoficinas1trim,'totalVariable_A2t' => $totalgeninherentes2trim, 'totalVariable_B2t'=>$totalgenoficinas2trim, 'totalVariable_A3t' => $totalgeninherentes3trim, 'totalVariable_B3t'=>$totalgenoficinas3trim, 'totalVariable_A4t' => $totalgeninherentes4trim, 'totalVariable_B4t'=>$totalgenoficinas4trim,])->toArray();

        $analisis = DB::table('analisisrasra14')->select('analisis1trimestre', 'accionmejora1trimestre', 'analisis2trimestre', 'accionmejora2trimestre', 'analisis3trimestre', 'accionmejora3trimestre', 'analisis4trimestre', 'accionmejora4trimestre')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 1)->get();

        $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
                ->get();
        //dd($user);
        //return view('sirnec.pdf.rasra14', compact( 'date', 'resultados', 'totales', 'analisis', 'user' ));

        $pdf = PDF::loadView('sirnec.pdf.rasra14', compact( 'date', 'resultados', 'totales', 'analisis', 'user' ));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('RAS_RA-14_ Rechazos.pdf');

    }

    public function prueba()
    {
        $pdf = PDF::loadView('sirnec.pdf.prueba');
        $pdf->setPaper('letter', 'landscape');

        return $pdf->download('prueba.pdf');

        // return view('sirnec.pdf.prueba');
    }

    public function informe_rasra13pdf(Request $request)
    {
        //dd($request->all());
        $date = Carbon::now()->locale('es')->isoFormat('LLLL');
        $año = date("Y");
        $añoanterior = $año-1;
        $id = intval($request->id);
        $user = auth()->user()->id;

        if (!is_null($request->analisis1trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id1trim' => $user]); }
        if (!is_null($request->analisis2trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id2trim' => $user]); }
        if (!is_null($request->analisis3trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id3trim' => $user]); }
        if (!is_null($request->analisis4trimestre )) { DB::table('analisisrasra14')->where('id', $id)->update(['user_id4trim' => $user]); }

        // actualiza el registro de los analisis hechos al rasra13
        Analisisrasra14::findOrFail($id)->update($request->all());

        $oficinas = DB::table('oficinas')->select('id', 'name', 'codpmt')->where('departamento_id', '=', auth()->user()->departamento_id)->whereIn('claseoficina_id', [2, 3, 4, 5, 7])->orderBy('name', 'asc')->get();

        $totaldevoluciones1trim = 0;    $totaldevoluciones2trim = 0;   $totaldevoluciones3trim = 0;    $totaldevoluciones4trim = 0;
        $totalproduccion1trim = 0;    $totalproduccion2trim = 0;   $totalproduccion3trim = 0;    $totalproduccion4trim = 0;

        foreach ($oficinas as $oficina) {

            // recorre y da los datos del 1 trimestre del año
            $data =  DB::table('devoluciones')
                ->select('devoluciones.id')
                ->where('devoluciones.oficina_id', '=', $oficina->id)
                ->whereBetween('devoluciones.fecdevolucion',array("$año-01-01","$año-03-31"))
                ->get();
                $devueltos1trim = count( $data);
                $totaldevoluciones1trim += $devueltos1trim;
                $produccion1trim = 0;
            $lotes = DB::table('lotes')->where('oficina_id', '=', $oficina->id)->whereBetween('lotes.fecrecacopio',array("$añoanterior-10-01","$añoanterior-12-31"))->get();
                foreach ($lotes as $lote) {
                   $produccion1trim += $lote->cantdecasrecibidas;
                }
                $totalproduccion1trim += $produccion1trim;

            // recorre y da los datos del 2 trimestre del año
            $data1 =  DB::table('devoluciones')
                ->select('devoluciones.id')
                ->where('devoluciones.oficina_id', '=', $oficina->id)
                ->whereBetween('devoluciones.fecdevolucion',array("$año-04-01","$año-06-30"))
                ->get();
                $devueltos2trim = count( $data1);
                $totaldevoluciones2trim += $devueltos2trim;
                $produccion2trim = 0;
            $lotes1 = DB::table('lotes')->where('oficina_id', '=', $oficina->id)->whereBetween('lotes.fecrecacopio',array("$año-01-01","$año-03-31"))->get();
                foreach ($lotes1 as $lote1) {
                   $produccion2trim += $lote1->cantdecasrecibidas;
                }
                $totalproduccion2trim += $produccion2trim;

            // recorre y da los datos del 3 trimestre del año
            $data2 =  DB::table('devoluciones')
                ->select('devoluciones.id')
                ->where('devoluciones.oficina_id', '=', $oficina->id)
                ->whereBetween('devoluciones.fecdevolucion',array("$año-07-01","$año-09-30"))
                ->get();
                $devueltos3trim = count( $data2);
                $totaldevoluciones3trim += $devueltos3trim;
                $produccion3trim = 0;
            $lotes2 = DB::table('lotes')->where('oficina_id', '=', $oficina->id)->whereBetween('lotes.fecrecacopio',array("$año-04-01","$año-06-30"))->get();
                foreach ($lotes2 as $lote2) {
                   $produccion3trim += $lote2->cantdecasrecibidas;
                }
                $totalproduccion3trim += $produccion3trim;

            // recorre y da los datos del 4 trimestre del año
            $data3 =  DB::table('devoluciones')
                ->select('devoluciones.id')
                ->where('devoluciones.oficina_id', '=', $oficina->id)
                ->whereBetween('devoluciones.fecdevolucion',array("$año-09-01","$año-12-31"))
                ->get();
                $devueltos4trim = count( $data3);
                $totaldevoluciones4trim += $devueltos4trim;
                $produccion4trim = 0;
            $lotes3 = DB::table('lotes')->where('oficina_id', '=', $oficina->id)->whereBetween('lotes.fecrecacopio',array("$año-07-01","$año-09-30"))->get();
                foreach ($lotes3 as $lote3) {
                   $produccion4trim += $lote3->cantdecasrecibidas;
                }
                $totalproduccion4trim += $produccion4trim;

            $resultados[] = collect(['codpmt' => $oficina->codpmt, 'nombre' => $oficina->name , 'Variable_A1t' =>   $devueltos1trim,  'Variable_B1t' =>   $produccion1trim , 'Variable_A2t' =>   $devueltos2trim,  'Variable_B2t' =>   $produccion2trim , 'Variable_A3t' =>   $devueltos3trim,  'Variable_B3t' =>   $produccion3trim , 'Variable_A4t' =>   $devueltos4trim,  'Variable_B4t' =>   $produccion4trim ])->toArray();
        }

        $totales[] = collect(['totalVariable_A1t' => $totaldevoluciones1trim, 'totalVariable_B1t'=> $totalproduccion1trim,'totalVariable_A2t' => $totaldevoluciones2trim, 'totalVariable_B2t'=>$totalproduccion2trim, 'totalVariable_A3t' => $totaldevoluciones3trim, 'totalVariable_B3t'=>$totalproduccion3trim, 'totalVariable_A4t' => $totaldevoluciones4trim, 'totalVariable_B4t'=>$totalproduccion4trim,])->toArray();
        $analisis = DB::table('analisisrasra14')->select('analisis1trimestre', 'accionmejora1trimestre', 'analisis2trimestre', 'accionmejora2trimestre', 'analisis3trimestre', 'accionmejora3trimestre', 'analisis4trimestre', 'accionmejora4trimestre')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 0)->get();
        //dd($totales);
        $user = DB::table('usuarios')
                ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
                ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
                ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
                ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
                ->where('usuarios.id', auth()->user()->id)
                ->get();
        //dd($user);
        //return view('sirnec.pdf.rasra13', compact( 'date', 'resultados', 'totales', 'analisis', 'user' ));

        $pdf = PDF::loadView('sirnec.pdf.rasra13', compact( 'date', 'resultados', 'totales', 'analisis', 'user' ));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('RAS_RA-13_ Rechazos.pdf');


        dd($resultados);


        // $analisis = DB::table('analisisrasra14')->select('analisis1trimestre', 'accionmejora1trimestre', 'analisis2trimestre', 'accionmejora2trimestre', 'analisis3trimestre', 'accionmejora3trimestre', 'analisis4trimestre', 'accionmejora4trimestre')->where('ano', '=', $año)->where('departamento_id', '=', auth()->user()->departamento_id)->where('clase14o13', '=', 1)->get();

        // $user = DB::table('usuarios')
        //         ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
        //         ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
        //         ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
        //         ->select( 'usuarios.name as nombreusuario', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.*' )
        //         ->where('usuarios.id', auth()->user()->id)
        //         ->get();
        //dd($user);
        //return view('sirnec.pdf.rasra14', compact( 'date', 'resultados', 'totales', 'analisis', 'user' ));


        // $pdf = PDF::loadView('sirnec.pdf.rasra13', compact( 'date' ));
        // $pdf->setPaper('letter', 'landscape');
        // return $pdf->download('RAS_RA-13_ Rechazos.pdf');

    }

}
