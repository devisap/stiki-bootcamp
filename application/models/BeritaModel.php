<?php
    class BeritaModel extends CI_Model{
        public function getAll(){
            return $this->db->get('berita')->result();
        }
        public function get($id_berita){
            return $this->db->where('id_berita', $id_berita)->get('berita')->row();
        }
        public function insert($param){
            $this->db->insert('berita', $param);
        }
        public function update($param){
            $this->db->where('id_berita', $param['id_berita'])->update('berita', $param);
        }
        public function delete($id_berita){
            $this->db->where('id_berita', $id_berita)->delete('berita');
        }
    }

?>