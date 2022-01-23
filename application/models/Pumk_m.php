<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pumk_m extends CI_Model {

    public function get($id=null)
    {
        $subs = $this->fungsi->user_login()->bpp;
        $this->db->from ('p_pumk');
        if($id != null) {
            $this->db->where('pumkid',$id);
        }
        $this->db->where('bpp',$subs);
        $query= $this->db->get();
        return $query;
    }
    public function get_admin($id=null)
    {
        $this->db->from ('p_pumk');
        if($id != null) {
            $this->db->where('pumkid',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'pumk_nm' => $post['pumk_nm'],
            'sub' => $post['sub'],
            'bpp' => $post['bpp'],
        ];
        $this->db->insert('p_pumk',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'pumk_nm' => $post['pumk_nm'],
            'sub' => $post['sub'],
            'bpp' => $post['bpp'],
        ];
        $this->db->where('pumkid', $post['id']);
        $this->db->update('p_pumk',$params);
    }

    public function del($id)
    {
        $this->db->where('pumkid', $id);
        $this->db->delete('p_pumk');
    }


}
