<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }

    private function rulesOrigin(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required']
        ];
    }

    private function rulesLocation(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required']
        ];
    }

    private function rulesUser(){
        return [
            ['field' => 'name','label' => 'Name','rules' => 'required'],
            ['field' => 'username','label' => 'Username ','rules' => 'required'],
            ['field' => 'password','label' => 'Password ','rules' => 'required'],
            ['field' => 'id_role','label' => 'Id_role','rules' => 'required'],
            ['field' => 'email','label' => 'email','rules' => 'required'],
        ];
    }


    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['title'] = 'Dashboard';
        $data['total_products'] = $this->Models->getTotalProducts();
        $data['total_load_products'] = $this->Models->getTotalLoadProducts();
        $data['total_users'] = $this->Models->countUsers();
        $count = 0;
        $i = 1;
        $forecast = 0;
        $production = 0;
        $accuracy = 0;
        $hit = 0;
        $total_accuracy = 0;


        for($i=1;$i<=12;$i++)
        {
            if($i<10){
                $i='0'.$i;
            }
            $forecast = (int)$this->Models->SumDatetoDate("forecast","2024-".$i."-01","2024-".$i."-31","date","forecast","","")->forecast;   
            $data['forecast'][$i-1] = (int)$forecast;
            

            $production = (int)$this->Models->SumDatetoDate("qc","2024-".$i."-01","2024-".$i."-31","production_date","qty","","")->qty;   
            $data['production'][$i-1] = (int)$production;
        
            $incoming = (int)$this->Models->SumDatetoDate("incoming_raw","2024-".$i."-01","2024-".$i."-31","mfg_date","qty","","")->qty;   
            $exp = (int)$this->Models->SumDatetoDate("incoming_raw","2024-".$i."-01","2024-".$i."-31","exp_date","qty","","")->qty;   
            
            if($incoming==null){
                $data['incoming'][$i-1] = 0;
            }else{
                $data['incoming'][$i-1] = (int)$incoming;
            }
            if($exp==null){
                $data['exp'][$i-1] = 0;
            }else{
                $data['exp'][$i-1] = (int)$exp;
            }
            
            $incoming2 = (int)$this->Models->SumDatetoDate("incoming_raw","2025-".$i."-01","2025-".$i."-31","mfg_date","qty","","")->qty;   
            $exp2 = (int)$this->Models->SumDatetoDate("incoming_raw","2025-".$i."-01","2025-".$i."-31","exp_date","qty","","")->qty;   
            if($incoming==null){
                $data['incoming2'][$i-1] = 0;
            }else{
                $data['incoming2'][$i-1] = (int)$incoming2;
            }
            if($exp2==null){
                $data['exp2'][$i-1] = 0;
            }else{
                $data['exp2'][$i-1] = (int)$exp2;
            }


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

     
            $total_accuracy += $data['accuracy'][$i - 1];
            $average_accuracy = $total_accuracy / 12;
            $data['average_accuracy'] = $average_accuracy;
        }
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/main',$data);
        $this->load->view('dashboard/footer');
    }

    
    
    public function profile(){
        $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['count_wallet'] = $this->Models->Count('wallet','status','Belum Diverifikasi');
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/profile',$data);
        $this->load->view('dashboard/footer');
    }
    public function changeimage(){
        $userData = $this->Models->getID('user','username',$this->session->userdata('nama'));
        foreach($userData as $datas){
            if($datas->profile != "default.jpg"){
                $config['upload_path']          = './img/profile/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['file_name']            = $data->profile;
                // $config['overwrite']			= true;
                $config['max_size']             = 4096; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = $this->upload->data("file_name");
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }else{
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = "default.jpg";
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }
            }else{
                $config['upload_path']          = './img/profile/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['file_name']            = $this->id;
                // $config['overwrite']			= true;
                $config['max_size']             = 4096; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = $this->upload->data("file_name");
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }else{
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = "default.jpg";
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }
            }
            $this->Models->edit('user','username',$this->session->userdata('nama'),$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Gambar Berhasil diubah")</script>');
            redirect(base_url('Home/profile'));
        }
    }
    public function changeProfileData(){
        $userData = $this->Models->getID('user','username',$this->session->userdata('nama'));
        foreach($userData as $user){
            $data['password'] = $user->password;
            $data['nama'] = $this->input->post('nama');
            $data['email'] = $this->input->post('email');
            $data['wallet'] = $user->wallet;
            $data['profile'] = $user->profile;
            $data['alamat'] = $this->input->post('alamat');
            $data['level'] = $user->level;

            $this->Models->edit('user','username',$this->session->userdata('nama'),$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('home/profile'));
        }
    }

    public function MyProfile()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['Data'] = $this->Models->AllUser();
        $data['title'] = 'My Profile';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Profile/MyProfile/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function MyProfileAdmin()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['Data'] = $this->Models->AllUser();
        $data['title'] = 'My Profile';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Profile/MyProfileAdmin/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function MyProfileUser()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['Data'] = $this->Models->AllUser();
        $data['title'] = 'My Profile';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Profile/MyProfileUser/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function MyProfileAdminWarehouse()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['Data'] = $this->Models->AllUser();
        $data['title'] = 'My Profile';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Profile/MyProfileAdminWarehouse/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function EditProfileUser($id){
        $this->form_validation->set_rules($this->rulesUser());
        $username = $this->session->userdata('nama');
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['role'] =$this->Models->getAll('m_role');
            $data['users'] =$this->Models->getID('m_user','id',$id);
            $data['title'] = 'Edit';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Profile/MyProfileUser/edit',$data);
            $this->load->view('dashboard/footer');
        }else{
            $config['upload_path']          = './img/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config[''];
            // $config['file_name']            = $this->id;
            // $config['overwrite']			= true;
            $config['max_size']             = 4096; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));
            if ($this->upload->do_upload('gambar')) {
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = $this->upload->data("file_name");
                $data['updated_by'] = $ID[0]->id;
                $data['updated_at'] = $this->Models->GetTimestamp();
            }else{
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password')); 
                $data['email'] = $this->input->post('email');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = "logo.jpg";
                $data['updated_by'] = $ID[0]->id;
                $data['updated_at'] = $this->Models->GetTimestamp();
            }
            $this->Models->edit('m_user','id',$id,$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Home/MyProfileUser'));
        }

    }
    public function EditProfileAdminWarehouse($id){
        $this->form_validation->set_rules($this->rulesUser());
        $username = $this->session->userdata('nama');
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['role'] =$this->Models->getAll('m_role');
            $data['users'] =$this->Models->getID('m_user','id',$id);
            $data['title'] = 'Edit';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Profile/MyProfileAdminWarehouse/edit',$data);
            $this->load->view('dashboard/footer');
        }else{
            $config['upload_path']          = './img/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config[''];
            // $config['file_name']            = $this->id;
            // $config['overwrite']			= true;
            $config['max_size']             = 4096; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));
            if ($this->upload->do_upload('gambar')) {
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = $this->upload->data("file_name");
                $data['updated_by'] = $ID[0]->id;
                $data['updated_at'] = $this->Models->GetTimestamp();
            }else{
                $data['name'] = $this->input->post('name');
                $data['username'] = $this->input->post('username');
                $data['password'] = MD5($this->input->post('password')); 
                $data['email'] = $this->input->post('email');
                $data['id_role '] = $this->input->post('id_role');
                $data['photo'] = "logo.jpg";
                $data['updated_by'] = $ID[0]->id;
                $data['updated_at'] = $this->Models->GetTimestamp();
            }
            $this->Models->edit('m_user','id',$id,$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Home/MyProfileAdminWarehouse'));
        }
    }

   
    public function Location(){
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['location'] = $this->Models->getAll('m_location');
        $data['title'] = 'Location';
        $this->load->view('dashboard/header',$data);
        $this->load->view('masterData/Location/side',$data);
        $this->load->view('masterData/Location/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function TambahLocation(){
        $this->form_validation->set_rules($this->rulesLocation());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('masterData/Location/side',$data);
            $this->load->view('masterData/Location/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['floor'] = $this->input->post('floor');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('m_location',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Home/Location'));
        }
    }

    public function EditLocation($id){
        $this->form_validation->set_rules($this->rulesLocation());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['location'] = $this->Models->getWhere2("m_location",$where);
            $this->load->view('dashboard/header',$data);
            $this->load->view('User/Role/side',$data);
            $this->load->view('masterData/Location/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['floor'] = $this->input->post('floor');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_location','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Home/Location'));
        }
    }

    public function HapusLocation($id){
        $this->Models->delete('m_location','id',$id);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Home/Location'));
    }

    public function HistoryTransaction()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['title'] = 'History Transaction';
        if($data['user'][0]->id_role == 3){
            $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
            $data['history'] = $this->Models->AllHistoryTransactionAdmin($getRolesID[0]->id_warehouse);
        }else{
            $data['history'] = $this->Models->AllHistoryTransaction();
        }
        

        $data['item'] = $this->Models->AllItem();
        $data['warehouse'] = $this->Models->AllWarehouse();
        $this->load->view('dashboard/header',$data);
        $this->load->view('History/side',$data);
        $this->load->view('History/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function PdfTransaction() {
        $start_date = $this->input->post('start_date');
        $end_dates = $this->input->post('end_date');
        $end_date = date('Y-m-d', strtotime($end_dates . ' +1 day'));
        $name = $this->input->post('name');
        $department = $this->input->post('department');
        $id_item = $this->input->post('id_item');
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $pdf = new FPDF();
        $pdf->AddPage();

         // Image URL
         //$imageUrl = 'https://portal.podomorouniversity.ac.id/assets/icon/logo_pu.png'; // Update with your image URL

         // Add image to PDF (x, y, width, height)
        $pdf->Image($imageUrl, 150, 7.5, 50, 0);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(25, 5, 'Nama ', 0, 0, 'L');
        $pdf->Cell(25, 5, ': '.$name, 0, 1, 'L');
        $pdf->Cell(25, 5, 'Departement ', 0, 0, 'L');
        $pdf->Cell(25, 5, ': '.$department, 0, 1, 'L');
        $pdf->Cell(25, 5, 'Date', 0, 0, 'L');
        if($start_date != "" || $start_date !=null &&$end_date != "" || $end_date !=null){
            $pdf->Cell(25, 5, ': '.$start_date.' - '.$end_date, 0, 1, 'L');
        }else{
            $pdf->Cell(25, 5, ': Semua', 0, 1, 'L');
        }

        
        
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Transaction List', 0, 1, 'C');


        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(25, 10, 'Name', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Warehouse', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Balance', 1, 0, 'C');
        $pdf->Cell(50, 10, 'User', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Desc', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Time', 1, 1, 'C');

        if($start_date != "" || $start_date !=null || $end_date != "" || $end_date !=null){
            if($id_item != "" || $id_item  != null){
                if($data['user'][0]->id_role == 3){
                    $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
                    $data = $this->Models->AllHistoryTransactionFilterItemAdmin($start_date,$end_date,$id_item,$getRolesID[0]->id_warehouse);
                }else{
                    $data = $this->Models->AllHistoryTransactionFilterItem($start_date,$end_date,$id_item);
                }
            }else{
                if($data['user'][0]->id_role == 3){
                    $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
                    $data = $this->Models->AllHistoryTransactionFilterAdmin($start_date,$end_date,$getRolesID[0]->id_warehouse);
                }else{
                    $data = $this->Models->AllHistoryTransactionFilter($start_date,$end_date);
                }
                
            }
        }else{
            if($id_item != "" || $id_item  != null){
                if($data['user'][0]->id_role == 3){
                    $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
                    $data = $this->Models->AllHistoryTransactionItemAdmin($id_item,$getRolesID[0]->id_warehouse);
                }else{
                    $data = $this->Models->AllHistoryTransactionItem($id_item);
                }
            }else{
                if($data['user'][0]->id_role == 3){
                    $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
                    $data = $this->Models->AllHistoryTransactionAdmin($getRolesID[0]->id_warehouse);
                }else{
                    $data = $this->Models->AllHistoryTransaction();
                }
            }
      
        }
    
     

        foreach ($data as $transaction) {
            $pdf->Cell(25, 10, $transaction->item_name, 1, 0, 'C');
            $pdf->Cell(25, 10, $transaction->warehouse, 1, 0, 'C');
            $pdf->Cell(25, 10, $transaction->balance, 1, 0, 'C');
            $pdf->Cell(50, 10, $transaction->user, 1, 0, 'C');
            if($transaction->description==0){
                $pdf->Cell(25, 10, "Out" , 1, 0, 'C');
            }else{
                $pdf->Cell(25, 10, "In" , 1, 0, 'C');
            }
      
            $pdf->Cell(40, 10, date_format(date_create($transaction->created_at),"d M Y - H:i:s"), 1, 1, 'C');
        }
        // Position at 15 mm from bottom
        $pdf->SetY(260);
        $pdf->SetX(11.5);
        // Your custom content at the bottom
        $pdf->Cell(190,10,$this->Models->GetTimestamp(),0,1,'R');
        $pdf->Output();
    }
    public function HistoryTransactionFilter()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $end_dates = date('Y-m-d', strtotime($end_date . ' +1 day'));
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['title'] = 'History Transaction';
        if($data['user'][0]->id_role == 3){
            $getRolesID = $this->Models->getID('role_warehouse','id_user',$data['user'][0]->id);
            $data['history'] = $this->Models->AllHistoryTransactionFilterAdmin($start_date,$end_dates,$getRolesID[0]->id_warehouse);
        }else{
            $data['history'] = $this->Models->AllHistoryTransactionFilter($start_date,$end_dates);
        }
        $data['item'] = $this->Models->AllItem();
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('dashboard/header',$data);
        $this->load->view('History/side',$data);
        $this->load->view('History/main2',$data);
        $this->load->view('dashboard/footer');
    }

    public function UserPage() 
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        // $data['history'] = $this->Models->AllHistoryTr();
        $data['title'] = 'User Page';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function AdminWarehouse() 
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        // $data['history'] = $this->Models->AllHistoryTr();
        $data['title'] = 'Admin Warehouse Page';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/main',$data);
        $this->load->view('dashboard/footer');
    }


    


}

/* End of file Home.php */
