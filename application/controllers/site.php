<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
	$this->productos();
    }
    
    public function productos($categoria = NULL) {
	$this->data["tituloPagina"] = "Tienda";
	$this->data["categorias"] = creaLista($this->productos->listarCategorias(), "site/productos/");
	$this->data["productos"] = $this->productos->listarProductos($categoria);
	$this->data["destacados"] = $this->productos->listarDestacados($categoria);
	$this->load->view('home', $this->data);
    }

}
