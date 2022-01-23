<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tools extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model('tools_model');  
    }
    public function index()
	{
        $data['data_tools'] = $this->tools_model->get();
		$this->template->load('template', 'dukung/tools_data', $data);
    }
    
    public function tambah()
    {   
        $data_tools = new stdClass();
        $data_tools->id_tools = null;
        $data_tools->uraian= null;
        $data_tools->lampiran= null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_tools
        );
        $this->template->load('template','dukung/tools_form',$data);
    } 
    
    public function proses()
    {
        // $data['row'] = $this->tools_model->get();
        $config['upload_path']          = './uploads/info/';
        $config['allowed_types']        = '*';
        $config['max_size']                 = 500000;
        // $config['file_name']            = $data->uraian;
        $config['overwrite']                = TRUE;
        $this->load->library('upload',$config);

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            if (@$_FILES['lampiran']['name'] !=null){
                if($this->upload->do_upload('lampiran')){
                    $post['lampiran']   = $this->upload->data('file_name');
                    $this->tools_model->tambah($post);
                    if($this->db->affected_rows()>0){
                        $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('tools');
                } else {
                    $error              = $this->upload->display_errors();
                    $this->session->set_flashdata('gagal',$error);
                    redirect('tools/tambah');
                }
            } else {
                $post['lampiran']       = null;
                    $this->tools_model->tambah($post);
                    if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('tools');
            }
        } else if (isset($_POST['ubah'])) {
            if (@$_FILES['lampiran']['name'] !=null){
                if($this->upload->do_upload('lampiran')){
                    $tools =$this->tools_model->get($post['id'])->row();
                    if($tools->lampiran !=null) {
                        $target_file = './uploads/info/' .$tools->lampiran;
                        unlink($target_file);
                    }

                    $post['lampiran']   = $this->upload->data('file_name');
                    $this->tools_model->ubah($post);
                    if($this->db->affected_rows()>0){
                        $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('tools');
                } else {
                    $error              = $this->upload->display_errors();
                    $this->session->set_flashdata('gagal',$error);
                    redirect('tools/tambah');
                }
            } else {
                $post['lampiran']       = null;
                    $this->tools_model->ubah($post);
                    if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    redirect('tools');
            }
            
        }
        
    }
    
    public function ubah($id)
    {
        $query =$this->tools_model->get($id);
        if($query->num_rows() > 0) {
            $data_tools = $query->row();
            $data = array (
                'page' => 'ubah',
                'row' => $data_tools
            );
            $this->template->load('template','dukung/tools_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('tools');
        }
    }
   
    
    public function del($id)
    {
        $tools =$this->tools_model->get($id)->row();
        if($tools->lampiran !=null) {
            $target_file = './uploads/info/' .$tools->lampiran;
            unlink($target_file);
        }
        $this->tools_model->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('tools');

    }
}
