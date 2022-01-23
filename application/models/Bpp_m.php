<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bpp_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_bpp');
        if($id != null) {
            $this->db->where('id_bpp',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_bpp' => $post['nm_bpp'],
            
        ];
        $this->db->insert('tb_bpp',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_bpp' => $post['nm_bpp'],
            
        ];
        $this->db->where('id_bpp', $post['id']);
        $this->db->update('tb_bpp',$params);
    }

    public function del($id)
    {
        $this->db->where('id_bpp', $id);
        $this->db->delete('tb_bpp');
    }


}
