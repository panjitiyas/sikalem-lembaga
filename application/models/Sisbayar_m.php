<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sisbayar_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_bayar');
        if($id != null) {
            $this->db->where('id_bayar',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_bayar' => $post['nm_bayar'],
        ];
        $this->db->insert('tb_bayar',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_bayar' => $post['nm_bayar'],
            
        ];
        $this->db->where('id_bayar', $post['id']);
        $this->db->update('tb_bayar',$params);
    }

    public function del($id)
    {
        $this->db->where('id_bayar', $id);
        $this->db->delete('tb_bayar');
    }


}
