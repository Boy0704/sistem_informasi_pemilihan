<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public $image = '';
	
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
        if ($this->session->userdata('akses') != 'panitia') {
            redirect('app/login','refresh');
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
            redirect('app/login','refresh');
        }
		$data = array(
			'konten' => 'front/bantuan',
            'judul_page' => 'Bantuan',
		);
		$this->load->view('f_index', $data);
    }

    public function pemilihan_draft()
	{ 
		$data = array(
			'konten' => 'front/pemilihan_draft',
            'judul_page' => 'pemilihan_draft',
		);
		$this->load->view('f_index', $data);
    }

    public function pemilihan_arsip()
	{ 
		$data = array(
			'konten' => 'front/pemilihan_arsip',
            'judul_page' => 'pemilihan_arsip',
		);
		$this->load->view('f_index', $data);
    }

    public function pemilihan_aktif()
	{ 
		$data = array(
			'konten' => 'front/pemilihan_aktif',
            'judul_page' => 'pemilihan_aktif',
		);
		$this->load->view('f_index', $data);
    }

    public function login_pemilih()
	{ 
		if ($_POST== NULL) {
			$data = array(
				'konten' => 'front/login_pemilih',
	            'judul_page' => 'Login Pemilih',
			);
			$this->load->view('f_index', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// $hashed = '$2y$10$LO9IzV0KAbocIBLQdgy.oeNDFSpRidTCjXSQPK45ZLI9890g242SG';
			$cek_user = $this->db->query("SELECT * FROM pemilih WHERE nama_pemilih='$username' and kode_akun='$password' ");
			// if (password_verify($password, $hashed)) {
			if ($cek_user->num_rows() > 0) {
				foreach ($cek_user->result() as $row) {
					
                    $sess_data['id_user'] = $row->id_pemilih;
					$sess_data['nama'] = $row->nama_pemilih;
					$sess_data['username'] = $row->nama_pemilih;
					$sess_data['level'] = 'pemilih';
					$this->session->set_userdata($sess_data);
				}
				// print_r($this->session->userdata());
				// exit;
				// $sess_data['username'] = $username;
				// $this->session->set_userdata($sess_data);
				redirect('app');

				// redirect('app/index');
			} else {
				$this->session->set_flashdata('message', alert_biasa('Gagal Login!\n username atau password kamu salah','warning'));
				redirect('app/login_pemilih','refresh');
			}
		}
    }

    public function simpan_pilih_calon()
    {
    	$this->db->insert('detail_pilih', $_POST);
    }

    public function info_pemilihan($id_pemilihan)
	{
        // if ($this->session->userdata('username') == '') {
        //     redirect('app/login','refresh');
        // }
		$data = array(
			'konten' => 'front/info_pemilihan',
            'judul_page' => 'Info Pemilihan',
            'id_pemilihan'=> $id_pemilihan,
            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan))
		);
		$this->load->view('f_index', $data);
    }

    public function lihat_status_pemilih($id_pemilihan)
	{
		$data = array(
			'konten' => 'front/status_pemilih',
            'judul_page' => 'Status Pemilihan',
            'id_pemilihan'=> $id_pemilihan,
            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan))
		);
		$this->load->view('f_index', $data);
    }

    public function edit_pemilihan($id_pemilihan)
    {
    	if ($_POST == NULL) {
			$data = array(
				'konten' => 'front/edit_pemilihan',
	            'judul_page' => 'Data Pemilihan',
	            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan)),
			);
			$this->load->view('f_index', $data);
		} else {
			$_POST['id_user'] = $this->session->userdata('id_user');
			$this->db->where('id_pemilihan', $id_pemilihan);
			$this->db->update('pemilihan', $_POST);
			$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data\n Lanjutkan Isi data calon klik tombol di bawah!','success'));
			$this->session->set_flashdata('id_pemilihan', $id_pemilihan);
			redirect('app/data_pemilihan','refresh');
		}
    }

    public function lihat_hasil($id_pemilihan)
	{
        // if ($this->session->userdata('username') == '') {
        //     redirect('app/login','refresh');
        // }
		$data = array(
			'konten' => 'front/lihat_hasil',
            'judul_page' => 'Lihat Hasil Pemilihan',
            'data' => $this->db->get_where('pemilihan', array('id_pemilihan'=>$id_pemilihan))
		);
		$this->load->view('f_index', $data);
    }

    public function aktifkan_pemilihan($id_pemilihan)
    {
    	$this->db->where('id_pemilihan', $id_pemilihan);
    	$this->db->update('pemilihan', array('status'=>1));
    	$this->session->set_flashdata('message', alert_biasa('Berhasil di aktifkan!','success'));
		redirect('app','refresh');	
    }

    public function tutup_pemilihan($id_pemilihan)
    {
    	$this->db->where('id_pemilihan', $id_pemilihan);
    	$this->db->update('pemilihan', array('status'=>3));
    	$this->session->set_flashdata('message', alert_biasa('Berhasil di non-aktifkan!','success'));
		redirect('app','refresh');	
    }

    public function lakukan_pemilihan($id_pemilihan)
	{
        if ($this->session->userdata('username') == '') {
            redirect('app/login_pemilih','refresh');
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
            redirect('app/login','refresh');
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
			$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data\n Lanjutkan Isi data calon klik tombol di bawah!','success'));
			$this->session->set_flashdata('id_pemilihan', $insert_id);
			redirect('app/data_pemilihan','refresh');
		}
    }

    public function data_calon($id)
    {
    	if ($this->session->userdata('username') == '') {
            redirect('app/login','refresh');
        }

		if ($_POST == NULL) {
			$data = array(
				'konten' => 'front/data_calon',
	            'judul_page' => 'Data Calon',
	            'id' => $id
			);
			$this->load->view('f_index', $data);
		} else {

			if ($_POST['type_input'] == 'tambah') {
				
				unset($_POST['type_input']);
				$config['upload_path'] = './front/images/calon/';
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size']  = '10000';
	            $config['file_name']  = time();
	            
	            $this->load->library('upload', $config);
	            
	            if ( ! $this->upload->do_upload('foto')){
	                echo $this->upload->display_errors();
	            }
	            else{
	                $this->image = $this->upload->data('file_name');
	            }

				$_POST['foto'] = $this->image;
				$this->db->insert('calon', $_POST);
				$this->session->set_flashdata('message', alert_biasa('Berhasil Simpan Data!','success'));
				redirect('app/data_calon/'.$id);
			} elseif($_POST['type_input'] == 'edit') {
				
				unset($_POST['type_input']);
				if (($_FILES["foto"]["name"]) !== '') {
	                // print_r($_FILES);exit();
	                $config['upload_path'] = './front/images/calon/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg';
	                $config['max_size']  = '10000';
	                $config['file_name']  = time();
	                
	                $this->load->library('upload', $config);
	                
	                if ( ! $this->upload->do_upload('foto')){
	                    echo $this->upload->display_errors();
	                }
	                else{
	                    $this->image = $this->upload->data('file_name');
	                }
	                // exit;
	            } else {
	                $this->image = $this->input->post('old_foto');
	            }

				$_POST['foto'] = $this->image;
				unset($_POST['old_foto']);
				$this->db->where('id_calon', $_POST['id_calon']);
				$this->db->update('calon', $_POST);
				$this->session->set_flashdata('message', alert_biasa('Berhasil Ubah Data!','success'));
				redirect('app/data_calon/'.$id);
			}

			
		}
    }

    public function get_calon($id_calon)
    {
        $query = $this->db->get_where('calon', array('id_calon'=>$id_calon))->row();
        $result['calon'] = $query;
        echo json_encode($result);
    }

    public function hapus_calon($id_calon,$id_pemilihan)
    {
    	$this->db->where('id_calon', $id_calon);
    	$this->db->delete('calon');
    	$this->session->set_flashdata('message', alert_biasa('Berhasil Hapus Data!','success'));
		redirect('app/data_calon/'.$id_pemilihan);
    }

    public function data_pemilih()
    {
    	if ($this->session->userdata('username') == '') {
            redirect('app/login','refresh');
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
			redirect('app/data_pemilih','refresh');
		}
    }

    public function hapus_pemilih($id_pemilih)
    {
    	$this->db->where('id_pemilih', $id_pemilih);
    	$this->db->delete('pemilih');
    	$this->session->set_flashdata('message', alert_biasa('Berhasil Hapus Data!','success'));
		redirect('app/data_pemilih');
    }

    public function hapus_all_pemilih()
    {
    	$this->db->query("DELETE FROM pemilih");
    	$this->session->set_flashdata('message', alert_biasa('Berhasil Hapus Semua Data!','success'));
		redirect('app/data_pemilih');
    }

    public function profil_admin()
    {
    	if ($_POST == NULL) {
    		$data = array(
				'konten' => 'front/profil',
	            'judul_page' => 'Data Profil',
	            'dt' => $this->db->get_where('admin', array('id_user'=>$this->session->userdata('id_user')))
			);
			$this->load->view('f_index', $data);
    	} else {
    		if ($_POST['password'] == '') {
    			unset($_POST['password']);
    		} else {
    			$_POST['password'] = md5($_POST['password']);
    		}
    		$this->db->where('id_user', $this->session->userdata('id_user'));
    		$this->db->update('admin', $_POST);
    		$this->session->set_flashdata('message', alert_biasa('Berhasil ubah profil!','success'));
			redirect('app/panitia');
    	}
    }

    public function daftar_panitia()
    {
    	if ($_POST == NULL) {
    		$data = array(
				'konten' => 'front/daftar_panitia',
	            'judul_page' => 'Daftar Panitia',
			);
			$this->load->view('f_index', $data);
    	} else {
    		if ($_POST['password1'] == $_POST['password2']) {
    			unset($_POST['password2']);
    			$_POST['username'] = strtolower(str_replace(' ', '', $_POST['nama']));
    			$_POST['password'] = md5($_POST['password1']);
    			unset($_POST['password1']);
    			$_POST['akses'] = 'panitia';
    			$_POST['status'] = 1;
    			$this->db->insert('admin', $_POST);
    			$this->session->set_flashdata('message', alert_biasa('Pendaftaran Panitia berhasil\n silahkan Login!','success'));
				redirect('app/login','refresh');
    		} else {
    			$this->session->set_flashdata('message', alert_biasa('Kata sandi tidak sama!','warning'));
				redirect('app/daftar_panitia','refresh');
    		}
    	}
    }

    
	public function login() 
	{
		$this->load->view('login');
	}

	public function aksi_login()
	{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			// $hashed = '$2y$10$LO9IzV0KAbocIBLQdgy.oeNDFSpRidTCjXSQPK45ZLI9890g242SG';
			$cek_user = $this->db->query("SELECT * FROM admin WHERE email='$email' and password='$password' ");
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
				$this->session->set_flashdata('message', alert_biasa('Gagal Login!\n email atau password kamu salah','warning'));
				redirect('app/login','refresh');
			}
	}

	

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('app','refresh');
	}

	

	
}
