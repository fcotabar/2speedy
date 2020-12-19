<?php
$functionsPath = $_SERVER['DOCUMENT_ROOT']."/2speedy/functions/";
include_once($functionsPath . "conn.php");



$sql = "SELECT  * FROM productos ";



if(!empty($_GET['cat'])) {
    $cat = $_GET['cat'];
    $sql .= " WHERE categoriaId='$cat'";
}

$productos = $conn->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">

    <title>Home</title>
</head>

<body>
    <div class="content">
        <?php include('navbar.php') ?>



        <div class="catalog">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">

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

                        echo "
                        <div class='col'>
                            <div class='card h-100'>
                                <img src='img/$imagen' class='card-img-top' alt='$nombre'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nombre</h5>
                                    <p class='card-text'>$descripcion.</p>
                                    <h4 class='card-title'>$ $precio</h4>
                                    <a href='#' class='btn btn-primary'>Comprar</a>
                                </div>
                            </div>
                        </div>";


                    }
                    
                    ?>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>