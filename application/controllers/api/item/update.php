<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class update extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Models');
    }
    public function index_post(){
        $name = $this->post('name');
        $id_type = $this->post('id_type');
        $asset_no = $this->post('asset_no');
        $qty = $this->post('qty');
        $description = $this->post('description');
        $passworid_statusd = $this->post('id_status');
        $id_brand = $this->post('id_brand');
        $id_vendor = $this->post('id_vendor');
        $id_warehouse = $this->post('id_warehouse');
        $category = $this->post('category');
        $warranty = $this->post('warranty');
        $serial_number = $this->post('serial_number');
        $photo = $this->post('photo');
        $id_user = $this->post('id_user');

        $update =  [
            'name' => $id_pasien,
            'id_type' => $id_type,
            'asset_no' => $asset_no,
            'qty ' => $qty ,
            'description' => $description,
            'id_status' => $id_status,
            'id_brand' => $id_brand,
            'id_vendor' => $id_vendor,
            'id_warehouse' => $id_warehouse,
            'category' => $category ,
            'warranty' => $warranty,
            'serial_number' => $serial_number,
            'photo' => $photo,
            'id_user' => $id_user
        ];
        $Update = $this->model->Insert("m_i",$insert);
        if($Insert){
            $this->response([
                'status' => true,
                'code' => 0,
                'Message' => 'Data Berhasil Tambahan Ditambahkan',
                'data' => $Insert
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'code' => 1,
                'Message' => $insert,
                'data' => array()
            ], REST_Controller::HTTP_OK);
        }
    }
}