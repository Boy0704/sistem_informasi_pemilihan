<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	
	public function index()
	{
        // if ($this->session->userdata('username') == '') {
        //     redirect('app/login');
        // }
		$data = array(
			'konten' => 'front/home',
            'judul_page' => 'Dashboard',
		);
		$this->load->view('f_index', $data);
    }

    public function admin()
	{
        // if ($this->session->userdata('username') == '') {
        //     redirect('app/login');
        // }
		$data = array(
			'konten' => 'home_admin',
            'judul_page' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
    }

    public function panitia()
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'front/panitia',
            'judul_page' => 'Panitia',
		);
		$this->load->view('f_index', $data);
    }

    public function bantuan()
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'front/bantuan',
            'judul_page' => 'Bantuan',
		);
		$this->load->view('f_index', $data);
    }

    public function info_pemilihan($id_pemilihan)
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'front/info_pemilihan',
            'judul_page' => 'Info Pemilihan',
            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan))
		);
		$this->load->view('f_index', $data);
    }

    public function lihat_hasil($id_pemilihan)
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'front/lihat_hasil',
            'judul_page' => 'Lihat Hasil Pemilihan',
            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan))
		);
		$this->load->view('f_index', $data);
    }

    public function lakukan_pemilihan($id_pemilihan)
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'front/pilih_calon',
            'judul_page' => 'Lakukukan Pemilihan',
            'id_pemilihan' => $id_pemilihan,
		);
		$this->load->view('f_index', $data);
    }

    public function data_pemilihan()
    {
    	if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }

		if ($_POST == NULL) {
			$data = array(
				'konten' => 'front/data_pemilihan',
	            'judul_page' => 'Data Pemilihan',
			);
			$this->load->view('f_index', $data);
		} else {
			$_POST['id_user'] = $this->session->userdata('id_user');
			$this->db->insert('pemilihan', $_POST);
			$insert_id = $this->db->insert_id();
			$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data!','success'));
			$this->session->set_flashdata('id_pemilihan', $insert_id);
			redirect('app/data_pemilihan');
		}
    }

    public function data_calon($id)
    {
    	if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }

		if ($_POST == NULL) {
			$data = array(
				'konten' => 'front/data_calon',
	            'judul_page' => 'Data Calon',
			);
			$this->load->view('f_index', $data);
		} else {
			$this->db->insert('calon', $_POST);
			$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data!','success'));
			redirect('app/data_calon/'.$id);
		}
    }

    public function data_pemilih()
    {
    	if ($this->session->userdata('username') == '') {
            redirect('app/login');
        }

		if ($_POST == NULL) {
			$data = array(
				'konten' => 'front/data_pemilih',
	            'judul_page' => 'Data Pemilih',
			);
			$this->load->view('f_index', $data);
		} else {
			$this->db->insert('pemilih', $_POST);
			$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data!','success'));
			redirect('app/data_pemilih');
		}
    }

    
	
	

	public function login() 
	{
	// {
	// 	$options = [
	// 		'cost' => 10,
	// 	];
		
	// 	echo password_hash("admin", PASSWORD_DEFAULT, $options);

		// $hashed = '$2y$10$LO9IzV0KAbocIBLQdgy.oeNDFSpRidTCjXSQPK45ZLI9890g242SG';
 
		// if (password_verify('admin', $hashed)) {
		// 	echo '<br>Password is valid!';
		// } else {
		// 	echo 'Invalid password.';
		// }
		// exit;
		if ($this->input->post() == NULL) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			// $hashed = '$2y$10$LO9IzV0KAbocIBLQdgy.oeNDFSpRidTCjXSQPK45ZLI9890g242SG';
			$cek_user = $this->db->query("SELECT * FROM admin WHERE username='$username' and password='$password' ");
			// if (password_verify($password, $hashed)) {
			if ($cek_user->num_rows() > 0) {
				foreach ($cek_user->result() as $row) {
					
                    $sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['level'] = $row->akses;
					$this->session->set_userdata($sess_data);
				}
				// print_r($this->session->userdata());
				// exit;
				// $sess_data['username'] = $username;
				// $this->session->set_userdata($sess_data);
				if ($this->session->userdata('level') == 'admin') {
					redirect('app/admin','refresh');
				} elseif ($this->session->userdata('level') == 'panitia') {
					redirect('app/panitia','refresh');
				}

				// redirect('app/index');
			} else {
				$this->session->set_flashdata('message', alert_biasa('Gagal Login!\n username atau password kamu salah','warning'));
				redirect('app/login','refresh');
			}

		}
	}

	

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('app');
	}

	

	
}
