<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slide extends CI_Controller
{
    private $image = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'slide/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slide/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slide/index.html';
            $config['first_url'] = base_url() . 'slide/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Slide_model->total_rows($q);
        $slide = $this->Slide_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'slide_data' => $slide,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'slide/slide_list',
            'konten' => 'slide/slide_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Slide_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_slide' => $row->id_slide,
		'foto' => $row->foto,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('slide/slide_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'slide/slide_form',
            'konten' => 'slide/slide_form',
            'button' => 'Create',
            'action' => site_url('slide/create_action'),
	    'id_slide' => set_value('id_slide'),
	    'foto' => set_value('foto'),
	    'keterangan' => set_value('keterangan'),
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
		'foto' => upload_gambar_biasa('slide', 'front/images/slide/', 'jpg|jpeg|png|gif', 10000, 'foto'),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Slide_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slide'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'slide/slide_form',
                'konten' => 'slide/slide_form',
                'button' => 'Update',
                'action' => site_url('slide/update_action'),
		'id_slide' => set_value('id_slide', $row->id_slide),
		'foto' => set_value('foto', $row->foto),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_slide', TRUE));
        } else {

            if ($_FILES['foto']['name'] != '') {
                $this->image = upload_gambar_biasa('slide', 'front/images/slide/', 'jpg|jpeg|png|gif', 10000, 'foto');
            } else {
                $this->image = $this->input->post('old_foto');
            }

            $data = array(
		'foto' => $this->image,
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Slide_model->update($this->input->post('id_slide', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slide'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $this->Slide_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slide'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_slide', 'id_slide', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slide.php */
/* Location: ./application/controllers/Slide.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2019-11-25 16:43:42 */
/* https://jualkoding.com */