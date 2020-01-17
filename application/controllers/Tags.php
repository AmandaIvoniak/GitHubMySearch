<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tags_model');
        $this->load->model('repository_model');
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

    public function ajaxTag() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        $data = $this->input->post();

        $user = $this->session->userdata('id_user');
        $result = $this->tags_model->getTags('id_user', $user);

        if($result){
            echo json_encode($result);
        }else{
            echo 'false';
        }
    }

    public function ajaxInsert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        $data = $this->input->post();

        $data['id_user'] =  $this->session->userdata('id_user');
        $newId = $this->tags_model->insertTags($data);
        if($newId){
            $result = $this->tags_model->getTags('id_tag',$newId);
            echo json_encode($result);
        }else{
            echo 'false';
        }        
    }

    public function ajaxUpdate() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        echo $this->tags_model->updateTags($this->input->post()) ? 'true' : 'false';
    }

    public function ajaxDelete() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        $result = $this->tags_model->deleteTags($data);

        echo $result ? 'true' : 'false';
    }

    public function ajaxTagSelect() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');

        $data = $this->input->post();
        $user = $this->session->userdata('id_user');
        $result = $this->tags_model->getTags('id_user', $user);    

        foreach ($result as $key => $value) {
            $dataRep = $this->repository_model->getRepository($user, $data['id']);
            $resultTag = $this->tags_model->checkRepositoryTags($value->id_tag, $dataRep->id_tablerepository, 'true');

            $value->selected = $resultTag != NULL ? 'selected': 'false';
        }
        echo $result ? json_encode($result) : 'false';
    }

    public function reportByTag(){
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
            $newData = [];
            $data = $this->input->post();
            $user = $this->session->userdata('id_user');
            foreach ($data['id_tag'] as $key => $value) {
                $newData[] = $this->repository_model->getReportInformation($value, $user);
            }
        echo json_encode($newData);
    }
}