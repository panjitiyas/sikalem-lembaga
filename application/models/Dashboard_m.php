<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_rekap.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_rekap.id_pumk');
        $this->db->join('tb_spp','tb_spp.id_spp=tb_rekap.id_spp');
        $this->db->join('tb_spm','tb_spm.id_spm=tb_rekap.id_spm');
        $this->db->join('tb_verif','tb_verif.id_verif=tb_rekap.id_verif');
        
        
        if($id != null) {
            $this->db->where('id_rekap',$id);
        }
        $this->db->order_by ('id_rekap', 'desc');
        $query= $this->db->get();
        return $query;
    }

    public function count_masuk ()
    {
       $query=$this->db->get('tb_ptu');
       if ($query->num_rows() > 0)
       {
           return $query->num_rows();
       }
       else
       {
           return 0;
       }

    }
    public function count_lpj ()
    {
        $this->db->from('tb_pumk');
        $this->db->where('tgl_lpj !=', "");
        
        $query= $this->db->count_all_results();
        if ($query > 0)
       {
           return $query;
       }
       else
       {
           return 0;
       }
    }
    public function count_spp ()
    {
        $this->db->from('tb_spp');
        $this->db->where('tgl_spp !=', "");
        
        $query= $this->db->count_all_results();
        if ($query > 0)
       {
           return $query;
       }
       else
       {
           return 0;
       }
    }
    public function count_spm ()
    {
        $this->db->from('tb_spm');
        $this->db->where('tgl_spm !=', "");
        
        $query= $this->db->count_all_results();
        if ($query > 0)
       {
           return $query;
       }
       else
       {
           return 0;
       }
    }
    public function count_sp2d ()
    {
        $this->db->from('tb_spm');
        $this->db->where('tgl_sp2d !=', "");
        
        $query= $this->db->count_all_results();
        if ($query > 0)
       {
           return $query;
       }
       else
       {
           return 0;
       }
    }
    public function jumlah_ls()
    {
        $this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_rekap.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_rekap.id_pumk');
        $this->db->join('tb_spp','tb_spp.id_spp=tb_rekap.id_spp');
        $this->db->join('tb_spm','tb_spm.id_spm=tb_rekap.id_spm');
        $this->db->join('tb_verif','tb_verif.id_verif=tb_rekap.id_verif');
        
        $this->db->group_by(array('month(tgl_spp)'),'sis_bayar');
        $this->db->where(array('sis_bayar'=>'LS','nilai_spp !='=>0));
        // $this->db->having('sis_bayar',"GUP");
        $this->db->select_sum('nilai_spp');
        $query= $this->db->get();
        
        return $query->result();
        
    }
    public function jumlah_gu()
    {
        $this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_rekap.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_rekap.id_pumk');
        $this->db->join('tb_spp','tb_spp.id_spp=tb_rekap.id_spp');
        $this->db->join('tb_spm','tb_spm.id_spm=tb_rekap.id_spm');
        $this->db->join('tb_verif','tb_verif.id_verif=tb_rekap.id_verif');
        
        $this->db->group_by('month(tgl_spp)');
        $this->db->where(array('sis_bayar'=>'GUP','no_spp !='=>'','nilai !='=>0));
        $this->db->select_sum('nilai');
        $query= $this->db->get();
        
        return $query->result();
        
    }
    

}
