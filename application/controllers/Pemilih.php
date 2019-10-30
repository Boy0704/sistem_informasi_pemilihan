<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemilih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemilih_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemilih/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemilih/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemilih/index.html';
            $config['first_url'] = base_url() . 'pemilih/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemilih_model->total_rows($q);
        $pemilih = $this->Pemilih_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemilih_data' => $pemilih,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'pemilih/pemilih_list',
            'konten' => 'pemilih/pemilih_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemilih_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemilih' => $row->id_pemilih,
		'nama_pemilih' => $row->nama_pemilih,
		'kel' => $row->kel,
		'kode_akun' => $row->kode_akun,
		'no_telp' => $row->no_telp,
	    );
            $this->load->view('pemilih/pemilih_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilih'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'pemilih/pemilih_form',
            'konten' => 'pemilih/pemilih_form',
            'button' => 'Create',
            'action' => site_url('pemilih/create_action'),
	    'id_pemilih' => set_value('id_pemilih'),
	    'nama_pemilih' => set_value('nama_pemilih'),
	    'kel' => set_value('kel'),
	    'kode_akun' => set_value('kode_akun'),
	    'no_telp' => set_value('no_telp'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pemilih' => $this->input->post('nama_pemilih',TRUE),
		'kel' => $this->input->post('kel',TRUE),
		'kode_akun' => $this->input->post('kode_akun',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Pemilih_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemilih'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemilih_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'pemilih/pemilih_form',
                'konten' => 'pemilih/pemilih_form',
                'button' => 'Update',
                'action' => site_url('pemilih/update_action'),
		'id_pemilih' => set_value('id_pemilih', $row->id_pemilih),
		'nama_pemilih' => set_value('nama_pemilih', $row->nama_pemilih),
		'kel' => set_value('kel', $row->kel),
		'kode_akun' => set_value('kode_akun', $row->kode_akun),
		'no_telp' => set_value('no_telp', $row->no_telp),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilih'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemilih', TRUE));
        } else {
            $data = array(
		'nama_pemilih' => $this->input->post('nama_pemilih',TRUE),
		'kel' => $this->input->post('kel',TRUE),
		'kode_akun' => $this->input->post('kode_akun',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Pemilih_model->update($this->input->post('id_pemilih', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemilih'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemilih_model->get_by_id($id);

        if ($row) {
            $this->Pemilih_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemilih'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilih'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pemilih', 'nama pemilih', 'trim|required');
	$this->form_validation->set_rules('kel', 'kel', 'trim|required');
	$this->form_validation->set_rules('kode_akun', 'kode akun', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

	$this->form_validation->set_rules('id_pemilih', 'id_pemilih', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemilih.php */
/* Location: ./application/controllers/Pemilih.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2019-10-30 16:04:39 */
/* https://jualkoding.com */