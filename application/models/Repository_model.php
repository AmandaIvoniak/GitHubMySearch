<?php

class Repository_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function get_tags_data($user){
    //     $this->db->select("user_id, name_tag, tags_id")->from("tags")->where("user_id", $user);
    //     $result = $this->db->get();

    //     return $result->num_rows() > 0 ? $result->result() : false;
    // }

    public function insertRepository($table, $data){
        return $this->db->insert($table, $data);
    }

    // public function deleteTags($table, $data){
    //     var_dump('OIEEEEEEEEEEEEEEE');
    //     var_dump($data);
    //     $this->db->delete($table, $data)->from($table)->where(); 

    //     return $this->db->insert($table, $data);
    // }

    // public function updateTags($table, $data){
    //     $this->db->update($table, $data); 

    //     if($this->db->insert($table, $data)){
    //         return 'true';
    //     }else{
    //         return NULL;
    //     }
    // }
}