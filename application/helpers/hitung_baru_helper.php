<?php 
function hitung_baru ($bpp)
    {
        $ci= &get_instance();
        $ci->db->select('*');
        $ci->db->from('tb_bppem');
        $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        $ci->db->where('nm_bpp', $bpp);
        $ci->db->where('tgl_dispo', null);
        $ci->db->where('tgl_rev3', null);
        $ci->db->or_where('nm_bpp', $bpp);
        $ci->db->where('tgl_dispo', "");
        $ci->db->where('tgl_rev3', "");
        $ci->db->or_where('nm_bpp', $bpp);
        $ci->db->where('tgl_dispo', null);
        $ci->db->where('tgl_rev3', "");
        $ci->db->or_where('nm_bpp', $bpp);
        $ci->db->where('tgl_dispo', "");
        $ci->db->where('tgl_rev3', null);
        
        
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