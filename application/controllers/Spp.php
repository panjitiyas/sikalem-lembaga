<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('spp_m');  
    }
    public function index()
	{
        $data['row'] = $this->spp_m->get();
		$this->template->load('template', 'p_spp/spp_data', $data);
    }
    
    public function tambah()
    {   
        $data_spp = new stdClass();
        $data_spp->sppid = null;
        $data_spp->nm_spp= null;
        $data_spp->email_spp= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_spp
        );
        $this->template->load('template','p_spp/spp_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->spp_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->spp_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('spp');
    }
    
    public function ubah($id)
    {
        $query =$this->spp_m->get($id);
        if($query->num_rows() > 0) {
            $data_spp = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_spp
            );
            $this->template->load('template','p_spp/spp_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('spp');
        }
    }
   
    
    public function del($id)
    {
        $this->spp_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('spp');

    }
}
