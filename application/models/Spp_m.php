<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('p_spp');
        if($id != null) {
            $this->db->where('sppid',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_spp' => $post['nm_spp'],
            'email_spp' => $post['email_spp'],
        ];
        $this->db->insert('p_spp',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_spp' => $post['nm_spp'],
            'email_spp' => $post['email_spp'],
        ];
        $this->db->where('sppid', $post['id']);
        $this->db->update('p_spp',$params);
    }

    public function del($id)
    {
        $this->db->where('sppid', $id);
        $this->db->delete('p_spp');
    }


}
