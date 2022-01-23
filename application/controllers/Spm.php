<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('spm_m');  
    }
    public function index()
	{
        $data['row'] = $this->spm_m->get();
		$this->template->load('template', 'p_spm/spm_data', $data);
    }
    
    public function tambah()
    {   
        $data_spm = new stdClass();
        $data_spm->spmid = null;
        $data_spm->nm_spm= null;
        $data_spm->email_spm= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_spm
        );
        $this->template->load('template','p_spm/spm_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->spm_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->spm_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('spm');
    }
    
    public function ubah($id)
    {
        $query =$this->spm_m->get($id);
        if($query->num_rows() > 0) {
            $data_spm = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_spm
            );
            $this->template->load('template','p_spm/spm_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('spm');
        }
    }
   
    
    public function del($id)
    {
        $this->spm_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('spm');

    }
}
