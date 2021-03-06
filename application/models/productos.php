<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of modelo
 *
 * @author Sara Alamillo Arroyo
 */
class Productos extends CI_Model {

    /**
     * Devuelve el listado de todas las categorías.
     * @return object Listado de todos los datos de las categorías.
     */
    public function listarCategorias() {
	$resultado = $this->db->get("categoria");
	return $resultado->result();
    }

    public function listarCategoria($id) {
	$this->db->where("id", $id);
	$resultado = $this->db->get("categoria");
	return $resultado->row();
    }

    public function listarProducto($id) {
	$this->db->where("id", $id);
	$resultado = $this->db->get("producto");
	return $resultado->row();
    }

    /**
     * Devuelve un listado de productos. Si se pasa la categoría, se devuelven los productos de dicha categoría; en caso de no haber categoría, se devuelven todos los productos de la base de datos.
     * @param int $categoria Identificador de la categoría de la que se devolverán los productos.
     * @return object Listado de todos los datos de los productos.
     */
    public function listarProductos($categoria = 0, $paginacion = NULL) {
	if ($categoria != 0) {
	    $this->db->where("categoria", $categoria);
	}
	if (is_null($paginacion)) {
	    $resultado = $this->db->get("producto");
	} else {
	    $resultado = $this->db->get("producto", $paginacion["total"], $paginacion["inicio"]);
	}
	return $resultado->result();
    }

    public function numTotalProductos($categoria = NULL) {
	if (!is_null($categoria)) {
	    $this->db->where("categoria", $categoria);
	}

	$resultado = $this->db->get("producto");
	return $resultado->num_rows();
    }

    /**
     * Devuelve un listado de productos destacados. Si se pasa la categoría, se devuelven los productos destacados de dicha categoría; en caso de no haber categoría, se devuelven todos los productos destacados de la base de datos.
     * @param int $categoria Identificador de la categoría de la que se devolverán los productos destacados.
     * @return object Listado de todos los datos de los productos destacados.
     */
    public function listarDestacados($categoria = NULL, $paginacion = NULL) {
        if (!is_null($paginacion)) {
            $this->db->limit($paginacion["total"], $paginacion["inicio"]);
        }
	$intervalo = [
	    "fecha_inicio <" => date("Y-m-d H:i:s"),
	    "fecha_fin >" => date("Y-m-d H:i:s")
	];
	$this->db->from('producto');
	$this->db->join('destacado', 'producto.id = destacado.producto');
	$this->db->where($intervalo);
	if (!is_null($categoria)) {
	    $this->db->where("producto.categoria", $categoria);
	}
	$resultado = $this->db->get();
	return $resultado->result();
    }
    
    public function numTotalDestacados($categoria = NULL) {
	if (!is_null($categoria)) {
	    $this->db->where("categoria", $categoria);
	}

	$resultado = $this->db->get("destacado");
	return $resultado->num_rows();
    }

    /**
     * Devuelve el stock existente de un producto
     * @param integer $id Identificador del producto
     * @return integer Número de elementos que hay del producto
     */
    public function obtenerStock($id) {
	$this->db->select("stock");
	$this->db->where("id", $id);
	$resultado = $this->db->get("producto");
	return $resultado->row()->stock;
    }

    /**
     * 
     * @param integer $id Identificador del producto
     * @param string $operacion Tipo de modificación: + para incremento, - para decremento
     * @param integer $cantidad Cantidad para modificar el stock
     * @return boolean Devuelve el resultado de la operación: TRUE si ha ido todo correcto y FALSE en caso contrario
     */
    public function modificarStock($id, $operacion, $cantidad) {
	if ($operacion == "+") {
	    $nuevoStock = $this->obtenerStock($id) + $cantidad;
	} elseif ($operacion == "-") {
	    $nuevoStock = $this->obtenerStock($id) - $cantidad;
	} else {
	    return FALSE;
	}

	$this->db->where("id", $id);
	$this->db->update("producto", ["stock" => $nuevoStock]);

	if ($this->obtenerStock($id) == $nuevoStock) {
	    return TRUE;
	} else {
	    return FALSE;
	}
    }

}
