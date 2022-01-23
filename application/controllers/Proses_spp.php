<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_spp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['proses_spp_m','spp_m']);  
    }
    public function index()
	{
        $data = array (
            'row' =>$this->proses_spp_m->get(),
            

        );
        $this->template->load('template', 'spp/proses_spp_data', $data);
        // echo '<pre>';
        // echo print_r($data['gu']->result());
    }
    public function totgup()
	{
        $data = array (
            'gu' =>$this->proses_spp_m->tot_gup(),

        );
        $this->load->view('data_gup/spp_datagup', $data);
        
        // echo '<pre>';
        // echo print_r($data['gu']->result());
    }

    public function data_gup ()
    {
        $this->template->load('template','data_gup/gup_data');
    }
  
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
            $this->proses_spp_m->update($post);
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
       redirect('proses_spp');
    }
    
    public function update($id)
    {
        
        $query =$this->proses_spp_m->get($id);
        if($query->num_rows() > 0) {
            $data_spp= $query->row();
            $query_spp = $this->spp_m->get();
            $data = array (
                'row' => $data_spp,
                'spp' => $query_spp
            );
                $this->template->load('template','spp/proses_spp_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_spp');
        }
    }
    public function del($id)
    {
        $this->proses_spp_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('proses_spp');

    }
    function get_ajax()
    {
        $list = $this->proses_spp_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            if ($data->revisi!="tidak"){
                $row[] = '<span class="text-danger">'. $data->nm_keg. '</span>';
            } else {
                $row[] = '<span class="text-success">'. $data->nm_keg. '</span>';
            }
            $row[] = tanggal_indonesia($data->tgl_mulai);
            $row[] = tanggal_indonesia($data->tgl_selesai);
            $row[] = $data->lokasi;
            $row[] = $data->arsip_gup;
            $row[] =  number_format($data->nilai_spp, 0, ',', '.');
            $row[] = $data->sppid;
            // add html for status
            if (empty($data->no_spp) && empty($data->arsip_gup)) {
                $row[] = '<span class="text-danger"><i class="fas fa-times"></i></span>';
            } elseif (empty($data->no_spp) && !empty($data->arsip_gup) || $data->nilai_spp == 0) {
                $row[] = '<span class="text-primary" ><i class="fas fa-sync-alt"></i></span>';
            } else {
                $row[] = '<span class="text-success"><i class="fas fa-check"></i></span>';
            };
            // add html for action
            if ($data->revisi!="tidak"  || empty($data->tgl_periksa)) {
                $row[] = '<a href="' . site_url('proses_spp/update/' . $data->id_spp) . '" class="btn btn-secondary btn-xs disabled"><i class="fas fa-pencil-alt"></i></a>
                <a href="' .base_url('uploads/pumk/' . $data->dok_aju). '" class="btn btn-secondary btn-xs disabled"><i class="fas fa-download"></i></a>';
            } else if ($data->revisi="tidak"  && !empty($data->tgl_periksa) && $data->dok_aju!=null) {
                $row[] = '<a href="' . site_url('proses_spp/update/' . $data->id_spp) . '" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i></a>
                <a href="' .base_url('uploads/pumk/' . $data->dok_aju). '" class="btn btn-primary btn-xs"><i class="fas fa-download"></i></a>';
            } else if ($data->revisi="tidak"  && !empty($data->tgl_periksa) && $data->dok_aju==null){
                $row[] = '<a href="' . site_url('proses_spp/update/' . $data->id_spp) . '" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i></a>
                <a href="' .base_url('uploads/pumk/' . $data->dok_aju). '" class="btn btn-secondary btn-xs disabled"><i class="fas fa-download"></i></a>';
            }
            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_spp_m->count_all(),
            "recordsFiltered" => $this->proses_spp_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
