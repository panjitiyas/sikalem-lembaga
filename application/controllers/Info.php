<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model('info_m');  
    }
    public function index()
	{
        $data['row'] = $this->info_m->get();
		$this->template->load('template', 'info/info_data', $data);
    }
    
    public function tambah()
    {   
        $data_info = new stdClass();
        $data_info->id_info = null;
        $data_info->uraian= null;
        $data_info->lampiran= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_info
        );
        $this->template->load('template','info/info_form',$data);
    } 
    
    public function proses()
    {
        $data['row'] = $this->info_m->get();
        $config['upload_path']          = './uploads/info/';
        $config['allowed_types']        = 'pdf|pptx|ppt|docsx|doc|rtf|xls|xlsx|jpg|jpeg|rar|zip';
        $config['max_size']                 = 100000;
        // $config['file_name']            = $data->uraian;
        $config['overwrite']                = TRUE;
        $this->load->library('upload',$config);

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            if (@$_FILES['lampiran']['name'] !=null){
                if($this->upload->do_upload('lampiran')){
                    $post['lampiran']   = $this->upload->data('file_name');
                    $this->info_m->tambah($post);
                    if($this->db->affected_rows()>0){
                        $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('info');
                } else {
                    $error              = $this->upload->display_errors();
                    $this->session->set_flashdata('gagal',$error);
                    redirect('info/tambah');
                }
            } else {
                $post['lampiran']       = null;
                    $this->info_m->tambah($post);
                    if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('info');
            }
        } else if (isset($_POST['ubah'])) {
            if (@$_FILES['lampiran']['name'] !=null){
                if($this->upload->do_upload('lampiran')){
                    $info =$this->info_m->get($post['id'])->row();
                    if($info->lampiran !=null) {
                        $target_file = './uploads/info/' .$info->lampiran;
                        unlink($target_file);
                    }

                    $post['lampiran']   = $this->upload->data('file_name');
                    $this->info_m->ubah($post);
                    if($this->db->affected_rows()>0){
                        $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('info');
                } else {
                    $error              = $this->upload->display_errors();
                    $this->session->set_flashdata('gagal',$error);
                    redirect('info/tambah');
                }
            } else {
                $post['lampiran']       = null;
                    $this->info_m->ubah($post);
                    if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('info');
            }
            
        }
        
    }
    
    public function ubah($id)
    {
        $query =$this->info_m->get($id);
        if($query->num_rows() > 0) {
            $data_info = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_info
            );
            $this->template->load('template','info/info_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('info');
        }
    }
   
    
    public function del($id)
    {
        $info =$this->info_m->get($id)->row();
        if($info->lampiran !=null) {
            $target_file = './uploads/info/' .$info->lampiran;
            unlink($target_file);
        }
        $this->info_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('info');

    }
}
