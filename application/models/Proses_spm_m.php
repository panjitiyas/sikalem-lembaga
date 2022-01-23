<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_spm_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_spm');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_spm.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_spm.id_pumk');
        $this->db->join('tb_spp','tb_spp.id_spp=tb_spm.id_spp');
        // $this->db->join('p_spm','p_spm.spmid=tb_spm.spmid');
        
        if($id != null) {
            $this->db->where('id_spm',$id);
        }
        $this->db->order_by ('id_spm', 'desc');
        $query= $this->db->get();
        return $query;
    }

    public function update($post)
    {
        $params = [
            'no_spm' => $post['no_spm'],
            'tgl_spm' => date('Y-m-d', strtotime($post['tgl_spm'])),
            'nilai_spm' => str_replace (".","",$post['nilai_spm']),
            'no_sp2d' => $post['no_sp2d'],
            'tgl_sp2d' => date('Y-m-d', strtotime($post['tgl_sp2d'])),
            'nilai_sp2d' => str_replace (".","",$post['nilai_sp2d']),
            'spmid' => $post['operator'],
            
        ];
        $this->db->where('id_spm', $post['id']);
        $this->db->update('tb_spm',$params);
    }

    public function del($id)
    {
        $this->db->where('id_spm', $id);
        $this->db->delete('tb_spm');
    }
    // start datatables
    var $column_order = array(null, null, 'tgl_mulai', 'no_spp', 'tgl_spp', 'nilai_spp', 'nilai_spp', 'sppid','spmid'); //set column field database for datatable orderable
    var $column_search = array('nm_keg', 'tgl_mulai', 'no_spp', 'tgl_spp', 'nilai_spp', 'nilai_spp', 'sppid', 'spmid'); //set column field database for datatable searchable
    var $order = array('id_spm' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tb_spm');
        $this->db->join('tb_ptu', 'tb_ptu.id_keg=tb_spm.id_keg');
        $this->db->join('tb_pumk', 'tb_pumk.id_pumk=tb_spm.id_pumk');
        $this->db->join('tb_spp', 'tb_spp.id_spp=tb_spm.id_spp');
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
        $this->db->from('tb_spm');
        return $this->db->count_all_results();
    }
	// end datatables
}
