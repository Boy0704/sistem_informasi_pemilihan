<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemilihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemilihan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemilihan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemilihan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemilihan/index.html';
            $config['first_url'] = base_url() . 'pemilihan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemilihan_model->total_rows($q);
        $pemilihan = $this->Pemilihan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemilihan_data' => $pemilihan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'pemilihan/pemilihan_list',
            'konten' => 'pemilihan/pemilihan_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemilihan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemilihan' => $row->id_pemilihan,
		'id_kategori' => $row->id_kategori,
		'nama_pemilihan' => $row->nama_pemilihan,
		'jumlah_pemilihan' => $row->jumlah_pemilihan,
		'kontak_panitia' => $row->kontak_panitia,
		'penyelenggara' => $row->penyelenggara,
		'lokasi' => $row->lokasi,
		'kecamatan' => $row->kecamatan,
		'kelurahan' => $row->kelurahan,
		'start_date' => $row->start_date,
		'end_date' => $row->end_date,
	    );
            $this->load->view('pemilihan/pemilihan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilihan'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'pemilihan/pemilihan_form',
            'konten' => 'pemilihan/pemilihan_form',
            'button' => 'Create',
            'action' => site_url('pemilihan/create_action'),
	    'id_pemilihan' => set_value('id_pemilihan'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_pemilihan' => set_value('nama_pemilihan'),
	    'jumlah_pemilihan' => set_value('jumlah_pemilihan'),
	    'kontak_panitia' => set_value('kontak_panitia'),
	    'penyelenggara' => set_value('penyelenggara'),
	    'lokasi' => set_value('lokasi'),
	    'kecamatan' => set_value('kecamatan'),
	    'kelurahan' => set_value('kelurahan'),
	    'start_date' => set_value('start_date'),
        'end_date' => set_value('end_date'),
        'id_user' => set_value('id_user'),
	    'status' => set_value('status'),
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
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_pemilihan' => $this->input->post('nama_pemilihan',TRUE),
		'jumlah_pemilihan' => $this->input->post('jumlah_pemilihan',TRUE),
		'kontak_panitia' => $this->input->post('kontak_panitia',TRUE),
		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'start_date' => $this->input->post('start_date',TRUE),
        'end_date' => $this->input->post('end_date',TRUE),
        'id_user' => $this->input->post('id_user',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pemilihan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemilihan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemilihan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'pemilihan/pemilihan_form',
                'konten' => 'pemilihan/pemilihan_form',
                'button' => 'Update',
                'action' => site_url('pemilihan/update_action'),
		'id_pemilihan' => set_value('id_pemilihan', $row->id_pemilihan),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_pemilihan' => set_value('nama_pemilihan', $row->nama_pemilihan),
		'jumlah_pemilihan' => set_value('jumlah_pemilihan', $row->jumlah_pemilihan),
		'kontak_panitia' => set_value('kontak_panitia', $row->kontak_panitia),
		'penyelenggara' => set_value('penyelenggara', $row->penyelenggara),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'start_date' => set_value('start_date', $row->start_date),
        'end_date' => set_value('end_date', $row->end_date),
        'id_user' => set_value('id_user', $row->id_user),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilihan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemilihan', TRUE));
        } else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_pemilihan' => $this->input->post('nama_pemilihan',TRUE),
		'jumlah_pemilihan' => $this->input->post('jumlah_pemilihan',TRUE),
		'kontak_panitia' => $this->input->post('kontak_panitia',TRUE),
		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'start_date' => $this->input->post('start_date',TRUE),
        'end_date' => $this->input->post('end_date',TRUE),
        'id_user' => $this->input->post('id_user',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pemilihan_model->update($this->input->post('id_pemilihan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemilihan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemilihan_model->get_by_id($id);

        if ($row) {
            $this->Pemilihan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemilihan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemilihan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('nama_pemilihan', 'nama pemilihan', 'trim|required');
	$this->form_validation->set_rules('jumlah_pemilihan', 'jumlah pemilihan', 'trim|required');
	$this->form_validation->set_rules('kontak_panitia', 'kontak panitia', 'trim|required');
	$this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
	$this->form_validation->set_rules('end_date', 'end date', 'trim|required');

	$this->form_validation->set_rules('id_pemilihan', 'id_pemilihan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemilihan.php */
/* Location: ./application/controllers/Pemilihan.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2019-10-25 16:21:36 */
/* https://jualkoding.com */