<?php
    use chriskacerguis\RestServer\RestController;
    class Token extends RestController{
        public function __construct(){
            parent::__construct();
            $this->load->model('TokenModel');
        }
        public function index_post(){
            $token = $this->post('token');
            $this->TokenModel->insert($token);
            $this->response(['status' => true, 'message' => 'Berhasil buat token baru'], 200);
        }
    }
?>