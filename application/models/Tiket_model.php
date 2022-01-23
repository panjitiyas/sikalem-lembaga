<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket_model extends CI_Model {


    public function get($id=null)
    {
        $this->db->from ('tb_manifest');
        if($id != null) {
            $this->db->where('id_manifest',$id);
        }
        $this->db->order_by ('id_manifest', 'desc');
        $query= $this->db->get();
        return $query;
    }
    
    public function tambah($post)
    {
        $params=[
            'nmgiat' =>$post['nmgiat'],
            'direktorat' => $post['direktorat'],
            'spm'=> $post['spm'],
            'noinvoice'=> $post['noinvoice'],
            'nmorang'=> $post['nmorang'],
            'maskapai'=> $post['maskapai'],
            'noterbang'=> $post['noterbang'],
            'notiket'=> $post['notiket'],
            'kdbook'=> $post['kdbook'],
            'asal'=> $post['asal'],
            'tujuan'=> $post['tujuan'],
            'tglberangkat'=> $post['tglberangkat'],
            'tgltujuan'=> $post['tgltujuan'],
            'tiketdasar'=> str_replace('.',"",$post['tiketdasar']),
            'tikettotal'=> str_replace('.',"",$post['tikettotal']),
            'ket'=> $post['ket'],
        ];
        $this->db->insert('tb_manifest',$params);
    }
    public function ubah($post)
    {
        $params=[
            'nmgiat' =>$post['nmgiat'],
            'direktorat' => $post['direktorat'],
            'spm'=> $post['spm'],
            'noinvoice'=> $post['noinvoice'],
            'nmorang'=> $post['nmorang'],
            'maskapai'=> $post['maskapai'],
            'noterbang'=> $post['noterbang'],
            'notiket'=> $post['notiket'],
            'kdbook'=> $post['kdbook'],
            'asal'=> $post['asal'],
            'tujuan'=> $post['tujuan'],
            'tglberangkat'=> $post['tglberangkat'],
            'tgltujuan'=> $post['tgltujuan'],
            'tiketdasar'=> str_replace('.',"",$post['tiketdasar']),
            'tikettotal'=> str_replace('.',"",$post['tikettotal']),
            'ket'=> $post['ket'],
        ];
        
        $this->db->where('id_manifest', $post['id']);
        $this->db->update('tb_manifest',$params);
    }

    public function del($id)
    {
        $this->db->where('id_manifest', $id);
        $this->db->delete('tb_manifest');
    }
    // start datatables
    var $column_order = array('nmgiat', 'nmorang', 'maskapai'); //set column field database for datatable orderable
    var $column_search = array('nmgiat', 'nmorang', 'maskapai','noinvoice','notiket','kdbook','asal','tujuan','tglberangkat','tgltujuan'); //set column field database for datatable searchable
    var $order = array('id_manifest' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tb_manifest');
        $this->db->order_by ('id_manifest', 'desc');

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
        $this->db->from('tb_manifest');
        return $this->db->count_all_results();
    }
	// end datatables
}
