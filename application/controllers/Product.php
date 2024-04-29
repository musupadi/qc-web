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
            ['field' => 'label','label' => 'Label','rules' => 'required'],
            ['field' => 'level','label' => 'Level','rules' => 'required']
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
        $data['product'] = $this->Models->getAll('product');
        $data['title'] = 'Product';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Product/side',$data);
        $this->load->view('Product/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Tambah(){
        $this->form_validation->set_rules($this->rulesRoles());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('User/Role/side',$data);
            $this->load->view('User/Role/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['level'] = $this->input->post('level');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('m_role',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('User/Role'));
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
        $this->load->view('dashboard/header',$data);
        $this->load->view('Product/Category/side',$data);
        $this->load->view('Product/Category/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function AddCategory(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['category'] = $this->Models->getAll('category');
            $data['title'] = 'Category';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Product/Category/side',$data);
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
        $this->load->view('dashboard/header',$data);
        $this->load->view('Product/Technology/side',$data);
        $this->load->view('Product/Technology/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function AddTechnology(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['technology'] = $this->Models->getAll('technology');
            $data['title'] = 'Category';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Product/Category/side',$data);
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
