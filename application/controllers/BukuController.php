<?php
    class BukuController extends CI_Controller{
        public function index(){
            $this->load->model('BukuModel');
            $data = array(
                'listBuku' => $this->BukuModel->getAll()
            );
            $this->load->view('Vbuku', $data);
        }
        public function tambah(){
            $this->load->view('Vbuku_tambah');
        }
        public function proses_tambah(){
            $this->load->model('BukuModel');

            $isbn = $_POST['isbn'];
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            
            $this->BukuModel->insert($isbn, $judul,$pengarang);
            redirect('buku');
        }
        public function edit($isbn){
            $this->load->model('BukuModel');
            $buku = $this->BukuModel->get($isbn);

            $data = array(
                'buku' => $buku
            );
            $this->load->view('Vbuku_edit', $data);
        }
        public function proses_edit(){
            $this->load->model('BukuModel');

            $isbn = $_POST['isbn'];
            $isbn_lama = $_POST['isbn_lama'];
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            
            $this->BukuModel->update($isbn, $isbn_lama, $judul, $pengarang);
            redirect('buku');
        }
        public function proses_delete($isbn){
            $this->load->model('BukuModel');
            $this->BukuModel->delete($isbn);
            redirect('buku');
        }
    }
?>