<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dipa_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from ('tb_pagu');
        if($id != null) {
            $this->db->where('id_pagu',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'kd_program' => $post['kdProgram'],
            'nm_program' => $post['nmProgram'],
            'kd_giat' => $post['kdGiat'],
            'nm_giat' => $post['nmGiat'],
            'kd_kro' => $post['kdOutput'],
            'nm_kro' => $post['nmOutput'],
            'kd_ro' => $post['kdSuboutput'],
            'nm_ro' => $post['nmSuboutput'],
            'kd_komp' => $post['kdKomponen'],
            'nm_komp' => $post['nmKomponen'],
            'kd_skomp' => $post['kdSubkomponen'],
            'nm_skomp' => $post['nmSubkomponen'],
        ];
        $this->db->insert('tb_pagu',$params); 
    }
    public function ubah($post)
    {
        $params = [
            'kd_program' => $post['kdProgram'],
            'nm_program' => $post['nmProgram'],
            'kd_giat' => $post['kdGiat'],
            'nm_giat' => $post['nmGiat'],
            'kd_kro' => $post['kdOutput'],
            'nm_kro' => $post['nmOutput'],
            'kd_ro' => $post['kdSuboutput'],
            'nm_ro' => $post['nmSuboutput'],
            'kd_komp' => $post['kdKomponen'],
            'nm_komp' => $post['nmKomponen'],
            'kd_skomp' => $post['kdSubkomponen'],
            'nm_skomp' => $post['nmSubkomponen'],
        ];
        $this->db->where('id_pagu', $post['id']);
        $this->db->update('tb_pagu',$params);
    }

    public function del($id)
    {
        $this->db->where('id_pagu', $id);
        $this->db->delete('tb_pagu');
    }


}
