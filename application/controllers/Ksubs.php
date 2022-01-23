<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ksubs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('ksubs_m');  
    }
    public function index()
	{
        $data['row'] = $this->ksubs_m->get();
		$this->template->load('template', 'ksubs/ksubs_data', $data);
    }
    
    public function tambah()
    {   
        $data_ksubs = new stdClass();
        $data_ksubs->ksub_id = null;
        $data_ksubs->nm_ksub    = null;
        $data_ksubs->nm_koordinator= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_ksubs
        );
        $this->template->load('template','ksubs/ksubs_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->ksubs_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->ksubs_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('ksubs');
    }
    
    public function ubah($id)
    {
        $query =$this->ksubs_m->get($id);
        if($query->num_rows() > 0) {
            $data_ksubs = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_ksubs
            );
            $this->template->load('template','ksubs/ksubs_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('ksubs');
        }
    }
   
    
    public function del($id)
    {
        $this->ksubs_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('ksubs');

    }
}
