<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_spm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['proses_spm_m','spm_m']);  
    }
    public function index()
	{
        $data['row'] = $this->proses_spm_m->get();
		$this->template->load('template', 'spm/proses_spm_data', $data);
    }
  
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
            $this->proses_spm_m->update($post);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
            require_once APPPATH.'vendor/autoload.php';

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
       }
       redirect('proses_spm');
    }
    
    public function update($id)
    {
        
        $query =$this->proses_spm_m->get($id);
        if($query->num_rows() > 0) {
            $data_spm= $query->row();
            $query_spm = $this->spm_m->get();
            $data = array (
                'row' => $data_spm,
                'spm' => $query_spm
            );
                $this->template->load('template','spm/proses_spm_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_spm');
        }
    }
    public function del($id)
    {
        $this->proses_spm_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('proses_spm');

    }
    function get_ajax()
    {
        $list = $this->proses_spm_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            if ($data->tgl_spp==null){
                $row[] = '<span class="text-danger">'. $data->nm_keg. '</span>';
            } else {
                $row[] = '<span class="text-success">'. $data->nm_keg. '</span>';
            }
            $row[] = tanggal_indonesia($data->tgl_mulai);
            $row[] = $data->no_spp;
            $row[] = tanggal_indonesia($data->tgl_spp);
            $row[] =  number_format($data->nilai_spp, 0, ',', '.');
            $row[] = $data->sppid;
            $row[] = $data->spmid;

            // add html for status
            if (empty($data->no_sp2d) &&  empty($data->no_spm)) {
                $row[] = '<span class="text-danger"><i class="fas fa-times"></i></span>';
            } elseif (!empty($data->no_spm) && empty($data->no_sp2d)) {
                $row[] = '<span class="text-primary"><i class="fas fa-sync-alt"></i></span>';
            } else {
                $row[] = '<span class="text-success"><i class="fas fa-check"></i></span>';
            };
            // add html for action
            if (empty($data->no_spp)) {
                $row[] = '<a href="' . site_url('proses_spm/update/' . $data->id_spm) . '" class="btn btn-secondary btn-xs disabled"><i class="fas fa-pencil-alt"></i></a>';
            } else {
                $row[] = '<a href="' . site_url('proses_spm/update/' . $data->id_spm) . '" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i></a>';
            }
            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_spm_m->count_all(),
            "recordsFiltered" => $this->proses_spm_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
