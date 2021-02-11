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
                            <td class="b"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                            <td class="b c" width="70" >PROCESO</td>
                            <td class="b c" width="430" >REGISTRO Y ACTUALIZACION DEL SISTEMA - RAS</td>
                            <td class="b c" width="70" >CODIGO</td>
                            <td class="b c" width="70" >RAFT42</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c" >BITÁCORA DE CENTRO DE ACOPIO</td>
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
            Aprobado: 14/02/2019
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <body >
                <table >
                    <thead >
                        <tr>
                            <td width="70" class="b c s">FECHA DD/MM/AAAA</td>
                            <td width="110" class="b c s">FACTOR</td>
                            <td width="540" class="b c s" >OBSERVACIONES</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="b c">{{ $row->feccreacion }}</td>
                            <td class="b c">{{ $row->factor }}</td>
                            <td class="b c">{{ $row->observaciones }}</td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </body>
        </div>
    </div>

    
    
</html>  

