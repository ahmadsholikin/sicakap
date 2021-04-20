<?php namespace App\Controllers\Pages\Auth;
use App\Controllers\FrontendController;
use App\Models\Auth\LoginModel;
use App\Models\Auth\PegawaiModel;

class Auth extends FrontendController
{
	public $path_view 	= "pages/auth/";

	public function __construct()
    {
		$this->session      = session();
		$this->LoginModel   = new LoginModel();
        $this->PegawaiModel = new PegawaiModel();
    }

	public function index()
	{
		return redirect()->to(base_url());
	}

    public function sso()
    {
        $nip        = $this->request->getPost('nip');
        $password   = $this->request->getPost('password');

        $response = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso","nip=".$nip."&password=".$password."&token=3k1n%23RJ4&id_app=EKINERJA");

        if ($response->status == "false")
        {
            $this->session->setFlashdata('flash_info', 'Akun tidak sesuai');
            return redirect()->back();
        } 
        else
        {
            $usr = $response->data[0];
            $this->session->set('email',$usr->nip_baru);
            $this->session->set('id_user',$usr->nip_baru);
            $this->session->set('username',$usr->nip_baru);
            $this->session->set('nip', $usr->nip_baru);
            $this->session->set('nama_pegawai', $usr->nama);
            $this->session->set('jabatan_kd', $usr->jabatan_kd);
            $this->session->set('jabatan', $usr->jabatan_nm);
            $this->session->set('jenis_jabatan', $usr->jenis_jabatan);
            $this->session->set('unit_kerja', $usr->skpd_nm);
            $this->session->set('nama_uker', $usr->subbidang_nm);
            $this->session->set('gol', $usr->gol);
            $this->session->set('pangkat', $usr->pangkat);
            $this->session->set('eselon', $usr->eselon);
            $this->session->set('email', $usr->email);
            $this->session->set('kontak', $usr->kontak);
            $this->session->set('foto', $usr->foto_link);

            if($usr->nip_baru=='199202062020121004')
            {
                $this->session->set('group_id', 1);
                $this->session->set('group_nama', "Administrator");
            }
            else
            {
                $this->session->set('group_id', 4);
                $this->session->set('group_nama', "User");
            }
           
            $this->session->set('logged_in', TRUE);
            $this->session->set('user_image', $usr->foto_link);

            // selalu update data terbaru pegawainya
            $pegawai['nip']           = $usr->nip_baru;
            $pegawai['nama']          = $usr->nama;
            $pegawai['pangkat']       = $usr->pangkat;
            $pegawai['gol']           = $usr->gol;
            $pegawai['jabatan']       = $usr->jabatan_nm;
            $pegawai['jabatan_kd']    = $usr->jabatan_kd;
            $pegawai['jenis_jabatan'] = $usr->jenis_jabatan;
            $pegawai['unit_kerja']    = $usr->skpd_nm;
            $pegawai['foto']          = $usr->foto_link;
            $pegawai['email']         = $usr->email;
            $pegawai['kontak']        = $usr->kontak;

            $exist = $this->PegawaiModel->get(['nip'=>$usr->nip_baru]);
            if(empty($exist))
            {
                $this->PegawaiModel->insert($pegawai);
            }
            else
            {
                $this->PegawaiModel->update($usr->nip_baru, $pegawai);
            }

        
            return redirect()->to(backend_url().'/beranda');
        }
    }

	public function signin()
	{
		$email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        // bagian awal validasi
        $post_validasi['email']       = $email;
        $post_validasi['password']    = $password;

        $validation = \Config\Services::validation();
        if($validation->run($post_validasi,'form_login')==false)
        {
            $this->session->setFlashdata('flash_auth_email_class', '-danger');
            $this->session->setFlashdata('flash_auth_email_info', 'Wajib diisi dengan email yang valid | Minimal 10 karakter');
            $this->session->setFlashdata('flash_auth_password_class', '-danger');
            $this->session->setFlashdata('flash_auth_password_info', 'Wajib diisikan | Minimal 5 karakter');
            return redirect()->back();
        }
        // bagian akhir validasi

        // proses autentikasi
		$cek_akun = $this->LoginModel->cek($email,$password);
        if(!$cek_akun)
        {
            $this->session->setFlashdata('flash_auth_email_class', '-danger');
            $this->session->setFlashdata('flash_auth_email_info', 'Akun tersebut tidak ditemukan. Mohon cek kembali');

            $output = [
                'status'    => 401,
                'message'   => 'Login failed',
            ];
            //return $this->respond($output, 401);
            $this->session->setFlashdata('flash_auth_email',  $email);
            $this->session->setFlashdata('flash_auth_password',  $password);
            $this->session->setFlashdata('flash_auth_password_class', '-danger');
            $this->session->setFlashdata('flash_auth_password_info', 'Kata sandi yang Anda entrikan salah.');
            return redirect()->back();
        }
        else
        {
            $user = array(
				"email"      => $cek_akun['email'],
                "username"   => $cek_akun['username'],
                "group_id"   => $cek_akun['group_id'],
                "group_nama" => $cek_akun['group_nama'],
				'logged_in'  => TRUE,
				"user_image" => "",
			);
            $this->session->set($user);
            return redirect()->to(backend_url().'/beranda');
        }
    }
    
    public function signout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}