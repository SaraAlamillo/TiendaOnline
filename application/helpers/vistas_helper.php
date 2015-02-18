<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('creaListaDesplegable')) {

    function creaListaDesplegable(
    $nombre, $datos, $valorPorDefecto = NULL, $nullValue = NULL, $camposDatos = ['desc' => 'nombre', 'valor' => 'codigo']) {
	$html = "<select name='$nombre'>\n";

	if (is_array($nullValue)) {
	    if ($nullValue[$camposDatos['valor']] == $valorPorDefecto) {
		$html .= "<option value='{$nullValue[$camposDatos['valor']]}' selected='selected'>{$nullValue[$camposDatos['desc']]}</option>\n";
	    } else {
		$html .= "<option value='{$nullValue[$camposDatos['valor']]}'>{$nullValue[$camposDatos['desc']]}</option>\n";
	    }
	}

	foreach ($datos as $dato) {
	    if ($dato[$camposDatos['valor']] == $valorPorDefecto) {
		$html .= "<option value='{$dato[$camposDatos['valor']]}' selected='selected'>{$dato[$camposDatos['desc']]}</option>\n";
	    } else {
		$html .= "<option value='{$dato[$camposDatos['valor']]}'>{$dato[$camposDatos['desc']]}</option>\n";
	    }
	}

	$html .= "</select>\n";

	return $html;
    }

}

if (!function_exists('creaLista')) {

    function creaLista($datos, $controlador, $pagina = 0, $camposDatos = ['desc' => 'nombre', 'valor' => 'id']) {
	$html = "<ul>\n";

	foreach ($datos as $dato) {
	    $html .= "<li>";
            $html .= anchor("index.php/{$controlador}{$dato->$camposDatos['valor']}/$pagina", $dato->$camposDatos['desc']);
            $html .= "  </li>\n";
	}

	$html .= "</ul>\n";

	return $html;
    }

}

