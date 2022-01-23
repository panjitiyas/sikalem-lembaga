<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
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
            'row' => $this->pesan_m->get(),
            'user' => $this->user_m->get(),
        );
        $this->template->load('template', 'pesan/pesan_data',$data);
        // $dt= $data->result();
        //  echo '<pre>';
        // echo print_r($dt);
    }
    public function pesan_baru()
    {
        $data= $this->pesan_m->tot_new();

        // echo '<pre>';
        // echo print_r($data);
        
            echo json_encode($data);   
        
    }
    public function pesan_unread()
    {
        // $data= $this->pesan_m->get_new();
        // echo '<pre>';
        // echo print_r($data);
        // return $row;
        $this->load->view('pesan/load_pesan');
        // echo json_encode($data);
    }
    public function inbox()
    {
        // $data= $this->pesan_m->get();
        // echo '<pre>';
        // echo print_r($data);
        // return $row;
        $this->load->view('pesan/inbox');
        // echo json_encode($data);
    }
    public function outbox()
    {
        // $data= $this->pesan_m->get();
        // echo '<pre>';
        // echo print_r($data);
        // return $row;
        $this->load->view('pesan/keluar');
        // echo json_encode($data);
    }
    
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
    
    public function proses()
    {
        $data['row'] = $this->pesan_m->get();
        $config['upload_path']          = './uploads/pesan/';
        $config['allowed_types']        = 'pdf|pptx|ppt|docsx|doc|rtf|xls|xlsx|jpg|jpeg|rar|zip';
        $config['max_size']             = 41120;
        // $config['file_name']            = $data->uraian;
        $config['overwrite']            = TRUE;
        $this->load->library('upload',$config);

        $post = $this->input->post(null, TRUE);
        if (@$_FILES['lampiran']['name'] !=null){
            if($this->upload->do_upload('lampiran')){
                $post['lampiran']   = $this->upload->data('file_name');
                $this->pesan_m->tambah($post);
                if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','pesan terkirim');
                }
                redirect('pesan');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('gagal',$error);
                redirect('info/tambah');
            }
        } else {
            $post['lampiran']       = null;
            $this->pesan_m->tambah($post);
            if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','pesan terkirim');
            // require_once APPPATH.'views/vendor/autoload.php';

            // $options = array(
            //   'cluster' => 'ap1',
            //   'useTLS' => true
            // );
            // $pusher = new Pusher\Pusher(
            //   '32b201d0d6662e79c8b3',
            //   '22fed942a64c791f8a24',
            //   '988871',
            //   $options
            // );
          
            // $data['message'] = 'berhasil';
            // $pusher->trigger('my-channel', 'my-event', $data);
            }
            redirect('pesan');

            
        }
   
    }

    public function proses_baca()
    {
        $post = $this->input->post();
        $this->pesan_m->baca($post);
        require_once APPPATH.'views/vendor/autoload.php';

        $options = array(
          'cluster' => 'ap1',
          'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
          '32b201d0d6662e79c8b3',
          '22fed942a64c791f8a24',
          '988871',
          $options
        );
      
        $data['message'] = 'berhasil';
        $pusher->trigger('my-channel', 'my-event', $data);
        // if ($this->db->affected_rows() > 0) {
        //     $this->session->set_flashdata('sukses', 'pesan telah dibaca');
        // }
        // redirect('pesan');
    }
    
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
   
    
    public function del($id)
    {
        $this->pesan_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('pesan');

    }
}
