<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['dok_m', 'ksubs_m','proses_tu_m']);  
    }
    public function index()
	{
        $data['row'] = $this->dok_m->get();
		$this->template->load('template', 'dok/dok_data', $data);
    }
    
    public function tambah()
    {   
        $data_dok = new stdClass();
        $data_dok->id_dok = null;
        $data_dok->substansi= null;
        $data_dok->nama_keg = null;
        $data_dok->tgl_mulai = null;
        $data_dok->tgl_selesai= null;
        $query_ksubs = $this->ksubs_m->get();
        $query_tu =$this->proses_tu_m->get();
        $data = array (
            'page' => 'tambah',
            'row' => $data_dok,
            'nm_ksubs' => $query_ksubs,
            'dt_tu' => $query_tu
        );
        $this->template->load('template','dok/dok_form',$data);
    } 
    
    public function proses()
    {
        $data['row'] = $this->dok_m->get();
        $config['upload_path']          = './uploads/dok/';
        $config['allowed_types']        = 'pdf|docx|doc|rtf|rar|zip';
        $config['max_size']             = 2048;
        $config['overwrite']            = TRUE;
        $this->load->library('upload',$config);
        $post = $this->input->post(null, TRUE);

        if(isset($_POST['tambah'])) {
            for ($i=1; $i <=3 ; $i++) {
            if (@$_FILES['lamp_'.$i]['name'] != null){
                 
                if (!$this->upload->do_upload ('lamp_'.$i)){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('gagal',$error);
                    redirect('dok/tambah');
                } else {
                $post['lamp_'.$i]   = $this->upload->data('file_name');}
                }else {
                    $post['lamp_'.$i]   = null;
                }
            }
                $this->dok_m->tambah($post);
                if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('dok');   
                // echo '<pre>';
                // echo print_r($post);
            
        } else if (isset($_POST['ubah'])) {
            for ($i=1; $i <=3 ; $i++) {
                if (@$_FILES['lamp_'.$i]['name'] != null){
                    if (!$this->upload->do_upload ('lamp_'.$i)){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('gagal',$error);
                        redirect('dok/tambah');
                    } else {
                        $dok =$this->dok_m->get($post['id'])->row();
                            if ($i==1){
                                if($dok->lamp_1 !=null) {
                                    $target_file = './uploads/dok/' .$dok->lamp_1;
                                    unlink($target_file);
                                }
                            } elseif ($i==2){
                                if($dok->lamp_2 !=null) {
                                    $target_file = './uploads/dok/' .$dok->lamp_2;
                                    unlink($target_file);
                                }
                            } else {
                                if($dok->lamp_3 !=null) {
                                    $target_file = './uploads/dok/' .$dok->lamp_3;
                                    unlink($target_file);
                                }
                        }
                        $post['lamp_'.$i]   = $this->upload->data('file_name');
                    }
                } else {
                    $post['lamp_'.$i]   = null;
                }
        }
        $this->dok_m->ubah($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('dok');
        // echo '<pre>';
        // echo print_r($post);
    }
}
    
    public function ubah($id)
    {
        $query =$this->dok_m->get($id);
        if($query->num_rows() > 0) {
            $data_dok = $query->row();
            $query_ksubs = $this->ksubs_m->get();
            $data = array (
                'page' => 'ubah',
                'row' => $data_dok,
                'nm_ksubs' => $query_ksubs
            );
            $this->template->load('template','dok/dok_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('dok');
        }
    }
   
    
    public function del($id)
    {
        $dok =$this->dok_m->get($id)->row();
        if($dok->lamp_1 !=null) {
            $target_file = './uploads/dok/' .$dok->lamp_1;
            unlink($target_file);
        }
 
        if($dok->lamp_2 !=null) {
            $target_file = './uploads/dok/' .$dok->lamp_2;
            unlink($target_file);
        }
        if($dok->lamp_3 !=null) {
            $target_file = './uploads/dok/' .$dok->lamp_3;
            unlink($target_file);
        }
        $this->dok_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('dok');

    }
}
