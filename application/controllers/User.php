<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
    }

    public function index(){
        if($this->session->userdata('id_user')){
            $data = array(
                'scripts' => array(
                    'jsNavandSideBar.js',
                    'jsPerfil.js'
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
    
    public function ajax_user_data() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $id_user = $this->session->userdata('id_user');
        $result = $this->users_model->get_user_data('id_user', $id_user);

        if($result){
            $this->session->set_userdata('id_user', $id_user);
            echo json_encode($result);
        }else{
            echo 'false';
        }
    }

    public function ajax_update() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        if($data['password'] === $data['passwordConfirm']){
            $id = $data['user_id'];
            unset($data['passwordConfirm']);
            unset($data['user_id']);

            $result = $this->users_model->duplicate_user_data('email', $data['email'], $id);
            if($result === true){
                $data['password'] = md5($data['password']);
                $result = $this->users_model->update_user_data('users', $data, $id);
                echo true;

            }else{
                echo 'false1';
            }
           

        }else{
            echo 'false';
        }
    }

    public function ajax_insert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();

        if($data['password'] === $data['passwordConfirm']){
            unset($data['passwordConfirm']);
            $data['password'] = md5($data['password']);
            $this->users_model->insert_user_data('users', $data);
            $result = $this->users_model->get_user_data('email', $data['email']);

            if($result){
                $id_user = $result->id_user;
                $this->session->set_userdata('id_user', $id_user);
                echo 'true';
            }
        }else{
            echo 'false';
        }
    }
}