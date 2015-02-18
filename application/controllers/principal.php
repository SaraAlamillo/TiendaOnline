<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

    const maxPorPagina = 5;

    public function index($categoria = 0, $pagina = 0) {
        $this->mostrarProductos($categoria, $pagina);
    }

    public function mostrarProductos($categoria = 0, $pagina = 0) {
        //Cargamos librería para la paginación
        $this->load->library('pagination');
        
        //Guardamos el título de la página
        $this->data["tituloPagina"] = "Tienda";
        
        //Creamos la lista de categorías para el menú
        $this->data["categorias"] = creaLista($this->productos->listarCategorias(), "principal/mostrarProductos/", $pagina);
        
        
        //Guardamos el directorio de imágenes
        $this->data["imagenesDir"] = base_url() . "assets/img";
        
        //Paginación de los productos
        $config['base_url'] = site_url('index.php/principal/index/' . $categoria . "/");
        $config['per_page'] = self::maxPorPagina;
        $config['total_rows'] = $this->productos->numTotalProductos($categoria);
        
        $this->pagination->initialize($config);
        
        $this->data['productos'] = $this->productos->listarProductos($categoria, ["inicio" => $pagina, "total" => self::maxPorPagina]);
        $this->data['paginadorProductos'] = $this->pagination->create_links();
        
        foreach ($this->data["productos"] as &$producto) {
            if ($producto->descuento != 0) {
                $producto->descuento = round($producto->precio - ($producto->descuento / 100 * $producto->precio), 2);
            }
        }

        $this->load->view('home', $this->data);
    }

}
