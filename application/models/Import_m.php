<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_m extends CI_Model {

    public function upload($filename){
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = '_import/';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
      
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('import')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
          } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
          }
        
      }

    public function insert($data){
      $this->db->insert_batch('tb_ptu', $data);
    }
}
