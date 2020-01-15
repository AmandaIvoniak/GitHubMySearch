<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class repository extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('repository_model');

    }

    public function index(){
    }
    public function ajax_tag_data() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $user = $this->session->userdata('id_user');
        $result = $this->repository_model->get_tags_data($user);

        if($result){
            echo json_encode($result);
        }else{
            echo 'false';
        }
    }

    public function ajax_insert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        // $this->repository_model->insert_tags_data('users', $data);
        // if($result){
        //     echo 'true';
        // }
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

}
