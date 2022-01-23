<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dipa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('dipa_m');  
    }
    public function index()
	{
        $data['row'] = $this->dipa_m->get();
		$this->template->load('template', 'dipa/dipa_data', $data);
    }
    
    public function tambah()
    {   
        $data_dipa = new stdClass();
        $data_dipa->id_pagu = null;
        $data_dipa->kd_program    = null;
        $data_dipa->nm_programt= null;
        $data_dipa->kd_giat    = null;
        $data_dipa->nm_giat= null;
        $data_dipa->kd_rko    = null;
        $data_dipa->nm_rko= null;
        $data_dipa->kd_ro    = null;
        $data_dipa->nm_ro= null;
        $data_dipa->kd_komp    = null;
        $data_dipa->nm_komp= null;
        $data_dipa->kd_skomp    = null;
        $data_dipa->nm_skomp= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_dipa
        );
        $this->template->load('template','dipa/dipa_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->dipa_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->dipa_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('dipa');
    }
    
    public function ubah($id)
    {
        $query =$this->dipa_m->get($id);
        if($query->num_rows() > 0) {
            $data_dipa = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_dipa
            );
            $this->template->load('template','dipa/dipa_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('dipa');
        }
    }
   
    
    public function del($id)
    {
        $this->dipa_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('dipa');

    }
}
