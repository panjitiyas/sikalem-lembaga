<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model('akun_m');  
    }
    public function index()
	{
        $data['row'] = $this->akun_m->get();
		$this->template->load('template', 'akun/akun_data', $data);
    }
    
    public function tambah()
    {   
        $data_akun = new stdClass();
        $data_akun->id_akun = null;
        $data_akun->kdAkun    = null;
        $data_akun->nmAkun= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_akun
        );
        $this->template->load('template','akun/akun_form',$data);
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->akun_m->tambah($post);
        } else if (isset($_POST['ubah'])) {
            $this->akun_m->ubah($post);
        }
        
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('akun');
    }
    
    public function ubah($id)
    {
        $query =$this->akun_m->get($id);
        if($query->num_rows() > 0) {
            $data_akun = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_akun
            );
            $this->template->load('template','akun/akun_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('akun');
        }
    }
   
    
    public function del($id)
    {
        $this->akun_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('akun');

    }
}
