<div>
   <button onclick="abrirVentana()">Agregrar una Categoria</button>


    <script>
        function abrirVentana() {

            var ventana = window.open("", "ventanaEmergente", "width=400,height=400");
            ventana.document.write(`
            <form method="GET" action="{{ route('CrearCategoria') }}" class="form">
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
    
    
    <input type="submit" value="Crear" class="btn btn-primary">
</form>
`);
        }
    </script>





</div>
