<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            @yield('estilo')
            body{
            font-family: sans-serif;
            font-size: 13px;
            margin-left: 50px;
            margin-right: 50px;
            margin-top: -30px;
            margin-bottom: -65px;
            }
            @page {
            margin: 160px 50px;
            }
            header { position: fixed;
            left: 0px;
            top: -140px;
            right: 0px;
            height: 100px;
            text-align: center;
            }
            header h1{
            margin: 10px 0;
            }
            header h2{
            margin: 0 0 10px 0;
            }
            footer {
            position: fixed;
            left: 0px;
            bottom: -125px;
            right: 0px;
            height: 40px;
            }
            footer .page:after {
            content: counter(page);
            }
            footer table {
            width: 100%;
            }
            footer p {
            text-align: right;
            }
            footer .izq {
            text-align: left;
            }
            table td{
                border-width: 1px 0px 1px 0px;
                border: solid;
                border-color: #000000;
            }
            li{
                width: 95%;
            }
            .t{
                text-transform: uppercase;
            }
            .s{
                background-color: #DAD6D5;
            }
            .f{
                font-size: 11px;
                text-align: center;
            }
            .c{
                text-align: center;
            }
            .j{
                text-align:justify;
            }
            .a{
                margin-left: 20px;
            }
            .m{
                font-size: 8px;
            }
            .n{
                font-weight: bold;
            }
            .pie{
                font-size: 10px;
            }
            .blanco{
                color: #FDFEFE;
            }

        </style>

    </head>
    <header>
        <div >
            <img style="width: 28%" src="../public/images/logo1.png">
        </div>
    </header>
    @foreach ($user as $usuario)@endforeach
    <footer>
        <div class="c" style="margin-top:-50px" >
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
