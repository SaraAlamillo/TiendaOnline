<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {
    const maxPorPagina = 5;

    public function index() {
	$this->mostrarProductos();
    }

    public function mostrarProductos($pagina = 0, $categoria = NULL) {
	$this->load->library('pagination');
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
	
	

	$config['base_url'] = site_url('site/mostrarProductos');
	$config['total_rows'] = $this->productos->numTotalProductos($categoria);
	$config['per_page'] = self::maxPorPagina;

	$this->pagination->initialize($config);

	$this->data['productos'] = $this->productos->listarProductos($categoria, ["inicio" => $pagina, "total" => self::maxPorPagina]);
	    $this->data['productosPaginador'] = $this->pagination->create_links();
$this->load->view('home', $this->data);
    }

}
