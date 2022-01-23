<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskeg_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_jeniskeg');
        if($id != null) {
            $this->db->where('id_jeniskeg',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_jeniskeg' => $post['nm_jeniskeg'],
            
        ];
        $this->db->insert('tb_jeniskeg',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_jeniskeg' => $post['nm_jeniskeg'],
            
        ];
        $this->db->where('id_jeniskeg', $post['id']);
        $this->db->update('tb_jeniskeg',$params);
    }

    public function del($id)
    {
        $this->db->where('id_jeniskeg', $id);
        $this->db->delete('tb_jeniskeg');
    }


}
