<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alert extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->helper('date');
        $this->load->model(['alert_m']);  
    }
    public function index()
	{
        $data = array (
            'row' => $this->alert_m->get(),
        );
        $this->template->load('template', 'alert/alert_data',$data);
        // $dt= $data->result();
        //  echo '<pre>';
        // echo print_r($dt);
    }

    public function tambah()
    {   
        $data_pesan = new stdClass();
        $data_pesan->id_alert = null;
        $data_pesan->judul_alert= null;
        $data_pesan->isi_alert = null;
        $data_pesan->warna_alert = null;
        $data_pesan->status_alert = null;
        $data_pesan->jenis = null;
        $data = array (
            'page' => 'tambah',
            'row' => $data_pesan
        );
        $this->template->load('template','alert/alert_form',$data);
    } 
    public function update($id)
    {
        $query =$this->alert_m->get($id);
        if($query->num_rows() > 0) {
        $data_alert = $query->row();


        $data = array (
            'page' => 'ubah',
            'row' => $data_alert,
       
        );
        $this->template->load('template','alert/alert_form',$data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('alert');
        }
    }
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->alert_m->tambah($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','data berhasil disimpan');
            }
            redirect('alert');
            // echo '<pre>';
            // echo print_r($post); 
    } else if (isset($_POST['ubah'])) {
            $this->alert_m->ubah($post);
            if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
            }
            redirect('alert');
            }
    }

    public function aktif($id)
    {
        $this->alert_m->aktif($id);
        // if($this->db->affected_rows()>0){
        //     $this->session->set_flashdata('sukses','alert diaktifkan');
        // }
        redirect('alert');
    }

    public function nonaktif($id)
    {
        $this->alert_m->nonaktif($id);
        // if($this->db->affected_rows()>0){
        //     $this->session->set_flashdata('sukses','alert dinonaktifkan');
        // }
        redirect('alert');
    }
    public function del($id)
    {
        $this->alert_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('alert');

    }
}
