<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
	{
        cek_already_login();
        $this->load->view('login');
    }
    
    public function process()
    {
        $post=$this->input->post(null,TRUE);
        // if(isset($post['login']))
        // $post = array (
        //     'username' => $this->input->post('username'),
        //     'password' => $this->input->post('password'),
        // );
        $this->load->model('user_m');
        $query = $this->user_m->login($post);
        if($query->num_rows()>0){
            $row=$query->row();
            if($row->username !== $post['username']){
                $respon = array (
                    'is_true'   => 0,
                    'title'     => 'Oops..',
                    'msg'       => 'Login gagal, Nama Pengguna tidak ditemukan',
                    'icon'      => 'error'
                ); 
            } else {
                $params= array(
                    'user_id'=>$row->user_id,
                    'nama' =>$row->nama,
                    'level' =>$row->level
                );
                $this->session->set_userdata($params);
                $respon = array (
                    'is_true'   => 1,
                    'title'     => 'Sukses',
                    'msg'       => 'Selamat login berhasil',
                    'icon'      => 'success'
                );
            }
        } else {
            $respon = array (
                'is_true'   => 0,
                'title'     => 'Oops..',
                'msg'       => 'Login gagal, Data Pengguna tidak sesuai',
                'icon'      => 'error'
            );
        }       
        echo json_encode($respon);
        
    }

    function gantipassword($id)
    {
    $this->load->model('user_m');
    // $tes=$this->user_m->get($id)->row();
    // print_r($tes);
    $this->form_validation->set_rules('passwordbaru','kata sandi','required');
    $this->form_validation->set_message('required','isi kata sandi baru');
    $this->form_validation->set_rules('password_konfbaru','pass_konf','matches[passwordbaru]',
        array('matches'=>'password tidak sama, konfirmasi ulang'));
    $this->form_validation->set_error_delimiters('<span class=" help-block text-danger font-italic">','</span>');

    if ($this->form_validation->run()==FALSE) {
        
        $query= $this->user_m->get($id);
        if ($query->num_rows() > -1) {
        $data['row']=$query->row();
            $this->template->load('template','user/ganti_pass_form',$data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
        redirect('auth/gantipassword/' .$this->fungsi->user_login()->user_id);
        
        }
    } else {
        $post = $this->input->post(null, TRUE);
        $this->user_m->editpass($post);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('dashboard');
    }
    }
    public function logout(){
        // $params=array('user_id','level');
        // $this->session->unset_userdata($params);
        $this->session->sess_destroy();
        redirect('auth/login');
    }



}


