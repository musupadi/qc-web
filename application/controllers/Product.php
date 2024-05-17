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
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Product/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Forecast($id)
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        // $data['product'] = $this->Models->GetAllProduct();
        $data['technology'] = $this->Models->getAll('technology');
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Product';
        $data['product'] = $this->Models->getID('product','id',$id);
        $i = 1;
        $forecast = 0;
        $production = 0;
        $accuracy = 0;
        $hit = 0;


        for($i=1;$i<=12;$i++)
        {
            if($i<10){
                $i='0'.$i;
            }
            $forecast = (int)$this->Models->SumDatetoDate("forecast","2024-".$i."-01","2024-".$i."-31","date","forecast","id_product",$id)->forecast;   
            $data['forecast'][$i-1] = (int)$forecast;
            

            $production = (int)$this->Models->SumDatetoDate("qc","2024-".$i."-01","2024-".$i."-31","production_date","qty","id_product",$id)->qty;   
            $data['production'][$i-1] = (int)$production;
        
            if((int)$forecast!=0){
                    if((int)$production!=0){
                    if($forecast>=$production){
                        $hit = $forecast-$production;
                        if($hit != 0 || $production > 0){
                            $accuracy = ($hit/$forecast)*100;
                        }else{
                            $accuracy = $production;
                        }
                        $data['accuracy'][$i-1] = (int)$accuracy;
                        $data['hit'][$i-1] = ($forecast+$production)/2;
                    }else{
                        $hit = $production-$forecast;
                        if($hit != 0 || $forecast > 0){
                            $accuracy = ($hit/$production)*100;
                        }else{
                            $accuracy = 0;
                        }
                        $data['accuracy'][$i-1] = (int)$accuracy;
                        $data['hit'][$i-1] = ($production+$forecast)/2;
                    }
                }else{
                    $data['accuracy'][$i-1] = 0;
                    $data['hit'][$i-1] = 0;
                }
            }else{
                $data['accuracy'][$i-1] = 0;
                $data['hit'][$i-1] = 0;
            }
       
        }


        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Product/forecast',$data);
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


            $logs['action'] = "Menginput Product Baru ".$data2['label'];
            $logs['created_by'] = $ID[0]->id;;
            $logs['updated_by'] = $ID[0]->id;;
            $this->Models->insert('logs',$logs);

            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Product'));
        }
    }
    public function Edit(){
        $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));     
        $data2['code'] = $this->input->post('code');
        $data2['label'] = $this->input->post('label');
        $data2['color'] = $this->input->post('color');
        $data2['series'] = $this->input->post('series');
        $data2['code_category'] = $this->input->post('code_category');
        $data2['id_category'] = $this->input->post('id_category');
        $data2['id_technology'] = $this->input->post('id_technology');
        $data2['created_by'] = $ID[0]->id;;
        $data2['updated_by'] = $ID[0]->id;;
        $this->Models->edit('product','id',$this->input->post('id'),$data2);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil diubah")</script>');
        redirect(base_url('Product'));  
    }
    public function Delete($id){
        $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));     
        $this->Models->delete('product','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        $name = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
        $logs['action'] = "Menghapus Product".$name[0]->label;
        $logs['created_by'] = $ID[0]->id;;
        $logs['updated_by'] = $ID[0]->id;;
        $this->Models->insert('logs',$logs);

        redirect(base_url('Product'));
    }

    //Category
    public function Category()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['category'] = $this->Models->getAll('category');
        $data['title'] = 'Category';
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
    public function EditCategory(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['category'] = $this->Models->getAll('category');
            $data['title'] = 'Technology';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Product/Category/main',$data);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('Pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('category','id',$this->input->post('id'),$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Product/Category'));
        }
    }
    public function DeleteCategory($id){
        $this->Models->delete('product','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        $name = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
        $logs['action'] = "Menghapus Product".$name[0]->label;
        $logs['created_by'] = $id[0]->id;;
        $logs['updated_by'] = $id[0]->id;;
        $this->Models->insert('logs',$logs);

        redirect(base_url('Product/Technology'));
    }

    //Technology
    public function Technology()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['technology'] = $this->Models->getAll('technology');
        $data['title'] = 'Technology';
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
    public function EditTechnology(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['technology'] = $this->Models->getAll('technology');
            $data['title'] = 'Technology';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Product/Technology/main',$data);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('Pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('technology','id',$this->input->post('id'),$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Product/Technology'));
        }
    }
    public function DeleteTechnology($id){
        $this->Models->delete('product','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        $name = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
        $logs['action'] = "Menghapus Product".$name[0]->label;
        $logs['created_by'] = $id[0]->id;;
        $logs['updated_by'] = $id[0]->id;;
        $this->Models->insert('logs',$logs);

        redirect(base_url('Product/Technology'));
    }
}

/* End of file Home.php */
