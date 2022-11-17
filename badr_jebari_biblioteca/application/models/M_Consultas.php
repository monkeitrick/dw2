<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Consultas extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //select para conseguir los generos
    function obtenerLibrosGenero($gen) {
        $consulta = "SELECT IDLIBRO, TITULO, NOMBRE FROM LIBROS,AUTORES WHERE LIBROS.IDAUTOR=AUTORES.IDAUTOR AND GENERO='$gen'";
        $resultado = $this->db->query($consulta);
        return $resultado->result();
    }
    //select para conseguir los distintos generos
    function conseguirGen(){
        $resultado = $this->db->query("SELECT DISTINCT(GENERO) FROM LIBROS");
        return $resultado->result();
    }
    //select para conseguir los prestamos
    function conseguirPrestamos($id){
        $consulta = "SELECT IDPRESTAMO FROM PRESTAMOS WHERE IDLIBRO='$id'";
        $resultado = $this->db->query($consulta);
        $numFilas = $resultado->num_rows();
        return $numFilas;
    }
    //select para conseguir los libros que tengan una id especifica
    function conseguirLibro($id){
        $consulta = "SELECT TITULO FROM LIBROS WHERE IDLIBRO='$id'";
        $resultado = $this->db->query($consulta);
        return $resultado->result()[0];
    }
    //insert para guardar los prestamos
    function guardarPrestamos($id){
        $consulta = "INSERT INTO PRESTAMOS (IDLIBRO, FECHA) VALUES ('$id',CURRENT_DATE)";  
        $this->db->query($consulta);
    }
}
