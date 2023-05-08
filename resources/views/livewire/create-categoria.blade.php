<div>
   <button type="button" class="btn btn-primary red" data-toggle="modal" data-target="#modal-crear-categoria">
        Agregar una Categoría
    </button>
<style>
        .flexasd{
            color:#831a1a;
        }
    </style>
    <!-- Modal para crear el categoria -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-crear-categoria">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('crear.categoria') }} ">
                        @csrf
                        <div>
                            <label for="idcategoria">ID de la categoria: </label>
                            <input type="text" name="idcategoria" value="{{ old('idcategoria') }}">
                            @if ($errors->has('idcategoria'))
                                <span>{{ $errors->first('idcategoria') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="nombcategoria">Nombre del categoria: </label>
                            <input type="text" name="nombcategoria" value="{{ old('nombcategoria') }}">
                            @if ($errors->has('nombcategoria'))
                                <span>{{ $errors->first('nombcategoria') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="descripcion">Descripción: </label>
                            <input type="text" name="descripcion" value="{{ old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span>{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                        <button type="submit">Crear categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





</div>
