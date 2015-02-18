<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
	$this->mostrarProductos();
    }

    public function mostrarProductos($categoria = NULL) {
	$this->data["tituloPagina"] = "Tienda";
	$this->data["categorias"] = creaLista($this->productos->listarCategorias(), "site/mostrarProductos/");
	if (!is_null($categoria)) {
	    $this->data['catActual'] = $this->productos->listarCategoria($categoria)->nombre;
	} else {
	    $this->data['catActual'] = "Todos los productos";
	}
	$this->data["imagenesDir"] = base_url() . "assets/img";
	$this->data["productos"] = $this->productos->listarProductos($categoria);
	foreach ($this->data["productos"] as &$producto) {
	    if ($producto->descuento != 0) {
	    $producto->descuento = round($producto->precio - ($producto->descuento / 100 * $producto->precio), 2);
		
	    }
	}
	$this->data["destacados"] = $this->productos->listarDestacados($categoria);
	$this->load->view('home', $this->data);
    }

}
