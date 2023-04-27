<div>
    <button onclick="abrirVentana()">Agregrar un Producto</button>


    <script>
        function abrirVentana() {

            var ventana = window.open("", "ventanaEmergente", "width=400,height=400");
            ventana.document.write(`
            <form method="POST" action="{{ route('CrearProducto') }}" class="form">
    @csrf
    
    <div class="form-group">
        <label for="id">id:</label>
        <input type="text" id="id" name="id" class="form-control">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
    </div>
    
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" class="form-control">
    </div>

    <div class="form-group">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" class="form-control">
    </div>

    <div class="form-group">
        <label for="idcategoria">idcategoria:</label>
        <input type="text" id="idcategoria" name="idcategoria" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" class="form-control">
    </div>
    
    <input type="submit" value="Crear" class="btn btn-primary">
</form>
`);
        }
    </script>




</div>
