<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>

            body{
            font-size: 10px;
            margin-top: -56px;
            }
            @page {
            margin: 160px 50px 30px 50px;
            }
            header { position: fixed;
            left: 0px;
            top: -125px; /* separo el encabezado del body */
            right: 0px;
            height: 0px;
            text-align: center;
            }

            table{
            border-spacing : -1px;
            }
            .img{
                width: 100px;
                height: 50px;
            }
            .blanco{
                color: #FDFEFE;
            }
            .b{
                border:solid;
                border-color: #000000;
                border-width: 1px 1px 1px 1px;
            }
            .c{
                text-align: center;
            }
            .s{
                background-color: #DAD6D5;
            }
            .t{
                text-transform:capitalize;
            }
            .tam{
                font-size: 8px;
            }

        </style>

    </head>
    <footer>
    </footer>

    <header>
        <div class="row">
            <div class="col-md-12">
                <table >
                    <thead>
                        <tr>
                            <td class="b"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                            <td class="b c" width="70" >PROCESO</td>
                            <td class="b c" width="430" >REGISTRO Y ACTUALIZACION DEL SISTEMA - RAS</td>
                            <td class="b c" width="70" >CODIGO</td>
                            <td class="b c" width="70" >RAFT10</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c" >PRODUCCIÓN DE ENVÍOS Y FORMAS</td>
                            <td class="b c" >VERSION</td>
                            <td class="b c" >1</td>
                        </tr>
                    </thead>
                </table >
            </div>
        </div>
    </header>

    <div class="row" style="margin: -10px 0px 5px">
        <div class="col-md-12" style="text-align: right">
            Aprobado: 14/02/2019
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <body >
                <table >
                    <thead >
                        <tr>
                            <td width="50" class="b c s tam" rowspan="3">SEMANA ( FECHA INICIAL / FECHA FINAL )</td>
                            <td width="60" class="b c s" rowspan="3">ITEM</td>
                            <td width="50" class="b c s" rowspan="3">STS</td>
                            <td width="50" class="b c s" rowspan="3">TS</td>
                            <td width="360" class="b c s" colspan="8" >PRODUCCION DE ENVIOS Y FORMAS</td>
                            <td width="70" class="b c s" rowspan="3">NO PROCESADO</td>
                            <td width="70" class="b c s" rowspan="3">TOTAL</td>
                        </tr>
                        <tr>
                            <td width="80" class="b c s" colspan="4">CÉDULA DE CIUDADANÍA</td>
                            <td width="80" class="b c s" colspan="4">TARJETA DE IDENTIDAD</td>
                        </tr>
                        <tr>
                            <td width="20" class="b c s">P.V</td>
                            <td width="20" class="b c s">RENOV</td>
                            <td width="20" class="b c s">RECT</td>
                            <td width="20" class="b c s">DUPL</td>
                            <td width="20" class="b c s">P.V</td>
                            <td width="20" class="b c s">RENOV</td>
                            <td width="20" class="b c s">RECT</td>
                            <td width="20" class="b c s">DUPL</td>
                        </tr>


                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="b c" rowspan="2" >{{ $row->fechinicial }} {{ $row->fechfinal }}</td>
                            <td class="b c">Comprobado</td>
                            <td class="b c"></td>
                            <td class="b c"></td>
                            <td class="b c">{{ $row->comprobado_pvc }}</td>
                            <td class="b c">{{ $row->comprobado_renovc }}</td>
                            <td class="b c">{{ $row->comprobado_rectc }}</td>
                            <td class="b c">{{ $row->comprobado_dupc }}</td>
                            <td class="b c">{{ $row->comprobado_pvt }}</td>
                            <td class="b c">{{ $row->comprobado_renovt }}</td>
                            <td class="b c">{{ $row->comprobado_rectt }}</td>
                            <td class="b c">{{ $row->comprobado_dupt }}</td>
                            <td class="b c">{{ $row->comprobado_noprocesado }}</td>
                            <td class="b c">{{ $row->comprobado_total }}</td>
                        </tr>
                        <tr>

                            <td class="b c">Escaneo</td>
                            <td class="b c">{{ $row->sts }}</td>
                            <td class="b c">{{ $row->ts }}</td>
                            <td class="b c">{{ $row->escaneo_pvc }}</td>
                            <td class="b c">{{ $row->escaneo_renovc }}</td>
                            <td class="b c">{{ $row->escaneo_rectc }}</td>
                            <td class="b c">{{ $row->escaneo_dupc }}</td>
                            <td class="b c">{{ $row->escaneo_pvt }}</td>
                            <td class="b c">{{ $row->escaneo_renovt }}</td>
                            <td class="b c">{{ $row->escaneo_rectt }}</td>
                            <td class="b c">{{ $row->escaneo_dupt }}</td>
                            <td class="b c">{{ $row->escaneo_noprocesado }}</td>
                            <td class="b c">{{ $row->escaneo_total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>
        </div>
    </div>



</html>


