<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('rekap_m');  
        date_default_timezone_set("Asia/Jakarta");
        setlocale(LC_ALL, 'id_ID');
    }
    public function index()
	{
            $data['row'] = $this->rekap_m->get();
        $this->template->load('template', 'rekap/rekap_data', $data);
    }

    public function export_excel()
    {

        $data_excel = $this->rekap_m->get_excel()->result();
        $spreadsheet = new Spreadsheet;
        $spreadsheet    -> setActiveSheetIndex(0)
                        -> setCellValue('A1','No.')
                        -> setCellValue('B1','Waktu_Pengajuan')
                        -> setCellValue('C1','Kel_Substansi')
                        -> setCellValue('D1','Kegiatan')
                        -> setCellValue('E1','Tgl_Mulai')
                        -> setCellValue('F1','Tgl_Selesai')
                        -> setCellValue('G1','Lokasi')
                        -> setCellValue('H1','BPP')
                        -> setCellValue('I1','Catatan_Substansi')
                        -> setCellValue('J1','Tgl_Revisi_Substansi')
                        -> setCellValue('K1','Tgl_Terima_Revisi_Substansi')
                        -> setCellValue('L1','Tgl_Disposisi_PUMK')
                        -> setCellValue('M1','PUMK')
                        -> setCellValue('N1','Nilai Honorarium')
                        -> setCellValue('O1','Nilai Perjalanan 1')
                        -> setCellValue('P1','Nilai Perjalanan 2')
                        -> setCellValue('Q1','Nilai Perjalanan 3')
                        -> setCellValue('R1',' Akomodasi')
                        -> setCellValue('S1','Catatan_PUMK')
                        -> setCellValue('T1','Tgl_Revisi_PUMK1')
                        -> setCellValue('U1','Tgl_Terima_Revisi_PUMK1')
                        -> setCellValue('V1','Tgl_Revisi_PUMK2')
                        -> setCellValue('W1','Tgl_Terima_Revisi_PUMK2')
                        -> setCellValue('X1','Tgl_Proses_PUMK')
                        -> setCellValue('Y1','Tgl_Proses_BPP')
                        -> setCellValue('Z1','Tgl_LPJ')
                        -> setCellValue('AA1','Undangan')
                        -> setCellValue('AB1','Surat Tugas')
                        -> setCellValue('AC1','Absensi')
                        -> setCellValue('AD1','Notulasi')
                        -> setCellValue('AE1','Bukti Transfer');
                        // -> setCellValue('Y1','TU_5')
                        // -> setCellValue('Z1','Verifikator')
                        // -> setCellValue('AA1','Tgl_Terima_LPJ')
                        // -> setCellValue('AB1','Tgl_Selesai_Verifikasi')
                        // -> setCellValue('AC1','Tgl_Update_Verifikasi');
                        // -> setCellValue('AD1','Kelengkapan')
                        // -> setCellValue('AE1','Keterangan')
                        // -> setCellValue('AF1','Lama_Verifikasi')
                        // -> setCellValue('AG1','Operator_SPP')
                        // -> setCellValue('AH1','No_SPP')
                        // -> setCellValue('AI1','Tgl_SPP')
                        // -> setCellValue('AJ1','Nilai_SPP')
                        // -> setCellValue('AK1','Arsip GUP')
                        // -> setCellValue('AL1','Operator_SPM')
                        // -> setCellValue('AM1','No_SPM')
                        // -> setCellValue('AN1','Tgl_SPM')
                        // -> setCellValue('AO1','Nilai_SPM')
                        // -> setCellValue('AP1','No_SP2D')
                        // -> setCellValue('AQ1','Tgl_SP2D')
                        // -> setCellValue('AR1','Nilai_SP2D');
        $kolom =2;
        $no=1;
        
        foreach($data_excel as $data){
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$kolom,$no)
                ->setCellValue('B'.$kolom,date('d-m-Y H:i',strtotime($data->tgl_terima)))
                ->setCellValue('C'.$kolom, $data->k_subs)
                ->setCellValue('D'.$kolom, $data->nm_keg)
                ->setCellValue('E'.$kolom, date('d/m/Y',strtotime($data->tgl_mulai)))
                ->setCellValue('F'.$kolom, date('d/m/Y',strtotime($data->tgl_selesai)))
                ->setCellValue('G'.$kolom, $data->lokasi)
                ->setCellValue('H'.$kolom, $data->nm_bpp)
                ->setCellValue('I'.$kolom, $data->catat_subs)
                ->setCellValue('J'.$kolom, $data->tgl_rev3!=null ? date('d/m/Y H:i',strtotime($data->tgl_rev3)):"")
                ->setCellValue('K'.$kolom, $data->tgl_terima_rev3!=null ? date('d/m/Y H:i',strtotime($data->tgl_terima_rev3)):"")
                ->setCellValue('L'.$kolom, $data->tgl_dispo!=null ? date('d/m/Y H:i',strtotime($data->tgl_dispo )):"")
                ->setCellValue('S'.$kolom, $data->nm_pumk )
                ->setCellValue('S'.$kolom, $data->nilai_hr )
                ->setCellValue('S'.$kolom, $data->nilai_pd1 )
                ->setCellValue('S'.$kolom, $data->nilai_pd2)
                ->setCellValue('S'.$kolom, $data->nilai_pd3 )
                ->setCellValue('S'.$kolom, $data->nilai_ak )
                ->setCellValue('S'.$kolom, $data->catat_pumk )
                ->setCellValue('T'.$kolom, $data->tgl_rev1!=null?date('d/m/Y H:i',strtotime($data->tgl_rev1 )):"")
                ->setCellValue('U'.$kolom, $data->tgl_terima_rev1!=null?date('d/m/Y H:i',strtotime($data->tgl_terima_rev1)):"")
                ->setCellValue('V'.$kolom, $data->tgl_rev2!=null?date('d/m/Y H:i',strtotime($data->tgl_rev2 )):"")
                ->setCellValue('W'.$kolom, $data->tgl_terima_rev2!=null?date('d/m/Y H:i',strtotime($data->tgl_terima_rev2 )):"")
                ->setCellValue('X'.$kolom, $data->tgl_proses!=null?date('d/m/Y H:i',strtotime($data->tgl_proses)):"")
                ->setCellValue('Y'.$kolom, $data->tgl_ok!=null?date('d/m/Y H:i',strtotime($data->tgl_ok)):"")
                ->setCellValue('Z'.$kolom, $data->tgl_lpj!=null?date('d/m/Y H:i',strtotime($data->tgl_lpj)):"")
                ->setCellValue('AA'.$kolom, $data->dokaju == null ? " Belum Ada" : "Ada")
                ->setCellValue('AB'.$kolom, $data->dokaju2==null ? "Belum Ada" : "Ada" )
                ->setCellValue('AC'.$kolom, $data->dokaju3==null ? "Belum Ada" : "Ada" )
                ->setCellValue('AD'.$kolom, $data->dokaju4==null ? "Belum Ada" : "Ada" )
                ->setCellValue('AE'.$kolom, $data->dok_aju==null ? "Belum Ada" : "Ada" );
                // ->setCellValue('U'.$kolom, $data->tu_1)
                // ->setCellValue('V'.$kolom, $data->tu_2)
                // ->setCellValue('W'.$kolom, $data->tu_3)
                // ->setCellValue('X'.$kolom,$data->tu_4)
                // ->setCellValue('Y'.$kolom, $data->tu_5)
                // ->setCellValue('Z'.$kolom,$data->verifikator)
                // ->setCellValue('AA'.$kolom,$data->tgl_terima_lpj)
                // ->setCellValue('AB'.$kolom,$data->tgl_selesai_verif)
                // ->setCellValue('AC'.$kolom,$data->tgl_update_verif)
                // ->setCellValue('AD'.$kolom,$data->kelengkapan)
                // ->setCellValue('AE'.$kolom,$data->keterangan)
                // ->setCellValue('AF'.$kolom,$data->lama_verif)
                // ->setCellValue('AG'.$kolom,$data->sppid)
                // ->setCellValue('AH'.$kolom,$data->no_spp)
                // ->setCellValue('AI'.$kolom,$data->tgl_spp)
                // ->setCellValue('AJ'.$kolom,$data->nilai_spp)
                // ->setCellValue('AK'.$kolom,$data->arsip_gup)
                // ->setCellValue('AL'.$kolom,$data->spmid)
                // ->setCellValue('AM'.$kolom,$data->no_spm)
                // ->setCellValue('AN'.$kolom,$data->tgl_spm)
                // ->setCellValue('AO'.$kolom,$data->nilai_spm)
                // ->setCellValue('AP'.$kolom,$data->no_sp2d)
                // ->setCellValue('AQ'.$kolom,$data->tgl_sp2d)
                // ->setCellValue('AR'.$kolom,$data->nilai_sp2d);
            $kolom++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->setTitle('rekap_' . date('dmY'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // $writer = new Xlsx($spreadsheet);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();

        // header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="rekapdata_2021.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires:0');
        header("Pragma: no-cache");
        $writer->save('php://output');
        exit;
    }
    public function lama_lpj()
    {
        $data['row'] = $this->rekap_m->get();
        $this->template->load('template','rekap/rekap_data_output', $data);
    }


    // public function proses()
    // {
    //     $post = $this->input->post(null, TRUE);
    //     $this->rekap_m->update($post);
    //     if ($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('sukses', 'data berhasil disimpan');
    //     }
    //     redirect('rekap/lama_lpj');
    // }

    public function update($id)
    {
        $query = $this->rekap_m->get($id);
        if ($query->num_rows() > 0) {
            $data_rekap = $query->row();
            // $query_sisbayar = $this->sisbayar_m->get();
            // $query_jeniskeg = $this->jeniskeg_m->get();
            $data = array (
                'row'=> $data_rekap,
                // 'bayar'=> $query_sisbayar,
                // 'jenis'=> $query_jeniskeg
            );
            $this->template->load('template', 'rekap/lama_lpj_form', $data);
        } else {
            $this->session->set_flashdata('gagal', 'data tidak ditemukan!');
            redirect('rekap/lama_lpj');
        }
    }
    function get_ajax()
    {
        $list = $this->rekap_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        date_default_timezone_set("Asia/Jakarta");
        foreach ($list as $data) {
            $no++;
            $nilai_pd=$data->nilai_pd1+$data->nilai_pd2+$data->nilai_pd3;
            $row = array();
            $row[] = $no . '.';
            $dt=strtotime($data->tgl_terima);
            $row[] = 
                '<div class="btn btn-group">
                <a id="detail" href="#" class="text-info text-sm" data-toggle="modal" data-target="#modal_rekap2" 
                  data-tgl_terima="' . strftime("%c",strtotime($data->tgl_terima)) . '" data-ksubs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . tanggal_indonesia($data->tgl_mulai) . '" data-tgl_selesai="' . tanggal_indonesia($data->tgl_selesai) . '" data-lokasi="' . $data->lokasi . '" data-nm_pumk="' . $data->nm_pumk . '" data-nm_pumk_akom="' . $data->nm_pumk_akom . '" data-tgl_proses="' . strftime('%d-%m-%Y %R',strtotime($data->tgl_proses)) . '" data-tgl_lpj="' . strftime('%d-%m-%Y %R',strtotime($data->tgl_lpj)) . '" 
                  data-dok_aju="' . $data->dok_aju . '" data-no_undangan="'.$data->no_undangan.'" data-nm_bpp="'.$data->nm_bpp.'" data-tgl_rev1="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_rev1)).'" data-tgl_rev2="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_rev2)).'" data-tgl_rev3="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_rev3)).'"
                  data-tgl_terima_rev1="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_terima_rev1)).'" data-tgl_terima_rev2="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_terima_rev2)).'" data-tgl_terima_rev3="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_terima_rev3)).'" data-tgl_dispo="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_dispo)).'" data-tgl_ok="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_ok)).'" data-tgl_proses_akom="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_proses_akom)).'" data-tgl_selesaiproses_akom="'.strftime('%d-%m-%Y %R',strtotime($data->tgl_selesaiproses_akom)).'"
                  data-dokaju="' . $data->dokaju . '" data-dokaju2="' . $data->dokaju2 . '" data-dokaju3="' . $data->dokaju3 . '" data-dokaju4="' . $data->dokaju4 . '" data-kd_anggaran="' . $data->kd_anggaran . '" data-sis_byr="' . $data->sis_byr . '" data-sis_byr_hr="' . $data->sis_byr_hr . '" data-sis_byr_akom="' . $data->sis_byr_akom . '" data-catat_subs="' . $data->catat_subs . '" data-catat_pumk="' . $data->catat_pumk . '" data-nota_pumk="' . $data->nota_pumk . '"
                  data-nilai_umk="Rp.' . number_format($data->nilai_umk,2,',','.') . '" data-tgl_umk="' . strftime('%d-%m-%Y %R',strtotime($data->tgl_umk)). '"data-nilai_pd="Rp.'.number_format($nilai_pd,0,',','.').'"
                  data-nilai_hr="Rp.'.number_format($data->nilai_hr, 0, ',', '.').'" data-nilai_ak="Rp.'.number_format($data->nilai_ak, 0, ',', '.').'" data-nilai_lpj="Rp.'.number_format($data->nilai_lpj, 0, ',', '.').'"
                  >'. date("d-m-Y H:i",$dt).'<br>'.$data->no_undangan. '</a></div>';
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
            // add html for status
                // umk
                if (empty($data->tgl_dispo)&&empty($data->tgl_proses)&&empty($data->tgl_proses_akom)&&empty($data->tgl_rev1)&&empty($data->tgl_rev3)&&empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-danger text-center">Belum Proses</span>';
                } elseif (empty($data->tgl_dispo)&&empty($data->tgl_proses)&&empty($data->tgl_proses_akom)&&empty($data->tgl_rev1)&&!empty($data->tgl_rev3)&&empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak=="1"){
                    $row[] = '<span class="badge badge-danger text-center">Tolak</span>';
                } elseif (empty($data->tgl_dispo)&&empty($data->tgl_proses)&&empty($data->tgl_proses_akom)&&empty($data->tgl_rev1)&&!empty($data->tgl_rev3)&&empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-warning text-center">Revisi Substansi</span>';
                } elseif (!empty($data->tgl_dispo)&&!empty($data->tgl_proses)&&(!empty($data->tgl_proses_akom)||empty($data->tgl_proses_akom))&&!empty($data->tgl_rev1)&& empty($data->tgl_terima_rev1) &&(!empty($data->tgl_rev3) ||empty($data->tgl_rev3)) && empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-warning text-center">Revisi PUMK</span>';
                } elseif (!empty($data->tgl_dispo)&&empty($data->tgl_proses)&&empty($data->tgl_proses_akom)&&(!empty($data->tgl_rev1)||empty($data->tgl_rev1))&& (!empty($data->tgl_rev3) ||empty($data->tgl_rev3)) && empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-danger text-center">Disposisi PUMK</span>';
                // } elseif (!empty($data->tgl_dispo)&&!empty($data->tgl_proses)&&!empty($data->tgl_rev1)&& !empty($data->tgl_terima_rev1) &&(!empty($data->tgl_rev3) ||empty($data->tgl_rev3)) && empty($data->tgl_ok)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                //     $row[] = '<span class="badge badge-warning text-center">Revisi PUMK</span>';
                } elseif (!empty($data->tgl_dispo)&&!empty($data->tgl_proses)&&(empty($data->tgl_rev1)|| !empty($data->tgl_rev1))&& (empty($data->tgl_terima_rev1)||!empty($data->tgl_terima_rev1)) &&(!empty($data->tgl_rev3) ||empty($data->tgl_rev3)) && (!empty($data->tgl_ok)||empty($data->tgl_ok))&&!empty($data->tgl_umk)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-primary text-center">Proses LPJ</span>';
                } elseif (!empty($data->tgl_dispo)&&!empty($data->tgl_proses)&&(empty($data->tgl_rev1)|| !empty($data->tgl_rev1))&& (empty($data->tgl_terima_rev1)||!empty($data->tgl_terima_rev1)) &&(!empty($data->tgl_rev3) ||empty($data->tgl_rev3)) && (!empty($data->tgl_ok)||empty($data->tgl_ok))&&empty($data->tgl_umk)&&empty($data->tgl_lpj)&&$data->tolak!="1"){
                    $row[] = '<span class="badge badge-primary text-center">Proses UMK</span>';
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
                }
            
            //download dokumen
            if ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4!=null) {
                $row[] = '<div class="btn btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4==null) {
                $row[] = '<div class="btn btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                         </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3!=null && $data->dokaju4==null) {
            $row[] = '<div class="btn btn-group">
                        <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                        <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju3). '" class="btn btn-danger btn-xs">ABS</a>
                        <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                        </div>';
            } elseif ($data->dokaju!=null && $data->dokaju2!=null && $data->dokaju3==null && $data->dokaju4!=null) {
                $row[] = '<div class="btn btn-group">
                            <a href="' .base_url('uploads/dok/'.$data->k_subs.'/' . $data->dokaju). '" class="btn btn-warning btn-xs">UND</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju2). '" class="btn btn-primary btn-xs">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href="' .base_url('uploads/dok/' .$data->k_subs.'/'. $data->dokaju4). '" class="btn btn-success btn-xs">NOT</a>
                            </div>';
                    } else {
                $row[] = '<div class="btn btn-group">
                            <a href=# class="btn btn-secondary btn-xs disabled">UND</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ST</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">ABS</a>
                            <a href=# class="btn btn-secondary btn-xs disabled">NOT</a>
                            </div>';
            }

            //download bukti transfer
            if(empty($data->dok_aju)){
                $row[] = '<div class="btn btn-group">
                         <a href=# class="btn btn-secondary btn-xs disabled">Bukti</a>
                         </div>';
            } else{
                $row[] = '<div class="btn btn-group">
                <a href="' .base_url('uploads/pumk/' .$data->k_subs.'/'.$data->dok_aju). '" class="btn btn-success btn-xs">Bukti</a>
                </div>';
            }
            
            $datas[] = $row;
            
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->rekap_m->count_all(),
            "recordsFiltered" => $this->rekap_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}

