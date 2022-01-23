<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_tools');
        if($id != null) {
            $this->db->where('id_tools',$id);
        }
        $this->db->order_by('id_tools','desc');
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'uraian' => $post['uraian'],
            'lampiran' => $post['lampiran'],
        ];
        $this->db->insert('tb_tools',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'uraian' => $post['uraian'],
        ];
        if($post['lampiran']!=null){
            $params ['lampiran'] = $post['lampiran'];
        }
        $this->db->where('id_tools', $post['id']);
        $this->db->update('tb_tools',$params);
    }

    public function del($id)
    {
        $this->db->where('id_tools', $id);
        $this->db->delete('tb_tools');
    }


}
