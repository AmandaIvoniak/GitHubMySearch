<?php

class Tags_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_tags_data($user){

        $this->db->select("user_id, name_tag, tags_id")->from("tags")->where("user_id", $user);
        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return NULL;
        }
    }

    public function insert_tags_data($table, $data){
        if($this->db->insert($table, $data)){
            return 'true';
        }else{
            return NULL;
        }
    }

    public function delete_tags_data($table, $data){
        $this->db->where('user_id', $data['user_id']); 
        $this->db->where('tags_id', $data['tags_id']); 
        $result = $this->db->delete($table);

        return $result;
   }

    // public function update_tags_data($table, $data){
    //     $this->db->update($table, $data); 

    //     if($this->db->insert($table, $data)){
    //         return 'true';
    //     }else{
    //         return NULL;
    //     }
    // }
}