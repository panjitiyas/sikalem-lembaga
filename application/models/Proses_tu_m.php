<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_tu_m extends CI_Model {


    public function get($id=null)
    {
        $this->db->from ('tb_ptu');
        if($id != null) {
            $this->db->where('id_keg',$id);
        }
        $this->db->order_by ('id_keg', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function get_bpp()
    {
        $user_bpp = $this->fungsi->user_login()->bpp;
        $this->db->select('*');
        $this->db->from ('tb_bpp');
        $this->db->where('nm_bpp',$user_bpp);
        // $this->db->order_by ('id_keg', 'desc');
        $query= $this->db->get()->row();
        return $query;
    }
    public function get_subs()
    {
        $user_subs = $this->fungsi->user_login()->subs;
        $this->db->select('*');
        $this->db->from ('tb_ksubs');
        $this->db->where('nm_ksub',$user_subs);
        // $this->db->order_by ('id_keg', 'desc');
        $query= $this->db->get()->row();
        return $query;
    }
    public function cek_undangan($no_undangan=null)
    {
    $this->db->from('tb_ptu');
    $this->db->where('no_undangan',$no_undangan);
    $query=$this->db->get();
    return $query;

    
    }

    public function tambah($post)
    {
        $params = [
            'tgl_terima' => $post['tgl_terima'],
            'no_undangan'=>$post['no_undangan'],
            'k_subs' => $post['k_subs'],
            'nm_keg' => $post['nm_keg'],
            'tgl_terima' => $post['tgl_terima'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'lokasi' => $post['lokasi'],
            'nm_bpp' => $post['nm_bpp'],
            'dokaju'=> $post['dokaju_1'],
            'dokaju2'=> $post['dokaju_2'],
            'dokaju3'=> $post['dokaju_3'],
            'dokaju4'=> $post['dokaju_4'],
            

        ];
        $this->db->insert('tb_ptu',$params);
        $idkeg=$this->db->insert_id();
        $pumk = [
            'id_keg' => $idkeg, 
        ];
        $dataid=[
            'id_keg' => $idkeg,
            'id_pumk' => $idkeg,
        ];
        // $spm=[
        //     'id_keg' => $idkeg,
        //     'id_pumk' => $idkeg,
        //     'id_spp' => $idkeg,
        // ];
        // $rekap=[
        //     'id_keg' => $idkeg,
        //     'id_pumk' => $idkeg,
        //     'id_spp' => $idkeg,
        //     'id_spm' => $idkeg,
        //     'id_bppem' => $idkeg,
        //];
        $this->db->insert('tb_pumk',$pumk);
        $this->db->insert('tb_bppem',$dataid);
        // $this->db->insert('tb_spp',$dataid);
        // $this->db->insert('tb_spm',$spm);
        // $this->db->insert('tb_rekap',$rekap);
    }
    public function ubah($post)
    {
        $params = [
            'tgl_terima' => $post['tgl_terima'],
            'no_undangan'=>$post['no_undangan'],
            'k_subs' => $post['k_subs'],
            'nm_keg' => $post['nm_keg'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'lokasi' => $post['lokasi'],
            'nm_bpp' => $post['nm_bpp'],
            
        ];
        if($post['dokaju_1']!=null){
            $params ['dokaju'] = $post['dokaju_1'];
        }
        if($post['dokaju_2']!=null){
            $params ['dokaju2'] = $post['dokaju_2'];
        }
        if($post['dokaju_3']!=null){
            $params ['dokaju3'] = $post['dokaju_3'];
        }
        if($post['dokaju_4']!=null){
            $params ['dokaju4'] = $post['dokaju_4'];
        }
        $this->db->where('id_keg', $post['id']);
        $this->db->update('tb_ptu',$params);
    }

    public function del($id)
    {
        $this->db->where('id_keg', $id);
        $this->db->delete('tb_ptu');
    }
   public function user(){
        $user_subs = $this->fungsi->user_login()->subs;
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');
        $this->db->where('k_subs',$user_subs);

    }
    public function non_user(){
        $this->db->select('*');
        $this->db->from('tb_bppem');
        $this->db->join('tb_ptu','tb_ptu.id_keg=tb_bppem.id_keg');
        $this->db->join('tb_pumk','tb_pumk.id_pumk=tb_bppem.id_pumk');

    }
    // start datatables
    var $column_order = array(null, 'tgl_terima', 'k_subs', null, 'tgl_mulai', 'tgl_selesai', 'lokasi','nm_bpp'); //set column field database for datatable orderable
    var $column_search = array('k_subs', 'nm_keg', 'tgl_mulai','tgl_selesai','no_undangan','lokasi', 'nm_bpp'); //set column field database for datatable searchable
    var $order = array('id_bppem' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        if ($this->fungsi->user_login()->level!=7 && $this->fungsi->user_login()->level!=5){
            $this->non_user();
        } else {
            $this->user();
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