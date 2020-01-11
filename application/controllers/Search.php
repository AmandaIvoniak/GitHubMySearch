<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller{

    public function index(){
        $data = array(
			'styles' => array(
				'cssCustom.css'
			),
			'scripts' => array(
				'jsSearch.js',
				'jsNavandSideBar.js'
            ));

        $this->load->view('search.php', $data);

    }
}