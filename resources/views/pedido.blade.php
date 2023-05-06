<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .logo {
        height: 100px;
        width: 100px;
    }

    .content {
        margin: 100px;
    }

    /* Estilos para ordenar la tabla */
    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd;
    }

    .table thead th {
        background-color: #f5f5f5;
        color: #333;
        font-weight: bold;
        text-align: center;
    }

    .table tfoot td {
        font-weight: bold;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>AdvanceShop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>


</head>

<body>
    <script>
        function cancelarEdicion(formId) {
            document.getElementById(formId).style.display = 'none';
            document.getElementById(formId).style.display = 'none';
            document.getElementById(formId).style.display = 'none';
            document.getElementById(formId).style.display = 'none';
        }
    </script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/"><img
                        src="https://scontent.fvvi1-1.fna.fbcdn.net/v/t1.15752-9/342650874_943976150279978_1244660785714073715_n.png?_nc_cat=111&ccb=1-7&_nc_sid=ae9488&_nc_ohc=E3GKfjqOBToAX9QVSEI&_nc_ht=scontent.fvvi1-1.fna&oh=03_AdQwIcsWfQ4USU_LywMiihpF7She2Vhe7zAElAy-dOxxVw&oe=646BCDB2"
                        class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pedido') }}">Tus Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('carrito') }}">Carrito</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('perfil') }}">Mi perfil</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Bienvenido a AdvanceShop</h1>
                <p class="lead">Aquí puedes monitorear tus pedidos!</p>
            </div>
        </div>
    </main>

    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tus Pedidos</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Pedido</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Subtotal</th>
                                        <th>Estado de Envío</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos->groupBy('idpedido') as $pedido => $detalles)
                                    <?php $total = 0; ?>
                                        @foreach ($detalles as $producto)
                                            <?php $subtotal = $producto->cantidad * $producto->precio; ?>
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ $detalles->count() }}">{{ $pedido }}</td>
                                                @endif
                                                <td>{{ $producto->nombproducto }}</td>
                                                <td>{{ $producto->cantidad }}</td>
                                                <td>{{ $producto->precio }}</td>
                                                <td>{{ $subtotal }}</td>
                                                <td>{{ $producto->estadoenvio }}</td>
                                            </tr>
                                            <?php $total += $subtotal; ?>
                                        @endforeach
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td>{{ $total }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    
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
