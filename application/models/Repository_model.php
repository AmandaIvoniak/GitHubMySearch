<?php

class Repository_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getRepository($user, $id_rep){
        $this->db->select('id_tablerepository, id_rep, name, description, stars, updateDate, id_user')->from('repository')->where('id_user', $user)->where('id_rep',$id_rep);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? $result->row() : false;
    }

    public function insertRepository($data){
        return $this->db->insert('repository', $data);
    }

    public function checkRepository($id_rep, $user){
        $this->db->select('id_rep')->from('repository')->where('id_rep', $id_rep)->where('id_user', $user);
        $result = $this->db->get();
        return $result->num_rows() > 0 ? true : false;
    }

    public function updateRepository($data){
        return $this->db->where('id_rep', $data['id_rep'])->where('id_user', $data['id_user'])->update('repository', $data);
    }

    public function deleteTagByIdRep($id){
        return $this->db->delete('tagsrepository', array('id_rep' => $id));
    }

    public function getRepositoryById($id_rep){
        $this->db->select('id_tablerepository, id_rep, name, description, stars, updateDate, id_user')->from('repository')->where('id_tablerepository', $id_rep);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function meu($data){
        $this->db->select('repository.name, tags.name_tag');
        $this->db->from('repository');
        $this->db->from('tags');
        $this->db->join('tagsrepository', 'tagsrepository.id_rep = repository.id_tablerepository and tagsrepository.id_tag = tags.id_tag');
        $this->db->where('tags.id_tag',$data);
        $this->db->where('tags.id_user',27);
        $result = $this->db->get();

        return $result->result();
    }
}