<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
	if (isset($_GET['id'])) {
	    $categoria = $_GET['id'];
	} else {
	    $categoria = NULL;
	}
	$this->load->helper("vistas");
	$this->data["tituloPagina"] = "Tienda";
	$this->data["categorias"] = creaLista($this->productos->listarCategorias());
	$this->data["productos"] = $this->productos->listarProductos($categoria);
	$this->load->view('master', $this->data);
    }

}
