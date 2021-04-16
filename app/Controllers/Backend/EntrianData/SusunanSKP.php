<?php namespace App\Controllers\Backend\EntrianData;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;

class SusunanSKP extends BackendController
{
	public $path_view   = "backend/entrian-data/susunan-skp/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->SusunanSKPModel  = new SusunanSKPModel();
        $this->PeriodeSKPModel  = new PeriodeSKPModel();

        $this->db  = \Config\Database::connect();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}

        $data['periode']            = $this->PeriodeSKPModel->orderBy('is_default','ASC')->get(['nip'=>$_SESSION['id_user']]);
        $default_periode_rentang    = "Periode Belum Ada";
        $default_periode_id         = 0;

        if(!empty($data['periode']))
        {
            if(empty($this->request->getGet('periode_id')))
            {
                $default_periode_rentang    = tanggal_dMY($data['periode'][0]['periode_awal']).' - '.tanggal_dMY($data['periode'][0]['periode_akhir']);
                $default_periode_id         = $data['periode'][0]['periode_id'];
            }
            else
            {
                $default_periode_id         = $this->request->getGet('periode_id');
                $periode_terpilih           = $this->PeriodeSKPModel->get(['periode_id'=>$default_periode_id]);
                $default_periode_rentang    = tanggal_dMY($periode_terpilih[0]['periode_awal']).' - '.tanggal_dMY($periode_terpilih[0]['periode_akhir']);
            }
        }
        
        $data['periode_terpilih']   = $default_periode_rentang;
        $data['data']               = $this->SusunanSKPModel->get(['nip'=>$_SESSION['id_user'],'periode_id'=>$default_periode_id]);
		$param['page']              = view($this->path_view . 'page-index',$data);
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

        $uraian         = get_api("https://sipgan.magelangkab.go.id/sipgan/api/ekinerja/uraian_kegiatan?jabatan=".urlencode($_SESSION['jabatan']));
    
        $list_uraian    = array();
        if(!empty($uraian))
        {
            if($uraian->status=='true')
            {
                $list_uraian = $uraian->data;
            }
        }

        $list_uraian_jabatan = $this->SusunanSKPModel->skpJabatan();
        
        $data['list_uraian_jabatan'] = $list_uraian_jabatan;
        $data['list_uraian']         = $list_uraian;
        $data['periode']             = $this->PeriodeSKPModel->get(['nip' => $_SESSION['id_user']]);
        $data['link']                = $this->db->table('link_skp')->get()->getResult();
        $param['page']               = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
    }

	public function insert()
	{
        $link               = entitiestag($this->request->getPost('link_atasan_id'));
        $link_atasan_id     = '-';
        $link_atasan_nama   = '-';

        if($link<>'-')
        {
            $link               = explode(" - ",$link);
            $link_atasan_id     = $link[0];
            $link_atasan_nama   = $link[1];
        }
        
		$data['nip']			      = $_SESSION['id_user'];
		$data['periode_id']  	      = entitiestag($this->request->getPost('periode_id'));
        $data['link_atasan_id']  	  = $link_atasan_id;
        $data['link_atasan_nama']  	  = $link_atasan_nama;
        $data['kegiatan']  	          = entitiestag($this->request->getPost('kegiatan'));
        $data['angka_kredit']  	      = entitiestag($this->request->getPost('angka_kredit'));
        $data['target_kuantitas']  	  = entitiestag($this->request->getPost('target_kuantitas'));
        $data['target_output']  	  = entitiestag($this->request->getPost('target_output'));
        $data['target_kualitas_mutu'] = entitiestag($this->request->getPost('target_kualitas_mutu'));
        $data['target_waktu']  	      = entitiestag($this->request->getPost('target_waktu'));
        $data['target_satuan_waktu']  = entitiestag($this->request->getPost('target_satuan_waktu'));
        $data['target_biaya']  	      = entitiestag($this->request->getPost('target_biaya'));

		$this->SusunanSKPModel->insert($data);
		return redirect()->to(backend_url().'/susunan-skp');
	}

	public function edit()
    {
		$id    		 = $this->request->getGet('id');
        $data['row'] = $this->SusunanSKPModel->get(['skp_id'=>$id,'nip'=>$_SESSION['id_user']]);
        
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

        $uraian         = get_api("https://sipgan.magelangkab.go.id/sipgan/api/ekinerja/uraian_kegiatan?jabatan=".urlencode($_SESSION['jabatan']));
        $list_uraian    = array();
        if(!empty($uraian))
        {
            if($uraian->status=='true')
            {
                $list_uraian = $uraian->data;
            }
        }

        $data['list_uraian']= $list_uraian;
        $data['periode']    = $this->PeriodeSKPModel->get(['nip'=>$_SESSION['id_user']]);
        $data['link']       = $this->db->table('link_skp')->get()->getResult();

        $param['page'] = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }

    public function update()
	{
        $id                 = entitiestag($this->request->getPost('id'));
        $link               = entitiestag($this->request->getPost('link_atasan_id'));
        $link_atasan_id     = '-';
        $link_atasan_nama   = '-';

        if($link<>'-')
        {
            $link               = explode(" - ",$link);
            $link_atasan_id     = $link[0];
            $link_atasan_nama   = $link[1];
        }
        
		$data['nip']			      = $_SESSION['id_user'];
		$data['periode_id']  	      = entitiestag($this->request->getPost('periode_id'));
        $data['link_atasan_id']  	  = $link_atasan_id;
        $data['link_atasan_nama']  	  = $link_atasan_nama;
        $data['kegiatan']  	          = entitiestag($this->request->getPost('kegiatan'));
        $data['angka_kredit']  	      = entitiestag($this->request->getPost('angka_kredit'));
        $data['target_kuantitas']  	  = entitiestag($this->request->getPost('target_kuantitas'));
        $data['target_output']  	  = entitiestag($this->request->getPost('target_output'));
        $data['target_kualitas_mutu'] = entitiestag($this->request->getPost('target_kualitas_mutu'));
        $data['target_waktu']  	      = entitiestag($this->request->getPost('target_waktu'));
        $data['target_satuan_waktu']  = entitiestag($this->request->getPost('target_satuan_waktu'));
        $data['target_biaya']  	      = entitiestag($this->request->getPost('target_biaya'));

		$this->SusunanSKPModel->update($id,$data);
		return redirect()->to(backend_url().'/susunan-skp');
	}


	public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->SusunanSKPModel->delete($id);
        return redirect()->to(backend_url() . '/susunan-skp');
    }
}