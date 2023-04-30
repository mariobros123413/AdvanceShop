<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
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
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></a>
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


        <!-- AdminLTE JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>
    </div>
    <livewire:scripts />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('carritoActualizado', function() {
                // Actualiza el carrito con los nuevos elementos
            });
        });
    </script>



</body>

</html>
