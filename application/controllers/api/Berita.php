<?php
    use chriskacerguis\RestServer\RestController;
    class Berita extends RestController{
        public function __construct(){
            parent::__construct();
            $this->load->model('BeritaModel');
            $this->load->model('TokenModel');
            $this->load->library('notification');
        }
        public function index_get(){
            $berita = $this->BeritaModel->getAll();
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $berita], 200);
        }
        public function index_post(){
            $judul = $this->post('judul');
            $isi = $this->post('isi');

            $arr = array(
                'judul_berita' => $judul,
                'isi_berita' => $isi
            );
            $this->BeritaModel->insert($arr);

            $notif['title'] = 'Info';
            $notif['message'] = 'Terdapat Berita Baru!';
            $notif['regisIds'] = $this->TokenModel->get()->TOKEN;
            $this->notification->push($notif);
            $this->response(['status' => true, 'message' => 'Data berhasill ditambahkan'], 200);
        }
        public function index_put($id_berita){
            $judul = $this->put('judul');
            $isi = $this->put('isi');

            $arr = array(
                'judul_berita' => $judul,
                'isi_berita' => $isi,
                'id_berita' => $id_berita
            );
            $this->BeritaModel->update($arr);
            $this->response(['status' => true, 'message' => 'Data berhasill diubah'], 200);
        }
        public function index_delete($id_berita){
            $this->BeritaModel->delete($id_berita);
            $this->response(['status' => true, 'message' => 'Data berhasill dihapus'], 200);
        }
        public function detail_get($id_berita){
            $berita = $this->BeritaModel->get($id_berita);
            $this->response(['status' => true, 'data' => $berita], 200);
        }
        public function like_put($id_berita){
            $berita = $this->BeritaModel->get($id_berita);

            $nilaiBaru = $berita->like_berita + 1;
            $arr = array(
                'like_berita' => $nilaiBaru,
                'id_berita' => $id_berita
            );
            $this->BeritaModel->update($arr);
            $this->response(['status' => true, 'message' => 'Berhasil menambahkan like'], 200);
        }
    }
?>