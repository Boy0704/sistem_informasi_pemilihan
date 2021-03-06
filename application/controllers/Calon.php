<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calon extends CI_Controller
{
    public $image = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Calon_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'calon/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'calon/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'calon/index.html';
            $config['first_url'] = base_url() . 'calon/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Calon_model->total_rows($q);
        $calon = $this->Calon_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'calon_data' => $calon,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'calon/calon_list',
            'konten' => 'calon/calon_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Calon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_calon' => $row->id_calon,
		'no_calon' => $row->no_calon,
		'nama_calon' => $row->nama_calon,
		'visi' => $row->visi,
		'misi' => $row->misi,
		'foto' => $row->foto,
		'program_lain' => $row->program_lain,
		'id_pemilihan' => $row->id_pemilihan,
	    );
            $this->load->view('calon/calon_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'calon/calon_form',
            'konten' => 'calon/calon_form',
            'button' => 'Create',
            'action' => site_url('calon/create_action'),
	    'id_calon' => set_value('id_calon'),
	    'no_calon' => set_value('no_calon'),
	    'nama_calon' => set_value('nama_calon'),
	    'visi' => set_value('visi'),
	    'misi' => set_value('misi'),
	    'foto' => set_value('foto'),
	    'program_lain' => set_value('program_lain'),
	    'id_pemilihan' => set_value('id_pemilihan'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = './front/images/calon/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']  = time();
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('foto')){
                echo $this->upload->display_errors();
            }
            else{
                $this->image = $this->upload->data('file_name');
            }

            $data = array(
		'no_calon' => $this->input->post('no_calon',TRUE),
		'nama_calon' => $this->input->post('nama_calon',TRUE),
		'visi' => $this->input->post('visi',TRUE),
		'misi' => $this->input->post('misi',TRUE),
		'foto' => $this->image,
		'program_lain' => $this->input->post('program_lain',TRUE),
		'id_pemilihan' => $this->input->post('id_pemilihan',TRUE),
	    );


            $this->Calon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('calon'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Calon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'calon/calon_form',
                'konten' => 'calon/calon_form',
                'button' => 'Update',
                'action' => site_url('calon/update_action'),
		'id_calon' => set_value('id_calon', $row->id_calon),
		'no_calon' => set_value('no_calon', $row->no_calon),
		'nama_calon' => set_value('nama_calon', $row->nama_calon),
		'visi' => set_value('visi', $row->visi),
		'misi' => set_value('misi', $row->misi),
		'foto' => set_value('foto', $row->foto),
		'program_lain' => set_value('program_lain', $row->program_lain),
		'id_pemilihan' => set_value('id_pemilihan', $row->id_pemilihan),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_calon', TRUE));
        } else {

            

            if (($_FILES["foto"]["name"]) !== '') {
                // print_r($_FILES);exit();
                $config['upload_path'] = './front/images/calon/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '10000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $config['file_name']  = time();
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('foto')){
                    echo $this->upload->display_errors();
                }
                else{
                    $this->image = $this->upload->data('file_name');
                }
            } else {
                $this->image = $this->input->post('old_image');
            }

            // print_r($_FILES);exit();

            $data = array(
		'no_calon' => $this->input->post('no_calon',TRUE),
		'nama_calon' => $this->input->post('nama_calon',TRUE),
		'visi' => $this->input->post('visi',TRUE),
		'misi' => $this->input->post('misi',TRUE),
		'foto' => $this->image,
		'program_lain' => $this->input->post('program_lain',TRUE),
		'id_pemilihan' => $this->input->post('id_pemilihan',TRUE),
	    );

            $this->Calon_model->update($this->input->post('id_calon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('calon'));
        }
    }

    
    
    public function delete($id) 
    {
        $row = $this->Calon_model->get_by_id($id);

        if ($row) {
            $this->Calon_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('calon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_calon', 'no calon', 'trim|required');
	$this->form_validation->set_rules('nama_calon', 'nama calon', 'trim|required');
	$this->form_validation->set_rules('visi', 'visi', 'trim|required');
	$this->form_validation->set_rules('misi', 'misi', 'trim|required');
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('program_lain', 'program lain', 'trim|required');
	$this->form_validation->set_rules('id_pemilihan', 'id pemilihan', 'trim|required');

	$this->form_validation->set_rules('id_calon', 'id_calon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2019-10-30 16:26:20 */
/* https://jualkoding.com */