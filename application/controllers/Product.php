<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
            ['field' => 'code','label' => 'code','rules' => 'required'],
            ['field' => 'label','label' => 'label','rules' => 'required'],
            ['field' => 'color','label' => 'color','rules' => 'required'],
            ['field' => 'series','label' => 'series','rules' => 'required'],
            ['field' => 'id_category','label' => 'id_category','rules' => 'required'],
            ['field' => 'id_technology','label' => 'id_technology','rules' => 'required']
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
        $data['product'] = $this->Models->GetAllProduct();
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Product';
        $data['side'] = 'Product';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Product/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Add(){
        $this->form_validation->set_rules($this->rulesProduct());
        $ID = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['product'] = $this->Models->GetAllProduct();
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Product';
        $data['side'] = 'Product';
        if($this->form_validation->run() === FALSE){
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Product/main',$data);
            $this->load->view('dashboard/footer');
        }else{          
            $data2['code'] = $this->input->post('code');
            $data2['label'] = $this->input->post('label');
            $data2['color'] = $this->input->post('color');
            $data2['series'] = $this->input->post('series');
            $data2['code_category'] = $this->input->post('code_category');
            $data2['id_category'] = $this->input->post('id_category');
            $data2['id_technology'] = $this->input->post('id_technology');
            $data2['created_by'] = $ID[0]->id;;
            $data2['updated_by'] = $ID[0]->id;;
            $this->Models->insert('product',$data2);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Product'));
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

    //Category
    public function Category()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Category';
        $data['side'] = 'Category';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Product/Category/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function AddCategory(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['category'] = $this->Models->getAll('category');
            $data['title'] = 'Category';
            $data['side'] = 'Category';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Product/Category/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('user','username',$this->session->userdata('nama'));         
            $data['label'] = $this->input->post('label');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('category',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Product/Category'));
        }
    }

    //Technology
    public function Technology()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['technology'] = $this->Models->getAll('technology');
        $data['title'] = 'Technology';
        $data['side'] = 'Technology';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Product/Technology/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function AddTechnology(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['technology'] = $this->Models->getAll('technology');
            $data['title'] = 'Technology';
            $data['side'] = 'Technology';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Product/Category/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('user','username',$this->session->userdata('nama'));         
            $data['label'] = $this->input->post('label');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('technology',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Product/Technology'));
        }
    }

}

/* End of file Home.php */
