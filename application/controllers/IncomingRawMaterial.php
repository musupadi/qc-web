<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncomingRawMaterial extends CI_Controller {

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
            ['field' => 'code', 'label' => 'Code', 'rules' => 'required'],
            ['field' => 'label', 'label' => 'Label', 'rules' => 'required'],
            ['field' => 'id_rawmat_category', 'label' => 'Category', 'rules' => 'required'],
            ['field' => 'id_countries', 'label' => 'Country', 'rules' => 'required']
        ];
    }

    public function index(){
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['rawmaterial'] = $this->Models->GetAllIncoming();
        $data['rawmat_category'] = $this->Models->GetAllRawMaterialCategory();
        $data['countries'] = $this->Models->GetAllRawMaterialCountries();
        $data['title'] = 'Incoming Raw Material';
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/side', $data);
        $this->load->view('IncomingRawMaterial/main', $data);  // Ensure this view is created
        $this->load->view('dashboard/footer');
    }
    public function Adding(){
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['rawmaterial'] = $this->Models->GetAllRawMaterial();
        $data['rawmat_category'] = $this->Models->GetAllRawMaterialCategory();
        $data['countries'] = $this->Models->GetAllRawMaterialCountries();

        // Set the page title
        $data['title'] = 'Raw Material';
        
 
        // Load the view with data
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('IncomingRawMaterial/add', $data);
        $this->load->view('dashboard/footer');
    }
    public function Add(){
        // Retrieve user ID based on session username
        $IDS = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
        

        // Get the quantity from the POST request
        $qty = $this->input->post('quantity');
        
        // Retrieve the raw material ID
        $id = $this->input->post('id'); // Assuming 'id' is passed in the POST request
        $ID = $this->Models->getID('rawmaterial', 'id', $id);
        
        // Initialize the quantity to 0 if not set
        $qts = 0;
        if ($ID->quantity) {
            $qts = $ID->quantity;
        }
        
        // Calculate the new quantity
        $QTY = $qts + $qty;
        
        // Convert manufacturing date to DateTime and add one year
        $mfg_date = new DateTime($this->input->post('mfg_date'));
        $exp_date = clone $mfg_date; // Clone to avoid modifying the original date
        $exps =  $this->input->post('exp');
        $exp_date->modify('+'.$exps.' year');
        
        // Prepare data for insertion
        $data = [
            'id_product' => $id,
            'qty' => $QTY,
            'mfg_date' => $mfg_date->format('Y-m-d'), // Format date to string
            'exp_date' => $exp_date->format('Y-m-d'), // Format date to string
            'created_by' => $IDS[0]->id,
            'updated_by' => $IDS[0]->id
        ];
        
        // Insert data into 'incoming_raw' table
        $this->Models->insert('incoming_raw', $data);
        
        // Prepare log data
        $logs = [
            'action' => "Input Raw Material " . $this->input->post('label') . " Quantity = " . $qty . " Menjadi " . $QTY,
            'created_by' => $IDS[0]->id,
            'updated_by' => $IDS[0]->id
        ];
        
        // Insert log data into 'logs' table
        $this->Models->insert('logs', $logs);
        
        // Set flash data message
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil Ditambahkan")</script>');
        
        // Redirect to the IncomingRawMaterial page
        redirect(base_url('IncomingRawMaterial'));
    }

    public function Edit($id){
        $this->form_validation->set_rules($this->rulesRawMaterial());
        if($this->form_validation->run() === FALSE){
            $data['user'] = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
            $data['rawmaterial'] = $this->Models->getID('rawmaterial', 'id', $id);
            $data['categories'] = $this->Models->getAll('rawmat_category');
            $data['countries'] = $this->Models->getAll('countries');
            $data['title'] = 'Edit Raw Material';
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/side', $data);
            $this->load->view('rawmaterial/edit', $data);  // Ensure this view is created
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        } else {
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
            $data = [
                'code' => $this->input->post('code'),
                'label' => $this->input->post('label'),
                'id_rawmat_category' => $this->input->post('id_rawmat_category'),
                'id_countries' => $this->input->post('id_countries'),
                'updated_by' => $ID[0]->id,
                'updated_at' => $this->Models->GetTimestamp()
            ];
            $this->Models->edit('rawmaterial', 'id', $id, $data);

            $logs['action'] = "Updated Raw Material " . $this->input->post('label');
            $logs['created_by'] = $ID[0]->id;
            $logs['updated_by'] = $ID[0]->id;
            $this->Models->insert('logs', $logs);

            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('IncomingRawMaterial'));
        }
    }

    public function Delete($id){
        $this->Models->delete('rawmaterial', 'id', $id);

        $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
        $logs['action'] = "Deleted Raw Material with ID " . $id;
        $logs['created_by'] = $ID[0]->id;
        $logs['updated_by'] = $ID[0]->id;
        $this->Models->insert('logs', $logs);

        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('IncomingRawMaterial'));
    }

    public function importExcel() {
        $config['upload_path'] = './file/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('excel_file')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $fileData = $this->upload->data();
            $filePath = './file/' . $fileData['file_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));

            $db = $this->Models->importExcelRawMaterials($sheetData, $ID[0]->id);
            unlink($filePath);
            if ($db) {
                $logs['action'] = "Imported Raw Materials using Excel";
                $logs['created_by'] = $ID[0]->id;
                $logs['updated_by'] = $ID[0]->id;
                $this->Models->insert('logs', $logs);

                $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diimpor")</script>');
                redirect(base_url('IncomingRawMaterial'));
            } else {
                $this->session->set_flashdata('pesan', '<script>alert("Data gagal diimpor karena kesalahan format")</script>');
                redirect(base_url('IncomingRawMaterial'));
            }
        }
    }
}
