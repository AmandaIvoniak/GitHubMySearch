<?php

class Tags_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTags($user, $filter = false){
        $this->db->select("user_id, name_tag, tags_id")->from("tags")->where("user_id", $user);

        if ($filter) {
            foreach ($filter as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        $result = $this->db->get();
        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function insertTags($table, $data){
        return $this->db->insert($table, $data) ? $this->db->insert_id() : false;
    }

    public function deleteTags($table, $data){
        $this->db->where('user_id', $data['user_id'])->where('tags_id', $data['tags_id']); 
        return $this->db->delete($table);
   }

    public function updateTags($table, $data){
        $this->db->where('tags_id', $data['tags_id']);
        return $this->db->update($table, array('name_tag' => $data['name_tag']));
    }
}