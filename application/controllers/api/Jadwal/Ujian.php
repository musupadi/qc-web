<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ujian extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Models');
    }
    public function index_post(){
        $id_jurusan = $this->post('id_jurusan');
        $id_kelas = $this->post('id_kelas');
        $tanggal = $this->post('tanggal');
        $jenis_ujian = $this->post('jenis_ujian');
        if($tanggal==''){
            $data = $this->Models->getUjian($id_jurusan,$id_kelas,$jenis_ujian);
        }else{
            $data = $this->Models->getUjian2($id_jurusan,$id_kelas,$tanggal);
        }
        
        if($data){
            $this->response([
                'status' => "success",
                'data' => $data
            ],REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => "failed",
                'data' => $data
            ],REST_Controller::HTTP_OK);
        }
    }
}