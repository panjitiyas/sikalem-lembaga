<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
class Import extends CI_Controller
{
    // private $filename = "import_data";
   

    function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();   
    }

    public function index()
	{
       
		$this->template->load('template', 'import/import_form');
    }
    
    
    public function proses()
    {
        set_time_limit(0);
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['import']['name']) && in_array($_FILES['import']['type'], $file_mimes)) {
         
            $arr_file = explode('.', $_FILES['import']['name']);
            $extension = end($arr_file);
         
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
         
            $spreadsheet = $reader->load($_FILES['import']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            
           
            for ($i=1;$i < count($sheetData);$i++)
            {
                $data = array (
                'tgl_terima'   => $sheetData[$i]['0'],
                'k_subs'       => $sheetData[$i]['1'],
                'nm_keg'       => $sheetData[$i]['2'],
                'tgl_mulai'    => $sheetData[$i]['3'],
                'tgl_selesai'  => $sheetData[$i]['4'],
                'lokasi'       => $sheetData[$i]['5'],
                'nm_pumk'      => $sheetData[$i]['6'],
                );
                $this->db->insert('tb_ptu', $data);
                $idkeg=$this->db->insert_id();
                $dataid=[
                    'id_keg' => $idkeg,
                    'id_pumk' => $idkeg,
                    ];
                    $spm=[
                    'id_keg' => $idkeg,
                    'id_pumk' => $idkeg,
                    'id_spp' => $idkeg,
                ];
                    $rekap=[
                    'id_keg' => $idkeg,
                    'id_pumk' => $idkeg,
                    'id_spp' => $idkeg,
                    'id_spm' => $idkeg,
                    'id_verif' => $idkeg,
                ];
                $data2 = array (
                'id_keg'        => $idkeg,
                'nme_pumk'      => $sheetData[$i]['6'], 
                'nilai'         => $sheetData[$i]['7'],
                'output'        => $sheetData[$i]['8'],
                'sub_output'    => $sheetData[$i]['9'],
                'komponen'      => $sheetData[$i]['10'],
                'sub_komp'      => $sheetData[$i]['11'],
                'akun_mak'      => $sheetData[$i]['12'],
                'sis_bayar'     => $sheetData[$i]['13'],
                'tgl_umk'       => $sheetData[$i]['14'],
                'tgl_lpj'       => $sheetData[$i]['15'],
                'jenis_keg'     => $sheetData[$i]['16'],
                'jml_peserta'   => $sheetData[$i]['17'],
                'tu_1'          => $sheetData[$i]['18'],
                'tu_2'          => $sheetData[$i]['19'],
                'tu_3'          => $sheetData[$i]['20'],
                'tu_4'          => $sheetData[$i]['21'],
                'tu_5'          => $sheetData[$i]['22'],
                );
                
                
                $this->db->insert('tb_pumk', $data2);
                $this->db->insert('tb_verif',$dataid);
                $this->db->insert('tb_spp',$dataid);
                $this->db->insert('tb_spm',$spm);
                $this->db->insert('tb_rekap',$rekap);
                // echo '<pre>';

                // print_r($rekap);
            }
            
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('sukses','Database berhasil di unggah!!');
           }
           redirect('import');
            
        }
    }
}
    




