<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_m extends CI_Model {

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

    public function get_excel($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        

        if ($id != null) {
            $this->db->where('id_bppem', $id);
        }
        $this->db->order_by('id_bppem', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function user(){
        $user_bpp = $this->fungsi->user_login()->bpp;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');

        // $this->db->join('tb_spp', 'tb_spp.id_spp=tb_rekap.id_spp');
        // $this->db->join('tb_spm', 'tb_spm.id_spm=tb_rekap.id_spm');
        $this->db->where('nm_bpp',$user_bpp);
    }
    private function pumk(){
        $user_pumk = $this->fungsi->user_login()->nama;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        // $this->db->join('tb_spp', 'tb_spp.id_spp=tb_rekap.id_spp');
        // $this->db->join('tb_spm', 'tb_spm.id_spm=tb_rekap.id_spm');
        $this->db->where('nm_pumk',$user_pumk);
    }
    private function admin(){
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        // $this->db->join('tb_spp', 'tb_spp.id_spp=tb_rekap.id_spp');
        // $this->db->join('tb_spm', 'tb_spm.id_spm=tb_rekap.id_spm');
    }

    // start datatables
    var $column_order = array(null, 'k_subs',null, 'tgl_mulai'); //set column field database for datatable orderable
    var $column_search = array('nm_keg', 'nm_bpp','nm_pumk','tgl_mulai','no_undangan'); //set column field database for datatable searchable
    var $order = array('id_bppem' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        // $this->admin();
        if ($this->fungsi->user_login()->level==6){
            $this->user();
        } else {
            $this->admin();
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
