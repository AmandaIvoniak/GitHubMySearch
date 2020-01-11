<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = array(
			'styles' => array(
				'cssCustom.css'
			),
			'scripts' => array(
				'jsHome.js',
				'jsNavandSideBar.js'
			));
		$this->load->view('home', $data);
	}
}