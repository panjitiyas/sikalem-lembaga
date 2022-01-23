<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_pumk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['proses_pumk_m','sisbayar_m','jeniskeg_m','proses_verif_m','akun_m','dipa_m','proses_tu_m','cek_anggar_m']);  
        date_default_timezone_set("Asia/Jakarta");
        setlocale(LC_ALL, 'id_ID');
        
    }
    public function index()
    {   
        
        if ($this->fungsi->user_login()->level!=5){
            $data = array (
                'row'=> $this->proses_pumk_m->get(),
                'verif'=>$this->proses_verif_m->get()
            );
            $this->template->load('template', 'pumk/proses_pumk_data', $data);
        } else {
            $data = array (
                'row'=> $this->proses_pumk_m->get_pumk(),
                'verif'=>$this->proses_verif_m->get_bpp()
            );
            if ($this->fungsi->user_login()->nama!="Putri Nailatul Himma"){
                $this->template->load('template', 'pumk/proses_pumk_data', $data);
            } else {
                $this->template->load('template', 'pumk/proses_pumk_data akom', $data);
            }
        }
       
    }
    public function menu_akom()
    {
        $data = array (
            'row'=> $this->proses_pumk_m->get(),
            'verif'=>$this->proses_verif_m->get()
        );
        $this->template->load('template', 'pumk/proses_pumk_data akom', $data);
    }
    public function rab($id){

        $query=$this->proses_pumk_m->get($id);
        if($query->num_rows() > 0) {
        $query_keg =$query->row();
        $data['row']=$query_keg;
        $this->template->load('template','pumk/proses_rab',$data);
    } else {
        $this->session->set_flashdata('gagal','data tidak ditemukan!');
        redirect('proses_pumk');
    }
        
        
    }

    public function pumk_akom()
    {
        $data = array (
            'row'=> $this->proses_pumk_m->get(),
            'verif'=>$this->proses_verif_m->get()
        );
        $this->template->load('template', 'pumk/proses_pumk_data akom', $data);
    }

    // public function tambah()
    // {   
    //     $data_keg = new stdClass();
    //     $data_keg->id_pumk = null;
    //     $data_keg->nm_keg= null;
    //     $data_keg->k_subs = null;
    //     $data_keg->nm_pumk= null;
    //     $data = array (
    //         'page' => 'tambah',
    //         'row' => $data_keg
    //     );
    //     $this->template->load('template','pumk/proses_pumk_form',$data);
    // } 
    function cekhonor()
    {
        if(isset($_POST['nilai_hr'])){
            if (!empty($_POST['nilai_hr']) && empty($_POST['dok_aju'])) {
                $kdanggar = $_POST['kdpagu'];
                $akunhonor = 522151;
                $paguhonor = $this->cek_anggar_m->get_sisa($kdanggar . "." . $akunhonor);
                
                if ($paguhonor->num_rows () > 0) {
                    $nilaihonor = str_replace(".", "", $_POST['nilai_hr']);
                    $sisahonor = $paguhonor->row()->pagu - $paguhonor->row()->realisasi;
                    if ($nilaihonor <= $sisahonor) {
                        return True;
                    } else {
                        $this->form_validation->set_message('cekhonor', '&times pagu %s tidak mencukupi.');
                        return False;
                    }
                } else {
                    $this->form_validation->set_message('cekhonor', '&times akun %s tidak ditemukan.');
                    return False;
                }
            } else {
                return True;
            }
        }
    }
    function cekperjadin1()
    {
        if(isset($_POST['nilai_pd1'])){
            if (!empty($_POST['nilai_pd1'])&&empty($_POST['dok_aju'])) {
                $kdanggar = $_POST['kdpagu'];
                $akunperjadin1 = $_POST['akun_pd1'];
                $paguperjadin1 = $this->cek_anggar_m->get_sisa($kdanggar . "." . $akunperjadin1);
    
                if($paguperjadin1->num_rows() > 0) {
                    $nilaiperjadin1 = str_replace(".", "", $_POST['nilai_pd1']);
                    $sisaperjadin1 = $paguperjadin1->row()->pagu - $paguperjadin1->row()->realisasi;
                    if ($nilaiperjadin1 <= $sisaperjadin1) {
                        return True;
                    } else {
                        $this->form_validation->set_message('cekperjadin1', '&times pagu %s tidak mencukupi.');
                        return False;
                    }
                } else {
                    $this->form_validation->set_message('cekperjadin1', '&times akun %s tidak ditemukan.');
                    return False;
                }
            } else {
                return True;
            }

        }
    }
    function cekperjadin2()
    {
        if(isset($_POST['nilai_pd2'])){
            if (!empty($_POST['nilai_pd2'])&&empty($_POST['dok_aju'])) {
                $kdanggar = $_POST['kdpagu'];
                $akunperjadin2 = $_POST['akun_pd2'];
                $paguperjadin2 = $this->cek_anggar_m->get_sisa($kdanggar . "." . $akunperjadin2);
                
                if ($paguperjadin2->num_rows() > 0) {
                    $nilaiperjadin2 = str_replace(".", "", $_POST['nilai_pd2']);
                    $sisaperjadin2 = $paguperjadin2->row()->pagu - $paguperjadin2->row()->realisasi;
                    if ($nilaiperjadin2 <= $sisaperjadin2) {
                        return True;
                    } else {
                        $this->form_validation->set_message('cekperjadin2', '&times pagu %s tidak mencukupi.');
                        return False;
                    }
                } else {
                    $this->form_validation->set_message('cekperjadin2', '&times akun %s tidak ditemukan.');
                    return False;
                }
            } else {
                return True;
            }

        }
    }
    function cekperjadin3()
    {
        if(isset($_POST['nilai_pd3'])){
            if (!empty($_POST['nilai_pd3'])&&empty($_POST['dok_aju'])) {
                $kdanggar = $_POST['kdpagu'];
                $akunperjadin3 = $_POST['akun_pd3'];
                $paguperjadin3 = $this->cek_anggar_m->get_sisa($kdanggar . "." . $akunperjadin3);
                
                if ($paguperjadin3->num_rows () > 0) {
                    $nilaiperjadin3 = str_replace(".", "", $_POST['nilai_pd3']);
                    $sisaperjadin3 = $paguperjadin3->row()->pagu - $paguperjadin3->row()->realisasi;
                    if ($nilaiperjadin3 <= $sisaperjadin3) {
                        return True;
                    } else {
                        $this->form_validation->set_message('cekperjadin3', '&times pagu %s tidak mencukupi.');
                        return False;
                    }
                } else {
                    $this->form_validation->set_message('cekperjadin3', '&times akun %s tidak ditemukan.');
                    return False;
                }
            } else {
                return True;
            }

        }
    }
    function cekakom()
    {
        if ($this->fungsi->user_login()->nama == "Putri Nailatul Himma") {
            if(isset($_POST['nilai_ak'])){
                if (!empty($_POST['nilai_ak'])) {
                        $kdanggar = $_POST['kdpagu'];
                        $akunakom = $_POST['akun_ak'];
                        $paguakom = $this->cek_anggar_m->get_sisa($kdanggar . "." . $akunakom);
                        
                    if ($paguakom ->num_rows() > 0) {
                        $nilaiakom = str_replace(".", "", $_POST['nilai_ak']);
                        $sisaakom = $paguakom->row()->pagu - $paguakom->row()->realisasi;
                        if ($nilaiakom <= $sisaakom) {
                            return True;
                        } else {
                            $this->form_validation->set_message('cekakom', '&times pagu %s tidak mencukupi.');
                            return False;
                        }
                    } else {
                        $this->form_validation->set_message('cekakom', '&times akun %s - '.$_POST['akun_ak']. 'tidak ditemukan.');
                        return False;
                    }
                }

            }
        }
    }
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        $data = $this->proses_pumk_m->get($post['id'])->row();
        // echo '<pre>';
        // echo print_r($data);
        if(!isset($_POST['dok_aju'])){
            $validasi = array (
                'honor' =>array('field'=>'nilai_hr', 'label' => 'honorarium - 522151', 'rules' => 'callback_cekhonor'),
                'perjadin1' => array('field' => 'nilai_pd1', 'label' => 'perjalanan - '.$post['akun_pd1'], 'rules' => 'callback_cekperjadin1'),
                'perjadin2' => array('field' => 'nilai_pd2', 'label' => 'perjalanan - '.$post['akun_pd2'], 'rules' => 'callback_cekperjadin2'),
                'perjadin3' => array('field' => 'nilai_pd3', 'label' => 'perjalanan - '.$post['akun_pd3'], 'rules' => 'callback_cekperjadin3'),
                'akom' => array('field' => 'nilai_ak', 'label' => 'akomodasi' , 'rules' => 'callback_cekakom'),
            );
    
            $this->form_validation->set_rules($validasi);

        }
       
        if ($this->form_validation->run()==FALSE){
            $this->update($_POST['id']);

        } else {
            if ($this->fungsi->user_login()->nama=="Putri Nailatul Himma"){
                $real['ak'] = $post['kdpagu'].'.'.$post['akun_ak'];
                $real['nak'] = str_replace(".","",$post['nilai_ak']);
                $real['nilai_db']=str_replace(".","",$data->nilai_ak);
                $real['akun_db']=$data->kdpagu.'.'.$data->akun_ak;
                if ($real['nak']!=null || !empty($real['nak'])){
                    if($real['nilai_db']==null && empty($real['nilai_db'] && $real['nilai_db']==0)){
                        $this->cek_anggar_m-> tambah_realisasi($real);
                    } else {
                        $this->cek_anggar_m-> update_realisasi($real);
                    };
                };
                $this->proses_pumk_m->update($post);
                if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('proses_pumk');
            } else {
              
                $config['upload_path']          = './uploads/pumk/'.$data->k_subs.'/';
                if (!is_dir('./uploads/pumk/'.$data->k_subs.'/')) {
                    mkdir('./uploads/pumk/'.$data->k_subs.'/', 0777, TRUE);     
                }
                $config['allowed_types']        = 'pdf|rar|zip|jpg|jpeg';
                $config['max_size']             = 10240;
                $config['file_name']            = 'buktiTRF_'.$data->k_subs.'_'.substr($data->nm_keg,0,50,).'_'.date('dmY',strtotime($data->tgl_mulai));
                $config['overwrite']            = TRUE;
                $this->load->library('upload',$config);
                
                
                if(isset($_POST['update'])) {
                    if (@$_FILES['dok_aju']['name'] !=null){
                        if($this->upload->do_upload('dok_aju')){
                            $pumk =$this->proses_pumk_m->get($post['id'])->row();
                            if($pumk->dok_aju !=null) {
                                $target_file = './uploads/pumk/' .$pumk->dok_aju;
                                unlink($target_file);
                            }
                            $post['dok_aju']   = $this->upload->data('file_name');
                            $this->proses_pumk_m->update($post);
                            if($this->db->affected_rows()>0){
                                $this->session->set_flashdata('sukses','data berhasil disimpan');
                            }
                            redirect('proses_pumk');
                        } else {
                            $error              = $this->upload->display_errors();
                            $this->session->set_flashdata('gagal',$error);
                            redirect('proses_pumk/update'/$post['id']);
                        }
                    } else {
                            $post['dok_aju']       = null;
                            $real = array(
                                'pd1' =>$post['kdpagu'].'.'.$post['akun_pd1'],
                                'pd2' =>$post['kdpagu'].'.'.$post['akun_pd2'],
                                'pd3' =>$post['kdpagu'].'.'.$post['akun_pd3'],
                                'hr' =>$post['kdpagu'].'.522151',
                                'pd1db' =>$data->kdpagu.'.'.$data->akun_pd1,
                                'pd2db' =>$data->kdpagu.'.'.$data->akun_pd2,
                                'pd3db' =>$data->kdpagu.'.'.$data->akun_pd3,
                                'npd1' =>str_replace(".","",$post['nilai_pd1']),
                                'npd2' =>str_replace(".","",$post['nilai_pd2']),
                                'npd3' =>str_replace(".","",$post['nilai_pd3']),
                                'nhr' =>str_replace(".","",$post['nilai_hr']),
                                'npd1db' =>str_replace(".","",$data->nilai_pd1),
                                'npd2db' =>str_replace(".","",$data->nilai_pd2),
                                'npd3db' =>str_replace(".","",$data->nilai_pd3),
                                'nhrdb' =>str_replace(".","",$data->nilai_hr),
                            );
                            $this->cek_anggar_m-> tambah_realisasi($real);
                            $this->proses_pumk_m->update($post);
                            if($this->db->affected_rows()>0){
                                $this->session->set_flashdata('sukses','data berhasil disimpan');
                        }
                        redirect('proses_pumk');
                        // echo 'Berhasil disimpan!';
                        // echo print_r($data);
                    }
                }   
            }
        
        }
    }

    public function update($id)
    {
        $query =$this->proses_pumk_m->get($id);
        if($query->num_rows() > 0) {
            $data_pumk = $query->row();
            $query_dipa = $this->dipa_m->get();
            $query_akun = $this->akun_m->get();
            $query_bpp= $this->proses_verif_m->get($id);
            $bpp=$query_bpp->row();

            $data = array (
                'row'=> $data_pumk,
                'dipa'=>$query_dipa,
                'akun'=>$query_akun,
                'bpp'=>$bpp

            );
                $this->template->load('template','pumk/proses_pumk_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_pumk');
        }
        
    }
    public function del($id)
    {
        $this->proses_pumk_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('proses_pumk');

    }
    function get_ajax()
    {
        $list = $this->proses_pumk_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
    if ($this->fungsi->user_login()->nama!='Putri Nailatul Himma'){
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no.'.';
            if ($data->tgl_dispo!=null){
                $row[] = 
                '<a id="inform" href="#" class="text-primary font-weight-bold text-sm" data-toggle="modal" data-target="#modal_lengkap" 
                data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . tanggal_indonesia($data->tgl_mulai) . '" data-tgl_selesai="' . tanggal_indonesia($data->tgl_selesai) . '" data-lokasi="' . $data->lokasi . '" data-nm_pumk="' . $data->nm_pumk . '" data-tgl_dispo="'.tanggal_indonesia($data->tgl_dispo).'" data-kd_anggaran="' . $data->kd_anggaran . '" data-sis_byr="' . $data->sis_byr . '" data-sis_byr_hr="' . $data->sis_byr_hr . '" data-sis_byr_akom="' . $data->sis_byr_akom . '" data-catat_pumk="' . $data->catat_pumk . '" data-nota_pumk="' . $data->nota_pumk . '"data-no_undangan="'.$data->no_undangan.'"
                data-id_proses ="'.$data->id_proses. '">'
                .date("d-m-Y H:i",strtotime($data->tgl_dispo)).'<br>'.$data->no_undangan.'</a>';
            } else {
                $row[] = "-";
            };
            $row[] = $data->k_subs;
            $row[] = $data->nm_keg;
            // if ($data->tgl_proses==null){
            //     $row[] = '<span class="text-danger">'. $data->nm_keg. '</span>';
            // } elseif($data->tgl_proses!=null && empty($data->tgl_lpj)){
            //     $row[] = '<span class="text-primary">'. $data->nm_keg. '</span>';
            // } else {
            //     $row[] = '<span class="text-success">'. $data->nm_keg. '</span>';
            // }
            if ($data->tgl_selesai == $data->tgl_mulai){
                $row[] = tanggal_indonesia($data->tgl_mulai);
            } else {
                if (date('M',strtotime($data->tgl_mulai))==date('M',strtotime($data->tgl_selesai))){
                    $row[] = tanggal($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                } else {
                    $row[] = tgbulan($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                }
            }
            // $row[] = tanggal_indonesia($data->tgl_mulai);
            // $row[] = tanggal_indonesia($data->tgl_selesai);
            $row[] = $data->nm_pumk;
            $row[] = $data->catat_pumk;
            if (!empty($data->tgl_dispo) && empty($data->tgl_proses) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && empty($data->tgl_ok) && empty($data->tgl_lpj)   ) {
                $row[] = 
                '<span class="badge badge-danger">Belum Proses</span>';
            }  elseif (!empty($data->tgl_dispo) && !empty($data->tgl_proses) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && empty($data->tgl_ok) && empty($data->tgl_lpj)   ) {
                    $row[] = 
                '<span class="badge badge-secondary">Konfirmasi BPP</span>';
            }  elseif (!empty($data->tgl_dispo) && empty($data->tgl_proses) && empty($data->tgl_rev1) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && !empty($data->tgl_ok) && empty($data->tgl_lpj)   ) {
                $row[] = 
                '<span class="badge badge-primary">UMK diproses</span>';
            }  elseif (!empty($data->tgl_dispo) && !empty($data->tgl_proses) && !empty($data->tgl_rev1) && empty($data->tgl_terima_rev1) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && empty($data->tgl_ok) && empty($data->tgl_lpj)   ) {
                $row[] = 
                '<span class="badge badge-warning">Revisi</span>';
            }  elseif (!empty($data->tgl_dispo) && !empty($data->tgl_proses) && (!empty($data->tgl_rev1) || empty($data->tgl_rev1))&& (!empty($data->tgl_terima_rev1)||empty($data->tgl_terima_rev1)) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && !empty($data->tgl_ok) && empty($data->tgl_lpj)&& empty($data->tgl_umk)   ) {
                $row[] = 
                '<span class="badge badge-primary">Tunggu UMK</span>';
            }  elseif (!empty($data->tgl_dispo) && !empty($data->tgl_proses) && (!empty($data->tgl_rev1) || empty($data->tgl_rev1))&& (!empty($data->tgl_terima_rev1)||empty($data->tgl_terima_rev1)) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && !empty($data->tgl_ok) && empty($data->tgl_lpj) && !empty($data->tgl_umk)  ) {
                $row[] = 
                '<span class="badge badge-primary">Proses LPJ</span>';
            } else {

                $row[] = '<p><span class="badge badge-success">Selesai</span>';
               
            }
            // add html for action
            if($this->session->userdata('level')==1){
                if ($data->dok_aju==null){
                    $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-primary btn-xs">Eksekusi</a>
                          ';
    
                } else {
                    $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-success btn-xs">Lihat</a>
                            ';
    
                }
            } else {
                if ($data->dok_aju==null){
                    $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-primary btn-xs">Eksekusi</a>';
    
                } else {
                    $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-success btn-xs">Lihat</a>';
    
                }
            }
            
            // add html for dokumen
            if ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4!=null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4==null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4==null) {
            $row[] = '  <div class="btn-group">
                        <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null) {
                $row[] = '  <div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
                    } else {
                $row[] = '  <div class="btn-group">
                            <a href=# class="btn btn-secondary btn-xs disabled">UND</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            }

            // add html for bukti
            if ($data->dok_aju!=null){
                $row[] = 
                '<a href="' .base_url('uploads/pumk/' .$data->k_subs.'/'.$data->dok_aju). '" class="btn btn-primary btn-xs">Bukti</a>';
            } else {
                $row[] = 
                '<a href=# class="btn btn-secondary btn-xs disabled">Bukti</a>';
            }
            $datas[] = $row;
        }
    } else {
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = 
            '<a id="inform" href="#" class="text-dark font-weight-bold text-sm" data-toggle="modal" data-target="#modal_lengkap" 
            data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . tanggal_indonesia($data->tgl_mulai) . '" data-tgl_selesai="' . tanggal_indonesia($data->tgl_selesai) . '" data-lokasi="' . $data->lokasi . '" data-nm_pumk="' . $data->nm_pumk . '" data-tgl_dispo="'.tanggal_indonesia($data->tgl_dispo).'" data-kd_anggaran="' . $data->kd_anggaran . '" data-sis_byr="' . $data->sis_byr . '" data-sis_byr_hr="' . $data->sis_byr_hr . '" data-sis_byr_akom="' . $data->sis_byr_akom . '" data-catat_pumk="' . $data->catat_pumk . '" data-nota_pumk="' . $data->nota_pumk . '"data-no_undangan="'.$data->no_undangan.'"
            >'.$no .'.</a>';
            if ($data->tgl_dispo!=null){
                $row[] = date("d-m-Y H:i",strtotime($data->tgl_dispo));
            } else {
                $row[] = "-";
            };
            $row[] = $data->k_subs;
            $row[] = $data->nm_keg;
            if ($data->tgl_selesai == $data->tgl_mulai){
                $row[] = tanggal_indonesia($data->tgl_mulai);
            } else {
                if (date('M',strtotime($data->tgl_mulai))==date('M',strtotime($data->tgl_selesai))){
                    $row[] = tanggal($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                } else {
                    $row[] = tgbulan($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                }
            }
            // $row[] = tanggal_indonesia($data->tgl_selesai);
            $row[] = $data->nm_bpp;
            $row[] = $data->sis_byr_akom;
            $row[] = tanggal_indonesia($data->tgl_proses_akom);
            $row[] = tanggal_indonesia($data->tgl_selesaiproses_akom);
            $row[] = $data->kd_anggaran;
            $row[] = $data->akun_ak;
            $row[] = 'Rp.'.number_format($data->nilai_ak,2,',','.');
            //status
            if (empty($data->tgl_proses_akom)&&empty($data->tgl_selesaiproses_akom)) {
                $row[] = 
                '<span class="badge badge-danger">Belum Proses</span>';
            } elseif(!empty($data->tgl_proses_akom)&&empty($data->tgl_selesaiproses_akom)) {
                $row[] = 
                '<span class="badge badge-warning">Sedang Proses</span>';
            } else {
                $row[] = '<p><span class="badge badge-success">Selesai</span>';   
            }
            // add html for action
            if ($data->nm_pumk_akom!=null && empty($data->tgl_selesaiproses_akom)){
                $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-primary btn-xs">Eksekusi</a>';

            } else {
                $row[]= '<a href=# class="btn btn-secondary  btn-xs disabled">Eksekusi</a>';
            }
            // add html for dokumen
            if ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4!=null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4==null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4==null) {
            $row[] = '  <div class="btn-group">
                        <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null) {
                $row[] = '  <div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
                    } else {
                $row[] = '  <div class="btn-group">
                            <a href=# class="btn btn-secondary btn-xs disabled">UND</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            }
            // add html for bukti
            $datas[] = $row;
        }
    }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_pumk_m->count_all(),
            "recordsFiltered" => $this->proses_pumk_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }

    public function data_akom()
    {
        $list = $this->proses_pumk_m->get_datatables_akom();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no .'.';
            if ($data->tgl_dispo!=null){
                $row[] = 
                '<a id="inform" href="#" class="text-primary font-weight-bold text-sm" data-toggle="modal" data-target="#modal_lengkap" 
                data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . tanggal_indonesia($data->tgl_mulai) . '" data-tgl_selesai="' . tanggal_indonesia($data->tgl_selesai) . '" data-lokasi="' . $data->lokasi . '" data-nm_pumk="' . $data->nm_pumk . '" data-tgl_dispo="'.tanggal_indonesia($data->tgl_dispo).'" data-kd_anggaran="' . $data->kd_anggaran . '" data-sis_byr="' . $data->sis_byr . '" data-sis_byr_hr="' . $data->sis_byr_hr . '" data-sis_byr_akom="' . $data->sis_byr_akom . '" data-catat_pumk="' . $data->catat_pumk . '" data-nota_pumk="' . $data->nota_pumk . '"data-no_undangan="'.$data->no_undangan.'"
                data-id_proses ="'.$data->id_proses. '">'
                .date("d-m-Y H:i",strtotime($data->tgl_dispo)).'<br>'.$data->no_undangan.'</a>';
            } else {
                $row[] = "-";
            };
            $row[] = $data->k_subs;
            $row[] = $data->nm_keg;
            if ($data->tgl_selesai == $data->tgl_mulai){
                $row[] = tanggal_indonesia($data->tgl_mulai);
            } else {
                if (date('M',strtotime($data->tgl_mulai))==date('M',strtotime($data->tgl_selesai))){
                    $row[] = tanggal($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                } else {
                    $row[] = tgbulan($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                }
            }
            // $row[] = tanggal_indonesia($data->tgl_selesai);
            $row[] = $data->nm_bpp;
            $row[] = $data->sis_byr_akom;
            $row[] = tanggal_indonesia($data->tgl_proses_akom);
            $row[] = tanggal_indonesia($data->tgl_selesaiproses_akom);
            $row[] = $data->kd_anggaran;
            $row[] = $data->akun_ak;
            $row[] = 'Rp.'.number_format($data->nilai_ak,2,',','.');
            //status
            if (empty($data->tgl_proses_akom)&&empty($data->tgl_selesaiproses_akom)) {
                $row[] = 
                '<span class="badge badge-danger">Belum Proses</span>';
            } elseif(!empty($data->tgl_proses_akom)&&empty($data->tgl_selesaiproses_akom)) {
                $row[] = 
                '<span class="badge badge-warning">Sedang Proses</span>';
            } else {
                $row[] = '<p><span class="badge badge-success">Selesai</span>';   
            }
            // add html for action
            if ($data->nm_pumk_akom!=null && empty($data->tgl_selesaiproses_akom)){
                $row[]= '<a href="' .site_url('proses_pumk/update/' . $data->id_keg). '" class="btn btn-primary btn-xs">Eksekusi</a>';

            } else {
                $row[]= '<a href=# class="btn btn-secondary  btn-xs disabled">Eksekusi</a>';
            }
            // add html for dokumen
            if ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4!=null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4==null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4==null) {
            $row[] = '  <div class="btn-group">
                        <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null) {
                $row[] = '  <div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
                    } else {
                $row[] = '  <div class="btn-group">
                            <a href=# class="btn btn-secondary btn-xs disabled">UND</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            }
            // add html for bukti
            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_pumk_m->count_all(),
            "recordsFiltered" => $this->proses_pumk_m->count_filtered(),
            "data" => $datas,
        );
        echo json_encode($output);
    }
}
