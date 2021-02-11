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
            top: -125px;
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
                            <td class="b c" width="420">REGISTRO Y ACTUALIZACION DEL SISTEMA - RAS</td>
                            <td class="b c" width="70">CODIGO</td>
                            <td class="b c" width="70">RAFT07</td>
                        </tr>
                        <tr>
                            <td class="b c">FORMATO</td>
                            <td class="b c">FORMATOS DE CEDULACIÓN Y TARJETA DE IDENTIDAD ANULADOS O DAÑADOS </td>
                            <td class="b c">VERSION</td>
                            <td class="b c">1</td>
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
                            <td width="70" class="b c s">Nª PREPARACION (sin digito de Verificacion)</td>
                            <td width="70" class="b c s">NUIP</td>
                            <td width="130" class="b c s">MOTIVO DE DESTRUCCIÓN</td>
                            <td width="70" class="b c s">FORMATO A DESTRUIR</td>
                            <td width="160" class="b c s">NOMBRE DE LA OFICINA DE PREPARACIÓN</td>
                            <td width="33" class="b c s">CODIGO DE OFICINA</td>
                            <td width="70" class="b c s">Nª DE ACTA DE DESTRUCCIÓN</td>
                            <td width="70" class="b c s">FECHA DE DESTRUCCIÓN (DD/MM/AAAA)</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                        <tr>
                            <td class="b c">{{ $dato->numpreparacion }}</td>
                            <td class="b c">{{ $dato->nuip }}</td>
                            <td class="b c">{{ $dato->motivodestruccion }}</td>
                            <td class="b c">{{ $dato->formato }}</td>
                            <td class="b c">{{ $dato->nombreoficina }}</td>
                            <td class="b c">{{ $dato->codpmt }}</td>
                            <td class="b c">{{ $dato->actadestruccion }}</td>
                            <td class="b c">{{ $dato->fechadestruccion }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    
    
</html>  
