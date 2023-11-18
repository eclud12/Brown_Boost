<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Reporte de Ventas</title>

        <style>
            @import 'https://fonts.googleapis.com/css2?family=Archivo&display=swap';

            body {
                font-size: 14px;
                font-family: 'Archivo', sans-serif;
            }

            h1 {
                text-align: center;
                margin-top: 55px;
            }

            .date {
                float: right;
            }

            img {
                float: left;
                width: 150px;
                height: 129px;
            }

            table {
                border-collapse: separate;
                border-spacing: 0;
                color: #4a4a4d;
                table-layout: fixed;
                width: 100%;
                text-align: center;
            }

            th,
            td {
                padding: 10px 15px;
                vertical-align: middle;
            }

            thead {
                background: #395870;
                background: linear-gradient(#49708f, #293f50);
                color: #fff;
            }

            tbody tr:nth-child(even) {
                background: #f0f0f2;
            }

            td {
                border-bottom: 1px solid #cecfd5;
                border-right: 1px solid #cecfd5;
            }

            td:first-child {
                border-left: 1px solid #cecfd5;
            }

            .book-title {
                color: #395870;
                display: block;
            }

            .text-offset {
                color: #7c7c80;
                font-size: 12px;
            }

            .item-stock,
            .item-qty {
                text-align: center;
            }

            .item-price {
                text-align: right;
            }

            .item-multiple {
                display: block;
            }

            tfoot {
                text-align: right;
            }

            tfoot tr:last-child {
                background: #f0f0f2;
                color: #395870;
                font-weight: bold;
            }

            tfoot tr:last-child td:first-child {
                border-bottom-left-radius: 5px;
            }

            tfoot tr:last-child td:last-child {
                border-bottom-right-radius: 5px;
            }

        </style>
    </head>

    <body> 
    <h1>Reporte de ventas</h1>
                <table>
                    <tbody>
                    <tr>
                            <td>No de Venta</td>
                            <td>Vendedor</td>
                            <td>Producto</td>
                            <td>Cantidad</td>
                            <td>Precio c/u</td>
                            <td>Total</td>
                        </tr>
                        <input type="hidden" name="total" value=" {{$total = 0}} ">
                        @foreach($usuarios as $usu)
                            @foreach($productos as $prod2)
                                @foreach($ventas as $venta)
                                    @if($venta->id_usuario == $usu->id_usuario && $venta->id_producto == $prod2->id_producto)
                                    <tr>
                                        <td>{{$venta->id_venta}}</td>
                                        <td>{{$usu->app}}, {{$usu->nombre}}</td>
                                        <td>{{$prod2->nombre}}</td>
                                        <td>{{$venta->cantidad}}</td>
                                        <td>$ {{$prod2->precio}}</td>
                                        <td>$ {{$venta->cantidad * $prod2->precio}}</td>
                                        <input type="hidden" name="total" value=" {{$total= $total + ($venta->cantidad * $prod2->precio)}} ">
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Venta Total</td>
                            <td>$ {{$total}}</td>
                        </tr>
                    </tbody>
                </table>
    </body>

</html>











