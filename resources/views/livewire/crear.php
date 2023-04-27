<?php
    $nombre= $_POST['Nom'];
    $precio= $_POST['Prec'];
    $descripcion= $_POST['Des'];

    use DB;

    $pgsql = "INSERT INTO producto (idproducto, nombproducto, descripcion, precio, marca, idcategoria, stock) VALUES (43, 'hola', 'asdasdsadsa','10', 'Razer', 2, 20)";
    echo( $precio);
?>