<?php

class Users_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_data($type, $information){
        $this->db->select("id_user, name_user, email, password")->from("users")->where($type, $information);
        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return NULL;
        }
    }

    public function insert_user_data($table, $data){
        if($this->db->insert($table, $data)){
            return 'true';
        }else{
            return NULL;
        }
    }

    public function update_user_data($table, $data){
        $this->db->update($table, $data)->from($table)->where('user_id', $data['id']); 

    // if($this->db->insert($table, $data)){
    //     return 'true';
    // }else{
    //     return NULL;
    // }
    }
}