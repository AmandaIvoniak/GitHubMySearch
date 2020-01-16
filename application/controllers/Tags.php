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

        $newId = $this->tags_model->insert_tags_data('tags', $data);
        if($newId){
            $result = $this->tags_model->get_tags_data($data['user_id'], array(
                'tags_id' => $newId
            ));
            echo json_encode($result);
        }else{
            echo 'false';
        }        
    }

    public function ajax_update() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        echo $this->tags_model->update_tags_data('tags', $this->input->post()) ? 'true' : 'false';
    }

    public function ajax_delete() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        $result = $this->tags_model->delete_tags_data('tags', $data);

        echo $result ? 'true' : 'false';
    }
}