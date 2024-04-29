<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class penjualan extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Models');
    }
    public function index_post(){
        //POST
        $beli = $this->input->post('beli');
        $users = $this->input->post('username');
        $id_barang = $this->input->post('id_barang');
        //DONE
        $barang = $this->Models->getID('barang','id',$id_barang);
        $user = $this->Models->getID('user','username',$users);
            foreach($barang as $d){
                foreach($user as $b){
                $penjuals = $this->Models->getID('user','username',$d->id_penjual);
                    foreach($penjuals as $e){
                    //Data Barang
                    $data1['nama_barang'] = $d->nama_barang;
                    $data1['harga'] = $d->harga;
                    $data1['quantity'] = $d->quantity-$beli;
                    $data1['gambar'] = $d->gambar;
                    $data1['deskripsi']= $d->deskripsi;
                    $data1['id_penjual'] = $d->id_penjual;
                    $this->Models->edit('barang','id',$d->id,$data1);

                    $user_wallet = $b->wallet - $d->harga*$beli;
                    $wallet_penjual = $e->wallet + $d->harga*$beli;
                    //Data UserPembeli
                    $data2['password'] = $b->password;
                    $data2['nama'] = $b->nama;
                    $data2['email'] = $b->email;
                    $data2['wallet'] = $user_wallet;
                    $data2['profile'] = $b->profile;
                    $data2['level'] = $b->level;
                    $this->Models->edit('user','username',$b->username,$data2);

                    //Data User Penjual
                    $data4['password'] = $e->password;
                    $data4['nama'] = $e->nama;
                    $data4['email'] = $e->email;
                    $data4['wallet'] = $wallet_penjual;
                    $data4['profile'] = $e->profile;
                    $data4['level'] = $e->level;
                    $this->Models->edit('user','username',$e->username,$data4);

                    //History
                    $data3['id_barang'] = $id_barang;
                    $data3['id_penjual'] = $d->id_penjual;
                    $data3['id_pembeli'] = $users;
                    $data3['quantity'] = $beli;
                    $data3['total'] = $d->harga*$beli;
                    $this->Models->insert('history',$data3);
                    $this->response([
                        'status' => "success"
                    ],REST_Controller::HTTP_OK);
                }
            }
        }
    }
}