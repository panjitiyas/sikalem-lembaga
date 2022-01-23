<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->library('form_validation');
        $this->load->model(['user_m','bpp_m']);  
    }
    public function index()
	{
        $data = array(
            'row'=>$this->user_m->get(),
            'bpp'=>$this->bpp_m->get(),
        );
		$this->template->load('template', 'user/user_data', $data);
    }
    
    public function tambah()
    {
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('username','username','required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password','kata sandi','required');
        $this->form_validation->set_rules('password_konf','pass_konf','matches[password]',
            array('matches'=>'password tidak sama, konfirmasi ulang'));
        $this->form_validation->set_rules('subs','subs','required');
        $this->form_validation->set_rules('bpp','bpp','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_message('required','%s masih kosong, harap diisi');
        $this->form_validation->set_message('is_unique','{field} sudah digunakan, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class=" help-block text-danger font-italic"><small>','</small></span>');
        if ($this->form_validation->run()==FALSE){
        $this->template->load('template','user/user_form');
        } else {
           $post = $this->input->post(null, TRUE);
           $this->user_m->add($post);
           if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('user');
        }

    } 

    public function ubah($id)
    {
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('username','username','required|callback_username_cek');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password','kata sandi','required');
            $this->form_validation->set_rules('password_konf','pass_konf','matches[password]',
            array('matches'=>'password tidak sama, cek lagi')
            );}
        if($this->input->post('password_konf')){
            $this->form_validation->set_rules('password_konf','pass_konf','matches[password]',
            array('matches'=>'password tidak sama, cek lagi')
        );}
        if($this->input->post('subs')){
        $this->form_validation->set_rules('subs','subs','required');}
        if($this->input->post('level')){
        $this->form_validation->set_rules('level','level','required');}
        
        $this->form_validation->set_message('required','%s masih kosong, harap diisi');

        $this->form_validation->set_error_delimiters('<span class=" help-block text-danger font-italic">','</span>');
        
        if ($this->form_validation->run()==FALSE) {
            $query= $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data = array(
                    'row'=>$query->row(),
                    'bpp'=>$this->bpp_m->get(),
                );
                $this->template->load('template','user/user_form_ubah',$data);
            } else {
                $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('user');
            }
        } else {
            $post = $this->input->post(null, TRUE);
           $this->user_m->edit($post);
           if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        redirect('user');
            }
        }
    
    function username_cek(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tb_user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
            if($query->num_rows ()> 0){
                $this->form_validation->set_message('username_cek','{field} ini sudah dipakai, silahkan ganti');
                return FALSE;
                } else {
                return TRUE;
                }
    }

    public function del($id)
    {
        // $id = $this->input->post('user_id');
        $this->user_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('user');

    }
}
