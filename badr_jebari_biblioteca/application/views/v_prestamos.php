<?php
    //Checkboxes para prestar libros
    if(isset($_POST['checklib'])){
        $arrLibros = $_POST['checklib'];
        echo '<h2>LIBROS PRESTADOS</h2>';
        foreach($librosPrestados as $pr){
            echo '<li>'.$pr->TITULO.'</li>';
        }
        echo '<h2>LIBROS NO PRESTADOS</h2>';
        foreach($librosNoPrestados as $noPre){
            echo '<li>'.$noPre->TITULO.'</li>';
        }
    }
?>