<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_rek_m extends CI_Model {


    public function get($id=null)
    {
        $this->db->from ('tb_rek');
        if($id != null) {
            $this->db->where('id_rek',$id);
        }
        $this->db->order_by ('id_rek', 'asc');
        $query= $this->db->get();
        return $query;
    }
    
    public function tambah($post)
    {
        $params = [
            'nama_rek' => $post['nama_rek'],
            'instansi'=>$post['instansi'],
            'nama_bank' => $post['nama_bank'],
            'no_rek' => $post['no_rek'],
            'no_telp' => $post['no_telp'],          
        ];
        $this->db->insert('tb_rek',$params);
    }
    public function ubah($post)
    {
        $params = [
            'nama_rek' => $post['nama_rek'],
            'instansi'=>$post['instansi'],
            'nama_bank' => $post['nama_bank'],
            'no_rek' => $post['no_rek'],
            'no_telp' => $post['no_telp'],          
        ];
        
        $this->db->where('id_rek', $post['id']);
        $this->db->update('tb_rek',$params);
    }

    public function del($id)
    {
        $this->db->where('id_rek', $id);
        $this->db->delete('tb_rek');
    }
   public function user(){
        $user_subs = $this->fungsi->user_login()->subs;
        $this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_rekap.id_rek');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_rekap.id_pumk');
        $this->db->join('tb_bppem', 'tb_bppem.id_bppem=tb_rekap.id_bppem');

        // $this->db->select('*');
        // $this->db->from ('tb_spp');
        // $this->db->join('tb_rek', 'tb_rek.id_rek=tb_spp.id_rek');
        // $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_spp.id_pumk');
        $this->db->where('k_subs',$user_subs);
        // $this->db->order_by ('id_spp', 'desc');
    }
    public function non_user(){
        $this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_rekap.id_rek');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_rekap.id_pumk');
        $this->db->join('tb_bppem', 'tb_bppem.id_bppem=tb_rekap.id_bppem');
        // $this->db->join('tb_spp', 'tb_spp.id_spp=tb_rekap.id_spp');
        // $this->db->join('tb_spm', 'tb_spm.id_spm=tb_rekap.id_spm');
        

        // $this->db->select('*');
        // $this->db->from ('tb_spp');
        // $this->db->join('tb_rek', 'tb_rek.id_rek=tb_spp.id_rek');
        // $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_spp.id_pumk');
        // $this->db->order_by ('id_spp', 'desc');
    }
    // start datatables
    var $column_order = array(null, 'nama_rek', 'instansi', 'nama_bank', null, null, null); //set column field database for datatable orderable
    var $column_search = array('nama_rek', 'instansi', 'nama_bank', 'no_rek'); //set column field database for datatable searchable
    var $order = array('id_rek' => 'dsc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tb_rek');
        $this->db->order_by ('id_rek', 'dsc');

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
        $this->db->from('tb_rek');
        return $this->db->count_all_results();
    }
	// end datatables
}
