<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller{

    public function index(){
        $data = array(
            'scripts' => array(
                'jsNavandSideBar.js'
            ),
            'styles' => array(
                'cssCustom.css'
                ),
        );  
        $this->load->view('tags.php',$data);

    }
}