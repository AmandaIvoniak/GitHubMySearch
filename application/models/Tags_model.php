<?php

class Tags_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTags($type, $data){
        $this->db->select('id_user, name_tag, id_tag')->from('tags')->where($type, $data);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function insertTags($data){
        return $this->db->insert('tags', $data) ? $this->db->insert_id() : false;
    }

    public function deleteTags($data){
        $this->db->where('id_user', $data['id_user'])->where('id_tag', $data['id_tag']); 
        return $this->db->delete('tags');
   }

    public function updateTags($data){
        $this->db->where('id_tag', $data['id_tag']);
        return $this->db->update('tags', array('name_tag' => $data['name_tag']));
    }

    public function insertRepositoryTags($id_rep, $id_tag){
        $data['id_rep'] = $id_rep;
        $data['id_tag'] = $id_tag;
        return $this->db->insert('tagsrepository', $data) ? true : false;
    }


    public function checkRepositoryTags($id_tag, $id_rep){
        $this->db->select('id_repositoryTag')->from('tagsrepository')->where('id_rep', $id_rep)->where('id_tag', $id_tag);
        $result = $this->db->get();

       return $result->num_rows() > 0 ? true : false;            
    }

}