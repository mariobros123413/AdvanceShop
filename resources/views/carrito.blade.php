<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title></head>
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
                                    <tr>
                                        <td>Producto 1</td>
                                        <td>1</td>
                                        <td>$10.00</td>
                                        <td>$10.00</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Producto 2</td>
                                        <td>2</td>
                                        <td>$20.00</td>
                                        <td>$40.00</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td>Total</td>
                                        <td>$50.00</td>
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
