<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
		cek_not_login();
        $this->load->model("calendar_model");
    }

     public function index()
     {
		  $this->template->load("template","kalender/kalender_view", array());
			// $this->template->load("template", "kalender/kalender_data", array());
		
	 }
	public function get_events()
	{
		$events = $this->calendar_model->get_events();
		foreach ($events->result_array() as $r) {

			$data_events[] = array(
				"id_calendar" => $r['id_calendar'],
				"title" => $r['title'],
				"start" => $r['start'],
				"end" => $r['end'],
				"description"=>$r['description'],
				// "allDay"=>$r['allday'],
				"color" => $r['color']
			);
		}
		echo json_encode ($data_events);
	}

	public function add_event()
	{
		/* Our calendar data */
		$title= $this->input->post("title");
		$start_date = $this->input->post("start");
		$end_date = $this->input->post("end");
		$desc = $this->input->post("description");
		// $allday =$this->input->post("allday");
		$color = $this->input->post("color");

		// if (!empty($start_date)) {
		// 	$sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
		// 	$start_date = $sd->format('Y-m-d H:i:s');
		// 	$start_date_timestamp = $sd->getTimestamp();
		// } else {
		// 	$start_date = date("Y-m-d H:i:s", time());
		// 	$start_date_timestamp = time();
		// }

		// if (!empty($end_date)) {
		// 	$ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
		// 	$end_date = $ed->format('Y-m-d H:i:s');
		// 	$end_date_timestamp = $ed->getTimestamp();
		// } else {
		// 	$end_date = date("Y-m-d H:i:s", time());
		// 	$end_date_timestamp = time();
		// }
		$data = array(
			"title" => $title,
			"description" => $desc,
			// "allday"=>$allday,
			"start" => $start_date,
			"end" => $end_date,
			"color" => $color
		);
		$this->calendar_model->add_event($data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'data berhasil disimpan');
		}
	
		redirect("calendar");
	}
	public function edit_event()
	{
		$id = intval($this->input->post("id_calendar"));
		$event = $this->calendar_model->get_event($id);
		if ($event->num_rows() == 0) {
			$this->session->set_flashdata('gagal', 'data tidak ditemukan!');
			redirect('calendar');
		}

		$event->row();

		/* Our calendar data */
		$title =$this->input->post("title");
		$desc =$this->input->post("description");
		// $allday =$this->input->post("allday");
		$start_date =$this->input->post("start");
		$end_date =$this->input->post("end");
		$color =$this->input->post("color");
		$delete = intval($this->input->post("delete"));
		
		if (!$delete)
		{
					$this->calendar_model->update_event(
						$id,
						array(
							"title" => $title,
							"description" => $desc,
							// "allday" => $allday,
							"start" => $start_date,
							"end" => $end_date,
							"color" => $color
						)

					);
		} else {
					$this->calendar_model->delete_event($id);
		}
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'data berhasil diproses');
		}

		redirect("calendar");
	}
	public function edit_dropevent()
	{
		$id = $this->input->post("id");
		// $allday=$this->input->post("allDay");
		$start_date = $this->input->post("start");
		$end_date = $this->input->post("end");

		$this->calendar_model->update_event(
				$id,
				array(
					// "allday"=>$allday,
					"start" => $start_date,
					"end" => $end_date,
				)

			);
		// if ($this->db->affected_rows() > 0) {
		// 	$this->session->set_flashdata('sukses', 'data berhasil diperbaharui');
		// }
		// redirect("calendar");
		}

	
	
	
}
// "T23:59:00",