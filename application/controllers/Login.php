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
            $this->load->view('home.php');
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

    public function logoff(){
        $this->session->sess_destroy();
        header('Location: login.php');
    }

    public function ajax_login() {
        if(!$this->input->is_ajax_request()){
            exit('Acesso não permitido!');
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->load->model('users_model');
        $result = $this->users_model->get_user_data($email);
        echo $result;
        if($result){            
            $id_user = $result->id_user;
            $passwordHash = $result->password;

            if(password_verify($password, $passwordHash)){
                $this->session->set_userdata('id_user', $id_user);
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }

    public function ajax_insert() {
        if(!$this->input->is_ajax_request()){
            exit('Acesso não permitido!');
        }

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $passwordConfirm = $this->input->post('passwordConfirm');
        
        echo $name,$email,$password,$passwordConfirm;


        if($password === $passwordConfirm){
            echo 'ta ok?';
            //$this->session->set_userdata('id_user', $id_user);
            $this->load->model('users_model');
            $result = $this->users_model->insert_user_data($name, $email, $password);
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

