<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_out extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['pesan_m','user_m']);  
    }
    public function index()
	{
        $data = array (
            'row' => $this->pesan_m->get_out(),
            'user' => $this->user_m->get(),
        );
        $this->template->load('template', 'pesan/pesan_data_out',$data);
        // $this->template->load('template','pesan/pesan_data_out');
        // $dt= $data->result();
        //  echo '<pre>';
        // echo print_r($dt);
    }
    // public function pesan_baru()
    // {
    //     $data= $this->pesan_m->tot_new();

    //     // echo '<pre>';
    //     // echo print_r($data);
    //     if($data!==0){
    //         echo json_encode($data);   
    //     }
    // }
    // public function pesan_unread()
    // {
    //     // $data= $this->pesan_m->get_new();
    //     // echo '<pre>';
    //     // echo print_r($data);
    //     // return $row;
    //     $this->load->view('pesan/load_pesan');
    //     // echo json_encode($data);
    // }
    
    // public function tambah()
    // {   
    //     $data_pesan = new stdClass();
    //     $data_pesan->id_pesan = null;
    //     $data_pesan->pengirim= null;
    //     $data_pesan->kepada = null;
    //     $data_pesan->judul = null;
    //     $data_pesan->pesan = null;
    //     $data_pesan->sifat = null;
    //     $data = array (
    //         'page' => 'tambah',
    //         'row' => $data_pesan
    //     );
    //     $this->template->load('template','pesan/pesan_form',$data);
    // } 
    
    // public function proses()
    // {
    //     $post = $this->input->post(null, TRUE);
    //     $this->pesan_m->tambah($post);
    //     if($this->db->affected_rows()>0){
    //         $this->session->set_flashdata('sukses','pesan terkirim');
    //     }
    //     redirect('pesan');
    // }
    // public function proses_baca()
    // {
    //     $post = $this->input->post();
    //     $this->pesan_m->baca($post);
    //     if ($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('sukses', 'pesan telah dibaca');
    //     }
    //     redirect('pesan');
    // }
    
    // public function baca($id)
    // {
    //     $query =$this->pesan_m->get($id);
    //     if($query->num_rows() > 0) {
    //         $data_pesan = $query->row();
    //         $data = array (
    //             // 'page' => 'ubah',
    //             'row' => $data_pesan
    //         );
    //         $this->template->load('template','p_pesan/pesan_form', $data);
    //     } else {
    //         $this->session->set_flashdata('gagal','data tidak ditemukan!');
    //         redirect('pesan');
    //     }
    // }
   
    
    public function del_out($id)
    {
        $this->pesan_m->del_out($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('pesan_out');

    }
}
