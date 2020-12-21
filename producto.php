<?php
// Se comienza la sesión
session_start();

// $_SESSION['USER'] = 'FT';
// $_SESSION['ITEMS'] = 3;


$functionsPath = $_SERVER['DOCUMENT_ROOT']."/2speedy/functions/";
include_once($functionsPath . "conn.php");


if(empty($_GET['product'])) {
    echo "<h1>Debe especificar el producto</h1>";
    die();
}

$product = $_GET['product'];

$sql = "SELECT  * FROM productos
        WHERE productoId='$product'";


$productos = $conn->query($sql);
// echo $productos->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">

    <title>Producto</title>
</head>

<body>
    <div class="content">
        <?php include('navbar.php') ?>



        <div class="catalog">
            <div class="container">

                <?php if ($productos->num_rows == 0): ?>
                    <h1 class="mt-5">NO SE ENCONTRÓ NINGÚN PRODUCTO CON ESA REFERENCIA</h1>
                <?php else: ?>

                    <div class="card mt-5 mb-3" style="max-width: 800px;">

                        <?php

                        while($row = $productos->fetch_assoc()){
                            // $id = number_format($clienteId);
                            // $name = $row['name'];
                            // $saldo = $row['val'];
                            // echo $name." (CC $id) con saldo: $". number_format($saldo) . "<br><br>";

                            $productoId = $row['productoId'];
                            $categoriaId = $row['categoriaId'];
                            $nombre = $row['Nombre'];
                            $talla = $row['talla'];
                            $descripcion = $row['descripcion'];
                            $imagen = $row['imagen'];
                            $precio = number_format($row['precio']);
                            $cantidad = $row['cantidad'];

                            $disabled = ($cantidad < 1) ? "disabled" : "";

                            echo "
                            <div class='row g-0'>
                                <div class='col-md-4'>
                                    <img src='img/$imagen' class='card-img-top' alt='$nombre'>
                                </div>
                                <div class='col-md-8'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$nombre</h5>
                                        <p class='card-text'>$descripcion.</p>";
                                        echo ($cantidad > 9) ? "<p class='text-success'>Stock disponible</p>" : "<p class='text-danger'>Quedan $cantidad productos</p>";
                                        echo "
                                        <div class='row g-2'>
                                            <div class='col-md'>
                                                <div class='form-floating'>
                                                    <select class='form-select' id='floatingSelectGrid2' aria-label='Escoger cantidad' $disabled>
                                                        <option selected> Escoja la cantidad</option>
                                                        <option value='1'>1 unidad</option>
                                                        <option value='2'>2 unidades</option>
                                                        <option value='3'>3 unidades</option>
                                                        <option value='4'>4 unidades</option>
                                                        <option value='5'>5 unidades</option>
                                                    </select>
                                                    <label for='floatingSelectGrid2'>Cantidad:</label>
                                                </div>
                                            </div>
                                            <div class='col-md'>";
                                            if ($talla){
                                                echo "
                                                <div class='form-floating'>
                                                    <select class='form-select' id='floatingSelectGrid1' aria-label='Escoger talla' $disabled>
                                                        <option selected> Escoja la talla</option>
                                                        <option value='s'>Small</option>
                                                        <option value='m'>Medium</option>
                                                        <option value='l'>Large</option>
                                                    </select>
                                                    <label for='floatingSelectGrid1'>Talla:</label>
                                                </div>";
                                            };
                                            echo "
                                            </div>
                                        </div>

                                        <h4 class='card-title mt-3'>Precio: $ $precio</h4>
                                        <a href='#' class='btn btn-outline-secondary btn-sm $disabled'>Agregar al carrito</a>
                                    </div>
                                </div>
                            </div>";


                        }
                        
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>