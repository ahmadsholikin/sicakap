<?php namespace App\Controllers\Backend\EntrianData;
use App\Controllers\BackendController;
use App\Models\EntrianData\AktivitasHarianModel;
use App\Models\Link\LinkHirarkiModel;
use App\Models\EntrianData\SusunanSKPModel;

class AktivitasHarian extends BackendController
{
	public $path_view   = "backend/entrian-data/aktivitas-harian/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->AktivitasHarianModel     = new AktivitasHarianModel();
        $this->LinkHirarkiModel         = new LinkHirarkiModel();
        $this->SusunanSKPModel          = new SusunanSKPModel();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}

		$data['link']   = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user']]);
        $data['skp']    = $this->SusunanSKPModel->skpAktif();
		$data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user']]);
		$param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function insert()
    {
        $tanggal_kegiatan = entitiestag($this->request->getPost('tanggal_kegiatan'));
        $penilai_nip      = entitiestag($this->request->getPost('penilai_nip'));
        $link_skp_id      = entitiestag($this->request->getPost('link_skp_id'));
        $is_submit        = entitiestag($this->request->getPost('is_submit'));
        $uraian_kegiatan  = entitiestag($this->request->getPost('uraian_kegiatan'));
        $poin             = entitiestag($this->request->getPost('poin'));

        // mengambil referensi data
        $penilai    = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user'],'link_atasan_id'=>$penilai_nip]);
        $skp        = $this->SusunanSKPModel->get(['skp_id'=>$link_skp_id]);

        $data['tanggal_entrian']  = date('Y-m-d H: i: s');
        $data['tanggal_kegiatan'] = tanggal_Ymd($tanggal_kegiatan);
        $data['nip']              = $_SESSION['nip'];
        $data['nama']             = $_SESSION['nama'];
        $data['pangkat']          = $_SESSION['pangkat'];
        $data['gol']              = $_SESSION['gol'];
        $data['jabatan']          = $_SESSION['jabatan'];
        $data['jabatan_kd']       = $_SESSION['jabatan_kd'];
        $data['jenis_jabatan']    = $_SESSION['jenis_jabatan'];
        $data['unit_kerja']       = $_SESSION['unit_kerja'];
        $data['foto']             = $_SESSION['foto'];
        $data['penilai_nip']      = $penilai[0]['link_atasan_id'];
        $data['penilai_nama']     = $penilai[0]['link_atasan_nama'];
        $data['link_skp_id']      = $skp[0]['skp_id'];
        $data['link_skp_kegiatan']= $skp[0]['kegiatan'];
        $data['uraian_kegiatan']  = $uraian_kegiatan;
        $data['poin']             = $poin;
        $data['is_submit']        = $is_submit;

        $this->AktivitasHarianModel->insert($data);
        return redirect()->to(backend_url('aktivitas-harian'));
    }
}