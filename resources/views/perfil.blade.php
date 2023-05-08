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

    /* CSS para mostrar los productos */
    .productos-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .producto {
        width: calc(33.33% - 20px);
        margin-bottom: 30px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow: hidden;
    }

    .promo {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #2A9FA2;
        color: #fff;
        padding: 5px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
    }

    .producto:hover {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .img-container {
        position: relative;
    }

    .img-container img {
        width: 100%;
        height: auto;
        display: block;
    }


    .info-container {
        padding: 15px;
        text-align: center;
    }

    .info-container h3 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .info-container strong {
        display: block;
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: bold;
    }

    .rating {
        display: block;
        margin-bottom: 10px;
        font-size: 20px;
        color: #2A9FA2;
    }

    .add-cart {
        display: inline-block;
        padding: 10px 20px;
        background-color: #2A9FA2;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .add-cart:hover {
        background-color: #fff;
        color: #2A9FA2;
        border: 2px solid #2A9FA2;
    }

    /* Estilo para los bloques de información personal */
    .individual__section {
        margin-bottom: 20px;
        padding: 200px;
        padding-top: 0px;
    }

    .individual__block {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 10px;
    }

    .individual__labelbox {
        flex-basis: 30%;
        font-weight: 500;
        margin-right: 10px;
    }

    .individual__contentbox {
        flex-basis: 65%;
        display: flex;
        align-items: center;
    }

    .individual__details {
        margin-right: 10px;
    }

    .individual__details-sub {
        flex-basis: 100%;
        margin-top: 10px;
    }

    .individual__actionbox {
        display: flex;
        align-items: center;
    }

    .inline__editbtn {
        background: #fff;
        color: #007bff;
        border: 1px solid #007bff;
        border-radius: 3px;
        padding: 4px 10px;
        font-size: 14px;
        cursor: pointer;
    }

    .inline__editbtn:hover {
        background: #007bff;
        color: #fff;
    }

    /* Estilo para las separadores */
    .separator {
        height: 1px;
        background: #ebebeb;
        margin: 20px 0;
    }

    .separator__sub {
        margin-top: 10px;
        margin-bottom: 0;
    }

    /* Estilo para los detalles de contacto */
    .flexBox {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .individual__details-action-view-content {
        flex-basis: 70%;
    }

    .contactInfoDisplay__label {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 3px;
    }

    .contactInfoDisplay__content {
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
    }

    .contactInfoDisplay__verified {
        font-size: 12px;
        color: #5cb85c;
        font-weight: 500;
        margin-left: 10px;
    }

    .contact__info__label {
        margin-top: 20px;
    }

    .cancel {
        width: 142px;
        font-weight: 700;
        border: 1px solid;
        box-sizing: border-box;
        font-family: inherit;
        margin: 0;
        text-align: center;
        text-decoration: none;
        vertical-align: bottom;
        background-color: transparent;
        border-radius: var(--btn-border-radius, 20px);
        color: #1A9797;
        display: inline-block;
        font-size: .875rem;
        min-height: 40px;
        min-width: 88px;
        padding: 9.5px 20px;
    }

    .save {
        width: 142px;
        font-weight: 700;
        border: 1px solid;
        box-sizing: border-box;
        font-family: inherit;
        margin: 0;
        text-align: center;
        text-decoration: none;
        vertical-align: bottom;
        background-color: #1A9797;
        border-radius: var(--btn-border-radius, 20px);
        color: #FFFFFFFF;
        display: inline-block;
        font-size: .875rem;
        min-height: 40px;
        min-width: 88px;
        padding: 13px;
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
                <p class="lead">Aquí puedes modificar tu perfil como gustes!</p>
            </div>
        </div>
    </main>


    <div class="individual__section">
        <h1 id="individual_personal_info_label" class="title" role="main">Información Personal</h1>
        <div class="separator"></div>
        <div>
            <div>
                <div class="individual__block">
                    <div id="individual_username_label" class="individual__labelbox"><span>Nombre de Usuario</span>
                    </div>
                    <div class="individual__contentbox individual__flexBox">
                        <div class="individual__details">
                            @auth
                                <div>
                                    <div>
                                        <div id="display_username">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="individual__actionbox">
                            <div class="actionbox__contents"><span><button id="individual_phone_edit_button"
                                        type="button" aria-label="Edit Phone number" class="inline__editbtn"
                                        data-track="{&quot;actionName&quot;:&quot;individual-phone-number-edit&quot;}"
                                        onclick="document.getElementById('edit_username_form').style.display = 'block';">Editar</button></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="edit_username_form" style="display:none;">
                    <form method="POST" action="{{ route('perfil.cambiarusername') }}"
                        onsubmit="return validarForm()">
                        @csrf
                        <label for="username">Nuevo nombre de usuario:</label>
                        <input type="text" name="username" id="username">
                        <button class="save" type="submit">Guardar cambios</button>
                        <button class="cancel" type="button"
                            onclick="cancelarEdicion('edit_username_form')">Cancelar</button>
                    </form>
                </div>

                <script>
                    function validarForm() {
                        var username = document.getElementById("username").value.trim();
                        if (username === "") {
                            alert("El campo Nuevo nombre de usuario es obligatorio");
                            return false;
                        }
                        return true;
                    }
                </script>

            </div>
            <div class="separator hide-for-mweb"></div>
            <div class="individual__block hide-for-mweb">
                <div id="individual_account_type_label" class="individual__labelbox"><span>Tipo de Cuenta</span></div>
                <div class="individual__contentbox individual__flexBox">
                    <div class="individual__details"><span>
                            <div>
                                <div>
                                    <div id="individual_account_type_value">Individual</div>
                                </div>
                            </div>
                        </span></div>
                </div>
            </div>
            <div class="separator"></div>
            <div class="individual__block">
                <div id="individual_contact_info_label" class="individual__labelbox contact__info__label">
                    <span>Información de contacto</span>
                </div>
                <div class="individual__contentbox">
                    <div class="individual__details-sub">
                        <div class="flexBox">
                            <div class="individual__details-action-view-content"><span>
                                    <div class="contactInfoDisplay">
                                        <div>
                                            <div id="contact_info_label" class="contactInfoDisplay__label">Dirección
                                                de
                                                Correo
                                            </div>
                                            <div id="Email address_address_display_infotip"
                                                class="contactInfoDisplay__label-info-icon"></div>
                                            <div id="contact_info_display">
                                                @auth
                                                    <div>
                                                        <div>
                                                            <div id="display_username">{{ Auth::user()->email }}</div>
                                                        </div>
                                                    </div>
                                                @endauth
                                            </div>
                                            <div id="contact_info_verified" class="contactInfoDisplay__verified">
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="individual__actionbox">
                                <div class="actionbox__contents"><span><button id="individual_phone_edit_button"
                                            type="button" aria-label="Edit Phone number" class="inline__editbtn"
                                            data-track="{&quot;actionName&quot;:&quot;individual-phone-number-edit&quot;}"
                                            onclick="document.getElementById('edit_email_form').style.display = 'block';">Editar</button></span>
                                </div>
                            </div>

                        </div>
                        <div class="separator separator__sub"></div>
                    </div>
                    <div class="individual__details-sub">
                        <div class="flexBox">
                            <div class="individual__details-action-view-content">
                                <div>
                                    <div><span>
                                            <div class="contactInfoDisplay">
                                                <div>
                                                    <div id="contact_info_label" class="contactInfoDisplay__label">
                                                        Número de teléfono</div>
                                                    <div id="Phone number_address_display_infotip"
                                                        class="contactInfoDisplay__label-info-icon"></div>
                                                    <div id="contact_info_display">
                                                        @auth
                                                            <div>
                                                                <div>
                                                                    <div id="display_username">
                                                                        {{ Auth::user()->telefono }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endauth
                                                    </div>
                                                    <div id="contact_info_verified"
                                                        class="contactInfoDisplay__verified"></div>
                                                </div>
                                            </div>
                                        </span></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="individual__actionbox">
                                <div class="actionbox__contents"><span><button id="individual_phone_edit_button"
                                            type="button" aria-label="Edit Phone number" class="inline__editbtn"
                                            data-track="{&quot;actionName&quot;:&quot;individual-phone-number-edit&quot;}"
                                            onclick="document.getElementById('edit_telefono_form').style.display = 'block';">Editar</button></span>
                                </div>

                            </div>


                        </div>
                        <div id="edit_telefono_form" style="display:none;">
                            <form method="POST" action="{{ route('perfil.cambiartelefono') }}"
                                onsubmit="return validarForm2()">
                                @csrf
                                <label for="telefono">Nuevo número de teléfono:</label>
                                <input type="text" name="telefono" id="telefono">
                                <button class="save" type="submit">Guardar cambios</button>
                                <button class="cancel" type="button"
                                    onclick="cancelarEdicion('edit_telefono_form')">Cancelar</button>
                            </form>
                        </div>
                        <script>
                            function validarForm2() {
                                var username = document.getElementById("telefono").value.trim();
                                if (username === "") {
                                    alert("El campo Nuevo número teléfono es obligatorio");
                                    return false;
                                }
                                return true;
                            }
                        </script>

                    </div>
                </div>
                <div id="edit_email_form" style="display:none;">
                    <form method="POST" action="{{ route('perfil.cambiaremail') }}"
                        onsubmit="return validarForm3()">
                        @csrf
                        <label for="username">Nuevo correo de usuario:</label>
                        <input type="text" name="email" id="email">
                        <button class="save" type="submit">Guardar cambios</button>
                        <button class="cancel" type="button"
                            onclick="cancelarEdicion('edit_email_form')">Cancelar</button>
                    </form>
                </div>
                <script>
                    function validarForm3() {
                        var username = document.getElementById("username").value.trim();
                        if (username === "") {
                            alert("El campo Nuevo correo de usuario es obligatorio");
                            return false;
                        }
                        return true;
                    }
                </script>
            </div>
            <div class="separator"></div>
            <div id="individual_personal_info" class="individual__block">
                <div id="individual_personal_info_label" class="individual__labelbox contact__info__label">
                    <span>Información Personal</span>
                </div>
                <div class="individual__contentbox">
                    <div class="individual__details-sub">
                        <div class="flexBox">
                            <div class="individual__details-action-view-content"><span>
                                    <div>
                                        <div id="individualAddressView_address_display_label"
                                            class="contactInfoDisplay__label">Nombre, dirección, n# casa</div>
                                        <div id="individualAddressView_address_display_infotip"
                                            class="contactInfoDisplay__label-info-icon"></div>
                                        <div id="individualAddressView_address_display_content"
                                            class="contactInfoDisplay__content">
                                            <div id="individualAddressView_address_display_content_name">
                                                {{ $direccionEnvio->nombre }}
                                            </div>
                                            <div id="individualAddressView_address_display_line1">
                                                {{ $direccionEnvio->calle }} {{ $direccionEnvio->numcasa }}
                                            </div>

                                            <div>
                                                <span
                                                    id="individualAddressView_address_display_city">{{ $direccionEnvio->ciudad }}&nbsp;
                                                </span>
                                            </div>
                                            <div id="individualAddressView_address_display_country">BO</div>
                                        </div>
                                    </div>
                                </span></div>
                            <div class="individual__actionbox">
                                <div class="actionbox__contents"><span><button id="individual_direccion_edit_button"
                                            type="button" aria-label="Edit Phone number" class="inline__editbtn"
                                            data-track="{&quot;actionName&quot;:&quot;individual-phone-number-edit&quot;}"
                                            onclick="document.getElementById('edit_direccion_form').style.display = 'block';">Editar</button></span>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <div id="edit_direccion_form" style="display:none;">
                    <form method="POST" action="{{ route('perfil.cambiardireccion') }}"
                        onsubmit="return validarForm4()">
                        @csrf
                        <label for="nombre">Nombre del destinatario : </label>
                        <input type="text" name="nombre" id="nombre">

                        <label for="calle">Nombre de la calle : </label>
                        <input type="text" name="calle" id="calle">

                        <label for="numcasa">Número de casa : </label>
                        <input type="text" name="numcasa" id="numcasa">

                        <label for="ciudad">Ciudad : </label>
                        <input type="text" name="ciudad" id="ciudad">

                        <button class="save" type="submit">Guardar cambios</button>
                        <button class="cancel" type="button"
                            onclick="cancelarEdicion('edit_direccion_form')">Cancelar</button>

                    </form>
                </div>
                <script>
                    function validarForm4() {
                        var username = document.getElementById("nombre").value.trim();
                        var username2 = document.getElementById("calle").value.trim();
                        var username3 = document.getElementById("numcasa").value.trim();
                        var username4 = document.getElementById("ciudad").value.trim();
                        if (username === "" || username2 === "" || username3 === "" || username4 === "") {
                            alert("Rellene todos los campos por favor");
                            return false;
                        }
                        return true;
                    }
                </script>
            </div>
            <div class="separator"></div>
        </div>
    </div>

</body>

</html>
