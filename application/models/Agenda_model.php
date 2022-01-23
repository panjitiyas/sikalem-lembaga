<?php

class Agenda_model extends CI_Model
{

    public function get_events()
    {
        $this->db->order_by('id_agenda');
        return $this->db->get('tb_agenda');
    }
    public function get_giat($id)
    {
        $this->db->select('*');
        $this->db->from('tb_agenda');
        $this->db->where('title',$id);

        // $query= $this->db->get()->result();
        // return $query;

    }
    public function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('tb_pegawai');

        $query = $this->db->get();
        return $query;
    }
    public function get_total()
    {
        $this->db->select('title,description,substansi,start,end,SUM(IF(MONTH(start)=01,nilai,0)) AS Januari,
        SUM(IF(MONTH(start)=02,nilai,0)) AS Februari,SUM(IF(MONTH(start)=03,nilai,0)) AS Maret,SUM(IF(MONTH(start)=04,nilai,0)) AS April,SUM(IF(MONTH(start)=05,nilai,0)) AS Mei,
        SUM(IF(MONTH(start)=06,nilai,0)) AS Juni,SUM(IF(MONTH(start)=07,nilai,0)) AS Juli,SUM(IF(MONTH(start)=08,nilai,0)) AS Agustus,SUM(IF(MONTH(start)=09,nilai,0)) AS September,
        SUM(IF(MONTH(start)=10,nilai,0)) AS Oktober,SUM(IF(MONTH(start)=11,nilai,0)) AS November,SUM(IF(MONTH(start)=12,nilai,0)) AS Desember,
        SUM(nilai) AS Total',FALSE);
        $this->db->from('tb_agenda');
        $this->db->join('tb_pegawai', 'tb_agenda.title=tb_pegawai.nm_pegawai');
        $this->db->group_by("nm_pegawai");
        $this->db->order_by('nm_pegawai','ASC');
        // $this->db->having("arsip_gup !=", null);
        // $this->db->having(array("arsip_gup !="=>null,"arsip_gup >"=> 0));
        // $this->db->select_sum('nilai');
        $query= $this->db->get();
        
        return $query;  
    }
    public function add_event($data)
    {
        return $this->db->insert_batch("tb_agenda", $data);
    }

    public function get_event($id)
    {
        $this->db->where("id_agenda", $id);
        return $this->db->get("tb_agenda");
    }
    public function update_event($id, $data)
    {
        $this->db->where("id_agenda", $id);
        $this->db->update("tb_agenda", $data);
    }
    public function delete_event($id)
    {
        $this->db->where("id_agenda", $id);
        $this->db->delete("tb_agenda");
    } 
    public function dragUpdateEvent()
    {
        //$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

        $sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
        $this->db->query($sql, array($_POST['start'], $_POST['end'], $_POST['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

     // start datatables
     var $column_order = array(null,'description','substansi','start','end','nilai'); //set column field database for datatable orderable
     var $column_search = array('description','substansi','start','end'); //set column field database for datatable searchable
     var $order = array('id_agenda' => 'desc'); // default order 
 
     private function _get_datatables_query()
     {
         
        $id=$_POST['id'];
        $this->db->select('*');
        $this->db->from('tb_agenda');
        $this->db->where('title',$id);
         
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
         $this->db->from('tb_agenda');
         return $this->db->count_all_results();
     }
     // end datatables
  
}
