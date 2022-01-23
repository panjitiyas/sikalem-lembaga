<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_tu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->helper('date');
        $this->load->model(['proses_tu_m','ksubs_m','pumk_m','proses_spp_m','bpp_m','proses_pumk_m','calendar_model']); 
        date_default_timezone_set("Asia/Jakarta");
        
    }
    public function index()
	{
        
        $data = array(
            
            'row' => $this->proses_tu_m->get(),
            'rows'=> $this->proses_spp_m->get(),
            
        );
        $this->template->load('template', 'tu/proses_tu_data', $data);
        ;
    }
    public function tambah()
    {
        $data_keg = new stdClass();
        $data_keg->id_keg = "";
        $data_keg->tgl_terima = date('d-m-Y H:i');
        
        if ($this->session->userdata('level') == 2 or $this->session->userdata('level') == 1){
            $data_keg->k_subs = "";
        } else {
            $subs=$this->proses_tu_m->get_subs();
            $data_keg->k_subs = $subs->nm_ksub;
        }
        $data_keg->nm_keg= "";
        $data_keg->tgl_mulai= "";
        $data_keg->tgl_selesai= "";
        $data_keg->lokasi= "";
        $bpp=$this->proses_tu_m->get_bpp();
        $data_keg->nm_bpp= $bpp->nm_bpp;
        $data_keg->dokaju= "";
        $data_keg->dokaju2= "";
        $data_keg->dokaju3= "";
        $data_keg->dokaju4= "";
        $query_tu = $this->proses_tu_m->get();
        $query_rekap = $this->proses_tu_m->non_user();
        $substansi = $this->ksubs_m->get();
        $query_bpp =$this->bpp_m->get();

        $data = array (
            'page' => 'tambah',
            'row' => $data_keg,
            'keg'=>$query_tu,
            'bpp' => $query_bpp,
            'nm_ksubs'=> $this->ksubs_m->get(),
            'rkp'=>$query_rekap
        );
        $this->template->load('template','tu/proses_tu_form',$data);
        // echo "<pre>";
        // echo print_r ($data['nm_ksubs']->result());
    } 
   
    function cektanggal() {
        $tglmulai= strtotime($_POST['tgl_mulai']);
        $tglakhir = strtotime($_POST['tgl_selesai']);
      
        if ($tglakhir >= $tglmulai){
          return True;
        } else {
          $this->form_validation->set_message('cektanggal', '%s harus lebih besar dari tanggal mulai kegiatan.');
          return False;
        }
      }
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        $tglselesai =date('d-m-Y',strtotime($post['tgl_selesai']));
        $tglterima=date('d-m-Y',strtotime($post['tgl_terima']));
        if(isset($_POST['tambah'])) {
            $validation = array(
                // array('field' => 'tgl_mulai', 'label' => 'tanggal mulai', 'rules' => 'required|callback_cektanggal'),
                array('field' => 'tgl_akhir', 'label' => '&times Tanggal selesai kegiatan', 'rules' => 'callback_cektanggal'),
              );
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_rules('no_undangan','nomor undangan','required|is_unique[tb_ptu.no_undangan]',
            array(
                'required'=>'&times %s wajib diisi',
                'is_unique'=>'&times Kegiatan sudah pernah diajukan, cek undangan'
            ));
            $this->form_validation->set_rules('tgl_selesai','tanggal selesai','required');

            if ($_FILES['dokaju_1']['name']==null){
            $this->form_validation->set_rules('dokaju_1','undangan','required');
            }
            if ($_FILES['dokaju_2']['name']==null){
            $this->form_validation->set_rules('dokaju_2','surat tugas','required');
            }
            if ($_FILES['dokaju_3']['name']==null){
                if ($tglselesai < $tglterima){
                $this->form_validation->set_rules('dokaju_3','absen','required');
                }
            };
            if ($_FILES['dokaju_4']['name']==null){
                if ($tglselesai < $tglterima){
                $this->form_validation->set_rules('dokaju_4','notulasi','required');
                }
            };
            $this->form_validation->set_message('required','&times Dokumen %s wajib dilampirkan');
            // $this->form_validation->set_message('is_unique','&times Kegiatan sudah pernah diajukan, cek undangan');
            if ($this->form_validation->run()==FALSE){
            //    echo '<pre>';
            //     echo print_r($tglselesai);
            //     echo print_r($tglterima);
              $this->tambah();
            } else {
            $config['upload_path']          = './uploads/dok/'.$post['k_subs'].'/';
            $config['max_size']             = 10240;
            if (!is_dir('./uploads/dok/'.$post['k_subs'].'/')) {
                mkdir('./uploads/dok/'.$post['k_subs'].'/', 0777, TRUE);     
            }
            if (@$_FILES['dokaju_1']['name'] !=null){
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = $post['k_subs'].'_UND_'.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai']));
               
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('dokaju_1')){
                        $error              = $this->upload->display_errors();
                        $this->session->set_flashdata('gagal',$error);
                        redirect('proses_tu/tambah');

                    } else {
                        $post['dokaju_1']   = $this->upload->data('file_name');
                    }
                } else {
                    $post['dokaju_1']       = null;
                }
            if (@$_FILES['dokaju_2']['name'] !=null){
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = $post['k_subs'].'_ST_'.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai']));
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('dokaju_2')){
                        $error              = $this->upload->display_errors();
                        $this->session->set_flashdata('gagal',$error);
                        redirect('proses_tu/tambah');

                    } else {
                        $post['dokaju_2']   = $this->upload->data('file_name');
                    }
                } else {
                    $post['dokaju_2']       = null;
                }
            if (@$_FILES['dokaju_3']['name'] !=null){
                $config['allowed_types']        = 'pdf|xls|xlsx|rar|zip';
                $config['file_name']            = $post['k_subs'].'_ABS_'.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai']));
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('dokaju_3')){
                        $error              = $this->upload->display_errors();
                        $this->session->set_flashdata('gagal',$error);
                        redirect('proses_tu/tambah');

                    } else {
                        $post['dokaju_3']   = $this->upload->data('file_name');
                    }
                } else {
                    $post['dokaju_3']       = null;
                }
            if (@$_FILES['dokaju_4']['name'] !=null){
                $config['allowed_types']        = 'doc|docx|pdf';
                $config['file_name']            = $post['k_subs'].'_NOT_'.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai']));
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('dokaju_4')){
                        $error              = $this->upload->display_errors();
                        $this->session->set_flashdata('gagal',$error);
                        redirect('proses_tu/tambah');

                    } else {
                        $post['dokaju_4']   = $this->upload->data('file_name');
                    }
                } else {
                    $post['dokaju_4']       = null;
                }
                $this->proses_tu_m->tambah($post);
                $this->calendar_model->tambah_keg_subs($post);
                if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('proses_tu');
                // echo '<pre>';
                // echo print_r($post); 
            }   
                
        } else if (isset($_POST['ubah'])) {
            $db = $this->proses_tu_m->get($post['id'])->row();
            $validation = array(
                // array('field' => 'tgl_mulai', 'label' => 'tanggal mulai', 'rules' => 'required|callback_cektanggal'),
                array('field' => 'tgl_akhir', 'label' => '&times Tanggal selesai kegiatan', 'rules' => 'callback_cektanggal'),
              );
            $this->form_validation->set_rules($validation);
            if ($post['no_undangan']!=$db->no_undangan){
                $this->form_validation->set_rules('no_undangan','nomor undangan','required|is_unique[tb_ptu.no_undangan]',
                array(
                    'required'=>'&times %s wajib diisi',
                    'is_unique'=>'&times Kegiatan sudah pernah diajukan, cek undangan'
                )
                );
            }
            $this->form_validation->set_rules('tgl_selesai','tanggal selesai','required');
            if (EMPTY($_FILES['dokaju_3']['name'])&& EMPTY($db->dokaju3)){
                if ($tglselesai< date('d-m-Y',strtotime($db->tgl_terima))){
                $this->form_validation->set_rules('dokaju_3','absen','required');
                };
            };
            if (EMPTY($_FILES['dokaju_4']['name']) && EMPTY($db->dokaju4)){
                if ($tglselesai <  date('d-m-Y',strtotime($db->tgl_terima))){
                $this->form_validation->set_rules('dokaju_4','notulasi','required');
                };
            };
            $this->form_validation->set_message('required','&times Dokumen %s wajib dilampirkan');
            if ($this->form_validation->run()==FALSE){
            //   $this->ubah($post['id']);
              echo 'gak berhasil';
            } else {
                $config['upload_path']          = './uploads/dok/'.$post['k_subs'].'/';
                $config['max_size']             = 10240;
                if (!is_dir('./uploads/dok/'.$post['k_subs'].'/')) {
                    mkdir('./uploads/dok/'.$post['k_subs'].'/', 0777, TRUE);     
                }
                if (@$_FILES['dokaju_1']['name'] !=null){
                    $jendok='_UND_'; 
                    $dok=$db->dokaju;  
                    $file2            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev1';
                    $file3            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev2';
                    $config['allowed_types']        = 'doc|docx|pdf';  
                    if (strpos($dok,"Rev1")==null) {
                            $config['file_name'] = $file2;
                        } else {
                            $config['file_name'] = $file3;
                        }
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('dokaju_1')){
                            $error              = $this->upload->display_errors();
                            // echo $error;
                            $this->session->set_flashdata('gagal',$error);
                            redirect('proses_tu/ubah/'.$db->id_keg);
                        } else {
                            $post['dokaju_1']   = $this->upload->data('file_name');
                        }
                    } else {
                        $post['dokaju_1']       = null;
                    }
    
                    if (@$_FILES['dokaju_2']['name'] !=null){
                        $jendok='_ST_'; 
                        $dok=$db->dokaju2;  
                        $file2            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev1';
                        $file3            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev2';
                        $config['allowed_types']        = 'doc|docx|pdf';  
                        if (strpos($dok,"Rev1")==null) {
                            $config['file_name'] = $file2;
                        } else {
                            $config['file_name'] = $file3;
                        }
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('dokaju_2')){
                            $error              = $this->upload->display_errors();
                            // echo $error;
                            $this->session->set_flashdata('gagal',$error);
                            redirect('proses_tu/ubah/'.$db->id_keg);
                        } else {
                            $post['dokaju_2']   = $this->upload->data('file_name');
                        }
                    } else {
                        $post['dokaju_2']       = null;
                    }
    
                    if (@$_FILES['dokaju_3']['name'] !=null){
                        $jendok='_ABS_'; 
                        $dok=$db->dokaju3; 
                        $file1            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])); 
                        $file2            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev1';
                        $file3            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev2';
                        $config['allowed_types']        = 'pdf|xls|xlsx';  
                        if (strpos($dok,"Rev1")==null && $dok!=null) {
                            $config['file_name'] = $file2;
                        } elseif (strpos($dok,"Rev1") && $dok!=null) {
                            $config['file_name'] = $file3;
                        } else {
                            $config['file_name'] = $file1;
                        }
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('dokaju_3')){
                            $error              = $this->upload->display_errors();
                            // echo $error;
                            $this->session->set_flashdata('gagal',$error);
                            redirect('proses_tu/ubah/'.$db->id_keg);
                        } else {
                            $post['dokaju_3']   = $this->upload->data('file_name');
                        }
                    } else {
                        $post['dokaju_3']       = null;
                    }
    
                    if (@$_FILES['dokaju_4']['name'] !=null){
                        $jendok='_NOT_'; 
                        $dok=$db->dokaju4;  
                        $file2            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev1';
                        $file3            = $post['k_subs'].$jendok.substr($post['nm_keg'],0,80,).'_'.date("dmY",strtotime($post['tgl_mulai'])).'_Rev2';
                        $config['allowed_types']        = 'doc|docx|pdf';  
                        if (strpos($dok,"Rev1")==null && $dok!=null) {
                            $config['file_name'] = $file2;
                        } elseif (strpos($dok,"Rev1") && $dok!=null) {
                            $config['file_name'] = $file3;
                        } else {
                            $config['file_name'] = $file1;
                        }
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('dokaju_4')){
                            $error              = $this->upload->display_errors();
                            $this->session->set_flashdata('gagal',$error);
                            redirect('proses_tu/ubah/'.$db->id_keg);
                        } else {
                            $post['dokaju_4']   = $this->upload->data('file_name');
                        }
                    } else {
                        $post['dokaju_4']       = null;
                    }
                    $this->calendar_model->update_keg_subs($post);
                    $this->proses_tu_m->ubah($post);
                    if($this->db->affected_rows()>0){
                        $this->session->set_flashdata('sukses','data berhasil disimpan');
                    }
                    // echo '<pre>';
                    // echo print_r ($post);
                    redirect('proses_tu');
                }
            }
        }  
    
    
    public function ubah($id)
    {
        $query =$this->proses_tu_m->get($id);
        if($query->num_rows() > 0) {
        $data_keg = $query->row();
        $query_tu = $this->proses_tu_m->get();
        $query_ksubs = $this->ksubs_m->get();
        $query_bpp =$this->bpp_m->get();
        $query_proses =$this->proses_pumk_m->get($id)->row();

        $data = array (
            'page' => 'ubah',
            'row' => $data_keg,
            'keg'=>$query_tu,
            'bpp' => $query_bpp,
            'nm_ksubs'=> $query_ksubs,
            'proses' => $query_proses
       
        );
        $this->template->load('template','tu/proses_tu_form',$data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('proses_tu');
        }
    }
   
    
    public function del($id)
    {
        $tu =$this->proses_tu_m->get($id)->row();
        if($tu->dokaju !=null) {
            $target_file = './uploads/dok/'.$tu->k_subs.'/' .$tu->dokaju;
            unlink($target_file);
        }
        if($tu->dokaju2 !=null) {
            $target_file = './uploads/dok/'.$tu->k_subs.'/' .$tu->dokaju2;
            unlink($target_file);
        }
        if($tu->dokaju3 !=null) {
            $target_file = './uploads/dok/'.$tu->k_subs.'/' .$tu->dokaju3;
            unlink($target_file);
        }
        if($tu->dokaju4 !=null) {
            $target_file = './uploads/dok/'.$tu->k_subs.'/' .$tu->dokaju4;
            unlink($target_file);
        }
        $this->proses_tu_m->del($id);
        $this->calendar_model->hapus_keg($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('proses_tu');

    }
    function get_ajax()
    {
        $list = $this->proses_tu_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = date("d-m-Y H:i",strtotime($data->tgl_terima)).'<br>'.$data->no_undangan;
            // $row[] = $data->k_subs;
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
            // $row[] = $data->tgl_selesai;
            $row[] = $data->lokasi;
            $row[] = $data->nm_bpp;
            $row[] = $data->catat_subs;
            // status
            if (!empty($data->tgl_dispo) &&  !empty($data->tgl_proses) && empty($data->tgl_lpj) && (!empty($data->tgl_rev3) ||empty($data->tgl_rev3))
                && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3)) && (!empty($data->tgl_ok) || empty($data->tgl_ok))){
                $row[] =
                '<span class="badge badge-primary">Proses</span>';
            } elseif (empty($data->tgl_dispo) && empty($data->tgl_proses) && empty($data->tgl_lpj) && !empty($data->tgl_rev3) && $data->tolak!="1"
                && empty($data->tgl_terima_rev3) && empty($data->tgl_ok)){
                $row[] =
                '<span class="badge badge-warning">Revisi</span>';
            } elseif (empty($data->tgl_dispo) && empty($data->tgl_proses) && empty($data->tgl_lpj) && !empty($data->tgl_rev3) && $data->tolak=="1"
            && empty($data->tgl_terima_rev3) && empty($data->tgl_ok)){
            $row[] =
            '<span class="badge badge-danger">Tolak</span>';
            } elseif (!empty($data->tgl_dispo) &&  !empty($data->tgl_proses) && !empty($data->tgl_lpj) && (!empty($data->tgl_rev3) || empty($data->tgl_rev3))
                && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3)) && !empty($data->tgl_ok)){
                $row[] =
                '<span class="badge badge-success">Selesai</span>';
            } elseif (!empty($data->tgl_dispo) &&  empty($data->tgl_proses) && empty($data->tgl_lpj) && (!empty($data->tgl_rev3) || empty($data->tgl_rev3))
            && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3)) && empty($data->tgl_ok)){
                $row[] =
                '<span class="badge badge-secondary">Diposisi PUMK</span>';
            } elseif (empty($data->tgl_dispo) &&  empty($data->tgl_proses) && empty($data->tgl_lpj) && (!empty($data->tgl_rev3) || empty($data->tgl_rev3))
            && (!empty($data->tgl_terima_rev3) || empty($data->tgl_terima_rev3)) && empty($data->tgl_ok)){
                $row[] =
                '<span class="badge badge-danger">Belum Proses</span>';
            }
            
            // add html for action
            if (empty($data->tgl_proses) && empty($data->tgl_lpj) && $data->dok_aju==null) {
                if($data->tolak=="1"){
                    $row[] = 
                    "<div class=\"btn-group\">
                    <a href='#' class=\"btn btn-secondary btn-xs disabled\">Ubah</a>
                    <a href='#'  class=\"btn btn-secondary btn-xs disabled\">Hapus</a>
                    <a href=# class=\"btn btn-secondary btn-xs disabled\">Bukti</a>
                    </div>"; 
                } else {
                    $row[] = 
                    "<div class=\"btn-group\">
                    <a href='" . site_url('proses_tu/ubah/' . $data->id_keg) . "' class=\"btn btn-info btn-xs\">Ubah</a>
                    <a href=\"#hapus\" onclick=\"$('#hapus #formHapus').attr('action','" . site_url('proses_tu/del/' . $data->id_keg) . "')\" data-toggle=\"modal\" class=\"btn btn-danger btn-xs\">Hapus</a>
                    <a href=# class=\"btn btn-secondary btn-xs disabled\">Bukti</a>
                    </div>";
                }

            } elseif ((!empty($data->tgl_lpj) || empty($data->tgl_lpj)) && !empty($data->tgl_proses) && $data->dok_aju!=null){
                if ($this->fungsi->user_login()->level==1 ||$this->fungsi->user_login()->level==2){
                    $row[] = 
                    "<div class=\"btn-group\">
                    <a href='" . site_url('proses_tu/ubah/' . $data->id_keg) . "' class=\"btn btn-info btn-xs\" >Ubah</a>
                    <a href=\"#hapus\" onclick=\"$('#hapus #formHapus').attr('action','" . site_url('proses_tu/del/' . $data->id_keg) . "')\" data-toggle=\"modal\" class=\"btn btn-danger btn-xs\">Hapus</a>
                    <a href='".base_url('uploads/pumk/' .$data->k_subs.'/'.$data->dok_aju). "' class=\"btn btn-success btn-xs\">Bukti</a>
                    </div>";
                }else{
                    $row[] = 
                            '<div class="btn-group">
                            <a href="' . site_url('proses_tu/ubah/' . $data->id_keg) . '" class="btn btn-info btn-xs" >Ubah</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">Hapus</a>
                            <a href="' .base_url('uploads/pumk/' .$data->k_subs.'/'.$data->dok_aju). '" class="btn btn-success btn-xs">Bukti</a>
                            </div>';
                }
                       
            } elseif ((!empty($data->tgl_lpj) || empty($data->tgl_lpj)) && !empty($data->tgl_proses) && $data->dok_aju==null){
                        $row[] = 
                        '<div class="btn-group">
                        <a href="' . site_url('proses_tu/ubah/' . $data->id_keg) . '" class="btn btn-info btn-xs" >Ubah</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">Hapus</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">Bukti</a>
                        </div>';                           
            }       
            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->proses_tu_m->count_all(),
            "recordsFiltered" => $this->proses_tu_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
