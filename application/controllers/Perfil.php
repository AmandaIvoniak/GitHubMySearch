<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        if($this->session->userdata('id_user')){
            $data = array(
                'scripts' => array(
                    'jsNavandSideBar.js'
                ),
                'styles' => array(
                    'cssCustom.css'
                    ),
            );  
            $this->load->view('perfil.php', $data);
        }else{
            header('Location: login');
        }
    }
}