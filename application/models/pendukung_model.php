<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendukung_model extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_info');
        if($id != null) {
            $this->db->where('id_info',$id);
        }
        $this->db->order_by('id_info','desc');
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'uraian' => $post['uraian'],
            'lampiran' => $post['lampiran'],
        ];
        $this->db->insert('tb_info',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'uraian' => $post['uraian'],
        ];
        if($post['lampiran']!=null){
            $params ['lampiran'] = $post['lampiran'];
        }
        $this->db->where('id_info', $post['id']);
        $this->db->update('tb_info',$params);
    }

    public function del($id)
    {
        $this->db->where('id_info', $id);
        $this->db->delete('tb_info');
    }


}
