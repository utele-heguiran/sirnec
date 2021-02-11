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
                            <td class="b c" width="70">RAFT06</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c" >DEVOLUCION DE MATERIAL POR CONTROL DE CALIDAD</td>
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
                            <td width="60" class="b c s">Nª PREPARACION (sin digito de Verificacion)</td>
                            <td width="50" class="b c s">NUIP</td>
                            <td width="110" class="b c s">MOTIVO DE DEVOLUCION (TIPO)</td>
                            <td width="70" class="b c s">CLASE DE TRAMITE (Nª)</td>
                            <td width="160" class="b c s">NOMBRE DE LA OFICINA DE PREPARACION</td>
                            <td width="30" class="b c s">CODIGO DE OFICINA</td>
                            <td width="30" class="b c s">Nª DE OFICIO DEVOLUCION</td>
                            <td width="40" class="b c s">FECHA DE DEVOLUCION (DD/MM/AAAA)</td>
                            <td width="60" class="b c s" >Nª DE PREPARACION DE REEMPLAZO</td> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devoluciones as $registro)
                        <tr>
                            <td class="b c">{{ $registro->numpreparacion }}</td>
                            <td class="b c">{{ $registro->numdocumento }}</td>
                            <td class="b c">{{ $registro->nameclasdevolucion }}</td>
                            <td class="b c">{{ $registro->nombretipotramite }}</td>
                            <td class="b c">{{ $registro->nameoficina }}</td>
                            <td class="b c">{{ $registro->codpmt }}</td>
                            <td class="b c">{{ $registro->numoficiodevolucion }}</td>
                            <td class="b c">{{ $registro->fecdevolucion }}</td>
                            <td class="b c">{{ $registro->numpreparacionremplazo }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </body>
        </div>
    </div>    
    
    
</html>  
