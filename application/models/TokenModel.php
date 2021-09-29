<?php
    class TokenModel extends CI_Model{
        public function insert($token){
            $this->db->insert('token', ['TOKEN' => $token]);
        }
        public function get(){
            $response = $this->db->get('token')->result_array();
            return $response;
        }
    }
?>