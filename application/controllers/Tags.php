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

    public function ajax_getTags() {
        if(!$this->input->is_ajax_request()){
            exit('Acesso não permitido!');
        }
        $user = $this->session->userdata('id_user');
        var_dump($user);
        
        $result = $this->tags_model->get_tags_data($user);

        if($result){
            var_dump($result);
        }else{
            echo 'false';
        }
    }

    public function ajax_insertTags() {
        if(!$this->input->is_ajax_request()){
            exit('Acesso não permitido!');
        }
        $data = $this->input->post();

        // if($data['password'] === $data['passwordConfirm']){
            $this->tags_model->insert_tags_data('users', $data);
            // $result = $this->users_model->get_tags_data($data['email']);

            if($result){            

                echo 'true';
            }            
        // }else{
        //     echo 'false';
        // }
    }
}