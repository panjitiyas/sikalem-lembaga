<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_verif_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        
        if($id != null) {
            $this->db->where('id_bppem',$id);
        }
        $this->db->order_by ('id_bppem', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function get_bpp()
    {
        $idsend = $this->fungsi->user_login()->bpp;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->where('nm_bpp',$idsend);
        $this->db->order_by ('id_bppem', 'desc');
        $query= $this->db->get();
        return $query;
    }

    public function update($post)
    {
            date_default_timezone_set("Asia/Jakarta");
            $get =$this->get($post['id'])->row();

           
            if (empty($get->tgl_proses)){
                if($get->k_subs == 'Pengembangan'){
                    $sub ='PNB';
                } elseif($get->k_subs == 'Penataan'){
                    $sub = 'PNT';
                } elseif($get->k_subs == 'Penguatan'){
                    $sub = 'PNG';
                } elseif($get->k_subs == 'Pengendalian'){
                    $sub = 'PND';
                } elseif($get->k_subs == 'Penilaian Kinerja'){
                    $sub = 'PNK';
                } elseif($get->k_subs == 'Tata Usaha'){
                    $sub = 'TU';
                }
    
                if($post['nm_pumk'] == 'Siska_Alce_P'){
                    $pumk ='SA';
                } elseif($post['nm_pumk'] == 'Marwanto'){
                    $pumk = 'MW';
                } elseif($post['nm_pumk'] == 'Budi_Setiawan'){
                    $pumk = 'BS';
                } elseif($post['nm_pumk'] == 'Irawan'){
                    $pumk = 'IW';
                } elseif($post['nm_pumk'] == 'Handika_Pramudya'){
                    $pumk = 'HP';
                } elseif($post['nm_pumk'] == 'Andita_Pratiwi'){
                    $pumk = 'AP';
                } elseif($post['nm_pumk'] == 'Reni_Anggraeni'){
                    $pumk = 'RA';
                }
                $idproses ='idgiat.'.$sub.'.'.$pumk.'.'.date('dmy',strtotime($get->tgl_mulai)).trim(str_replace("/","",$get->no_undangan));
                $params= [
                    'nm_pumk' => str_replace('_',' ',$post['nm_pumk']),
                    'id_proses' =>$idproses,
                    'kd_anggaran' =>$post['kd_anggaran'],
                    'catat_subs' => $post['catat_subs'],
                    'nota_pumk' => $post['nota_pumk'],
                    'tolak'=>$post['tolak']
                ];
                if ($post['sis_byr']==1){
                    $params['sis_byr']='LS';
                } elseif ($post['sis_byr']==2){
                    $params['sis_byr']='GUP';
                } elseif ($post['sis_byr']==3){
                    $params['sis_byr']='TUP';
                } elseif ($post['sis_byr']==0){
                    $params['sis_byr']='';
                } elseif ($post['sis_byr']==null) {
                    $params['sis_byr']='';
                }

                if ($post['sis_byr_hr']==1){
                    $params['sis_byr_hr']='LS';
                } elseif ($post['sis_byr_hr']=2){
                    $params['sis_byr_hr']='GUP';
                } elseif ($post['sis_byr_hr']=3){
                    $params['sis_byr_hr']='TUP';
                } elseif ($post['sis_byr_hr']=0){
                    $params['sis_byr_hr']='';
                } elseif ($post['sis_byr_hr']=null){
                    $params['sis_byr_hr']='';
                }

                if ($post['sis_byr_akom']==1){
                    $params['sis_byr_akom']='LS';
                    $params['nm_pumk_akom']='Putri Nailatul Himma';
                } elseif ($post['sis_byr_akom']==2){
                    $params['sis_byr_akom']='GUP';
                    $params['nm_pumk_akom']='Putri Nailatul Himma';
                } elseif ($post['sis_byr_akom']==3){
                    $params['sis_byr_akom']='TUP';
                    $params['nm_pumk_akom']='Putri Nailatul Himma';
                } elseif ($post['sis_byr_akom']==0){
                    $params['sis_byr_akom']='';
                    $params['nm_pumk_akom']='';
                } elseif ($post['sis_byr_akom']==null){
                    $params['sis_byr_akom']='';
                    $params['nm_pumk_akom']='';
                }
                if(empty($get->tgl_dispo)) {
                    if (empty($post['catat_subs']) && empty($get->catat_subs) && empty($get->tgl_rev3) && empty($post['tgl_rev3'] )|| !empty($post['catat_subs']) && !empty($get->catat_subs) && empty($get->tgl_terima_rev3) && !empty($post['tgl_terima_rev3']) && !empty($get->tgl_rev3) ){
                        $params['tgl_dispo'] = date('d-m-Y H:i');
                    } else {
                        $params['tgl_dispo'] = "";
                    }
                } else {
                    $params['tgl_dispo'] = $get->tgl_dispo;
                }

                if(empty($get->tgl_terima_rev3)){
                    if (!empty($post['tgl_terima_rev3'])){
                        $params['tgl_terima_rev3'] = date('d-m-Y H:i');
                    }else{
                        $params['tgl_terima_rev3'] = "";
                    }
                } else {
                    $params['tgl_terima_rev3'] = $get->tgl_terima_rev3;
                }
                
                if(empty($get->tgl_rev3)){
                    if (!empty($post['catat_subs']) && $get->catat_subs==null){
                        $params['tgl_rev3'] = date('d-m-Y H:i');
                    };
                } else {
                    $params['tgl_rev3'] = $get->tgl_rev3;
                }
                // if ($post['tolak']==1){
                //     $params['tolak']=="1";
                // }elseif ($post['tolak']==2){
                //     $params['tolak']="2";
                // }else{
                //     $params['tolak']="";
                // }

            } else {
                $params=[
                    'nm_pumk' => $get->nm_pumk,
                    'kd_anggaran' => $get->kd_anggaran,
                    'sis_byr' => $get->sis_byr,
                    'sis_byr_hr' => $get->sis_byr_hr,
                    'sis_byr_akom' => $get->sis_byr_akom,
                    'catat_subs' => $get->catat_subs,
                    'catat_pumk'=>$post['catat_pumk'],
                ];
                if(empty($get->tgl_rev1)){
                    if ($post['catat_pumk']!=""){
                        if ($post['tgl_rev1']==1){
                            $params ['tgl_rev1']= date('d-m-Y H:i');
                        } else {
                            $params ['tgl_rev1']= null;
                        }
                    }
                } else {
                    $params ['tgl_rev1'] = $get->tgl_rev1;
                }

                if (!empty($get->tgl_terima_rev1)){
                    if(!empty($get->tgl_rev2)){
                        if ($post['tgl_rev2']==1){
                            $params ['tgl_rev2']= date('d-m-Y H:i');
                        } else {
                            $params ['tgl_rev2']=null;
                        }
                    }
                } else {
                    $params ['tgl_rev2']=$get->tgl_rev2;
                }
                if(empty($get->tgl_ok)){
                    if ($post['tgl_ok']==1){
                        $params ['tgl_ok']= date('d-m-Y H:i');
                    } else {
                        $params ['tgl_ok']=null;
                    }
                } else {
                    $params ['tgl_ok']=$get->tgl_ok;
                };

                if(!empty($get->tgl_rev1)){
                    if ($post['tgl_terima_rev1']==1){
                        $params['tgl_terima_rev1'] = date('d-m-Y H:i');
                    }
                };
                if(!empty($get->tgl_rev2)){
                    if ($post['tgl_terima_rev2']==1){
                        $params['tgl_terima_rev2'] = date('d-m-Y H:i');
                    }
                };
            };

        $this->db->where('id_bppem', $post['id']);
        $this->db->update('tb_bppem',$params);
    }

    public function proses_umk($post)
    {
            $params = [
                'tgl_umk'   => $post['tgl_umk'],
                'nilai_umk' => str_replace(".","",$post['nilai_umk']),
            ];
        $this->db->where('id_bppem', $post['id']);
        $this->db->update('tb_bppem',$params);
    }
    private function data_bpp ()
    {
        $idbpp = $this->fungsi->user_login()->bpp;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->where('nm_bpp', $idbpp);
    }
    private function data_nonbpp ()
    {
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
    }

    public function del($id)
    {
        $this->db->where('id_bppem', $id);
        $this->db->delete('tb_bppem');
    }
    // start datatables
    var $column_order = array(null, 'tgl_terima', null, 'k_subs', null, null, null, 'nm_pumk', null); //set column field database for datatable orderable
    var $column_search = array('nm_keg','no_undangan','nm_pumk','nm_bpp'); //set column field database for datatable searchable
    var $order = array('id_bppem' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        if ($this->fungsi->user_login()->level!=6){
            $this->data_nonbpp();
        } else {
            $this->data_bpp();
        }
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('tb_bppem');
        return $this->db->count_all_results();
    }
	// end datatables
}
