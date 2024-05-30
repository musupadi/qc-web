<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class IncomingProduct extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }

    private function rulesRawMaterial(){
        return [
            ['field' => 'code','label' => 'Code','rules' => 'required'],
            ['field' => 'label','label' => 'Label','rules' => 'required'],
            ['field' => 'id_category','label' => 'Category','rules' => 'required'],
            ['field' => 'countries','label' => 'Countries','rules' => 'required'],
            ['field' => 'id_country','label' => 'Country','rules' => 'required'],
        ];
    }

    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['Logs'] = $this->Models->IncomingRawMaterial("","","","");
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Incoming Raw Materials';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('IncomingRawMaterial/main',$data);  // SHOW DI DASHBOARD
        $this->load->view('dashboard/footer');
    }

    public function Add(){
        $this->form_validation->set_rules($this->rulesRawMaterial());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['Logs'] = $this->Models->IncomingRawMaterial("","","","");
            $data['technology'] = $this->Models->getAll('technology');
            $data['category'] = $this->Models->getAll('category');
            $data['title'] = 'Incoming Raw Materials';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('IncomingRawMaterial/main',$data);
            $this->load->view('dashboard/footer');
        }else{          
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));  
            $data2['code'] = $this->input->post('code');
            $data2['label'] = $this->input->post('label');
            $data2['id_category'] = $this->input->post('id_category');
            $data2['countries'] = $this->input->post('countries');
            $data2['id_country'] = $this->input->post('id_country');
            $data2['created_by'] = $ID[0]->id;
            $data2['updated_by'] = $ID[0]->id;
            $this->Models->insert('rawmaterial',$data2);

            $logs['action'] = "Incoming Raw Material ".$data2['label'];
            $logs['created_by'] = $ID[0]->id;;
            $logs['updated_by'] = $ID[0]->id;;
            $this->Models->insert('logs',$logs);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('IncomingRawMaterial'));
        }
    }

    
}
