<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class repository extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('repository_model');
        $this->load->library('session');
    }

    public function index(){
    }
    // public function ajaxTag() {
    //     if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

    //     $user = $this->session->userdata('id_user');
    //     $result = $this->repository_model->get_tags_data($user);

    //     if($result){
    //         echo json_encode($result);
    //     }else{
    //         echo 'false';
    //     }
    // }

    public function ajaxInsert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        $data = $this->input->post();

        $user = $this->session->userdata('id_user');
        $data['id_user'] =  $user;

        $result = $this->repository_model->insertRepository('repository', $data);
        if($result){
            echo 'true';
        }
    }

    public function ajaxUpdate() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();

        if($data['password'] === $data['passwordConfirm']){
            unset($data['passwordConfirm']);
            $data['password'] = md5($data['password']);
            $this->users_model->insertUser('users', $data);
            $result = $this->perfil_model->updateUser('users', $data['user_id']);

            if($result){            
                $id_user = $result->id_user;
                $this->session->set_userdata('id_user', $id_user);
                echo 'true';
            }
        }else{
            echo 'false';
        }
    }

    public function ajaxDelete() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();

        if($data['password'] === $data['passwordConfirm']){
            unset($data['passwordConfirm']);
            $data['password'] = md5($data['password']);
            $this->users_model->insertUser('users', $data);
            $result = $this->perfil_model->updateUser('users', $data['user_id']);

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
