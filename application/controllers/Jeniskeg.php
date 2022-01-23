<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bpp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('bpp_m');  
    }
    public function index()
	{
        $data['row'] = $this->bpp_m->get();
		$this->template->load('template', 'bpp/bpp_data', $data);
    }
    
    public function tambah()
    {   
        $data_bpp = new stdClass();
        $data_bpp->id_bpp = null;
        $data_bpp->nm_bpp    = null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_bpp
        );
        $this->template->load('template','bpp/bpp_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->bpp_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->bpp_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('bpp');
    }
    
    public function ubah($id)
    {
        $query =$this->bpp_m->get($id);
        if($query->num_rows() > 0) {
            $data_bpp = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_bpp
            );
            $this->template->load('template','bpp/bpp_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('bpp');
        }
    }
   
    
    public function del($id)
    {
        $this->bpp_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('bpp');

    }
}
