<!DOCTYPE html>
<html>
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

    .paypal-button-internal--paypal-text {
        font-size: 1rem;
        font-style: italic;
        font-weight: 700;
    }

    .paypal-button-internal--container.paypal {
        background-color: #0070ba;
    }

    .call-to-action button {
        align-items: center;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .paypal-button-internal--container {
        align-items: center;
        border: none;
        border-radius: .25rem;
        color: #fff;
        display: flex;
        flex-direction: row;
        font-size: .875rem;
        font-weight: 500;
        justify-content: center;
        padding-bottom: .5rem;
        padding-top: .5rem;
        text-align: center;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>AdvanceShop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('pedido') }}">Tus Pedidos</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Tus Pedidos</a>
                            @endif
                        </li>

                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('carrito') }}">Carrito</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Carrito</a>
                            @endif
                        </li>

                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('perfil') }}">Mi perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
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
                <p class="lead">Este es tu carrito de compras!</p>
            </div>
        </div>
    </main>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

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
                                                        <button type="submit" class="add-cart">Aumentar
                                                            Cantidad</button>
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
                                            @if ($total != 0)
                                                <td>
                                                    <form action="{{ url('paypal') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="total"
                                                            value="{{ $total }}">
                                                        <button class="paypal-button-internal--container paypal"
                                                            type="submit"><span class="prefix-margin">Pay with
                                                            </span><span>. </span> <span
                                                                class="paypal-button-internal--paypal-text">PayPal</span></button>

                                                    </form>

                                                </td>
                                            @endif

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
