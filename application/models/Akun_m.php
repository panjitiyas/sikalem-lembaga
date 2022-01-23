<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_akun');
        if($id != null) {
            $this->db->where('id_akun',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'kdAkun' => $post['kdAkun'],
            'nmAkun' => $post['nmAkun'],
        ];
        $this->db->insert('tb_akun',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'kdAkun' => $post['kdAkun'],
            'nmAkun' => $post['nmAkun'],
        ];
        $this->db->where('id_akun', $post['id']);
        $this->db->update('tb_akun',$params);
    }

    public function del($id)
    {
        $this->db->where('id_akun', $id);
        $this->db->delete('tb_akun');
    }


}
