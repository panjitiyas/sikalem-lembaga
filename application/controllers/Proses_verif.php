<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_verif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['proses_verif_m', 'bpp_m','pumk_m','sisbayar_m','dipa_m']);
        $this->load->helper('security');
        date_default_timezone_set("Asia/Jakarta");  
        setlocale(LC_ALL, 'id_ID');
    }
    public function index()
	{
        if ($this->fungsi->user_login()->level!=6){
            $data['row'] = $this->proses_verif_m->get();
            $this->template->load('template', 'verif/proses_verif_data', $data);
        }else{
            $data['row'] = $this->proses_verif_m->get_bpp();
            $this->template->load('template', 'verif/proses_verif_data', $data);
        }
    }
  public function tolak ()
  {
        if ($_POST['tolak'] == 1) {
            if (empty($_POST['catat_subs'])) {
                $this->form_validation->set_message('tolak', 'Mohon isi Alasan Penolakan di %s');
                return FALSE;
            } else {
                return TRUE;
            }
        } elseif($_POST['tolak']==2){
            if (empty($_POST['catat_subs'])) {
                $this->form_validation->set_message('tolak', 'Mohon isi Alasan Revisi di %s');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
  }
//   public function revisi ()
//   {
//         if ($_POST['tolak'] == 2) {
//             if (empty($_POST['catat_subs'])) {
//                 $this->form_validation->set_message('revisi', 'Mohon isi Alasan Revisi di %s');
//                 return FALSE;
//             } else {
//                 return TRUE;
//             }
//         } 
//   }
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        // echo '<pre>';
        // echo print_r($post);
        $validasi = array(
            array('field' => 'catat_subs', 'label' => 'Catatan Substansi', 'rules' => 'callback_tolak'),
        );
        $this->form_validation->set_rules($validasi);
        if ($this->form_validation->run($this) == FALSE) {
            // echo validation_errors();
            $this->update($post['id']);
        } else {
            // echo '<pre>';
            // echo print_r($post);
            $this->proses_verif_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses', 'data berhasil disimpan');
            };
            redirect('proses_verif');
        }
        }
    

    public function update($id)
    {
        $query =$this->proses_verif_m->get($id);
        $subs = $this->fungsi->user_login()->subs;
        if($query->num_rows() > 0) {
            $data_bpp= $query->row();
            $query_bpp = $this->bpp_m->get();
            if ($this->fungsi->user_login()->level==1 || $this->fungsi->user_login()->level==2){
                $query_pumk = $this->pumk_m->get_admin();
            } else {
                $query_pumk = $this->pumk_m->get();   
            };
            $anggar=$this->dipa_m->get();
            // $query_pumk = $this->pumk_m->get();
            $query_byr = $this->sisbayar_m->get();
            $data = array (
                'row' => $data_bpp,
                'verif' => $query_bpp,
                'pumk'=>$query_pumk,
                'bayar'=>$query_byr,
                'dipa'=>$anggar
            );
            $this->template->load('template','verif/proses_verif_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_verif');
        }
    }


    public function terima_umk($id)
    {
        
        $query =$this->proses_verif_m->get($id);
        if($query->num_rows() > 0) {
            $data_bpp= $query->row();
            $data = array (
                'row' => $data_bpp,
            );
        $this->template->load('template','verif/umk_form', $data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_verif');
        }
    }

    public function kuitansi_umk($id)
    {
        
        $query =$this->proses_verif_m->get($id);
        $data_bpp= $query->row();
        $data = array (
            'row' => $data_bpp,
        );
        $this->load->view('verif/kwitansi', $data);

    }

    public function proses_umk()
    {
        $post = $this->input->post(null, TRUE);
        $this->proses_verif_m->proses_umk($post);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil disimpan');
        }
        // redirect('proses_verif');
       redirect('proses_verif/kuitansi_umk/'.$post['id']);
    }

    public function del($id)
    {
        $this->proses_verif_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
        } 
        redirect('proses_verif');

    }
    // public function lama_lpj()
    // {
    //     if (isset($_POST['tgl_awal'])){
            
    //         $tgl_awal = $_POST['tgl_awal'];
    //         $tgl_akhir = $_POST['tgl_akhir'];
    //         $data = lama_lpj($tgl_awal,$tgl_akhir);
    //         echo $data;
    //     }
    // }
    function get_ajax()
    {
        $list = $this->proses_verif_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $nilai_pd=$data->nilai_pd1+$data->nilai_pd2+$data->nilai_pd3;
            $row = array();
            $row[] = 
            '<a id="cek" href="#" class="text-danger text-sm" data-toggle="modal" data-target="#modal_cek" 
            data-tgl_terima="' . date("d-m-Y H:i",strtotime($data->tgl_terima)) . '" data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . tanggal_indonesia($data->tgl_mulai) . '" data-tgl_selesai="' . tanggal_indonesia($data->tgl_selesai) . '" data-lokasi="' . $data->lokasi . '" data-nm_pumk="' . $data->nm_pumk . '" data-nm_pumk_akom="' . $data->nm_pumk_akom . '" data-tgl_proses="' . tanggal_indonesia($data->tgl_proses) . '" data-tgl_lpj="' . tanggal_indonesia($data->tgl_lpj) . '" data-nilai_lpj="Rp.'.number_format($data->nilai_lpj, 2, ',', '.').'" data-dok_aju="' . $data->dok_aju . '" data-no_undangan="'.$data->no_undangan.'" data-nm_bpp="'.$data->nm_bpp.'" data-tgl_rev1="'.tanggal_indonesia($data->tgl_rev1).'" data-tgl_rev2="'.tanggal_indonesia($data->tgl_rev2).'" data-tgl_rev3="'.tanggal_indonesia($data->tgl_rev3).'" data-tgl_terima_rev1="'.tanggal_indonesia($data->tgl_terima_rev1).'" data-tgl_terima_rev2="'.tanggal_indonesia($data->tgl_terima_rev2).'" data-tgl_terima_rev3="'.tanggal_indonesia($data->tgl_terima_rev3).'" data-tgl_dispo="'.tanggal_indonesia($data->tgl_dispo).'" data-tgl_ok="'.tanggal_indonesia($data->tgl_ok).'" data-tgl_proses_akom="'.tanggal_indonesia($data->tgl_proses_akom).'" data-tgl_selesaiproses_akom="'.tanggal_indonesia($data->tgl_selesaiproses_akom).'"
            data-dokaju="' . $data->dokaju . '" data-dokaju2="' . $data->dokaju2 . '" data-dokaju3="' . $data->dokaju3 . '" data-dokaju4="' . $data->dokaju4 . '" data-kd_anggaran="' . $data->kd_anggaran . '" data-sis_byr="' . $data->sis_byr . '" data-sis_byr_hr="' . $data->sis_byr_hr . '" data-sis_byr_akom="' . $data->sis_byr_akom . '" data-catat_subs="' . $data->catat_subs . '" data-catat_pumk="' . $data->catat_pumk . '" data-nota_pumk="' . $data->nota_pumk . '"  data-tgl_umk="'.tanggal_indonesia($data->tgl_umk).'" data-nilai_umk="Rp.'.number_format($data->nilai_umk, 2, ',', '.').'" data-nilai_pd="Rp.'.number_format($nilai_pd,2,',','.').'" data-nilai_hr="Rp.'.number_format($data->nilai_hr, 2, ',', '.').'" data-nilai_ak="Rp.'.number_format($data->nilai_ak, 2, ',', '.').'" data-akun_ak="' . $data->akun_ak . '"
            ><i class="fas fa-plus-circle"></i></a>'
            ;
            $row[] = $no . ".";
            $row[] = date('d-m-Y H:i',strtotime($data->tgl_terima)). '<br>'.$data->no_undangan;
            // $row[] = $data->no_undangan;
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
            // $row[] = tanggal_indonesia($data->tgl_mulai);
            // $row[] = tanggal_indonesia($data->tgl_selesai);
            // $row[] = $data->kd_anggaran;
            $row[] = $data->nm_pumk;
            // $row[] = $data->sis_byr;
            // $row[] = $data->sis_byr_hr;
            // $row[] = $data->sis_byr_akom;
            // $row[] = tanggal_indonesia($data->tgl_proses);
            // $row[] = tanggal_indonesia($data->tgl_umk);
            // $row[] = 'Rp. '.number_format($data->nilai_umk,0, ',', '.');
            // $row[] = tanggal_indonesia($data->tgl_lpj);
            // $row[] = tanggal_indonesia($data->tgl_proses_akom);
            // $row[] = tanggal_indonesia($data->tgl_selesaiproses_akom);
            // add html for status
            if (empty(empty($data->tgl_umk) && $data->tgl_proses) && empty($data->tgl_ok) && empty($data->tgl_dispo) && empty($data->tgl_lpj) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && empty($data->tgl_rev3)
            && empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev2) && empty($data->tgl_terima_rev3)&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-danger">Belum Proses</span>';
            } elseif (empty($data->tgl_umk) && empty($data->tgl_proses) && empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && (!empty($data->tgl_rev3) ||empty($data->tgl_rev3))
            && empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev2) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-secondary">Disposisi PUMK</span>';
            } elseif (empty($data->tgl_umk) && !empty($data->tgl_proses) && empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && (!empty($data->tgl_rev3) ||empty($data->tgl_rev3))
            && empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev2) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-info">Pengajuan UMK</span>';
            } elseif (empty($data->tgl_umk) && empty($data->tgl_proses) && empty($data->tgl_ok) && empty($data->tgl_dispo) && empty($data->tgl_lpj) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && !empty($data->tgl_rev3) && $data->tolak!="1"
            && empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev2) && empty($data->tgl_terima_rev3)&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-warning">Revisi Substansi</span>';
            } elseif (empty($data->tgl_umk) && empty($data->tgl_proses) && empty($data->tgl_ok) && empty($data->tgl_dispo) && empty($data->tgl_lpj) && empty($data->tgl_rev1) && empty($data->tgl_rev2) && !empty($data->tgl_rev3) 
            && empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev2) && empty($data->tgl_terima_rev3)&& $data->tolak=="1") {
                $row[] = '<span class="badge badge-danger">Tolak</span>';
            } elseif (empty($data->tgl_umk) && !empty($data->tgl_proses) && empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && !empty($data->tgl_rev1) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && (empty($data->tgl_rev3) || !empty($data->tgl_rev3))
            && empty($data->tgl_terima_rev1) && (!empty($data->tgl_terima_rev2) || empty($data->tgl_terima_rev2)) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-warning">Revisi PUMK</span>';
            } elseif (empty($data->tgl_umk) && !empty($data->tgl_proses) && !empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && (!!empty($data->tgl_rev1) && empty($data->tgl_rev1)) && (!empty($data->tgl_rev2) && empty($data->tgl_rev2)) && (empty($data->tgl_rev3) && !empty($data->tgl_rev3))
            && (!empty($data->tgl_terima_rev1) && empty($data->tgl_terima_rev1)) && (!empty($data->tgl_terima_rev2) && empty($data->tgl_terima_rev2)) && (!empty($data->tgl_terima_rev3) && empty($data->tgl_terima_rev3))&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-primary">BPP Proses</span>';
            } elseif (empty($data->tgl_umk) && !empty($data->tgl_proses) && empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && !empty($data->tgl_rev1) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && (empty($data->tgl_rev3) || !empty($data->tgl_rev3))
            && !empty($data->tgl_terima_rev1) && (!empty($data->tgl_terima_rev2) || empty($data->tgl_terima_rev2)) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))&& $data->tolak!="1") {
                $row[] = '<span class="badge badge-warning">Masih Revisi</span>';
            } elseif (empty($data->tgl_umk) && $data->tgl_umk ==null &&!empty($data->tgl_proses) && !empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && (!empty($data->tgl_rev1)||empty($data->tgl_rev1)) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && (empty($data->tgl_rev3) || !empty($data->tgl_rev3))&& $data->tolak!="1"
            && (empty($data->tgl_terima_rev1)||!empty($data->tgl_terima_rev1)) && (!empty($data->tgl_terima_rev2) || empty($data->tgl_terima_rev2)) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))) {
                $row[] = '<span class="badge badge-dark">Menunggu UMK</span>';
            } elseif (!empty($data->tgl_umk) &&$data->tgl_umk !=null && !empty($data->tgl_proses) && !empty($data->tgl_ok) && !empty($data->tgl_dispo) && empty($data->tgl_lpj) && (!empty($data->tgl_rev1)||empty($data->tgl_rev1)) && (!empty($data->tgl_rev2) || empty($data->tgl_rev2)) && (empty($data->tgl_rev3) || !empty($data->tgl_rev3))&& $data->tolak!="1"
            && (empty($data->tgl_terima_rev1)||!empty($data->tgl_terima_rev1)) && (!empty($data->tgl_terima_rev2) || empty($data->tgl_terima_rev2)) && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3))) {
                $row[] = '<span class="badge badge-primary">Menunggu LPJ</span>';
            } else {
                if (empty($data->tgl_proses_akom)&&!empty($data->nm_pumk_akom)&&empty($data->tgl_selesaiproses_akom)){
                    $row[] = '<span class="badge badge-success">Selesai</span>
                              <span class="badge badge-danger text-center">Akom Belum Proses</span>';
                } elseif (!empty($data->tgl_proses_akom)&&!empty($data->nm_pumk_akom)&&empty($data->tgl_selesaiproses_akom)) {
                    $row[] = '<span class="badge badge-success">Selesai</span>
                              <span class="badge badge-danger text-center">Akom Belum LPJ</span>';
                } else {
                    $row[] = '<span class="badge badge-success">Selesai</span>';
                }
                
            };
            // add html for action
            if (empty($data->tgl_ok) && empty($data->tgl_umk) && $data->tolak!="1"){
                $row[]= '<a href="' .site_url('proses_verif/update/' . $data->id_keg). '" class="btn btn-primary btn-xs">Eksekusi</a>';
            } elseif (!empty($data->tgl_ok) && empty($data->tgl_umk) && $data->tolak!="1") {
                $row[]= '<a id="umk" href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_umk" data-id="'.$data->id_bppem.'" data-nm_keg="'.$data->nm_keg.'" data-k_subs="'.$data->k_subs.'" data-tgl_mulai="'.tanggal_indonesia($data->tgl_mulai).'" data-tgl_selesai="'.tanggal_indonesia($data->tgl_selesai).'" data-nm_pumk="'.$data->nm_pumk.'"
                data-tgl_umk="'.tanggal_indonesia($data->tgl_umk).'" data-nilai_pumk="Rp.'.number_format($data->nilai_umk, 2, ',', '.').'" >Input UMK</a>';
            } elseif (!empty($data->tgl_ok) && !empty($data->tgl_umk) && $data->tolak!="1") {
                $row[]= '<a target="_blank" href="'.site_url('proses_verif/kuitansi_umk/'. $data->id_bppem).'" class="btn btn-success btn-xs">KW UMK</a>';
            }else{
                $row[]= '<a  href="#" class="btn btn-secondary btn-xs disabled">Eksekusi</a>';
            }

            // add html for dokumen
            if ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4!=null) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                         </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4==null ) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4==null ) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null ) {
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
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
                $row[] = '<div class="btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null) {
                $row[] = '<div class-"btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                        </div>';
            } else {
                $row[] = '<div class-"btn-group">
                            <a href=# class="btn btn-secondary btn-xs disabled">UND</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                         </div>';
            }
            // add html for bukti
            if ($data->dok_aju!=null){
                $row[]='<a href="' .base_url('uploads/pumk/' .$data->k_subs.'/'.$data->dok_aju). '" class="btn btn-success btn-xs"> Bukti</a>';
            }else{
                $row[]='<a href=# class="btn btn-secondary btn-xs disabled"> Bukti</a>';
            }
            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_verif_m->count_all(),
            "recordsFiltered" => $this->proses_verif_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
