<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        /* $this->load->view('welcome_message');

          if ($this->usuarios->darDeAlta(["usuario" => "prueba", "contrasenia" => "prueba"])) {
          echo 'ok';
          } else {
          echo "no ok";
          } */
        //$this->usuarios->darDeBaja("4");
        /* echo "<pre>";
          print_r($this->usuarios->ultimoUsuario());
          echo "</pre>"; */

        require( BASEPATH . '../application/libraries/Smarty/Smarty.class.php');
        $smarty = new Smarty;

        $smarty->template_dir = BASEPATH . '../application/views/templates/';
        $smarty->compile_dir = BASEPATH . '../application/views/templates_c/';
        $smarty->config_dir = BASEPATH . '../application/views/configs/';
        $smarty->cache_dir = BASEPATH . '../application/views/cache/';

        $smarty->assign('name', 'Ned');

        $smarty->display('home.tpl');
    }

    function forma1() {
        $array = array('1' => 'a', '2' => 'b');
        $this->mysmarty->view('home', array('array' => $array));
    }

    function forma2() {
        $array = array('1' => 'a', '2' => 'b');
        $this->mysmarty->assign('array', $array);
        $this->mysmarty->display('home.tpl');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */