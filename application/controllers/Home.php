<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	public function index() {
		if ($this->session->userdata('id_user')) {
            $data = array(
				'styles' => array(
					'cssCustom.css'
				),
				'scripts' => array(
					'jsHome.js',
					'jsNavandSideBar.js'
				));

			$this->load->view('home', $data);
		} else {
			header('Location: login');
		}	
	}
}