<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller{
    public function index(){

        $this->template->show("perfil.php");
    }

}