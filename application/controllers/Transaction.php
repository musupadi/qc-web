<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesTransaction(){
        return [
            ['field' => 'handover_date','label' => 'Handover Date','rules' => 'required']
        ];
    }
    private function rulesTransaction2(){
        return [
            ['field' => 'id','label' => 'Id','rules' => 'required'],
        ];
    }
    public function index()
    {
        // $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllTransaction();
        $data['title'] = 'Transaction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Transaction/side',$data);
        $this->load->view('Transaction/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function EditStatusAccept(){
        $this->form_validation->set_rules($this->rulesTransaction());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['transaction'] = $this->Models->AllTransaction();
            $data['title'] = 'Transaction';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Transaction/side',$data);
            $this->load->view('Transaction/main',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));  
            $qty = $this->Models->GetQuantity($this->input->post('id_item'),$this->input->post('id_warehouse'));
            if($qty){
                if($qty[0]->qty < $this->input->post('qty')){
                    $this->session->set_flashdata('pesan', '<script>alert("Stock barang Tidak Cukup")</script>');
                    redirect(base_url('Transaction'));
                }else{
                    $DataID = $this->Models->getID('tr_item','id',$this->input->post('id_edit'));
                    $UserID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama')); 
                    $data['handover_date'] = $this->input->post('handover_date');   
                    $data['status'] = 1;
                    $data['updated_by'] = $ID[0]->id;
                    $data['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('tr_item','id',$this->input->post('id_edit'),$data);

                    $data2['qty'] = $qty[0]->qty - $this->input->post('qty');
                    $data2['updated_by'] = $ID[0]->id;
                    $data2['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('m_stock','id',$qty[0]->id,$data2);
                    
                    $data3['id_item'] = $this->input->post('id_item');   
                    $data3['id_warehouse'] = $this->input->post('id_warehouse');   
                    $data3['description'] = 0;
                    $data3['reason'] = $DataID[0]->reason;
                    $data3['qty1'] = $qty[0]->qty;
                    $data3['balance'] = $this->input->post('qty');
                    $data3['qty2'] = $qty[0]->qty - $this->input->post('qty');
                    $data3['updated_at'] = $this->Models->GetTimestamp();
                    $data3['updated_by'] = $UserID[0]->id;
                    $data3['created_at'] = $this->Models->GetTimestamp();
                    $data3['created_by'] = $DataID[0]->created_by;
    
                    $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
                    redirect(base_url('Transaction'));
                }
            }else{
                $this->session->set_flashdata('pesan', '<script>alert("Barang Tersebut Belum ada Mohon Tambahkan di Menu Stock")</script>');
                redirect(base_url('Transaction'));
            }
            
          
        }
    }
    public function EditStatusRejected($id){
        $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
        $data['status'] = 2;
        $data['updated_by'] = $ID[0]->id;
        $data['updated_at'] = $this->Models->GetTimestamp();
        $result = $this->Models->edit('tr_item','id',$id,$data);
        if($result){
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
        }else{
            $this->session->set_flashdata('pesan', '<script>alert("Data Gagal diubah")</script>');
        }
        
        redirect(base_url('Transaction'));
    }


    public function EditStatusAcceptAdmin(){
        $this->form_validation->set_rules($this->rulesTransaction());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['transaction'] = $this->Models->AllTransaction();
            $data['title'] = 'Transaction';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Transaction/side',$data);
            $this->load->view('Transaction/main',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));  
            $qty = $this->Models->GetQuantity($this->input->post('id_item'),$this->input->post('id_warehouse'));
            if($qty){
                if($qty[0]->qty < $this->input->post('qty')){
                    $this->session->set_flashdata('pesan', '<script>alert("Stock barang Tidak Cukup")</script>');
                    redirect(base_url('Transaction'));
                }else{
                    $DataID = $this->Models->getID('tr_item','id',$this->input->post('id_edit'));
                    $UserID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama')); 
                    $data['handover_date'] = $this->input->post('handover_date');   
                    $data['status'] = 1;
                    $data['updated_by'] = $ID[0]->id;
                    $data['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('tr_item','id',$this->input->post('id_edit'),$data);

                    $data2['qty'] = $qty[0]->qty - $this->input->post('qty');
                    $data2['updated_by'] = $ID[0]->id;
                    $data2['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('m_stock','id',$qty[0]->id,$data2);
                    
                   
                    $data3['id_item'] = $this->input->post('id_item');   
                    $data3['id_warehouse'] = $this->input->post('id_warehouse');   
                    $data3['description'] = 0;
                    $data3['reason'] = $DataID[0]->reason;
                    $data3['qty1'] = $qty[0]->qty;
                    $data3['balance'] = $this->input->post('qty');
                    $data3['qty2'] = $qty[0]->qty - $this->input->post('qty');
                    $data3['updated_at'] = $this->Models->GetTimestamp();
                    $data3['updated_by'] = $UserID[0]->id;
                    $data3['created_at'] = $this->Models->GetTimestamp();
                    $data3['created_by'] = $DataID[0]->created_by;
                    $this->Models->insert('m_log',$data3);
    
                    $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
                    redirect(base_url('Transaction'));
                }
            }else{
                $this->session->set_flashdata('pesan', '<script>alert("Barang Tersebut Belum ada Mohon Tambahkan di Menu Stock")</script>');
                redirect(base_url('Transaction'));
            }
            
          
        }
    }
    public function EditStatusRejectedAdmin($id){
        $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
        $data['status'] = 2;
        $data['updated_by'] = $ID[0]->id;
        $data['updated_at'] = $this->Models->GetTimestamp();
        $result = $this->Models->edit('tr_item','id',$id,$data);
        if($result){
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
        }else{
            $this->session->set_flashdata('pesan', '<script>alert("Data Gagal diubah")</script>');
        }
        
        redirect(base_url('Transaction/trAdminWarehouse'));
    }

    public function userTransaction()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllItem();
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['category'] = $this->Models->getAll('m_category');
        $data['title'] = 'Transaction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Usertransaction/side',$data);
        $this->load->view('Usertransaction/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function userRequest()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $roles = $this->Models->RoleWarehouse($data['user'][0]->id);
        $data['transaction'] = $this->Models->TransactionUser($data['user'][0]->id);
        $data['title'] = 'Request';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Requestuser/side',$data);
        $this->load->view('Requestuser/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function userTransactionWarehouse($id_item)
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->ItemWarehouseSearch($id_item); 
        $data['title'] = 'Transaction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Usertransaction/side',$data);
        $this->load->view('Usertransaction/main2',$data);
        $this->load->view('dashboard/footer');
    }

    public function trAdminWarehouse()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $roles = $this->Models->RoleWarehouse($data['user'][0]->id);
        $data['transaction'] = $this->Models->Transaction($roles[0]->id_warehouse);
        $data['title'] = 'Transaction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Tradminwarehouse/side',$data);
        $this->load->view('Tradminwarehouse/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function requestTransaction(){
        $this->form_validation->set_rules($this->rulesTransaction2());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if(empty($this->input->post())){
            $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['transaction'] = $this->Models->AllItem();
            $data['warehouse'] = $this->Models->AllWarehouse();
            $data['category'] = $this->Models->getAll('m_category');
            $data['title'] = 'Transaction';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Usertransaction/side',$data);
            $this->load->view('Usertransaction/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $insert['id_user'] = $ID[0]->id;
            $insert['id_item'] = $this->input->post('id_item');
            $insert['id_warehouse'] = $this->input->post('id_warehouse');
            $insert['name'] = $this->input->post('name');
            $insert['username'] = $this->input->post('username');
            $insert['email'] = $this->input->post('email');
            $insert['department'] = $this->input->post('department');
            $insert['phone_number'] = $this->input->post('phone_number');
            $insert['reason'] = $this->input->post('reason');
            $insert['image'] = "default.jpg";
            $insert['status'] = "0";
            $insert['qty'] = $this->input->post('qty');
            $insert['created_by'] = $ID[0]->id;
            $insert['updated_by'] = $ID[0]->id;
            $this->Models->insert('tr_item',$insert);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Transaction/userTransaction'));
        }
    }

    public function transactionDetail($username)
    {
        // $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['detail'] = $this->Models->AllDetail($username);
        $data['title'] = 'Transaction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Transaction/side',$data);
        $this->load->view('Transaction/detail',$data);
        $this->load->view('dashboard/footer');
    }

}