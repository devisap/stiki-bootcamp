<?php
    class TokenModel extends CI_Model{
        public function insert($token){
            $this->db->insert('token', ['TOKEN' => $token]);
        }
        public function get(){
            $response = $this->db->order_by('created_at', 'desc')->get('token')->row();
            return $response;
        }
    }
?>