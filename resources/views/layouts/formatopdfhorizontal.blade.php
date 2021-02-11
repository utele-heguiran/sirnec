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
            margin-left: 30px;
            margin-right: 30px;
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
            .pie{
                font-size: 10px;
            }
            .f{
                font-size: 11px;
                text-align: center;
            }
            #tabla {
                margin: 0 auto;
            }


        </style>

    </head>
    <header>
        <div >
            <img style="width: 20%" src="../public/images/logo1.png">
        </div>
    </header>
    @foreach ($user as $usuario)@endforeach
    <footer>
        <div class="c" style="margin-top:-15px" >
            <span class="f" >@yield('dependencia')</span><br>
            <img style="margin-top:-10px" src="../public/images/separador.png"><br>
            <img style="width: 20%; margin-top: -10px" src="../public/images/logopie.png">
        </div>
    </footer>

    <body>
        @yield('textocarta')
    </body>

</html>
