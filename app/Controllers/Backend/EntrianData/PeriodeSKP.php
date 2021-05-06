<?php namespace App\Controllers\Backend\EntrianData;
use App\Controllers\BackendController;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\Link\LinkHirarkiModel;
use App\Models\Auth\PegawaiModel;

class PeriodeSKP extends BackendController
{
	public $path_view   = "backend/entrian-data/periode-skp/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->PeriodeSKPModel  = new PeriodeSKPModel();
        $this->LinkHirarkiModel = new LinkHirarkiModel();
        $this->PegawaiModel     = new PegawaiModel();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}
		
		$data['data']  = $this->PeriodeSKPModel->get(['nip'=>$_SESSION['id_user']]);
		$param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

	public function add()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['link']   = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user']]);
        $param['page']  = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
    }

	public function insert()
	{
		$data['periode_awal']  	= tanggal_Ymd($this->request->getPost('periode_awal'));
		$data['periode_akhir'] 	= tanggal_Ymd($this->request->getPost('periode_akhir'));
		$data['nip']			= $_SESSION['id_user'];
        $data['nama']			= $_SESSION['nama_pegawai'];
        $data['pangkat']		= $_SESSION['pangkat'];
        $data['gol']			= $_SESSION['gol'];
        $data['jabatan']		= $_SESSION['jabatan'];
        $data['jabatan_kd']		= $_SESSION['jabatan_kd'];
        $data['unit_kerja']		= $_SESSION['unit_kerja'];

        //atasan
        $atasan     = entitiestag($this->request->getPost('atasan'));
        $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$atasan."&token=3k1n%23RJ4&id_app=EKINERJA");

        if ($response->status == "false")
        {
            $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
            return redirect()->back();
        } 
        else
        {
            $rest = $response->data[0];

            $data['atasan_nip']        = $rest->nip_baru;
            $data['atasan_nama']       = $rest->nama;
            $data['atasan_pangkat']    = $rest->pangkat;
            $data['atasan_gol']        = $rest->gol;
            $data['atasan_jabatan']    = $rest->jabatan_nm;
            $data['atasan_unit_kerja'] = $rest->skpd_nm;
        }
        //pejabat penilai
        $pejabat_penilai        = entitiestag($this->request->getPost('pejabat_penilai'));
        $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$pejabat_penilai."&token=3k1n%23RJ4&id_app=EKINERJA");

        if ($response->status == "false")
        {
            $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
            return redirect()->back();
        } 
        else
        {
            $rest = $response->data[0];

            $data['pejabat_penilai_nip']        = $rest->nip_baru;
            $data['pejabat_penilai_nama']       = $rest->nama;
            $data['pejabat_penilai_pangkat']    = $rest->pangkat;
            $data['pejabat_penilai_gol']        = $rest->gol;
            $data['pejabat_penilai_jabatan']    = $rest->jabatan_nm;
            $data['pejabat_penilai_unit_kerja'] = $rest->skpd_nm;
        }
        //atasan pejabat penilai
        $atasan_pejabat_penilai        = entitiestag($this->request->getPost('atasan_pejabat_penilai'));
        $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$atasan_pejabat_penilai."&token=3k1n%23RJ4&id_app=EKINERJA");

        if ($response->status == "false")
        {
            $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
            return redirect()->back();
        } 
        else
        {
            $rest = $response->data[0];

            $data['atasan_pejabat_penilai_nip']        = $rest->nip_baru;
            $data['atasan_pejabat_penilai_nama']       = $rest->nama;
            $data['atasan_pejabat_penilai_pangkat']    = $rest->pangkat;
            $data['atasan_pejabat_penilai_gol']        = $rest->gol;
            $data['atasan_pejabat_penilai_jabatan']    = $rest->jabatan_nm;
            $data['atasan_pejabat_penilai_unit_kerja'] = $rest->skpd_nm;
        }

		$this->PeriodeSKPModel->insert($data);
		return redirect()->to(backend_url().'/periode-skp');
	}

    public function update()
	{
        $id                     = $this->request->getPost('id');
		$data['periode_awal']  	= tanggal_Ymd($this->request->getPost('periode_awal'));
		$data['periode_akhir'] 	= tanggal_Ymd($this->request->getPost('periode_akhir'));
		$data['nip']			= $_SESSION['id_user'];
        $data['nama']			= $_SESSION['nama_pegawai'];
        $data['pangkat']		= $_SESSION['pangkat'];
        $data['gol']			= $_SESSION['gol'];
        $data['jabatan']		= $_SESSION['jabatan'];
        $data['jabatan_kd']		= $_SESSION['jabatan_kd'];
        $data['unit_kerja']		= $_SESSION['unit_kerja'];

        $cek = $this->PeriodeSKPModel->get(['periode_id'=>$id]);
        //atasan
        $atasan     = entitiestag($this->request->getPost('atasan'));
        if($cek[0]['atasan_nip']<>$atasan)
        {
            $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$atasan."&token=3k1n%23RJ4&id_app=EKINERJA");

            if ($response->status == "false")
            {
                $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
                return redirect()->back();
            } 
            else
            {
                $rest = $response->data[0];

                $data['atasan_nip']        = $rest->nip_baru;
                $data['atasan_nama']       = $rest->nama;
                $data['atasan_pangkat']    = $rest->pangkat;
                $data['atasan_gol']        = $rest->gol;
                $data['atasan_jabatan']    = $rest->jabatan_nm;
                $data['atasan_unit_kerja'] = $rest->skpd_nm;
            }
        }
        
        //pejabat penilai
        $pejabat_penilai        = entitiestag($this->request->getPost('pejabat_penilai'));
        if($cek[0]['pejabat_penilai_nip']<>$pejabat_penilai)
        {
            $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$pejabat_penilai."&token=3k1n%23RJ4&id_app=EKINERJA");

            if ($response->status == "false")
            {
                $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
                return redirect()->back();
            } 
            else
            {
                $rest = $response->data[0];

                $data['pejabat_penilai_nip']        = $rest->nip_baru;
                $data['pejabat_penilai_nama']       = $rest->nama;
                $data['pejabat_penilai_pangkat']    = $rest->pangkat;
                $data['pejabat_penilai_gol']        = $rest->gol;
                $data['pejabat_penilai_jabatan']    = $rest->jabatan_nm;
                $data['pejabat_penilai_unit_kerja'] = $rest->skpd_nm;
            }
        }
        //atasan pejabat penilai
        $atasan_pejabat_penilai        = entitiestag($this->request->getPost('atasan_pejabat_penilai'));
        if($cek[0]['atasan_pejabat_penilai_nip']<>$atasan_pejabat_penilai)
        {
            $response   = api_post("https://sipgan.magelangkab.go.id/sipgan/api/sso/akun","nip=".$atasan_pejabat_penilai."&token=3k1n%23RJ4&id_app=EKINERJA");

            if ($response->status == "false")
            {
                $this->session->setFlashdata('flash_info', 'Akun tidak ditemukan');
                return redirect()->back();
            } 
            else
            {
                $rest = $response->data[0];

                $data['atasan_pejabat_penilai_nip']        = $rest->nip_baru;
                $data['atasan_pejabat_penilai_nama']       = $rest->nama;
                $data['atasan_pejabat_penilai_pangkat']    = $rest->pangkat;
                $data['atasan_pejabat_penilai_gol']        = $rest->gol;
                $data['atasan_pejabat_penilai_jabatan']    = $rest->jabatan_nm;
                $data['atasan_pejabat_penilai_unit_kerja'] = $rest->skpd_nm;
            }
        }

		$this->PeriodeSKPModel->update($id,$data);
		return redirect()->to(backend_url().'/periode-skp');
	}

	public function edit()
    {
		$id    		 = $this->request->getGet('id');
        $data['row'] = $this->PeriodeSKPModel->get(['periode_id'=>$id,'nip'=>$_SESSION['id_user']]);
        
        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['link']   = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user']]);
        $param['page'] = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }


	public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->PeriodeSKPModel->delete($id);
        return redirect()->to(backend_url() . '/periode-skp');
    }

	public function default()
    {
        $id    			= $this->request->getGet('id');
        $cek   			= $this->PeriodeSKPModel->get(['periode_id' => $id]);
		$last_status 	= $cek[0]['is_default'];

        if($last_status=='Ya')
        {
            $last_status='Tidak';
        }
        else
        {
            $last_status='Ya';
        }

		$data['is_default'] = $last_status;
        $this->PeriodeSKPModel->update($id,$data);
        return redirect()->to(backend_url() . '/periode-skp');
    }

}