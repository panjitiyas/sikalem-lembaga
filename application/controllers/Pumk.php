<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pumk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model(['pumk_m','ksubs_m','bpp_m']);  
    }
    public function index()
	{
        $data['row'] = $this->pumk_m->get_admin();
		$this->template->load('template', 'p_pumk/pumk_data', $data);
    }
    
    public function tambah()
    {   
        $data_pumk = new stdClass();
        $data_pumk->pumkid = null;
        $data_pumk->pumk_nm= null;
        $data_pumk->sub= null;
        $data_pumk->bpp= null;
        $data_ksubs=$this->ksubs_m->get();
        $data_bpp=$this->bpp_m->get();
        $data = array (
            'page' => 'tambah',
            'row' => $data_pumk,
            'subs'=>$data_ksubs,
            'bpp' => $data_bpp
        );
        $this->template->load('template','p_pumk/pumk_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->pumk_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->pumk_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('pumk');
    }
    
    public function ubah($id)
    {
        $query =$this->pumk_m->get_admin($id);
        if($query->num_rows() > 0) {
            $data_pumk = $query->row();
            $data_ksubs=$this->ksubs_m->get();
            $data_bpp=$this->bpp_m->get();
            $data = array (
                'page' => 'ubah',
                'row' => $data_pumk,
                'subs'=>$data_ksubs,
                'bpp' => $data_bpp
            );
            $this->template->load('template','p_pumk/pumk_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('pumk');
        }
    }
   
    public function del($id)
    {
        $this->pumk_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('pumk');

    }
}
