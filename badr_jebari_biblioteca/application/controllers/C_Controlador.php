<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Controlador extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_Consultas');
    }
    //Index carga las vistas
    public function index(){
        $data['generos'] = $this->M_Consultas->conseguirGen();
        $this->load->view('v_main',$data);
        $this->load->view('v_footer');
    }
    //Funcion para conseguir generos llamando al modelo
    function conseguirGen(){
        $data['generos'] = $this->M_Consultas->conseguirGen(); 
        $this->load->view('v_main',$data);
    }
    // Funcion para obtener todos los libros del genero que seleccionemos usando las consultas que tenemos en el modelo
    function obtenerLibrosGenero($genero){ 
        $this->conseguirGen();
        $data['libros'] = $this->M_Consultas->obtenerLibrosGenero($genero); 
        $this->load->view('v_tabla',$data);   
        $checkLibr = $this->input->post('checklib');
        $data['librosPrestados'] = [];
        $data['librosNoPrestados'] = [];
        if($checkLibr!=null){
            if(count($checkLibr)>0){
                foreach($checkLibr as $check){           
                    $libro = $this->M_Consultas->conseguirLibro($check);
                    $prestamos = $this->M_Consultas->conseguirPrestamos($check);  
                    if($prestamos<=3) {
                        array_push($data['librosPrestados'], $libro); 
                        $this->M_Consultas->guardarPrestamos($check); 
                    }
                    else{
                        array_push($data['librosNoPrestados'], $libro);
                    }
                }
                $this->load->view('v_prestamos',$data);
            }       
        } 
        $this->load->view('v_footer'); 
    }
}