<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Db_rek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('db_rek_m'); 
        date_default_timezone_set("Asia/Jakarta");
        
    }
    public function index()
	{
        $data ['row'] = $this->db_rek_m->get();
        $this->template->load('template', 'db_rek/db_rek_data', $data);
        ;
    }
    public function impor()
	{
        $data ['row'] = "";
        $this->template->load('template', 'db_rek/impor_rek', $data);
        
    }

    public function export_excel()
    {

        $data_excel = $this->db_rek_m->get()->result();
        $spreadsheet = new Spreadsheet;
        $spreadsheet    -> setActiveSheetIndex(0)
                        -> setCellValue('A1','No')
                        -> setCellValue('B1','Nama Rekening')
                        -> setCellValue('C1','Instansi')
                        -> setCellValue('D1','Nama Bank')
                        -> setCellValue('E1','No. Rekening')
                        -> setCellValue('F1','No. Telp/Handphone');
                        
        $kolom =2;
        $no=1;
        
        foreach($data_excel as $data){
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$kolom,$no)
                ->setCellValue('B'.$kolom,$data->nama_rek)
                ->setCellValue('C'.$kolom, $data->instansi)
                ->setCellValue('D'.$kolom, $data->nama_bank)
                ->setCellValue('E'.$kolom, $data->no_rek)
                ->setCellValue('F'.$kolom, $data->no_telp);
                
            $kolom++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->setTitle('db_rek' . date('dmY'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // $writer = new Xlsx($spreadsheet);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();

        // header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="dbrek_2021.xlsx"');
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
                'nama_rek'      => $sheetData[$i]['1'],
                'instansi'      => $sheetData[$i]['2'],
                'nama_bank'     => $sheetData[$i]['3'],
                'no_rek'        => $sheetData[$i]['4'],
                'no_telp'       => $sheetData[$i]['5'],
                );
                $this->db->insert('tb_rek', $data);
                
                // echo '<pre>';
                // print_r($rekap);
            }
            
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','Database berhasil diunggah!!');
                redirect('db_rek');
           } else {
                $this->session->set_flashdata('gagal','Database gagal diunggah!!');
                redirect('db_rek/impor');
           }
            
        }
    }

    public function tambah()
    {
        $data_rek = new stdClass();
        $data_rek->id_rek = "";
        $data_rek->nama_rek = "";
        $data_rek->instansi= "";
        $data_rek->nama_bank= "";
        $data_rek->no_rek= "";
        $data_rek->no_telp= "";
   
        $data = array (
            'page' => 'tambah',
            'row' => $data_rek
        );
        $this->template->load('template','db_rek/db_rek_form',$data);
        // echo "<pre>";
        // echo print_r ($data['nm_ksubs']->result());
    } 
    
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        $this->form_validation->set_rules('nama_rek','Nama Rekening','required');
        $this->form_validation->set_rules('instansi','Instansi','required');
        $this->form_validation->set_rules('nama_bank','Nama Bank','required');
        $this->form_validation->set_rules('no_rek','No. Rekening','required|numeric');
        $this->form_validation->set_rules('no_telp','No. Telephone','numeric');

        $this->form_validation->set_message('required','&times %s wajib dilampirkan');
        $this->form_validation->set_message('numeric','&times %s harus diisi berupa angka');
        if ($this->form_validation->run()==FALSE){
            $this->tambah();
        } else {
        if(isset($_POST['tambah'])) {
                $this->db_rek_m->tambah($post);
                if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('db_rek');
                // echo '<pre>';
                // echo print_r($post); 
        } else if (isset($_POST['ubah'])) {
                $this->db_rek_m->ubah($post);
                if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','data berhasil disimpan');
                }
                redirect('db_rek');
                }
            }
        }  
    
    
    public function ubah($id)
    {
        $query =$this->db_rek_m->get($id);
        if($query->num_rows() > 0) {
        $data_rek = $query->row();


        $data = array (
            'page' => 'ubah',
            'row' => $data_rek,
       
        );
        $this->template->load('template','db_rek/db_rek_form',$data);
        } else {
            $this->session->set_flashdata('gagal','data tidak ditemukan!');
            redirect('db_rek');
        }
    }
   
    
    public function del($id)
    {
        $this->db_rek_m->del($id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('sukses','data berhasil dihapus');
       } 
       redirect('db_rek');

    }
    function get_ajax()
    {
        $list = $this->db_rek_m->get_datatables();
        $datas = array();
        $no = @$_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $data->nama_rek;
            $row[] = $data->instansi;
            $row[] = $data->nama_bank;
            $row[] = $data->no_rek;
            $row[] = $data->no_telp;

            // add html for action
            $row[] = 
                    "<div class=\"btn-group\"><a href='" . site_url('db_rek/ubah/' . $data->id_rek) . "' class=\"btn btn-info btn-xs\"><i class=\"fas fa-pencil-alt\"></i> Ubah</a>
                    <a href=\"#hapus\" onclick=\"$('#hapus #formHapus').attr('action','" . site_url('db_rek/del/' . $data->id_rek) . "')\" data-toggle=\"modal\" class=\"btn btn-danger btn-xs\"><i class=\"fas fa-trash\"></i> Hapus</a></div>";

            $datas[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->db_rek_m->count_all(),
            "recordsFiltered" => $this->db_rek_m->count_filtered(),
            "data" => $datas,
        );
        // output to json format
        echo json_encode($output);
    }
}
