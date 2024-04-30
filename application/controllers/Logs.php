<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['Logs'] = $this->Models->Logs("","","");
        $data['title'] = 'Logs';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Logs/side',$data);
        $this->load->view('Logs/main',$data);
        $this->load->view('dashboard/footer');
    }
}

/* End of file Home.php */
