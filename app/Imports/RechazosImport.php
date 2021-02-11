<?php

namespace App\Imports;

use App\models\estadisticarechazo;
use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB as FacadesDB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RechazosImport implements ToModel, WithBatchInserts, WithChunkReading
{
    public function model(array $row)
    {
                    // determina el origen del rechazo
                    $origenrechazo = (int)substr($row[4], 0, 1);
                    if($origenrechazo == 0){ 
                       $origenrechazo = 10;
                    }
                    
                    // determina el tipotramite del rechazo
                    $tipotramite = (int)substr($row[5], 0, 2);
                    if($tipotramite == 8){
                        $tipo = 1;
                    }elseif ($tipotramite == 5){
                        $tipo = 18;
                    }elseif ($tipotramite == 4){
                        $tipo = 17;
                    }elseif ($tipotramite == 1){
                        $tipo = 2;
                    }elseif ($tipotramite == 10){
                        $tipo = 19;
                    }elseif ($tipotramite == 3){
                        $tipo = 3;
                    }elseif ($tipotramite == 6){
                        $tipo = 20;
                    }elseif ($tipotramite == 2){
                        $tipo = 4;
                    }
                    //dd($tipo);
                    
                    //busca la oficina y extrae el codigo de oficina codigo del depertamento y cod del municipio 
                    $oficinaextracion = substr($row[8], 0, 3);
                    $oficina = DB::table('oficinas')->where('codpmt', $oficinaextracion)->select('id', 'municipio_id', 'departamento_id')->get();
                    $oficinadepartamentoresult = (int)$oficina->first()->departamento_id;
                    $oficinamunicipioresult = (int)$oficina->first()->municipio_id;
                    $oficinaresult = (int)$oficina->first()->id;
                    
                    //verifica si la variable viene vacia y si no cambia el formato de la fecha para poder ingrtesarla a la base de datos
                    if (empty($row[9])) { $fechapreparacion = $row[9]; } else{ $fechapreparacion = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]); }
                    if (empty($row[10])) { $fechacargue = $row[10]; } else{ $fechacargue = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]); }
                    if (empty($row[11])) { $fecharechazo = $row[11]; } else{ $fecharechazo = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11]); }
                    
                    if (empty($row[18])) { $fechadeobservacion1 = $row[18]; } else{ $fechadeobservacion1 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[18]); }
                    if (empty($row[21])) { $fechadeobservacion2 = $row[21]; } else{ $fechadeobservacion2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[21]); }
                    if (empty($row[24])) { $fechadeobservacion3 = $row[24]; } else{ $fechadeobservacion3 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[24]); }
                    if (empty($row[27])) { $fechadeobservacion4 = $row[27]; } else{ $fechadeobservacion4 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[27]); }
                   
                    //convierte la fecha a formato de la base de datos     
                    //$fecharechazo = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11])

                    
                    
        return new estadisticarechazo([
            
            'numdocumento'          => $row[1],
            'numpreparacion'        => $row[2],
            'name'                  => $row[3],
            'origenrechazo_id'      => $origenrechazo,
            'tipotramite_id'        => $tipo,
            'departamento_id'       => $oficinadepartamentoresult,
            'municipio_id'          => $oficinamunicipioresult,
            'oficina_id'            => $oficinaresult,
            'fecpreparacion'        => $fechapreparacion,
            'feccargue'             => $fechacargue,
            'fecrechazo'            => $fecharechazo,
            'codigosrechazo_id'     => $row[12],
            'hit'                   => $row[13],
            'direccion'             => $row[15],
            'telefono'              => $row[16],
            'Of_solicitud'          => $row[17],
            'estado_id'             => $row[29],
            'observacion_1'         => $row[20],
            'fec_observacion_1'     => $fechadeobservacion1,
            'user1_id'              => $row[19],
            'observacion_2'         => $row[23],
            'fec_observacion_2'     => $fechadeobservacion2,
            'user2_id'              => $row[22],
            'observacion_3'         => $row[26],
            'fec_observacion_3'     => $fechadeobservacion3,
            'user3_id'              => $row[25],
            'fechacierre'           => $fechadeobservacion4,
            'Descripcion_solucion'  => $row[28],

        ]);
    }
    public function batchSize(): int
        {
            return 1000;
        }

    public function chunkSize(): int
        {
            return 1000;
        }
}
