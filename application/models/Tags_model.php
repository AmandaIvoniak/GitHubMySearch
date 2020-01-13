<?php

class Tags_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_tags_data($user){

        $this->db->select("user_id, name_tag, tags_id")->from("tags")->where("user_id", $user);
        $result = $this->db->get();
var_dump($result);
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return NULL;
        }
    }

    public function insert_tags_data($table, $data){
        $this->db->insert($table, $data); 

        if($this->db->insert($table, $data)){
            return 'true';
        }else{
            return NULL;
        }
    }

    // public function delete_tags_data($table, $data){
    //     $this->db->delete($table, $data); 

    //     if($this->db->insert($table, $data)){
    //         return 'true';
    //     }else{
    //         return NULL;
    //     }
    // }

    // public function update_tags_data($table, $data){
    //     $this->db->update($table, $data); 

    //     if($this->db->insert($table, $data)){
    //         return 'true';
    //     }else{
    //         return NULL;
    //     }
    // }
}