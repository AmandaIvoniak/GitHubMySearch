<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class repository extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('repository_model');
        $this->load->model('tags_model');
        $this->load->library('session');
    }

    public function index(){
    }
    // public function ajaxRepository() {
    //     if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

    //     $user = $this->session->userdata('id_user');
    //     $result = $this->repository_model->getRepository($user);

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
        $tags = $data['id_tag'];
        unset($data['id_tag']);

        $result = $this->repository_model->checkRepository($data['id_rep'], $user);
        if($result){           
            $this->repository_model->updateRepository($data);

            foreach ($tags as $key => $value) {
                $resultTag = $this->tags_model->checkRepositoryTags($value,$data['id_rep']);

                if($resultTag == false){
                    $this->tags_model->insertRepositoryTags($value,$data['id_rep']);
                }
            }
            echo 'true';
        }else{
            $result = $this->repository_model->insertRepository($data);
            var_dump($result);

            foreach ($tags as $key => $value) {
                $this->tags_model->insertRepositoryTags($value,$data['id_rep']);
            }
            echo 'true';
        }
    }

    // public function ajaxUpdate() {
    //     if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

    //     $data = $this->input->post();

    //     if($data['password'] === $data['passwordConfirm']){
    //         unset($data['passwordConfirm']);
    //         $data['password'] = md5($data['password']);
    //         $this->users_model->insertUser('users', $data);
    //         $result = $this->perfil_model->updateUser('users', $data['id_user']);

    //         if($result){            
    //             $id_user = $result->id_user;
    //             $this->session->set_userdata('id_user', $id_user);
    //             echo 'true';
    //         }
    //     }else{
    //         echo 'false';
    //     }
    // }

    // public function ajaxDelete() {
    //     if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

    //     $data = $this->input->post();

    //     if($data['password'] === $data['passwordConfirm']){
    //         unset($data['passwordConfirm']);
    //         $data['password'] = md5($data['password']);
    //         $this->users_model->insertUser('users', $data);
    //         $result = $this->perfil_model->updateUser('users', $data['id_user']);

    //         if($result){            
    //             $id_user = $result->id_user;
    //             $this->session->set_userdata('id_user', $id_user);
    //             echo 'true';
    //         }
    //     }else{
    //         echo 'false';
    //     }
    // }

}
