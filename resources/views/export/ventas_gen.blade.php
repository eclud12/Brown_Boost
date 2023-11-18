<table class="table">
                    <tbody style="border: 2px solid #28a7e9">
                        <tr style="border: 2px solid #28a7e9">
                            <td style="border: 2px solid #28a7e9">N° de Venta</td>
                            <td style="border: 2px solid #28a7e9">Nombre del Vendedor</td>
                            <td style="border: 2px solid #28a7e9">Nombre del producto</td>
                            <td style="border: 2px solid #28a7e9">Cantidad</td>
                            <td style="border: 2px solid #28a7e9">Precio c/u</td>
                            <td style="border: 2px solid #28a7e9">Total</td>
                        </tr>
                        <input type="hidden" name="total" value=" {{$total = 0}} ">
                        @foreach($usuarios as $usu)
                            @foreach($productos as $prod2)
                                @foreach($ventas as $venta)
                                    @if($venta->id_usuario == $usu->id_usuario && $venta->id_producto == $prod2->id_producto)
                                    <tr>
                                        <td style="border: 2px solid #28a7e9">{{$venta->id_venta}}</td>
                                        <td style="border: 2px solid #28a7e9">{{$usu->app}}, {{$usu->nombre}}</td>
                                        <td style="border: 2px solid #28a7e9">{{$prod2->nombre}}</td>
                                        <td style="border: 2px solid #28a7e9">{{$venta->cantidad}}</td>
                                        <td style="border: 2px solid #28a7e9">$ {{$prod2->precio}}</td>
                                        <td style="border: 2px solid #28a7e9">$ {{$venta->cantidad * $prod2->precio}}</td>
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
                            <td style="border: 2px solid #28a7e9">$ {{$total}}</td>
                        </tr>
                    </tbody>
                </table>