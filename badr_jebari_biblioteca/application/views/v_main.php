<?php
    $this->load->helper('url');
    $css = base_url().'css/style.css';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=$css?>">
        <title>Subastas</title>
    </head>
    <body>
        <div id="header">
            <a href="<?=site_url()?>"><h1>PRESTAMOS</h1></a>
        </div>
        <div id="container">
            <div id="bar">
                <ul>
                    <?php
                    //listado de los distintos generos de la base de datos
                        foreach($generos as $genero2){
                            $genero2 = $genero2->GENERO;
                            echo "<li><a href='".site_url()."/obtenerLibrosGenero/".$genero2. "'>".$genero2."</a></li>";
                        }
                    ?>
                </ul>
            </div>
            <div id="main">