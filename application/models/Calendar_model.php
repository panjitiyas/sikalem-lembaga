<?php

class Calendar_Model extends CI_Model
{

    public function get_events()
    {
        $this->db->order_by('id_calendar');
        return $this->db->get('calendar');
    }

    public function add_event($data)
    {
        $this->db->insert("calendar", $data);
    }

    public function tambah_keg_subs($data)
    {
        $params = array (
            "id_keg" =>$data['id'],
            "title" =>$data['nm_keg'],
            "start"=>date('Y-m-d H:i:s',strtotime($data['tgl_mulai'])),
            "end"=>date('Y-m-d H:i:s',strtotime($data['tgl_selesai'])),
            "description"=>$data['k_subs'],
        );
        if ($data['k_subs']=='Pengembangan'){
            $params['color']= '#ee3dd5';
        } elseif ($data['k_subs']=='Penataan'){
            $params['color']= '#ff0000';
        } elseif ($data['k_subs']=='Penguatan'){
            $params['color']= '#0075f9';
        } elseif ($data['k_subs']=='Pengendalian'){
            $params['color']= '#f4d415';
        } elseif ($data['k_subs']=='Penilaian Kinerja'){
            $params['color']= '#01ff38';
        } elseif ($data['k_subs']=='Tata Usaha'){
            $params['color']= '#7001ff';
        }
        $this->db->insert("calendar", $params);
    }

    public function get_event($id)
    {
        $this->db->where("id_calendar", $id);
        return $this->db->get("calendar");
    }

    public function update_event($id, $data)
    {
        $this->db->where("id_calendar", $id);
        $this->db->update("calendar", $data);
    }
    public function update_keg_subs($data)
    {
        $id =$data['id'];
        $params = array (
            "title" =>$data['nm_keg'],
            "start"=>date('Y-m-d H:i:s',strtotime($data['tgl_mulai'])),
            "end"=>date('Y-m-d H:i:s',strtotime($data['tgl_selesai'])),
            "description"=>$data['k_subs'],
        );
        if ($data['k_subs']=='Pengembangan'){
            $params['color']= '#ee3dd5';
        } elseif ($data['k_subs']=='Penataan'){
            $params['color']= '#ff0000';
        } elseif ($data['k_subs']=='Penguatan'){
            $params['color']= '#0075f9';
        } elseif ($data['k_subs']=='Pengendalian'){
            $params['color']= '#f4d415';
        } elseif ($data['k_subs']=='Penilaian Kinerja'){
            $params['color']= '#01ff38';
        } elseif ($data['k_subs']=='Tata Usaha'){
            $params['color']= '#7001ff';
        }
        $this->db->where("id_keg", $id);
        $this->db->update("calendar", $params);
    }

    public function delete_event($id)
    {
        $this->db->where("id_calendar", $id);
        $this->db->delete("calendar");
    }

    public function hapus_keg($id)
    {
        $this->db->where("id_keg", $id);
        $this->db->delete("calendar");
    }
    public function dragUpdateEvent()
    {
        //$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

        $sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
        $this->db->query($sql, array($_POST['start'], $_POST['end'], $_POST['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
