<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesRoles(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required'],
            ['field' => 'level','label' => 'Level','rules' => 'required']
        ];
    }
    private function rulesUser(){
        return [
            ['field' => 'username','label' => 'Username ','rules' => 'required'],
            ['field' => 'password','label' => 'Password ','rules' => 'required'],
            ['field' => 'id_role','label' => 'Id_role','rules' => 'required'],
            ['field' => 'email','label' => 'email','rules' => 'required'],
        ];
    }


    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['Data'] = $this->Models->AllUser();
        $data['title'] = 'User';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('User/List/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Postuser(){
        $this->form_validation->set_rules($this->rulesUser());
        $username = $this->session->userdata('nama');
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['role'] = $this->Models->getAll('role');
      
            $data['title'] = 'New User';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('User/List/input',$data);
            $this->load->view('dashboard/footer');
        }else{
            $config['upload_path']          = './img/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = uniqid();
            // $config['file_name']            = $this->id;
            // $config['overwrite']			= true;
            $config['max_size']             = 4096; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $id = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
            if ($this->upload->do_upload('gambar')) {
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
                $data['kontak'] = $this->input->post('kontak');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = $this->upload->data("file_name");
                $data['created_by'] = $id[0]->id;
                $data['updated_by'] = $id[0]->id;
            }else{
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
                $data['kontak'] = $this->input->post('kontak');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = "default.png";
                $data['created_by'] = $id[0]->id;
                $data['updated_by'] = $id[0]->id;
            }

            $this->db->where('username', $this->input->post('username'));
            $query = $this->db->get('user');

            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('pesan','<script>alert("Username already exists..")</script>');
            } else {
                $this->Models->insert('user',$data);
                $this->session->set_flashdata('pesan','<script>alert("New user added successfully")</script>');
            }
            redirect(base_url('User'));
        }
    }
    
    public function Edit($id){
        $this->form_validation->set_rules($this->rulesUser());
        $username = $this->session->userdata('nama');
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $data['users'] = $this->Models->getID('user','id',$id);
            $data['Data'] = $this->Models->AllUser();
            $data['title'] = 'User';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('User/List/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $config['upload_path']          = './img/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = uniqid();
            // $config['file_name']            = $this->id;
            // $config['overwrite']			= true;
            $config['max_size']             = 4096; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));

            if ($this->upload->do_upload('photo')) {
                $old_image = $data['m_user']['photo'];
                if ( $old_image != "logo.jpg" ){
                    unlink(FCPATH . 'img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('photo', $new_image);
            }else{
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password')); 
                $data['email'] = $this->input->post('email');
                $data['department'] = $this->input->post('department');
                $data['phone_number'] = $this->input->post('phone_number');
                $data['id_role'] = $this->input->post('id_role');
                $data['updated_by'] = $ID[0]->id;
                $data['updated_at'] = $this->Models->GetTimestamp();
            }
            
            $this->Models->edit('m_user','id',$id,$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('User'));
        }
    }

    public function Delete($id){
        $this->Models->delete('user','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('User'));
    }


    // Role
    public function Role(){
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['role'] = $this->Models->getAll('role');
        $data['title'] = 'Role';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('User/Role/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function TambahRole(){
        $this->form_validation->set_rules($this->rulesRoles());
        $ID = $this->Models->getID('user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('Dashboard/side',$data);
            $this->load->view('User/Role/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['level'] = $this->input->post('level');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('role',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('User/Role'));
        }
    }
    public function EditRole($id){
        $this->form_validation->set_rules($this->rulesRoles());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user', 'username', $this->session->userdata('nama'));  
            $where = array(
                'id' => $id
            );
            $data['role'] = $this->Models->getWhere2("role",$where);
            $data['title'] = 'Role';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Dashboard/side',$data);
            $this->load->view('User/Role/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('Pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['level'] = $this->input->post('level');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('role','id',$id,$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('User/Role'));
        }
    }
    public function Hapusrole($id){
        $this->Models->delete('role','id',$id);
        $this->session->set_flashdata('Pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('User/Role'));
    }
}

/* End of file Home.php */
