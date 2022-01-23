<?php

use phpDocumentor\Reflection\Types\Null_;

function cek_already_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if($user_session){
        redirect ('dashboard');
    }
}

function cek_not_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if(!$user_session){
        redirect ('auth/login');
    }
}
function cek_admin(){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level !=1 && $ci->fungsi->user_login()->level !=2){
        redirect ('dashboard'); 
    }
}

function count_prosessub ($sub)
{
    $ci=& get_instance();        
    $ci->db->select('*');
    $ci->db->from('tb_bppem');
    $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
    $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
    $ci->db->where('k_subs', $sub);
    $ci->db->where('tgl_proses !=',"");
    $ci->db->where('tgl_lpj',"");
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses !=', null);
    $ci->db->where('tgl_lpj', null);
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses !=', "");
    $ci->db->where('tgl_lpj', null);
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses !=', null);
    $ci->db->where('tgl_lpj', "");
    
    $query= $ci->db->count_all_results();
    if ($query > 0)
    {
        return $query;
    }
    else
    {
        return 0;
    }
    // return $query;
}
function count_lpjsub ($sub)
{
        $ci=& get_instance();        
        $ci->db->select('*');
        $ci->db->from('tb_bppem');
        $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        $ci->db->where('k_subs', $sub);
        $ci->db->where('tgl_proses !=', "");
        $ci->db->where('tgl_lpj !=', "");
        $ci->db->or_where('k_subs', $sub);
        $ci->db->where('tgl_proses !=', null);
        $ci->db->where('tgl_lpj !=', null);
        $ci->db->or_where('k_subs', $sub);
        $ci->db->where('tgl_proses !=', "");
        $ci->db->where('tgl_lpj !=', null);
        $ci->db->or_where('k_subs', $sub);
        $ci->db->where('tgl_proses !=', null);
        $ci->db->where('tgl_lpj !=', "");
        
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
function count_masuksub ($sub)
{
    $ci=& get_instance();
    $ci->db->select('*');
    $ci->db->from('tb_bppem');
    $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
    $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
    $ci->db->where('k_subs', $sub);
    $ci->db->where('tgl_proses', "");
    $ci->db->where('tgl_lpj', "");
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses', null);
    $ci->db->where('tgl_lpj', null);
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses', "");
    $ci->db->where('tgl_lpj', null);
    $ci->db->or_where('k_subs', $sub);
    $ci->db->where('tgl_proses', null);
    $ci->db->where('tgl_lpj', "");

    $query= $ci->db->count_all_results();
    if ($query> 0)
    {
        return $query;
    }
    else
    {
        return 0;
    }
   
}



    function count_prosesbp ($bpp)
        {
            $ci=& get_instance();        
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses !=',"");
            $ci->db->where('tgl_lpj',"");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj', "");
            
            $query= $ci->db->count_all_results();
            if ($query > 0)
            {
                return $query;
            }
            else
            {
                return 0;
            }
            // return $query;
        }
    function count_lpjbp ($bpp)
        {
                $ci=& get_instance();        
                $ci->db->select('*');
                $ci->db->from('tb_bppem');
                $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
                $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
                $ci->db->where('nm_bpp', $bpp);
                $ci->db->where('tgl_proses !=', "");
                $ci->db->where('tgl_lpj !=', "");
                $ci->db->or_where('nm_bpp', $bpp);
                $ci->db->where('tgl_proses !=', null);
                $ci->db->where('tgl_lpj !=', null);
                $ci->db->or_where('nm_bpp', $bpp);
                $ci->db->where('tgl_proses !=', "");
                $ci->db->where('tgl_lpj !=', null);
                $ci->db->or_where('nm_bpp', $bpp);
                $ci->db->where('tgl_proses !=', null);
                $ci->db->where('tgl_lpj !=', "");
                
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
    function count_masukbp ($bpp)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', "");

            $query= $ci->db->count_all_results();
            if ($query> 0)
            {
                return $query;
            }
            else
            {
                return 0;
            }
           
        }

    function count_proses ()
        {
            $ci=& get_instance();        
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('tgl_proses !=',"");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj ', null);
            $ci->db->or_where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj ', null);
            $ci->db->or_where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj ', "");
            
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
    function count_lpj ()
        {
                $ci=& get_instance();        
                $ci->db->select('*');
                $ci->db->from('tb_bppem');
                $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
                $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
                $ci->db->where('tgl_proses !=',"");
                $ci->db->where('tgl_lpj !=',"");
                $ci->db->or_where('tgl_proses !=', null);
                $ci->db->where('tgl_lpj !=', NULL);
                $ci->db->or_where('tgl_proses !=', "");
                $ci->db->where('tgl_lpj !=', NULL);
                $ci->db->or_where('tgl_proses !=', null);
                $ci->db->where('tgl_lpj !=', "");
                
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
    function count_masuk ()
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('tgl_proses', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('tgl_proses', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('tgl_proses', null);
            $ci->db->where('tgl_lpj', "");
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
    function count_proses2 ($pumk)
        {
            $ci=& get_instance();        
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=',"");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj ', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj ', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj ', "");
            
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
    function count_lpj2 ($pumk)
        {
                $ci=& get_instance();        
                $ci->db->select('*');
                $ci->db->from('tb_bppem');
                $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
                $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
                $ci->db->where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses !=', "");
                $ci->db->where('dok_aju!=', "");
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses !=', NULL);
                $ci->db->where('dok_aju !=', NULL);
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses !=', "");
                $ci->db->where('dok_aju !=', NULL);
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses !=', NULL);
                $ci->db->where('dok_aju !=', "");
                
                $query= $ci->db->count_all_results();
                if ($query > 0)
            {
                return $query;
            }
            else
            {
                return 0;
            }
            // pre(<"">);
            // print_r($query);
        }
    function count_masuk2 ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj',"");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj',"");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj',null);
            $ci->db->where('tgl_dispo !=', "");

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

        function count_prosesakom ($pumk)
        {
            $ci=& get_instance();        
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            
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
    function count_lpjakom ($pumk)
        {
                $ci=& get_instance();        
                $ci->db->select('*');
                $ci->db->from('tb_bppem');
                $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
                $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
                $ci->db->where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses_akom !=', "");
                $ci->db->where('tgl_selesaiproses_akom!=', "");
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses_akom !=', null);
                $ci->db->where('tgl_selesaiproses_akom!=', null);
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses_akom !=', "");
                $ci->db->where('tgl_selesaiproses_akom!=', null);
                $ci->db->or_where('nm_pumk', $pumk);
                $ci->db->where('tgl_proses_akom !=', null);
                $ci->db->where('tgl_selesaiproses_akom!=', "");
                
                
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
    function count_masukakom ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', Null);
            $ci->db->where('tgl_selesaiproses_akom', Null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', Null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', Null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");

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
    
        function hitung_data ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', "");
            $ci->db->where('tgl_dispo !=', "");
            
            
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
       
    function hitung_proses ($pumk)
        {
            $ci = &get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses!=', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses!=', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses!=', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses!=', null);
            $ci->db->where('tgl_lpj', "");


            $query = $ci->db->count_all_results();
            if ($query > 0) {
                return $query;
            } else {
                return 0;
            }
        }

    function hitung_lpj ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk',$pumk);
            $ci->db->where('tgl_proses !=',"");
            $ci->db->where('tgl_lpj!=',"");
            $ci->db->or_where('nm_pumk',$pumk);
            $ci->db->where('tgl_proses !=',NULL);
            $ci->db->where('tgl_lpj!=',NULL);
            $ci->db->or_where('nm_pumk',$pumk);
            $ci->db->where('tgl_proses !=',"");
            $ci->db->where('tgl_lpj!=',NULL);
            $ci->db->or_where('nm_pumk',$pumk);
            $ci->db->where('tgl_proses !=',NULL);
            $ci->db->where('tgl_lpj!=',"");
            
                
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

    function hitung_data2 ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses', null);
            $ci->db->where('tgl_lpj', "");
            $ci->db->where('tgl_dispo !=', "");
            
            
            
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

    function hitung_proses2 ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj', "");
            
            
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

    function hitung_lpj2 ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj !=', "");
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj !=', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', "");
            $ci->db->where('tgl_lpj !=', null);
            $ci->db->or_where('nm_pumk', $pumk);
            $ci->db->where('tgl_proses !=', null);
            $ci->db->where('tgl_lpj !=', "");
            
            
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

    function hitung_dataakom ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', null);
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom', null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");
            
            
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

    function hitung_prosesakom ($pumk)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            
            
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

    function hitung_lpjakom($pumk)
        {
            $ci = &get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom !=', "");
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom !=', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom !=', null);
            $ci->db->or_where('nm_pumk_akom', $pumk);
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom !=', "");


            $query = $ci->db->count_all_results();
            if ($query > 0) {
                return $query;
            } else {
                return 0;
            }
        }

    function hitung_dataakom2 ($bpp)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom', null);
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom', "");
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->where('tgl_dispo !=', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom', null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->where('tgl_dispo !=', "");
            
            
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

    function hitung_prosesakom2 ($bpp)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom', "");
            
            
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

    function hitung_lpjakom2 ($bpp)
        {
            $ci=& get_instance();
            $ci->db->select('*');
            $ci->db->from('tb_bppem');
            $ci->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
            $ci->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom !=', "");
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom !=', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', "");
            $ci->db->where('tgl_selesaiproses_akom !=', null);
            $ci->db->or_where('nm_bpp', $bpp);
            $ci->db->where('nm_pumk_akom','Putri Nailatul Himma');
            $ci->db->where('tgl_proses_akom !=', null);
            $ci->db->where('tgl_selesaiproses_akom !=', "");
            
            
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





