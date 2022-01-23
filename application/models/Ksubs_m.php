<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ksubs_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_ksubs');
        if($id != null) {
            $this->db->where('ksub_id',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_ksub' => $post['nm_ksub'],
            'nm_koordinator' => $post['nm_koordinator'],
        ];
        $this->db->insert('tb_ksubs',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_ksub' => $post['nm_ksub'],
            'nm_koordinator' => $post['nm_koordinator'],
        ];
        $this->db->where('ksub_id', $post['id']);
        $this->db->update('tb_ksubs',$params);
    }

    public function del($id)
    {
        $this->db->where('ksub_id', $id);
        $this->db->delete('tb_ksubs');
    }


}
