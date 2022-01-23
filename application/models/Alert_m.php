<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_alert');
        if($id != null) {
            $this->db->where('id_alert',$id);  
        }
        $this->db->order_by('id_alert', 'desc');
        $query= $this->db->get();
        return $query;
    }
   
    public function tambah($post)
    {
        $params = [
            'judul_alert' => $post['judul_alert'],
            'isi_alert' => $post['isi_alert'],
            'warna_alert'=> $post['warna_alert'],
            'status_alert' => 0,
            'jenis'=> $post['jenis']
        ];
        $this->db->insert('tb_alert',$params);
    }
    public function ubah($post)
    {
        $params = [
            'judul_alert' => $post['judul_alert'],
            'isi_alert' => $post['isi_alert'],
            'warna_alert'=> $post['warna_alert'],
            'status_alert' => $post['status_alert'],
            'jenis'=> $post['jenis']
        ];
        $this->db->where('id_alert', $post['id']);
        $this->db->update('tb_alert',$params);
    }

    public function aktif($post)
    {
        $params = [
            'status_alert' => 1,
        ];
        $this->db->where('id_alert', $post);
        $this->db->update('tb_alert',$params);
    }

    public function nonaktif($post)
    {
        $params = [
            'status_alert' => 0,
        ];
        $this->db->where('id_alert', $post);
        $this->db->update('tb_alert',$params);
    }

    public function del($id)
    {
        $this->db->where('id_alert', $id);
        $this->db->delete('tb_alert');
    }

}
