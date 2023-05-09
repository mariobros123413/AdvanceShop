<!-- Tabla de productos -->
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color: #f5f5f5;
}

thead {
    background-color: #f2f2f2;
}

.total {
    font-weight: bold;
}

.direccion {
    margin-top: 20px;
    font-size: 14px;
}

.direccion h4 {
    margin: 0;
}

.direccion p {
    margin: 5px 0;
}

.encabezado {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}

.numero-pedido {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 10px;
}

.fecha {
    margin-bottom: 10px;
}

.texto-derecha {
    text-align: right;
}

</style>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nombproductos as $key => $nombproducto)
            <tr>
                <td>{{ $nombproducto }}</td>
                <td>{{ $precios[$key] }}</td>
                <td>{{ $cantidad[$key] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Tabla de dirección de envío -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Calle</th>
            <th>Nro Casa</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data['nombre'] }}</td>
            <td>{{ $data['calle'] }}</td>
            <td>{{ $data['numcasa'] }}</td>
            <td>{{ $data['ciudad'] }}</td>
        </tr>
    </tbody>
</table>
