<form action="" method="POST">
    <table>
        <?php
            //tabla donde van a salir los libros
            echo '<tr><th></th> <th>LIBROS</th> <th>AUTORES</th></tr>';
            foreach($libros as $lib){
                echo '<tr>';
                echo '<td><input type="checkbox" name="checklib[]" value="'.$lib->IDLIBRO.'"/></td>';
                echo '<td>'.$lib->TITULO.'</td>';
                echo '<td>'.$lib->NOMBRE.'</td>';
                echo '</tr>';
            }
            echo '<tr><td colspan=3><input type="submit" value="PRESTAR LIBROS"/></td></tr>';

        ?>
    </table>
</form>