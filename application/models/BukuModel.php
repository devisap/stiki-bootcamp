<?php
    class BukuModel extends CI_Model{
        public function insert($isbn, $judul, $pengarang){
            $arr = array(
                'ISBN' => $isbn,
                'JUDUL' => $judul,
                'PENGARANG' => $pengarang
            );
            $this->db->insert('buku', $arr);
            return "Berhasil insert";
        }
        public function getAll(){
            $response = $this->db->get('buku')->result();
            return $response;
        }
        public function get($isbn){
            $arr = array(
                'ISBN' => $isbn
            );
            $response = $this->db->get('buku', $arr)->row();
            return $response;
        }
        public function update($isbn, $isbn_lama, $judul, $pengarang){
            $arr = array(
                'ISBN' => $isbn,
                'JUDUL' => $judul,
                'PENGARANG' => $pengarang
            );
            $this->db->where('ISBN', $isbn_lama)->update('buku', $arr);
        }
        public function delete($isbn){
            $this->db->where('ISBN', $isbn)->delete('buku');
            return 'Berhasil delete';
        }
    }
?>