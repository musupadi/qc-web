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
    private function rulesForecast(){
        return [
            ['field' => 'id_product','label' => 'id_product','rules' => 'required'],
            ['field' => 'label','label' => 'label','rules' => 'required'],
            ['field' => 'forecast','label' => 'forecast','rules' => 'required'],
            ['field' => 'date','label' => 'date','rules' => 'required'],
            ['field' => 'qty','label' => 'qty','rules' => 'required'],
            ['field' => 'stock','label' => 'stock','rules' => 'required'],
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
        $this->form_validation->set_rules($this->rulesForecast());
        $username = $this->session->userdata('nama');
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['product'] = $this->Models->getAll('product');
            $data['customer'] = $this->Models->getAll('customer');
            $data['pic'] = $this->Models->getID('user','id_role','4');
            $data['title'] = 'Forecast';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Forecast/side',$data);
            $this->load->view('Forecast/input',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['label'] = $this->input->post('label');
            $data['id_product'] = $this->input->post('id_product');
            $data['label'] = $this->input->post('label');
            $data['forecast'] = $this->input->post('forecast');
            $data['date'] = $this->input->post('date');
            $data['stock'] = $this->input->post('stock');
            $data['qty '] = $this->input->post('qty');
            $data['id_customer'] = $this->input->post("id_customer");
            $data['created_by'] = $id[0]->id;
            $data['updated_by'] = $id[0]->id;
            $LastID = $this->Models->InsertLastID('forecast',$data);
            
            $sales = $this->input->post('id_user');
            foreach($sales as $i => $isiSales){
                $datas['id_user'] = $isiSales;
                $datas['id_forecast'] = $LastID;
                $datas['created_by'] = $id[0]->id;
                $datas['updated_by'] = $id[0]->id;
                $this->Models->insert('sales',$datas);
            }
         


            $logs['action'] = "Menginput Forecast ".$data['label']." Dengan Nilai ".$data['forecast'];
            $logs['created_by'] = $id[0]->id;;
            $logs['updated_by'] = $id[0]->id;;
            $this->Models->insert('logs',$logs);

            $this->session->set_flashdata('pesan','<script>alert("New Forecast Succesfully Added")</script>');
            redirect(base_url('Forecast'));
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
