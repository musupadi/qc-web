<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Qc extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesProduct(){
        return [
            ['field' => 'id','label' => 'id','rules' => 'required'],
            ['field' => 'load_number','label' => 'load_number','rules' => 'required'],
            ['field' => 'qty','label' => 'qty','rules' => 'required']
        ];
    }
    private function rulesCategory(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required'],
        ];
    }


    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['Logs'] = $this->Models->QC("","","","");
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'QC';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('QC/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Add(){
        $this->form_validation->set_rules($this->rulesProduct());
        $ID = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['product'] = $this->Models->GetAllProduct();
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'QC';
        if($this->form_validation->run() === FALSE){
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('QC/main',$data);
            $this->load->view('dashboard/footer');
        }else{          
            $Product = $this->Models->getID('product','id',$this->input->post('id'));
            $data2['id_product'] = $this->input->post('id');
            $data2['load_number'] = $this->input->post('load_number');
            $data2['qty'] = $this->input->post('qty');
            $data2['production_date'] = $this->input->post('production_date');
            $data2['created_by'] = $ID[0]->id;
            $data2['updated_by'] = $ID[0]->id;
            $this->Models->insert('qc',$data2);

            $logs['action'] = "Menginput Product ".$Product[0]->label." > ".$this->input->post('qty');
            $logs['created_by'] = $ID[0]->id;;
            $logs['updated_by'] = $ID[0]->id;;
            $this->Models->insert('logs',$logs);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Qc'));
        }
    }
    public function importExcel() {
        // Mengunggah file
        $config['upload_path'] = './file/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('excel_file')) {
            // Gagal mengunggah file
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            // File berhasil diunggah
            $fileData = $this->upload->data();
            $filePath = './file/' . $fileData['file_name'];

            // Menggunakan PhpSpreadsheet untuk membaca file Excel
            // $this->load->library('PhpSpreadsheet');
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $ID = $this->Models->getID('user','username',$this->session->userdata('nama'));
            // Proses data yang diimpor
            $db = $this->Models->importExcelQC($sheetData,$ID[0]->id);
            unlink($filePath);
            if($db==true){
                $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
                redirect(base_url('Qc'));
            }else{
                $this->session->set_flashdata('pesan','<script>alert("Data Gagal disimpan karena Kesalahan Format")</script>');
                redirect(base_url('Qc'));
            }
            // Hapus file setelah diimpor
            
          
        }
    }
    public function Edit($id){
        $this->form_validation->set_rules($this->rulesRoles());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['role'] = $this->Models->getWhere2("role",$where);
            $data['title'] = 'Role';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('User/Role/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('Pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['level'] = $this->input->post('level');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_role','id',$id,$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('User/Role'));
        }
    }
    public function Hapus($id){
        $this->Models->delete('m_role','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('User/Role'));
    }

    //Add QC
    public function Addqc()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['product'] = $this->Models->GetAllProduct();
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'QC';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('QC/Add/main',$data);
        $this->load->view('dashboard/footer');
    }
    

}

/* End of file Home.php */
