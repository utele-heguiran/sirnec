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
            .fz{
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
                            <td class="b" width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                            <td class="b c" width="70">PROCESO</td>
                            <td class="b c" width="420" >REGISTRO Y ACTUALIZACION DEL SISTEMA - RAS</td>
                            <td class="b c" width="70">CODIGO</td>
                            <td class="b c" width="70">RAFT04</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c" >REGISTRO DE CONTROL RECEPCIÓN DE LOTES MUNICIPALES EN CENTRO DE ACOPIO</td>
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
                            <td width="80" class="b c s ">NOMBRE DE LA OFICINA DE PREPARACION</td>
                            <td width="50" class="b c s fz">LOTE DEL MUNICIPIO (ALFANUMERICO)</td>
                            <td width="40" class="b c s fz">FECHA DE CREACION DEL LOTE (DD/MM/AAAA)</td>
                            <td width="40" class="b c s fz">FECHA DE RECOLECCION POR EL CONTRATISTA (DD/MM/AAAA)</td>
                            <td width="40" class="b c s fz">FECHA DE RECIBO EN EL CENTRO DE ACOPIO (DD/MM/AAAA)</td>
                            <td width="40" class="b c s fz">CANT. DIAS TRASPORTE</td>
                            <td width="40" class="b c s fz">CANTIDAD DE DECADACTILARES RECIBIDAS</td>
                            <td width="40" class="b c s fz">CONSECUTIVO DEL LOTE</td>
                            <td width="100" class="b c s ">NOVEDADES PRESENTADAS</td>
                        </tr>
                    </thead>
                   
                    <tbody >
                        @foreach ($lote as $lote)
                            <tr>
                                <td class="b c">{{ $lote->nombreoficina }}</td>
                                <td class="b c">
                                    {{ $lote->codpmt }} 
                                    {{ Carbon\Carbon::parse($lote->feccrealote)->formatLocalized('%Y') }}
                                    {{ Carbon\Carbon::parse($lote->feccrealote)->formatLocalized('%m') }} 
                                    {{ Carbon\Carbon::parse($lote->feccrealote)->formatLocalized('%d') }} 
                                    {{ $lote->numlote }}
                                </td>
                                <td class="b c">{{ $lote->feccrealote }}</td>
                                <td class="b c">{{ $lote->fecenvlote }}</td>
                                <td class="b c">{{ $lote->fecrecacopio }}</td>
                                <td class="b c">{{ $lote->cantdiastrasporte }}</td>
                                <td class="b c">{{ $lote->cantdecasrecibidas }}</td>
                                <td class="b c">{{ $lote->numoficenvio }}</td>
                                <td class="b c">{{ $lote->novedad }}</td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>
        </div>
    </div>



    
    
</html>  


























