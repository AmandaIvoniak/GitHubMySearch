<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller{
    public function index(){
        $data = array(
            'scripts' => array(
				'jsNavandSideBar.js'
            ),
            'styles' => array(
                'cssCustom.css'
                ),
        );  
        $this->load->view('users/perfil.php', $data);
    }

}