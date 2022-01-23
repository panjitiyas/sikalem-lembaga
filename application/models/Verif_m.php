<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verif_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('p_verif');
        if($id != null) {
            $this->db->where('verifid',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_verif' => $post['nm_verif'],
            'email_verif' => $post['email_verif'],
        ];
        $this->db->insert('p_verif',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_verif' => $post['nm_verif'],
            'email_verif' => $post['email_verif'],
        ];
        $this->db->where('verifid', $post['id']);
        $this->db->update('p_verif',$params);
    }

    public function del($id)
    {
        $this->db->where('verifid', $id);
        $this->db->delete('p_verif');
    }


}
