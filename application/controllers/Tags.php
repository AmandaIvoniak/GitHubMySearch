<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tags_model');
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
            $this->load->view('tags.php', $data);
        } else {
			header('Location: login');
		}
    }

    public function ajax_tag_data() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $user = $this->session->userdata('id_user');
        $result = $this->tags_model->get_tags_data($user);

        if($result){
            echo json_encode($result);
        }else{
            echo 'false';
        }
    }

    public function ajax_insert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();

        $data['user_id'] =  $this->session->userdata('id_user');
        
        if($this->tags_model->insert_tags_data('tags', $data)){

            $result = $this->tags_model->get_tags_data($data['user_id']);
            echo json_encode($result);
        }else{
            echo 'false';
        }        
    }

    public function ajax_update() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();

        if($data['password'] === $data['passwordConfirm']){
            unset($data['passwordConfirm']);
            $data['password'] = md5($data['password']);
            $this->users_model->insert_user_data('users', $data);
            $result = $this->perfil_model->update_user_data('users', $data['user_id']);

            if($result){            
                $id_user = $result->id_user;
                $this->session->set_userdata('id_user', $id_user);
                echo 'true';
            }
        }else{
            echo 'false';
        }
    }

    public function ajax_delete() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        $result = $this->tags_model->delete_tags_data('tags', $data);

        if($result){            
            echo 'true';
        }
    }
}