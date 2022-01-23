<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_pumk_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        
        if($id != null) {
            $this->db->where('id_bppem',$id);
        }
        $this->db->order_by ('id_bppem', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function get_pumk()
    {
       
        
            $idsend = $this->fungsi->user_login()->nama;
            $this->db->select('*');
            $this->db->from('tb_pumk');
            $this->db->join('tb_ptu','tb_ptu.id_keg=tb_pumk.id_keg');
            $this->db->where('nm_bpp',$idsend);
            $this->db->order_by ('id_pumk', 'desc');
            $query= $this->db->get();
            return $query;
        
    }

    public function update($post)
    {
        date_default_timezone_set("Asia/Jakarta");
        $get=$this->get($post['id'])->row();
    if ($this->fungsi->user_login()->nama!="Putri Nailatul Himma"){
        $params =[
            'nme_pumk' => $get->nm_pumk,
            'nilai_pd1'     => $post['nilai_pd1'],
            'akun_pd1'     => $post['akun_pd1'],
            'kdpagu'       => $post['kdpagu']
        ];
        if(!empty($get->tgl_umk)){
            if ($post['tgl_lpj']=="1"){
                $params['tgl_lpj']=date('d-m-Y H:i');            
            }else{
                $params['tgl_lpj']=null;  
            }
        }
        if (empty($get->tgl_proses)){
            if ($post['tgl_proses']=="1"){
                $params['tgl_proses']=date('d-m-Y H:i');
            } else {
                $params['tgl_proses']=null;
            }
        } else {
            $params['tgl_proses']=$get->tgl_proses;
        }
        if (!empty($post['nilai_pd1'])){
            $params['nilai_pd1'] = str_replace(".","",$post['nilai_pd1']);
            $params['akun_pd1'] = $post['akun_pd1'];
        }
        if (!empty($post['nilai_pd2'])){
            $params['nilai_pd2'] = str_replace(".","",$post['nilai_pd2']);
            $params['akun_pd2'] = $post['akun_pd2'];
        }
        if (!empty($post['nilai_pd3'])){
            $params['nilai_pd3'] = str_replace(".","",$post['nilai_pd3']);
            $params['akun_pd3'] = $post['akun_pd3'];
        }
        if (!empty($post['nilai_hr'])){
            $params['nilai_hr'] = str_replace(".","",$post['nilai_hr']);
            $params['akun_hr'] = '522151';
        }
        if($post['dok_aju']!=null){
            $params ['dok_aju'] = $post['dok_aju'];
        }
    } else {
        $params =[
            'nme_pumk_akom' => $get->nm_pumk_akom,
        ];
        if (empty($get->tgl_proses_akom)){
            if ($post['tgl_proses_akom']=="1"){
                $params['tgl_proses_akom']=date('d-m-Y H:i');
            } else {
            $params['tgl_proses_akom']=null;
            }
         } else {
            $params['tgl_proses_akom']= $get->tgl_proses_akom;
         }
         
         if (!empty($post['nilai_ak'])){
            $params['nilai_ak'] = str_replace(".","",$post['nilai_ak']);
            $params['akun_ak'] = $post['akun_ak'];
        }
         if ($post['tgl_selesaiproses_akom']=="1"){
            $params['tgl_selesaiproses_akom']=date('d-m-Y H:i');
        }else{
            $params['tgl_selesaiproses_akom']=null;
        }
    }
        $this->db->where('id_pumk', $post['id']);
        $this->db->update('tb_pumk',$params);
    }

    public function del($id)
    {
        $this->db->where('id_pumk', $id);
        $this->db->delete('tb_pumk');
    }
    private function table_pumk(){
        $idsend = $this->fungsi->user_login()->nama;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        // if($this->fungsi->user_login()->nama=="Putri Nailatul Himma"){
        //     $this->db->where('nm_pumk_akom','Putri Nailatul Himma');
        //     $this->db->where('tgl_dispo !=',"");
        // } else {
        //     $this->db->where('nm_pumk',$idsend);
        //     $this->db->where('tgl_dispo !=',"");
        // }
        $this->db->where('nm_pumk',$idsend);
        $this->db->where('tgl_dispo !=',"");
        
        // $this->db->where('dok_aju',null);
        // $this->db->order_by ('id_bppem', 'desc');

    }
    private function table_pumk_akom(){
        $idsend = 'Putri Nailatul Himma';
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->where('nm_pumk_akom',$idsend);
        $this->db->where('tgl_dispo !=',"");


    }
    private function nonpumk(){
        
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->where('tgl_dispo !=',"");
        // $this->db->order_by ('id_bppem', 'desc');
        
    }
    // start datatables
    var $column_order = array('k_subs','nm_keg','tgl_mulai', 'nm_bpp','sis_byr_akom','tgl_proses_akom','tgl_selesaiproses'); //set column field database for datatable orderable
    var $column_search = array('k_subs', 'nm_keg','no_undangan','tgl_mulai','tgl_selesai','nm_bpp','nm_pumk'); //set column field database for datatable searchable
    var $order = array('tgl_dispo' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        if ($this->fungsi->user_login()->level!=5){
            $this->nonpumk();
        } else {
            if($this->fungsi->user_login()->nama!='Putri Nailatul Himma'){
                $this->table_pumk();
            } else {
                $this->table_pumk_akom();
            }
        }
        // $idsend = $this->fungsi->user_login()->nama;
        // $this->db->select('*');
        // $this->db->from('tb_bppem');
        // $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        // $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        // $this->db->like('nm_pumk',$idsend);
        
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

    // start datatables
    var $column_order_akom = array('k_subs','nm_keg','tgl_mulai', 'nm_bpp','sis_byr_akom','tgl_proses_akom','tgl_selesaiproses'); //set column field database for datatable orderable
    var $column_search_akom = array('k_subs', 'nm_keg','nm_bpp'); //set column field database for datatable searchable
    var $order_akom = array('id_bppem' => 'desc'); // default order 

    private function _get_datatables_query_akom()
    {

        $this->table_pumk_akom();

        
        // $idsend = $this->fungsi->user_login()->nama;
        // $this->db->select('*');
        // $this->db->from('tb_bppem');
        // $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_bppem.id_keg');
        // $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_bppem.id_pumk');
        // $this->db->like('nm_pumk',$idsend);
        
        $i = 0;
        foreach ($this->column_search_akom as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_akom) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_akom[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_akom)) {
            $order = $this->order_akom;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    function get_datatables_akom()
    {
        $this->_get_datatables_query_akom();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_akom()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_akom()
    {
        $this->db->from('tb_bppem');
        return $this->db->count_all_results();
    }
	// end datatables
}
