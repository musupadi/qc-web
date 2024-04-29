<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class input extends REST_Controller{
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
        $id_status = $this->post('id_status');
        $id_brand = $this->post('id_brand');
        $id_vendor = $this->post('id_vendor');
        $id_warehouse = $this->post('id_warehouse');
        $category = $this->post('category');
        $warranty = $this->post('warranty');
        $serial_number = $this->post('serial_number');
        $photo = $this->post('photo');
        $id_user = $this->post('id_user');
        
        
        $config['upload_path']          = './img/item/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = uniqid();
        // $config['overwrite']			= true;
        $config['max_size']             = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photo')) {
            $gambar = $this->upload->data("file_name");
        }else{
            $gambar = "default.jpg";
        }
        $insert =  [
            'name' => $name,
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
            'photo' => $gambar,
            'created_by' => $id_user,
            'updated_by' => $id_user,
        ];
        $Insert = $this->Models->insert('m_item',$insert);
   
        // $Insert = $this->model->Insert("m_item",$insert);
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