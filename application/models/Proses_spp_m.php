<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_spp_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_spp');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_spp.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_spp.id_pumk');
        // $this->db->join('p_spp','p_spp.sppid=tb_spp.sppid');
        
        if($id != null) {
            $this->db->where('id_spp',$id);
        }
        $this->db->order_by ('id_spp', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function tot_gup()
    {
        $this->db->select('*');
        $this->db->from('tb_spp');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_spp.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_spp.id_pumk');
        $this->db->group_by("arsip_gup");
        // $this->db->having("arsip_gup !=", null);
        $this->db->having(array("arsip_gup !="=>null,"arsip_gup >"=> 0));
        $this->db->select_sum('nilai');
        $query= $this->db->get('');
        
        return $query;
        
    }

    public function update($post)
    {
        $params = [
            'no_spp' => $post['no_spp'],
            'tgl_spp' => date('Y-m-d', strtotime($post['tgl_spp'])) ,
            'nilai_spp' => str_replace (".","",$post['nilai_spp']),
            'arsip_gup' => $post['arsip_gup'],
            'sppid' => $post['operator'],
            
        ];
        $this->db->where('id_spp', $post['id']);
        $this->db->update('tb_spp',$params);
    }

    public function del($id)
    {
        $this->db->where('id_spp', $id);
        $this->db->delete('tb_spp');
    }
    // start datatables
    var $column_order = array(null, null,'tgl_mulai', 'tgl_selesai', 'lokasi', 'arsip_gup','nilai_spp','sppid'); //set column field database for datatable orderable
    var $column_search = array('nm_keg','tgl_mulai','tgl_selesai', 'arsip_gup', 'nilai_spp', 'sppid'); //set column field database for datatable searchable
    var $order = array('id_spp' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tb_spp');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_spp.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_spp.id_pumk');
        $this->db->join('tb_verif', 'tb_verif.id_verif=tb_spp.id_keg');
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
        $this->db->from('tb_spp');
        return $this->db->count_all_results();
    }
	// end datatables
}
