<div>
    <button type="button" class="btn btn-primary red" data-toggle="modal" data-target="#modal-crear-producto">
        Agregar un Producto
    </button>
    <style>
        .flexasd{
            color:#831a1a;
        }
    </style>
    <!-- Modal para crear el producto -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-crear-producto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('crear.producto') }}">
                        @csrf
                        <div>
                            <label for="idproducto">ID del producto: </label>
                            <input type="text" name="idproducto" value="{{ old('idproducto') }}">
                            @if ($errors->has('idproducto'))
                                <span>{{ $errors->first('idproducto') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="nombproducto">Nombre del producto: </label>
                            <input type="text" name="nombproducto" value="{{ old('nombproducto') }}">
                            @if ($errors->has('nombproducto'))
                                <span>{{ $errors->first('nombproducto') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="descripcion">Descripción: </label>
                            <input type="text" name="descripcion" value="{{ old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span>{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="precio">Precio: </label>
                            <input type="text" name="precio" value="{{ old('precio') }}">
                            @if ($errors->has('precio'))
                                <span>{{ $errors->first('precio') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="marca">Marca: </label>
                            <input type="text" name="marca" value="{{ old('marca') }}">
                            @if ($errors->has('marca'))
                                <span>{{ $errors->first('marca') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="idcategoria">Categoría: </label>
                            <input type="text" name="idcategoria" value="{{ old('idcategoria') }}">
                            @if ($errors->has('idcategoria'))
                                <span>{{ $errors->first('idcategoria') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="stock">Stock: </label>
                            <input type="number" name="stock" value="{{ old('stock') }}">
                            @if ($errors->has('stock'))
                                <span>{{ $errors->first('stock') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="stock">URL imagen: </label>
                            <input type="text" name="imagen_url" value="{{ old('imagen_url') }}">
                            @if ($errors->has('imagen_url'))
                                <span>{{ $errors->first('imagen_url') }}</span>
                            @endif
                        </div>
                        <button type="submit">Crear producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
