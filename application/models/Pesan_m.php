<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_m extends CI_Model {

    public function get($id=null)
    {
        $idsend= $this->fungsi->user_login()->nama;
        $this->db->from ('tb_pesan');
        if($id != null) {
            $this->db->where('id_pesan',$id);
            
        }
        $this->db->where('kepada', $idsend);
        $this->db->order_by('tanggal', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function get_out($id=null)
    {
        $idsend= $this->fungsi->user_login()->nama;
        $this->db->from ('tb_pesan_out');
        if($id != null) {
            $this->db->where('id_pesan',$id);
            
        }
        $this->db->where('pengirim', $idsend);
        $this->db->order_by('tanggal', 'desc');
        $query= $this->db->get();
        return $query;
    }
    public function tot_new()
    {
        $idsend = $this->fungsi->user_login()->nama;
        $this->db->from('tb_pesan');
        $this->db->where('kepada', $idsend);
        $this->db->where('dibaca', "N");

        $query = $this->db->count_all_results();
        if ($query > 0) {
            return $query;
        } else {
            return 0;
        }
    }
    public function get_new()
    {
        $idsend = $this->fungsi->user_login()->nama;
        $this->db->from('tb_pesan');
        $this->db->where('kepada', $idsend);
        $this->db->where('dibaca', "N");

        $query = $this->db->get();
        return $query;
      
    }


    public function tambah($post)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = [
            'pengirim' => $this->fungsi->user_login()->nama,
            'kepada' => $post['kepada'],
            'judul' => $post['judul'],
            'pesan' => $post['pesan'],
            'sifat' => $post['sifat'],
            'lampiran' => $post['lampiran'],
            'tanggal' => date ('Y-m-d'),
            'jam'=> date('Y-m-d H:i:s'),
            'dibaca'=>'N'
        ];
        $this->db->insert('tb_pesan',$params);
        $this->db->insert('tb_pesan_out',$params); 
    }
    public function baca($post)
    {
        $params = [
            'dibaca' => 'Y'
        ];
        $this->db->where('id_pesan', $post['id']);
        $this->db->update('tb_pesan',$params);
        $this->db->where('id_pesan_out', $post['id']);
        $this->db->update('tb_pesan_out',$params);
    }

    public function del($id)
    {
        $this->db->where('id_pesan', $id);
        $this->db->delete('tb_pesan');
    }
    public function del_out($id)
    {
        $this->db->where('id_pesan_out', $id);
        $this->db->delete('tb_pesan_out');
    }


}
