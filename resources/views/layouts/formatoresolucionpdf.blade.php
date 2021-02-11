<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            header { position: fixed;
            left: 0px;
            top: 0px;
            right: 0px;
            height: 100px;
            text-align: center;
            }
            footer {
            position: fixed;
            left: 0px;
            bottom: 80px;
            right: 0px;
            height: 40px;
            }
            .page-break {
                page-break-after: always;
            }
            body{
                margin-top: 110px;
                margin-bottom: 200px;
                border: black 2px solid;
                padding: 20px;
                font-size: 14px;
            }
            table td{
                border-width: 1px 1px 1px 1px;
                border: solid;
                border-color: #000000;
            }
            .s{
                background-color: #DAD6D5;
            }
            .n{
                font-weight: bold;
            }
            .f{
                font-size: 10px;
                text-align: center;
            }
            .c{
                text-align: center;
            }

            table {
                width:90%;
            }



        </style>
    </head>
    @foreach ($user as $usuario)@endforeach
    <footer>
        <div class="c" style="margin-top:-60px">
            <div><span class="f">DELEGACION DEPARTAMENTAL DEL {{ $usuario->departamentonombre }}</span></div>
            <div><span class="f" style="margin-top:-30px">Oficina de Talento Humano - Direccion: {{ $usuario->direccion }} Tel: {{ $usuario->telefono_fijo }} </span></div>
            <div><span class="f" style="margin-top:-5px">Codigo Postal : {{ $usuario->codigopostal }} - {{ $usuario->municipionombre }} - {{ $usuario->departamentonombre }} - <span style="color:blue; text-decoration:underline">www.registraduria.gov.co</span></span></div>
            <img style="margin-top:-10px" src="../public/images/separador.png"><br>
            <img style="width: 28%; margin-top: -8px" src="../public/images/logopiedepagina.jpg">
        </div>
    </footer>
    <body >
        @yield('textocarta')
    </body>


</html>
