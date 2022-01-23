<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Manifest_tiket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['tiket_model','proses_tu_m']); 
        date_default_timezone_set("Asia/Jakarta");
        
    }
    public function index()
	{
        $data_giat=$this->proses_tu_m->get();
        $data= [
            'row'=>$this->tiket_model->get(),
            'page'=>'tambah',
            'keg'=>$data_giat
        ];
        $this->template->load('template', 'tiket/manifest_data', $data);
        ;
    }
    public function impor()
	{
        $data ['row'] = "";
        $this->template->load('template', 'tiket/impor_manifes', $data);
        
    }

    public function export_excel()
    {

        $data_excel = $this->tiket_model->get()->result();
        $spreadsheet = new Spreadsheet;
        $spreadsheet    -> setActiveSheetIndex(0)
                        -> setCellValue('A1','no')
                        -> setCellValue('B1','nmgiat')
                        -> setCellValue('C1','direktorat')
                        -> setCellValue('D1','spm')
                        -> setCellValue('E1','noinvoice')
                        -> setCellValue('F1','nmorang')
                        -> setCellValue('G1','maskapai')
                        -> setCellValue('H1','noterbang')
                        -> setCellValue('I1','notiket')
                        -> setCellValue('J1','kdbook')
                        -> setCellValue('K1','asal')
                        -> setCellValue('L1','tujuan')
                        -> setCellValue('M1','tglberangkat')
                        -> setCellValue('N1','tglpulang')
                        -> setCellValue('O1','tikettotal')
                        -> setCellValue('P1','ket');
                        
        $kolom =2;
        $no=1;
        
        foreach($data_excel as $data){
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$kolom,$no)
                ->setCellValue('B'.$kolom,$data->nmgiat)
                ->setCellValue('C'.$kolom, $data->direktorat)
                ->setCellValue('D'.$kolom, $data->spm)
                ->setCellValue('E'.$kolom, $data->noinvoice)
                ->setCellValue('F'.$kolom, $data->nmorang)
                ->setCellValue('G'.$kolom, $data->maskapai)
                ->setCellValue('H'.$kolom, $data->noterbang)
                ->setCellValue('I'.$kolom, $data->notiket)
                ->setCellValue('J'.$kolom, $data->kdbook)
                ->setCellValue('K'.$kolom, $data->asal)
                ->setCellValue('K'.$kolom, $data->tujuan)
                ->setCellValue('K'.$kolom, $data->tglberangkat)
                ->setCellValue('K'.$kolom, $data->tglpulang)
                ->setCellValue('L'.$kolom, $data->tiketdasar)
                ->setCellValue('M'.$kolom, $data->tikettotal)
                ->setCellValue('N'.$kolom, $data->ket);
                
            $kolom++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->setTitle('manisfet' . date('dmY'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // $writer = new Xlsx($spreadsheet);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();

        // header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="manifestTiket_2021.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires:0');
        header("Pragma: no-cache");
        $writer->save('php://output');
        exit;
    }

    public function impor_db()
    {
        set_time_limit(0);
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['impor']['name']) && in_array($_FILES['impor']['type'], $file_mimes)) {
         
            $arr_file = explode('.', $_FILES['impor']['name']);
            $extension = end($arr_file);
         
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
         
            $spreadsheet = $reader->load($_FILES['impor']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            
           
            for ($i=1;$i < count($sheetData);$i++)
            {
                $data = array (
                    'id_manifest' => $sheetData[$i]['1'],
                    'nmgiat' => $sheetData[$i]['2'],
                    'direktorat' => $sheetData[$i]['3'],
                    'spm'=> $sheetData[$i]['4'],
                    'noinvoice'=> $sheetData[$i]['5'],
                    'nmorang'=> $sheetData[$i]['6'],
                    'maskapai'=> $sheetData[$i]['7'],
                    'noterbang'=> $sheetData[$i]['8'],
                    'notiket'=> $sheetData[$i]['9'],
                    'kdbook'=> $sheetData[$i]['10'],
                    'asal'=> $sheetData[$i]['11'],
                    'tujuan'=> $sheetData[$i]['12'],
                    'tglberangkat'=> $sheetData[$i]['13'],
                    'tglpulang'=> $sheetData[$i]['14'],
                    'tiketdasar'=> $sheetData[$i]['15'],
                    'tikettotal'=> $sheetData[$i]['16'],
                    'ket'=> $sheetData[$i]['17'],
                );
                $this->db->insert('tb_manifest', $data);
                
                // echo '<pre>';
                // print_r($rekap);
            }
            
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','Database berhasil diunggah!!');
                redirect('manifest_tiket');
           } else {
                $this->session->set_flashdata('gagal','Database gagal diunggah!!');
                redirect('manifest_tiket/impor');
           }
            
        }
    }

    public function tambah()
    {
        $data_giat=$this->proses_tu_m->get();
        $data_tiket = new stdClass();
        $data_tiket->id_manifest = "";
        $data_tiket->nmgiat = "";
        $data_tiket->direktorat = "";
        $data_tiket->spm = "";
        $data_tiket->noinvoice = "";
        $data_tiket->nmorang = "";
        $data_tiket->maskapai = "";
        $data_tiket->noterbang = "";
        $data_tiket->notiket = "";
        $data_tiket->kdbook = "";
        $data_tiket->asal = "";
        $data_tiket->tujuan = "";
        $data_tiket->tglberangkat = "";
        $data_tiket->tgltujuan = "";
        $data_tiket->tiketdasar = "";
        $data_tiket->tikettotal = "";
        $data_tiket->ket = "";

   
        $data = array (
            'page' => 'tambah',
            'row' => $data_tiket,
            'keg'=>$data_giat
        );
        $this->template->load('template','tiket/manifest_form',$data);
        // $this->template->load('template','tiket/manifest_data',$data);
        // echo "<pre>";
        // echo print_r ($data['nm_ksubs']->result());
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        // $this->form_validation->set_rules('nama_rek','Nama Rekening','required');
        // $this->form_validation->set_rules('instansi','Instansi','required');
        // $this->form_validation->set_rules('nama_bank','Nama Bank','required');
        // $this->form_validation->set_rules('no_rek','No. Rekening','required|numeric');
        // $this->form_validation->set_rules('no_telp','No. Telephone','numeric');

        // $this->form_validation->set_message('required','&times %s wajib dilampirkan');
        // $this->form_validation->set_message('numeric','&times %s harus diisi berupa angka');
        // if ($this->form_validation->run()==FALSE){
        //     $this->tambah();
        // } else {
        if(isset($_POST['tambah'])) {
                $this->tiket_model->tambah($post);
                if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('manifest_tiket');
                // echo '<pre>';
                // echo print_r($post); 
        } else if (isset($_POST['ubah'])) {
                $this->tiket_model->ubah($post);
                if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('manifest_tiket');
                // }
            }
        }  
    
    
    public function ubah($id)
    {
        $query =$this->tiket_model->get($id);
        $data_giat=$this->proses_tu_m->get();
        if($query->num_rows() > 0) {
        $data_tiket= $query->row();


        $data = array (
            'page' => 'ubah',
            'row' => $data_tiket,
            'keg'=>$data_giat
       
        );
        $this->template->load('template','tiket/manifest_form',$data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('manifest_tiket');
        }
    }
   
    
    public function del($id)
    {
        $this->tiket_model->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('manifest_tiket');

    }
    function get_ajax()
    {
        $list = $this->tiket_model->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[]=$no.'.';
            $row[]=$data->nmgiat ;
            // $row[]=$data->direktorat;
            // $row[]=$data->spm;
            // $row[]=$data->noinvoice;
            $row[]=$data->nmorang;
            $row[]=$data->maskapai;
            $row[]=$data->noterbang;
            // $row[]=$data->notiket;
            // $row[]=$data->kdbook;
            if (empty($data->tglpulang)){
                $row[]=  $data->asal.' - '.$data->tujuan;
            } else {
                $row[]=  $data->asal.' - '.$data->tujuan.',pp';
            }
            if (!empty($data->tglpulang)){
                $row[]=tanggal_indonesia($data->tglberangkat).' / '.tanggal_indonesia($data->tglberangkat);
            } else {
                $row[]=tanggal_indonesia($data->tglberangkat);
            }
            // $row[]=$data->tiketdasar;
            $row[]='Rp. '.number_format($data->tikettotal,0,',','.').',-';
            $row[]=$data->ket;

            // add html for action
            $row[] = 
                    "<div class=\"btn-group\"><a href='" . site_url('manifest_tiket/ubah/' . $data->id_manifest) . "' class=\"btn btn-info btn-xs\"><i class=\"fas fa-pencil-alt\"></i></a>
                    <a href=\"#hapus\" onclick=\"$('#hapus #formHapus').attr('action','" . site_url('manifest_tiket/del/' . $data->id_manifest) . "')\" data-toggle=\"modal\" class=\"btn btn-danger btn-xs\"><i class=\"fas fa-trash\"></i></a></div>";

            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->tiket_model->count_all(),
            "recordsFiltered" => $this->tiket_model->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
