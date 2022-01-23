<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proses_ptu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Proses_ptu_m','pumk_m']);
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('proses_ptu/tb_ptu_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Proses_ptu_m->json();
    }

    public function read($id) 
    {
        $row = $this->Proses_ptu_m->get_by_id($id);
        if ($row) {
            $data = array(
		'id_keg' => $row->id_keg,
		'tgl_terima' => $row->tgl_terima,
		'k_subs' => $row->k_subs,
		'nm_keg' => $row->nm_keg,
		'tgl_mulai' => $row->tgl_mulai,
		'tgl_selesai' => $row->tgl_selesai,
		'lokasi' => $row->lokasi,
		'nm_pumk' => $row->nm_pumk,
	    );
            $this->load->view('proses_ptu/tb_ptu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proses_ptu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proses_ptu/create_action'),
	    'id_keg' => set_value('id_keg'),
	    'tgl_terima' => set_value('tgl_terima'),
	    'k_subs' => set_value('k_subs'),
	    'nm_keg' => set_value('nm_keg'),
	    'tgl_mulai' => set_value('tgl_mulai'),
	    'tgl_selesai' => set_value('tgl_selesai'),
	    'lokasi' => set_value('lokasi'),
        'nm_pumk' => set_value('nm_pumk'),
    );
        $data ['pumk'] =$this->pumk_m->get();
        $this->load->view('proses_ptu/tb_ptu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_terima' => $this->input->post('tgl_terima',TRUE),
		'k_subs' => $this->input->post('k_subs',TRUE),
		'nm_keg' => $this->input->post('nm_keg',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'nm_pumk' => $this->input->post('nm_pumk',TRUE),
	    );

            $this->Proses_ptu_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proses_ptu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Proses_ptu_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proses_ptu/update_action'),
		'id_keg' => set_value('id_keg', $row->id_keg),
		'tgl_terima' => set_value('tgl_terima', $row->tgl_terima),
		'k_subs' => set_value('k_subs', $row->k_subs),
		'nm_keg' => set_value('nm_keg', $row->nm_keg),
		'tgl_mulai' => set_value('tgl_mulai', $row->tgl_mulai),
		'tgl_selesai' => set_value('tgl_selesai', $row->tgl_selesai),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'nm_pumk' => set_value('nm_pumk', $row->nm_pumk),
	    );
            $this->load->view('proses_ptu/tb_ptu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proses_ptu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_keg', TRUE));
        } else {
            $data = array(
		'tgl_terima' => $this->input->post('tgl_terima',TRUE),
		'k_subs' => $this->input->post('k_subs',TRUE),
		'nm_keg' => $this->input->post('nm_keg',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'nm_pumk' => $this->input->post('nm_pumk',TRUE),
	    );

            $this->Proses_ptu_m->update($this->input->post('id_keg', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proses_ptu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Proses_ptu_m->get_by_id($id);

        if ($row) {
            $this->Proses_ptu_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proses_ptu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proses_ptu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_terima', 'tgl terima', 'trim|required');
	$this->form_validation->set_rules('k_subs', 'k subs', 'trim|required');
	$this->form_validation->set_rules('nm_keg', 'nm keg', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'trim|required');
	$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('nm_pumk', 'nm pumk', 'trim|required');

	$this->form_validation->set_rules('id_keg', 'id_keg', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_ptu.xls";
        $judul = "tb_ptu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Terima");
	xlsWriteLabel($tablehead, $kolomhead++, "K Subs");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Keg");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Selesai");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Pumk");

	foreach ($this->Proses_ptu_m->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_terima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->k_subs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_keg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_selesai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nm_pumk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Proses_ptu.php */
/* Location: ./application/controllers/Proses_ptu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-18 17:24:18 */
/* http://harviacode.com */