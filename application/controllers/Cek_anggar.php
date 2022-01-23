<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_anggar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model('cek_anggar_m');  
    }
    public function index()
	{
        $data = array(
            'kd1'       => $this->cek_anggar_m->get_kd1(),
        ) ;
		$this->template->load('template', 'cek_anggar/cek_anggar', $data);
        // $this->load->view('cek_anggar/cek_anggar');
    }
    public function ambil_anggaran()
	{
        $key=$this->input->post ('id');
        $ang=$this->cek_anggar_m->get_anggaran($key);
        // echo '<pre>';
        // print_r($ang);
        echo json_encode($ang);
    }
    public function ambil_kd2()
	{
        $id=$this->input->post ('id');
        $kd2= $this->cek_anggar_m->get_kd2($id);
        echo json_encode($kd2);
    }

    public function ambil_kd3()
	{
        $id=$this->input->post ('id');
        $kd3= $this->cek_anggar_m->get_kd3($id);
        echo json_encode($kd3);
    }
}
