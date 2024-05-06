<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesCustomer(){
        return [
            ['field' => 'label','label' => 'label','rules' => 'required']
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
        $data['forecast'] = $this->Models->Forecast();
        $data['customer'] = $this->Models->getAll('customer');
        for ($i=0; $i < count($data['forecast']); $i++) {
            $data['sales'][$i] = $this->Models->SalesData($data['forecast'][$i]->id); 
		}

        $data['title'] = 'Logs';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Forecast/side',$data);
        $this->load->view('Forecast/main',$data);
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
            $this->load->view('QC/side',$data);
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
    public function Edit($id){
        $this->form_validation->set_rules($this->rulesRoles());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['role'] = $this->Models->getWhere2("role",$where);
            $data['title'] = 'Edit Role';
            $this->load->view('dashboard/header',$data);
            $this->load->view('User/Role/side',$data);
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

    public function Customer()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['customer'] = $this->Models->getAll('customer');
        $data['title'] = 'Forecast Customer';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Forecast/Customer/side',$data);
        $this->load->view('Forecast/Customer/main',$data);
        $this->load->view('dashboard/footer');
    }
    //Add QC
    public function Addcustomer()
    {
        $this->form_validation->set_rules($this->rulesCustomer());
        $ID = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['customer'] = $this->Models->getAll('customer');
        $data['title'] = 'Forecast Customer';
        if($this->form_validation->run() === FALSE){
            $this->load->view('dashboard/header',$data);
            $this->load->view('Forecast/Customer/side',$data);
            $this->load->view('Forecast/Customer/main',$data);
            $this->load->view('dashboard/footer');
        }else{          
            $Product = $this->Models->getID('product','id',$this->input->post('id'));
            $data2['label'] = $this->input->post('label');
            $data2['created_by'] = $ID[0]->id;
            $data2['updated_by'] = $ID[0]->id;
            $this->Models->insert('customer',$data2);

            $logs['action'] = "Menginput Customer Baru ".$this->input->post('label');
            $logs['created_by'] = $ID[0]->id;;
            $logs['updated_by'] = $ID[0]->id;;
            $this->Models->insert('logs',$logs);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Qc'));
        }
    }
    

}

/* End of file Home.php */
