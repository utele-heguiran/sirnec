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
                            <td class="b c" width="70">RAFT08</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c" >CONTROL DIARIO DE ENVÍO SET DE TRANSFER SET (STS)</td>
                            <td class="b c" >VERSION</td>
                            <td class="b c" >0</td>
                        </tr>
        
                    </thead>    
                </table >
            </div>
        </div>
    </header>
    

    <div class="row" style="margin: -10px 0px 5px">
        <div class="col-md-12" style="text-align: right">
            Aprobado: 16/01/2017
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <body >
                <table >
                    <thead >
                        <tr>
                            <td width="40" class="b c s">CENTRO DE ACOPIO </td>
                            <td width="60" class="b c s">NOMBRE DE STS</td>
                            <td width="30" class="b c s">FECHA DE CREACIÓN (DD/MM/AAAA)</td>
                            <td width="30" class="b c s">FECHA DE ENVÍO DE TRASMISIÓN (DD/MM/AAAA)</td>
                            <td width="130" class="b c s">CLASE DE TRÁMITE</td>
                            <td width="20" class="b c s">CANTIDAD DE SOLICITUDES </td>
                            <td width="30" class="b c s">VERIFICACIÓN DE TRANSMISIÓN</td>
                            <td width="110" class="b c s">OBSERVACIONES, TUTELA, DP, REPROCESOS ESPECIALES</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td  class="b c">{{ $row->nombredepartamento }}</td>
                            <td  class="b c">
                                {{ $row->codpmt }}
                                {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%Y') }}
                                {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%m') }} 
                                {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%d') }} 
                                {{ $row->numsts }}
                            </td>
                            <td  class="b c">{{ $row->feccreasts }}</td>
                            <td  class="b c">{{ $row->fecenvsts }}</td>
                            <td  class="b c">
                                {{ $row->nombreclasetramite }} - {{ $row->nombretipotramite }}
                            </td>
                            <td  class="b c">{{ $row->cantidadsts }}</td>
                            <td  class="b c">
                                @if ($row->estado_id != 1 )
                                    Cargado
                                @endif
                            </td>
                            <td  class="b c">{{ $row->observaciones }}</td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </body>
        
        </div>   
    </div>
        
</html>  

