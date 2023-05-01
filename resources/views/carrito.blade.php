<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-primary {}
</style>

<body class="skin-blue sidebar-mini">

    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Carrito de compras</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    @foreach ($productos as $producto)
                                        <?php
                                        $subtotal = $producto->cantidad * $producto->precio;
                                        ?>
                                        <tr>
                                            <td>{{ $producto->nombproducto }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>{{ $subtotal }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('carrito.eliminar', ['idproducto' => $producto->nombproducto]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-cart">Eliminar</button>
                                                </form>
                                                <form
                                                    action="{{ route('carrito.incrementar', ['idproducto' => $producto->nombproducto]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-cart">Aumentar Cantidad</button>
                                                </form>

                                            </td>
                                        </tr>
                                        <?php
                                        $total = $total + $subtotal;
                                        ?>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>Total</td>
                                        <td>{{ $total }}</td>
                                        <td>
                                            <form action="{{ url('paypal') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="total" value="{{ $total }}">
                                                <button type="submit" class="add-cart">Pagar con PayPal</button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
