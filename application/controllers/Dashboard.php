<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
		cek_not_login();
		$this->load->model(['dashboard_m','pumk_m','alert_m']);

    }
	public function index()
	{
       
        if ($this->fungsi->user_login()->level!=6) {
            $data = array(
                'row'=> $this->pumk_m->get_admin(),
                'alert'=>$this->alert_m->get(),
            );
        } else {
            $data = array(
                'row'=> $this->pumk_m->get(),
                'alert'=>$this->alert_m->get(),
            );
        };
        

		$this->template->load('template', 'dashboard',$data);
	}
	public function get_tot()
	{
		$data =array (
			'total_masuk'=> $this->dashboard_m->count_masuk(),
			'total_lpj'=> $this->dashboard_m->count_lpj(),
			'total_spp'=> $this->dashboard_m->count_spp(),
			'total_spm'=> $this->dashboard_m->count_spm(),
			'total_sp2d'=> $this->dashboard_m->count_sp2d(),
			'msg'=> "Berhasil direfresh secara realtime"
		);
		echo json_encode($data);

	}

	public function getchart()
	{
		$bulan = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December'
		);
		$data_ls = $this->dashboard_m->jumlah_ls();
		$data_gu = $this->dashboard_m->jumlah_gu();
		$data = array (
			'bulan' => $bulan,
			'ls' => $data_ls,
			'gup' => $data_gu
		);
		// for ($i=0; $i <=11 ; $i++) {
		// 	foreach($data_ls as $data){
		// 	$datas= date('F',strtotime($data->tgl_spp))==$bulan[$i] ? $data->nilai_spp  : 0;
		// 	}
			// echo '<pre>';
			// echo print_r($datas,true);
		// }

		// echo '<pre>';
		// echo print_r($data_ls);

		$this->load->view('chart',$data);
		 
		
		
	}
	
	

}
