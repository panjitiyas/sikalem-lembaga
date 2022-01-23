<?php
function hitung_belumprosesakom ($pumk)
{
    $ci= &get_instance();
    $ci->db->select('*');
    $ci->db->from('tb_bppem');
    $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
    $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
    $ci->db->where('nm_pumk_akom', $pumk);
    $ci->db->where('tgl_proses_akom', "");
    $ci->db->where('tgl_dispo !=',"");
    $ci->db->or_where('nm_pumk_akom', $pumk);
    $ci->db->where('tgl_proses_akom',null);
    $ci->db->where('tgl_dispo',null, false);
    $ci->db->or_where('nm_pumk_akom', $pumk);
    $ci->db->where('tgl_proses_akom',"");
    $ci->db->where('tgl_dispo',null, false);
    $ci->db->or_where('nm_pumk_akom', $pumk);
    $ci->db->where('tgl_proses_akom',null);
    $ci->db->where('tgl_dispo !=',"");
    
    $query= $ci->db->count_all_results();
    if ($query > 0)
   {
       return $query;
   }
   else
   {
       return 0;
   }
}

?>