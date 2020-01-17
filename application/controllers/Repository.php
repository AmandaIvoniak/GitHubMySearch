<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('repository_model');
        $this->load->model('tags_model');
        $this->load->library('session');
    }

    public function index(){
    }

    public function ajaxInsert() {
        if(!$this->input->is_ajax_request() ? exit('Acesso não permitido!') : '');
        $data = $this->input->post();
        $fullDelete = $this->repository_model->deleteTagByIdRep($data['id_rep']);

        if (isset($data['id_tag'])) {
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
                        $dataRep = $this->repository_model->getRepository($user, $data['id_rep']);
                        $this->tags_model->insertRepositoryTags($value,$dataRep->id_tablerepository);
                    }
                }
                echo 'true';
            }else{
                $result = $this->repository_model->insertRepository($data);
                foreach ($tags as $key => $value) {
                    $dataRep = $this->repository_model->getRepository($user, $data['id_rep']);
                    $this->tags_model->insertRepositoryTags($value,$dataRep->id_tablerepository);
                }
                echo 'true';
            }
        } else {
            echo $fullDelete ? 'true' : 'false';
        }
    }
}
