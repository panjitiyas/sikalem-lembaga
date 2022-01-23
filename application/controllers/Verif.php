<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('verif_m');  
    }
    public function index()
	{
        $data['row'] = $this->verif_m->get();
		$this->template->load('template', 'p_verif/verif_data', $data);
    }
    
    public function tambah()
    {   
        $data_verif = new stdClass();
        $data_verif->verifid = null;
        $data_verif->nm_verif= null;
        $data_verif->email_verif= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_verif
        );
        $this->template->load('template','p_verif/verif_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->verif_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->verif_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('verif');
    }
    
    public function ubah($id)
    {
        $query =$this->verif_m->get($id);
        if($query->num_rows() > 0) {
            $data_verif = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_verif
            );
            $this->template->load('template','p_verif/verif_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('verif');
        }
    }
   
    
    public function del($id)
    {
        $this->verif_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('verif');

    }
}
