<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
    }

    public function index() {
        if($this->session->userdata('id_user')){
            header('Location: home');
        }else{    
            $data = array(
                'scripts' => array(
                    'jsLogin.js'
                    ),
                'styles' => array(
                    'cssLogin.css'
                    ),
            );  
            $this->load->view('login.php', $data);
        }
    }

    public function ajaxLogoff(){
        $this->load->library('session');
        $this->session->sess_destroy();
        echo 'true';
    }

    public function ajaxLogin() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $email = $this->input->post('email');
        $password = $this->input->post('password');        
        $result = $this->users_model->getUser('email', $email);

        if($result){
            $id_user = $result->id_user;
            $passwordHash = $result->password;
            if(md5($password) == $passwordHash){
                $this->session->set_userdata('id_user', $id_user);
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }
}