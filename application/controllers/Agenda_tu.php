<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_tu extends CI_Controller{
   
    public function __construct() 
    {
        Parent::__construct();
		cek_not_login();
        $this->load->model(["agenda_model","proses_tu_m","proses_verif_m"]);
    }

    public function index()
     {
         $data = array (
            'row' => $this->proses_tu_m->get(),
            'pegawai' => $this->agenda_model->get_pegawai(),
            'agenda' => $this->agenda_model->get_events(),
            'total'=>$this->agenda_model->get_total(),
         );

		  $this->template->load("template","dukung/agenda_tu",$data);
        //   echo '<pre>';
        //   echo print_r($data['total']->result());
	 }    
    public function get_giat()
    {
        // $id=$this->input->post('id');
        // $kgiat=$this->agenda_model->get_giat($id);
        // echo json_encode($kgiat);
        
        
    }
    function get_ajax_giat()
         {
            $list = $this->agenda_model->get_datatables();
             $datas = array();
             $no = @$_POST['start'];
             foreach ($list as $data) {
                 $no++;
                 $row = array();
                 $row[] = $no . ".";
                 $row[] = $data->description;
                 $row[] = $data->substansi;
                 $row[] = tanggal_indonesia($data->start);
                 if (strtotime($data->start)==strtotime($data->end)) {
                    $row[] =tanggal_indonesia($data->end);
                } else {
                    $row[]= tanggal_indonesia(date('Y-m-d H:i:s',strtotime('-1 day',strtotime($data->end))));
                }
                 $row[] =number_format($data->nilai,0,",",".");
                 $datas[] = $row;
             }
             $output = array(
                 "draw" => @$_POST['draw'],
                 "recordsTotal" => $this->agenda_model->count_all(),
                 "recordsFiltered" => $this->agenda_model->count_filtered(),
                 "data" => $datas,
             );
             // output to json format
             echo json_encode($output);
         }
     public function get_events()
     {
         $events = $this->agenda_model->get_events();
         foreach ($events->result_array() as $r) {
            if (strtotime($r['start'])==strtotime($r['end'])) {
                $selesai =tanggal_indonesia($r['end']);
            } else {
              $selesai= tanggal_indonesia(date('Y-m-d H:i:s',strtotime('-1 day',strtotime($r['end']))));
            }
             $data_events []= array(
                 "id_agenda" => $r['id_agenda'],
                 "title" => $r['title'],
                 "description"=>$r['description'],
                 "start" => $r['start'],
                 "end" => $r['end'],
                 "color" => $r['color'],
                 "extendedProps"=>array(
                        "nilai" => $r['nilai'],
                        "substansi"=>$r['substansi'],
                        "mulai" => tanggal_indonesia($r['start']),
                        "selesai"=>$selesai,
                ),
             );
         }
        //  echo '<pre>';
        //  echo print_r($data_events);
         echo json_encode ($data_events);
     }
 
     public function add_event()
     {
         /* Our calendar data */
         $nama= $this->input->post("title");
         $start_date = $this->input->post("start");
         $end_date = $this->input->post("end");
         $giat = $this->input->post("description");
         $subs =$this->input->post("substansi");
         $nilai = $this->input->post('nilai');
         $color = $this->input->post("color");
         $data =array();
         $index = 0;

         foreach ($nama as $nm) {
             array_push($data,array(
                "title" => $nm,
                "description" => $giat,
                "substansi" => $subs,
                "start" => $start_date,
                "end" => $end_date,
                "nilai" => str_replace(".", "", $nilai[$index]),
                "color" => $color
             ));
             $index++;
         }

        //  echo '<pre>';
        //  echo print_r($data);
 
        //  $data = array(
        //      "title" => $nama,
        //      "description" => $giat,
        //      "substansi" => $subs,
        //      "start" => $start_date,
        //      "end" => $end_date,
        //      "nilai" => str_replace(".","",$nilai),
        //      "color" => $color
        //  );
         $this->agenda_model->add_event($data);
         if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('sukses', 'data berhasil disimpan');
         }
         redirect("agenda_tu");
     }
     public function edit_event()
     {
         $id = intval($this->input->post("id"));
         $event = $this->agenda_model->get_event($id);
         if ($event->num_rows() == 0) {
             $this->session->set_flashdata('gagal', 'data tidak ditemukan!');
             redirect('agenda_tu');
         }
         $event->row();
 
         /* Our calendar data */
         $nama= $this->input->post("title");
         $start_date = $this->input->post("start");
         $end_date = $this->input->post("end");
         $giat = $this->input->post("description");
         $subs =$this->input->post("substansi");
         $nilai = $this->input->post('nilai');
         $color = $this->input->post("color");
         $delete = intval($this->input->post("delete"));
         $dataevents = array (
            "title" => $nama,
            "description" => $giat,
            "substansi" => $subs,
            "start" => $start_date,
            "end" => $end_date,
            "nilai" => str_replace(".","",$nilai),
            "color" => $color
         );
        //  echo '<pre>';
        //  echo print_r($dataevents);
         if (!$delete)
         {
                     $this->agenda_model->update_event ($id,$dataevents );
         } else {
                     $this->agenda_model->delete_event($id);
         }
         if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('berhasil', 'data berhasil diproses');
         }
         redirect("agenda_tu");
     }

     public function edit_dropevent()
     {
         $id = $this->input->post("id");
         $start_date = $this->input->post("start");
         $end_date = $this->input->post("end");
 
         $this->agenda_model->update_event(
                 $id,
                 array(
                     "start" => $start_date,
                     "end" => $end_date,
                 )
 
             );
         }
         function get_ajax()
         {
             $list = $this->proses_verif_m->get_datatables();
             $datas = array();
             $no = @$_POST['start'];
             foreach ($list as $data) {
                 $no++;
                 $row = array();
                 $row[] = $no . ".";
                 $row[] = $data->k_subs;
                 $row[] = $data->nm_keg;
                 if ($data->tgl_selesai == $data->tgl_mulai){
                    $row[] = tanggal_indonesia($data->tgl_mulai);
                } else {
                    if (date('M',strtotime($data->tgl_mulai))==date('M',strtotime($data->tgl_selesai))){
                        $row[] = tanggal($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                    } else {
                        $row[] = tgbulan($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                    }
                }
                $row[] =
                '<button id="pilihgiat" href="#" class="btn bg-navy btn-sm" 
               data-id_keg=" ' .$data->id_keg.' " data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' . date('Y-m-d H:i:s',strtotime($data->tgl_mulai)) . '" data-tgl_selesai="' .date('Y-m-d H:i:s',strtotime($data->tgl_selesai)) . '"  data-mulai="'.tanggal_indonesia($data->tgl_mulai).'" data-selesai="'.tanggal_indonesia($data->tgl_selesai).'"
                >Pilih</button>';

                // '<button id="pilihgiat" href="#" class="btn bg-navy btn-sm" 
                // data-id_keg=" ' .$data->id_keg.' " data-k_subs="' . $data->k_subs . '" data-nm_keg="' . $data->nm_keg . '" data-tgl_mulai="' .date('Y-m-d H:i:s',strtotime($data->tgl_mulai)). '" data-tgl_selesai="' .date('Y-m-d H:i:s',strtotime($data->tgl_selesai)). '"  data-mulai="'.tanggal_indonesia($data->tgl_mulai).'" data-selesai="'.tanggal_indonesia($data->tgl_selesai).'"
                //  >Pilih</button>';
                 $datas[] = $row;
             }
             $output = array(
                 "draw" => @$_POST['draw'],
                 "recordsTotal" => $this->proses_verif_m->count_all(),
                 "recordsFiltered" => $this->proses_verif_m->count_filtered(),
                 "data" => $datas,
             );
             // output to json format
             echo json_encode($output);
         }
    
    }

