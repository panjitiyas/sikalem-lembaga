<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spm_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('p_spm');
        if($id != null) {
            $this->db->where('spmid',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nm_spm' => $post['nm_spm'],
            'email_spm' => $post['email_spm'],
        ];
        $this->db->insert('p_spm',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'nm_spm' => $post['nm_spm'],
            'email_spm' => $post['email_spm'],
        ];
        $this->db->where('spmid', $post['id']);
        $this->db->update('p_spm',$params);
    }

    public function del($id)
    {
        $this->db->where('spmid', $id);
        $this->db->delete('p_spm');
    }


}
