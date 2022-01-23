<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dok_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_dok');
        if($id != null) {
            $this->db->where('id_dok',$id);
        }
        $this->db->order_by('id_dok','desc');
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'substansi' => $post['substansi'],
            'nama_keg' => $post['nama_keg'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'lamp_1' => $post['lamp_1'],
            'lamp_2' => $post['lamp_2'],
            'lamp_3' => $post['lamp_3'],
            
        ];
        $this->db->insert('tb_dok',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'substansi' => $post['substansi'],
            'nama_keg' => $post['nama_keg'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],

        ];
        if($post['lamp_1']!=null){
            $params ['lamp_1'] = $post['lamp_1'];    
        }
        if ($post['lamp_2'] != null) {
            $params['lamp_2'] = $post['lamp_2'];
        }
        if ($post['lamp_3'] != null) {
            $params['lamp_3'] = $post['lamp_3'];
        }
        $this->db->where('id_dok', $post['id']);
        $this->db->update('tb_dok',$params);
    }

    public function del($id)
    {
        $this->db->where('id_dok', $id);
        $this->db->delete('tb_dok');
    }


}
