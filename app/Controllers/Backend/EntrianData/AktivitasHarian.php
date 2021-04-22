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
        // link aktif
        $data['linkSemua']  = "";
        $data['linkYa']     = "";
        $data['linkBelum']  = "";
        $data['linkTidak']  = "";
        $data['linkSKP']    = "";

        if(!empty($this->request->getGet('status')))
        {
            $data[$this->request->getGet('status')] = "active";
            $status = $this->request->getGet('status');

            switch ($status)
            {
                case 'linkBelum':
                    $data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'is_approve'=>'Belum','MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
                    break;
                case 'linkYa':
                    $data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'is_approve'=>'Ya','MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
                    break;
                case 'linkTidak':
                    $data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'is_approve'=>'Tidak','MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
                    break;
                case 'linkSKP':
                    $data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'link_skp_id!='=>'0','MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
                    break;
                default:
                    $data['data']   = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
                    break;
            }
        }
        else
        {
            $data['linkSemua']  = "active";
            $data['data']       = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
        }

        //perhitungan poin dan jumlah entrian
        $data['statusSemua']    = $this->AktivitasHarianModel->get(['nip'=>$_SESSION['id_user'],'MONTH(tanggal_kegiatan)'=>date('m'),'YEAR(tanggal_kegiatan)'=>date('Y')]);
        $data['statusBelum']    = $this->AktivitasHarianModel->jumlahBarisPerStatus('Belum');
        $data['statusYa']       = $this->AktivitasHarianModel->jumlahBarisPerStatus('Ya');
        $data['statusTidak']    = $this->AktivitasHarianModel->jumlahBarisPerStatus('Tidak');
        $data['statusLink']     = $this->AktivitasHarianModel->jumlahBarisLinkSKP();
        $data['poinYa']         = $this->AktivitasHarianModel->jumlahPoinPerStatus('Ya');
        $data['poinBelum']      = $this->AktivitasHarianModel->jumlahPoinPerStatus('Belum');

		$data['link']   = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user']]);
        $data['skp']    = $this->SusunanSKPModel->skpAktif();
	
		$param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function insert()
    {
        $tanggal_kegiatan   = entitiestag($this->request->getPost('tanggal_kegiatan'));
        $penilai_nip        = entitiestag($this->request->getPost('penilai_nip'));
        $link_skp_id        = entitiestag($this->request->getPost('link_skp_id'));
        $is_submit          = entitiestag($this->request->getPost('is_submit'));
        $uraian_kegiatan    = entitiestag($this->request->getPost('uraian_kegiatan'));
        $id                 = entitiestag($this->request->getPost('id'));
        $proses             = entitiestag($this->request->getPost('proses'));
        $jam_mulai          = entitiestag($this->request->getPost('jam_mulai'));
        $jam_selesai        = entitiestag($this->request->getPost('jam_selesai'));

        $start              = strtotime($jam_mulai.':00');
        $end                = strtotime($jam_selesai.':00');
        $poin               = ($end - $start) / 60;

        if($poin>360)
        {
            $poin=360;
        }

        // mengambil referensi data
        $penilai            = $this->LinkHirarkiModel->get(['nip'=>$_SESSION['id_user'],'link_atasan_id'=>$penilai_nip]);
        $skp                = $this->SusunanSKPModel->get(['skp_id'=>$link_skp_id]);

        $link_atasan_id     = "-";
        $link_atasan_nama   = "-";
        $skp_id             = "-";
        $skp_kegiatan       = "";

        if($penilai_nip<>'-')
        {
            if(!empty($penilai))
            {
                $link_atasan_id     = $penilai[0]['link_atasan_id'];
                $link_atasan_nama   = $penilai[0]['link_atasan_nama'];
            }
        }

        if($link_skp_id!=0)
        {
            if(!empty($skp))
            {
                $skp_id         = $skp[0]['skp_id'];
                $skp_kegiatan   = $skp[0]['kegiatan'];
            }
        }

        $data['tanggal_kegiatan'] = tanggal_Ymd($tanggal_kegiatan).' '.date('H:i:s');
        $data['nip']              = $_SESSION['nip'];
        $data['nama']             = $_SESSION['username'];
        $data['pangkat']          = $_SESSION['pangkat'];
        $data['gol']              = $_SESSION['gol'];
        $data['jabatan']          = $_SESSION['jabatan'];
        $data['jabatan_kd']       = $_SESSION['jabatan_kd'];
        $data['jenis_jabatan']    = $_SESSION['jenis_jabatan'];
        $data['unit_kerja']       = $_SESSION['unit_kerja'];
        $data['foto']             = $_SESSION['foto'];
        $data['penilai_nip']      = $link_atasan_id;
        $data['penilai_nama']     = $link_atasan_nama;
        $data['link_skp_id']      = $skp_id;
        $data['link_skp_kegiatan']= $skp_kegiatan;
        $data['uraian_kegiatan']  = $uraian_kegiatan;
        $data['jam_mulai']        = $jam_mulai;
        $data['jam_selesai']      = $jam_selesai;
        $data['poin']             = $poin;
        $data['is_submit']        = $is_submit;
        
        if($proses=="insert")
        {
            $data['tanggal_entrian']  = date('Y-m-d H:i:s');
            $this->AktivitasHarianModel->insert($data);
        }
        else
        {
            $this->AktivitasHarianModel->update($id,$data);
        }
        
        return redirect()->to(backend_url('aktivitas-harian'));
    }

    public function delete()
    {
        $id = $this->request->getGet('id');
        $cek = $this->AktivitasHarianModel->get(['id'=>$id,'nip'=>$_SESSION['id_user']]);
        if(!empty($cek))
        {
            $this->AktivitasHarianModel->delete($id);
        }
        return redirect()->to(backend_url('aktivitas-harian'));
    }
}