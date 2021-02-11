<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('Chartjs/Chart.js') }}"></script>
        <script src="{{ asset('Chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('Chartjs/utils.js') }}"></script>
        <style>
            canvas{
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }
            body{
            font-size: 10px;
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
            .d{
                text-align: right;
            }

            .s{
                background-color: #DAD6D5;
            }
            .t{
                font-size: 8px;
            }
            .tp{
                font-size: 7px;
            }
            .y {
                border:solid;
                border-color: #999;
                border-width: 1px 0px 1px 0px;
            }
            .j{
                text-align: justify;
            }
            .p{
                padding: 3px;
            }
            /* salto de pagina */
            hr {
                page-break-after: always;
                border: 0;
                margin: 0;
                padding: 0;
            }

        </style>
    </head>
    <footer>
    </footer>
    <body>
        <div class="row">
            <div class="col-md-12">
                <table >
                    <thead>
                        <tr>
                            <td class="blanco" width="55" >VARIABLE A</td>
                            <td class="blanco" width="55" >VARIABLE A</td>
                            <td class="blanco" width="55">VARIABLE B</td>
                            <td class="blanco" width="55" >RESULTADO</td>
                            <td class="blanco" width="55" >VARIABLE A</td>
                            <td class="blanco" width="55">VARIABLE B</td>
                            <td class="blanco" width="55" >RESULTADO</td>
                            <td class="blanco" width="55" >VARIABLE A</td>
                            <td class="blanco" width="55">VARIABLE B</td>
                            <td class="blanco" width="55" >RESULTADO</td>
                            <td class="blanco" width="55" >VARIABLE A</td>
                            <td class="blanco" width="55">VARIABLE B</td>
                            <td class="blanco" width="55" >RESULTADO</td>
                        </tr>
                        <tr>
                            <td class="b" rowspan="2"><center><img class="img" src="{{ asset('images/logo1.png')}}" ></center></td>
                            <td class="b c" >PROCESO</td>
                            <td class="b c" colspan="9">SISTEMA DE GESTIÓN Y MEJORAMIENTO INSTITUCIONAL</td>
                            <td class="b c" >CÓDIGO</td>
                            <td class="b c" >SGFT05</td>
                        </tr>
                        <tr>
                            <td class="b c" >FORMATO</td>
                            <td class="b c"  colspan="9">HOJA DE VIDA DEL INDICADOR</td>
                            <td class="b c" >VERSIÓN</td>
                            <td class="b c" >0</td>
                        </tr>
                        <tr>
                            <td class="b c s" colspan="13" >IDENTIFICACIÓN DEL INDICADOR</td>
                        </tr>
                        <tr>
                            <td class="b c t" >PROCESO</td>
                            <td class="b c t"  colspan="2">Registro y Actualización del Sistema</td>
                            <td class="b c t" >OBJETIVO DEL PROCESO</td>
                            <td class="b c t"  colspan="7">Expedir Registro Civil, Tarjeta de Identidad y Cédula de Ciudadanía mediante la solicitud de inscripción del Registro Civil, la preparación, elaboración y expedición de tarjeta de identidad y cédula de ciudadanía por primera vez, duplicados, rectificaciones y renovaciones con el propósito de garantizar el ejercicio de los derechos fundamentales de los colombianos</td>
                            <td class="b c t" >CÓDIGO DEL INDICADOR</td>
                            <td class="b c t" >RA14</td>
                        </tr>
                        <tr>
                            <td class="b c t" >FÁCTOR CRÍTICO DE ÉXITO</td>
                            <td class="b c t"  colspan="2">Expedir Registro Civil, Tarjeta de Identidad y Cédula de Ciudadanía</td>
                            <td class="b c t" >TIPO DE INDICADOR</td>
                            <td class="b c t" >Efectividad</td>
                            <td class="b c t" >NOMBRE DEL INDICADOR</td>
                            <td class="b c t"  colspan="7">Rechazos  inherentes al proceso de preparación.</td>
                        </tr>
                        <tr>
                            <td class="b c " rowspan="4" >DESCRIPCIÓN DE LA FÓRMULA DEL INDICADOR</td>
                            <td class="b c s"  colspan="4" style="height: 20px">VARIABLE A</td>
                            <td class="b c s" colspan="6">DESCRIPCIÓN VARIABLE A</td>
                            <td class="b c s" colspan="2">FÓRMULA DE CÁLCULO DEL INDICADOR</td>
                        </tr>
                        <tr>
                            <td class="b c t"  colspan="4" style="height: 20px">Rechazos inherentes al procedimiento de preparación.</td>
                            <td class="b c t" colspan="6">Sumatoria  de los rechazos con códigos 1012,1022,1031, 2011, reportados en el periodo.</td>
                            <td class="b c t" colspan="2" rowspan="3" style="font-size: 18px" >A/B X 100</td>
                        </tr>
                        <tr>
                            <td class="b c s"  colspan="4" style="height: 20px">VARIABLE B</td>
                            <td class="b c s" colspan="6">DESCRIPCIÓN VARIABLE B</td>
                        </tr>
                        <tr>
                            <td class="b c t"  colspan="4" style="height: 20px">Total de  rechazos reportados </td>
                            <td class="b c t" colspan="6">Reporte de la totalidad  de  rechazos  recibidos del administrador del sistema en el periodo</td>
                        </tr>
                        <tr>
                            <td class="b c t" >UNIDAD DEL INDICADOR </td>
                            <td class="b c t" >Porcentaje  </td>
                            <td class="b c t" >PERIODICIDAD DE LA MEDICIÓN </td>
                            <td class="b c t" >Trimestral </td>
                            <td class="b c t" >FUENTE DE LA INFORMACIÓN </td>
                            <td class="b c t" >Reporte semanal rechazos IDEMA   </td>
                            <td class="b c t" colspan="2" >CARGO QUE SUMINISTRA Y ANALIZA LA INFORMACIÓN </td>
                            <td class="b c t" colspan="5" >Coordinador  de Validación e individualización  </td>
                        </tr>
                        <tr>
                            <td class="b c t" >USO DEL INDICADOR</td>
                            <td class="b c t" >Producto  </td>
                            <td class="b c t" >CARACTERÍSTICA DEL INDICADOR </td>
                            <td class="b c t" >Demanda</td>
                            <td class="b c t" >TENDENCIA DEL INDICADOR</td>
                            <td class="b c t" >Minimización    </td>
                            <td class="b c t" colspan="2" >OBJETIVO ESTRATÉGICO ASOCIADO </td>
                            <td class="b c t" colspan="5" >Optimizar  los procesos de las  áreas  misionales de Registro Civil e Identificación para  asegurar una prestación efectiva del servicio a  usuarios internos y externos , reduciendo los tiempos de respuesta y mejorando la calidad, mediante la renovación tecnológica de los sistemas de información del  Macroproceso.  </td>
                        </tr>
                        <tr>
                            <td class="b c t" >RANGO BUENO</td>
                            <td class="b c t" >Menor o Igual al 30%  </td>
                            <td class="b c t" >RANGO REGULAR </td>
                            <td class="b c t" >NA</td>
                            <td class="b c t" >RANGO MALO</td>
                            <td class="b c t" >Mayor al 30% </td>
                            <td class="b c t" colspan="2" > PROYECTO DE INVERSIÓN ASOCIADO</td>
                            <td class="b c t" colspan="5" > Fortalecimiento de la plataforma tecnológica que soporta el sistema de identificación y registro civil PMT II nacional<br>
                                Fortalecimiento de la capacidad de  Atención en identificación para la  población en condición de vulnerabilidad APD.<br>
                                Fortalecimiento del Servicio Nacional de Identificación ANI.  </td>
                        </tr>
                        <tr>
                            <td class="b c s" colspan="5" style="height: 20px">MEDICIÓN DEL INDICADOR</td>
                            <td class="b c s" colspan="8" >ANÁLISIS GRÁFICO</td>
                        </tr>
                        <tr>
                            <td class="b c t" >No. PERÍODO</td>
                            <td class="b c t" >PERÍODO</td>
                            <td class="b c t" >VARIABLE A</td>
                            <td class="b c t" >VARIABLE B</td>
                            <td class="b c t" >RESULTADO</td>
                            <td class="b c t" colspan="8" rowspan="5">
                                <div class="col-md-8">

                                    @foreach ($totales as $item)
                                        {!! Form::number('totalVariable_A1t', $item['totalVariable_A1t'], ['id'=>'totalVariable_A1t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_B1t', $item['totalVariable_B1t'], ['id'=>'totalVariable_B1t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_A2t', $item['totalVariable_A2t'], ['id'=>'totalVariable_A2t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_B2t', $item['totalVariable_B2t'], ['id'=>'totalVariable_B2t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_A3t', $item['totalVariable_A3t'], ['id'=>'totalVariable_A3t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_B3t', $item['totalVariable_B3t'], ['id'=>'totalVariable_B3t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_A4t', $item['totalVariable_A4t'], ['id'=>'totalVariable_A4t', 'hidden'] ) !!}
                                        {!! Form::number('totalVariable_B4t', $item['totalVariable_B4t'], ['id'=>'totalVariable_B4t', 'hidden'] ) !!}

                                        {{-- recuerde no funciona si no hay conexion a internet  --}}
                                        <img src="https://quickchart.io/chart?width=280&height=90&c={type:'line',data:{labels:['I Trimestre','II Trimestre', 'III Trimestre', 'VI Trimestre'], datasets:[{label:'Variable A', data: [+{{ $item['totalVariable_A1t'] }}+,+{{ $item['totalVariable_A2t'] }}+,+{{ $item['totalVariable_A3t'] }}+,+{{ $item['totalVariable_A4t'] }}+], fill:false,borderColor:'DARKKHAKI'},{label:'Variable B', data:[+{{ $item['totalVariable_B1t'] }}+,+{{ $item['totalVariable_B2t'] }}+,+{{ $item['totalVariable_B3t'] }}+,+{{ $item['totalVariable_B4t'] }}+], fill:false,borderColor:'STEELBLUE'}]}} ">

                                    @endforeach
                                    {{-- <canvas id="myChart" width="500" height="150"></canvas> --}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            @foreach ($totales as $item)
                                <td class="b c t" >1</td>
                                <td class="b c t" >Trimestre 1</td>
                                <td class="b c t" >{{ $item['totalVariable_A1t'] }}</td>
                                <td class="b c t" >{{ $item['totalVariable_B1t'] }}</td>
                                <td class="b c t" >
                                    @if ($item['totalVariable_B1t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['totalVariable_A1t']/ $item['totalVariable_B1t']* 100, 2, ",", ".")." %"  }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($totales as $item)
                                <td class="b c t" >2</td>
                                <td class="b c t" >Trimestre 1</td>
                                <td class="b c t" >{{ $item['totalVariable_A2t'] }}</td>
                                <td class="b c t" >{{ $item['totalVariable_B2t'] }}</td>
                                <td class="b c t" >
                                    @if ($item['totalVariable_B2t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['totalVariable_A2t']/ $item['totalVariable_B2t']* 100, 2, ",", ".")." %"  }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($totales as $item)
                                <td class="b c t" >3</td>
                                <td class="b c t" >Trimestre 1</td>
                                <td class="b c t" >{{ $item['totalVariable_A3t'] }}</td>
                                <td class="b c t" >{{ $item['totalVariable_B3t'] }}</td>
                                <td class="b c t" >
                                    @if ($item['totalVariable_B3t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['totalVariable_A3t']/ $item['totalVariable_B3t']* 100, 2, ",", ".")." %"  }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($totales as $item)
                                <td class="b c t" >4</td>
                                <td class="b c t" >Trimestre 1</td>
                                <td class="b c t" >{{ $item['totalVariable_A4t'] }}</td>
                                <td class="b c t" >{{ $item['totalVariable_B4t'] }}</td>
                                <td class="b c t" >
                                    @if ($item['totalVariable_B4t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['totalVariable_A4t']/ $item['totalVariable_B4t']* 100, 2, ",", ".")." %"  }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="b c s" style="height: 20px" colspan="13" >ANÁLISIS Y ACCIÓN DE MEJORA POR PERIODO</td>
                        </tr>
                        <tr>
                            <td class="b c t" >No. PERÍODO</td>
                            <td class="b c t" colspan="2">PERIODO</td>
                            <td class="b c t" colspan="4">ANÁLISIS</td>
                            <td class="b c t" colspan="6">ACCIÓN DE MEJORA</td>
                        </tr>
                        <tr>
                            <td class="b c t" >1</td>
                            <td class="b c t" colspan="2">Trimestre 1</td>
                            <td class="b t j p" colspan="4">{{ $analisis[0]->analisis1trimestre}}</td>
                            <td class="b t j p" colspan="6">{{ $analisis[0]->accionmejora1trimestre}}</td>
                        </tr>
                        <tr>
                            <td class="b c t" >2</td>
                            <td class="b c t" colspan="2">Trimestre 2</td>
                            <td class="b t j p" colspan="4">{{ $analisis[0]->analisis2trimestre}}</td>
                            <td class="b t j p" colspan="6">{{ $analisis[0]->accionmejora2trimestre}}</td>
                        </tr>
                        <tr>
                            <td class="b c t" >3</td>
                            <td class="b c t" colspan="2">Trimestre 3</td>
                            <td class="b t j p" colspan="4">{{ $analisis[0]->analisis3trimestre}}</td>
                            <td class="b t j p" colspan="6">{{ $analisis[0]->accionmejora3trimestre}}</td>
                        </tr>
                        <tr>
                            <td class="b c t" >4</td>
                            <td class="b c t" colspan="2">Trimestre 4</td>
                            <td class="b t j p" colspan="4">{{ $analisis[0]->analisis4trimestre}}</td>
                            <td class="b t j p" colspan="6">{{ $analisis[0]->accionmejora4trimestre}}</td>
                        </tr>
                        <tr>
                            <td class="blanco" >rr</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table >
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table >
                    <thead>
                        <tr>
                            <td class="b c t" rowspan="2" width="169" style="background-color: #696969; color:white">DEPARTAMENTO</td>
                            <td class="b c t" colspan="3" style="background-color: #696969; color:white">PRIMER TRIMESTRE</td>
                            <td class="b c t" colspan="3" style="background-color: #696969; color:white">SEGUNDO TRIMESTRE</td>
                            <td class="b c t" colspan="3" style="background-color: #696969; color:white">TERCER TRIMESTRE</td>
                            <td class="b c t" colspan="3" style="background-color: #696969; color:white">CUARTO TRIMESTRE</td>
                        </tr>
                        <tr>
                            <td class="b c t s" width="45.7" >VARIABLE A</td>
                            <td class="b c t s" width="45.7">VARIABLE B</td>
                            <td class="b c t s" width="45.7" >RESULTADO</td>
                            <td class="b c t s" width="45.7" >VARIABLE A</td>
                            <td class="b c t s" width="45.7">VARIABLE B</td>
                            <td class="b c t s" width="45.7" >RESULTADO</td>
                            <td class="b c t s" width="45.7" >VARIABLE A</td>
                            <td class="b c t s" width="45.7">VARIABLE B</td>
                            <td class="b c t s" width="45.7" >RESULTADO</td>
                            <td class="b c t s" width="45.7" >VARIABLE A</td>
                            <td class="b c t s" width="45.7">VARIABLE B</td>
                            <td class="b c t s" width="45.7" >RESULTADO</td>
                        </tr>
                        <tr>
                            <td class="blanco" style="height: 3px; font-size: 2px" >rr</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $item)
                            <tr>
                                <td class="blanco" style="height: 1px; font-size: 1px" >rr</td>
                            </tr>
                            <tr>
                                <td class="y ">{{ $item['nombre'] }}</td>
                                <td class="y c s">{{ $item['Variable_A1t'] }}</td>
                                <td class="y c">{{ $item['Variable_B1t'] }}</td>
                                <td class="y s d">
                                    @if ($item['Variable_B1t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['Variable_A1t']/$item['Variable_B1t']* 100, 2, ",", ".")." %" }}
                                    @endif
                                </td>

                                <td class="y c s">{{ $item['Variable_A2t'] }}</td>
                                <td class="y c">{{ $item['Variable_B2t'] }}</td>
                                <td class="y s d">
                                    @if ($item['Variable_B2t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['Variable_A2t']/$item['Variable_B2t']* 100, 2, ",", ".")." %" }}
                                    @endif
                                </td>

                                <td class="y c s">{{ $item['Variable_A3t'] }}</td>
                                <td class="y c">{{ $item['Variable_B3t'] }}</td>
                                <td class="y s d">
                                    @if ($item['Variable_B3t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['Variable_A3t']/$item['Variable_B3t']* 100, 2, ",", ".")." %" }}
                                    @endif
                                </td>

                                <td class="y c s">{{ $item['Variable_A4t'] }}</td>
                                <td class="y c">{{ $item['Variable_B4t'] }}</td>
                                <td class="y s d">
                                    @if ($item['Variable_B4t'] == 0)
                                        {{ '0,00 %' }}
                                    @else
                                        {{ number_format($item['Variable_A4t']/$item['Variable_B4t']* 100, 2, ",", ".")." %" }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td class="blanco" style="height: 1px; font-size: 1px" >rr</td>
                            </tr>
                        @foreach ($totales as $item)
                            <tr>
                                <td class="y c s">TOTALES</td>
                                <td class="y c s">{{ $item['totalVariable_A1t'] }}</td>
                                <td class="y c s">{{ $item['totalVariable_B1t'] }}</td>
                                <td class="y c s"></td>
                                <td class="y c s">{{ $item['totalVariable_A2t'] }}</td>
                                <td class="y c s">{{ $item['totalVariable_B2t'] }}</td>
                                <td class="y c s"></td>
                                <td class="y c s">{{ $item['totalVariable_A3t'] }}</td>
                                <td class="y c s">{{ $item['totalVariable_B3t'] }}</td>
                                <td class="y c s"></td>
                                <td class="y c s">{{ $item['totalVariable_A4t'] }}</td>
                                <td class="y c s">{{ $item['totalVariable_B4t'] }}</td>
                                <td class="y c s"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table >
            </div>
        </div>
           <canvas id="myChart" width="500" height="150"></canvas>
           <div id="variables"></div>
    </body>
    <script>

            let obj = {
                type: 'line',
                data: {
                    labels: ['I Trimestre', 'II Trimestre', 'III Trimestre', 'IV Trimestre'],
                    datasets: [{
                        label: 'Variable A',
                        data: [document.getElementById('totalVariable_A1t').value, document.getElementById('totalVariable_A2t').value, document.getElementById('totalVariable_A3t').value, document.getElementById('totalVariable_A4t').value],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Variable B',
                        data: [document.getElementById('totalVariable_B1t').value, document.getElementById('totalVariable_B2t').value, document.getElementById('totalVariable_B3t').value, document.getElementById('totalVariable_B4t').value],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            };

            //console.log(JSON.stringify(obj));
            const json = JSON.stringify(obj);
            const url_escaped_json = encodeURIComponent(json);
           // const img = `<img src="https://quickchart.io/chart?c=${url_escaped_json}" alt="...">`;

            //coloca en el div del escritorio variables la grafica
            var variables = document.getElementById("variables");
            // variables.innerHTML += `<img src="https://quickchart.io/chart?c=${url_escaped_json}" alt="prueba...">`;
            variables.innerHTML = `<img src="https://quickchart.io/chart?c=${url_escaped_json}" alt="prueba...">`;



            //  crea la grafica con charjs y la pone en el canvas
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['I Trimestre', 'II Trimestre', 'III Trimestre', 'IV Trimestre'],
                    datasets: [{
                        label: 'Variable A',
                        data: [document.getElementById('totalVariable_A1t').value, document.getElementById('totalVariable_A2t').value, document.getElementById('totalVariable_A3t').value, document.getElementById('totalVariable_A4t').value],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'

                        ],
                        borderWidth: 1
                    },{
                        label: 'Variable B',
                        data: [document.getElementById('totalVariable_B1t').value, document.getElementById('totalVariable_B2t').value, document.getElementById('totalVariable_B3t').value, document.getElementById('totalVariable_B4t').value],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)'

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });



    </script>

    <br>

    <strong>
        <center>
            Generado el dia {{ $date }} por {{ $user[0]->nombreusuario }} de la Delegacion del {{ $user[0]->departamentonombre }}
        </center>
    </strong>
</html>


