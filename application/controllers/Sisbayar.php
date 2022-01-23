<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sisbayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('sisbayar_m');  
    }
    public function index()
	{
        $data['row'] = $this->sisbayar_m->get();
		$this->template->load('template', 'sisbayar/sisbayar_data', $data);
    }
    
    public function tambah()
    {   
        $data_bayar = new stdClass();
        $data_bayar->id_bayar = null;
        $data_bayar->nm_bayar    = null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_bayar
        );
        $this->template->load('template','sisbayar/sisbayar_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->sisbayar_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->sisbayar_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('sisbayar');
    }
    
    public function ubah($id)
    {
        $query =$this->sisbayar_m->get($id);
        if($query->num_rows() > 0) {
            $data_bayar = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_bayar
            );
            $this->template->load('template','sisbayar/sisbayar_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('sisbayar');
        }
    }
   
    
    public function del($id)
    {
        $this->sisbayar_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('sisbayar');

    }
}
