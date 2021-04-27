<?php namespace App\Controllers\Backend\Penilaian;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\Verifikasi\PersetujuanSKPModel;

class CapaianSKP extends BackendController
{
	public $path_view   = "backend/penilaian/capaian-skp/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->SusunanSKPModel      = new SusunanSKPModel();
        $this->PeriodeSKPModel      = new PeriodeSKPModel();
        $this->PersetujuanSKPModel  = new PersetujuanSKPModel();

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

        $data['periode']            = $this->PersetujuanSKPModel->periodeSKPLink();
        $default_periode_rentang    = "Periode Belum Ada";
        $default_periode_id         = 0;

        if(!empty($data['periode']))
        {
            if(empty($this->request->getGet('periode_id')))
            {
                $default_periode_rentang    = tanggal_dMY($data['periode'][0]['periode_awal']).' - '.tanggal_dMY($data['periode'][0]['periode_akhir']);
                $default_periode_id         = $data['periode'][0]['periode_id'];
            }
        }
        
        $data['periode_terpilih']   = $default_periode_rentang;
        $data['data']               = $this->PersetujuanSKPModel->daftarSKPLink();
		$param['page']              = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function setSKP()
    {
        $id     = $this->request->getPost('id');
        $value  = $this->request->getPost('value');
        $data['realisasi_kualitas_mutu'] = $value;
        $this->SusunanSKPModel->update($id, $data);
        
        $perhitungan    = 0;
        $nilai          = 0;
        $waktu          = 0;
        $biaya          = 0;

        $skp        = $this->SusunanSKPModel->get(['skp_id'=>$id]);
        $kondisi    = $this->_waktu1($skp[0]['fix_waktu'],$skp[0]['realisasi_waktu']);
        
        if($kondisi > 24)
        {
            $waktu = $this->_waktu2($skp[0]['fix_waktu'],$skp[0]['realisasi_waktu']);
        }
        else
        {
            $waktu = $this->_waktu3($skp[0]['fix_waktu'],$skp[0]['realisasi_waktu']);
        }

        if((int)$skp[0]['realisasi_biaya']>0)
        {
            $biaya = $this->_biaya($skp[0]['fix_biaya'],$skp[0]['realisasi_biaya']);
        }

        $kuantitas = $this->_kuantitas($skp[0]['fix_kuantitas'],$skp[0]['realisasi_kuantitas']);
        $kualitas  = $this->_kualitas($skp[0]['target_kualitas_mutu'],$skp[0]['realisasi_kualitas_mutu']);
        
        $perhitungan  = $waktu + $kuantitas + $kualitas + $biaya;
        $nilai        = $perhitungan/3;

        if((int)$skp[0]['realisasi_biaya']>0)
        {
            $nilai = $perhitungan/4;
        }

        $data['penghitungan']   = $perhitungan;
        $data['nilai']          = $nilai;
        $this->SusunanSKPModel->update($id,$data);

        echo json_encode($data);
    }

    private function _waktu1($target,$realisasi)
    {
        $hasil = 100-($realisasi/$target*100);
        return $hasil;
    }

    private function _waktu2($target,$realisasi)
    {
        $hasil = (76-((((1.76*$target-$realisasi)/$target)*100)-100));
        return $hasil;
    }

    private function _waktu3($target,$realisasi)
    {
        $hasil = (((1.76*$target-$realisasi)/$target)*100);
        return $hasil;
    }

    private function _kuantitas($target,$realisasi)
    {
        $hasil = ($realisasi/$target*100);
        return $hasil;
    }

    private function _kualitas($target,$realisasi)
    {
        $hasil= ($realisasi/$target*100);
        return $hasil;
    }

    private function _biaya($target,$realisasi)
    {
        $hasil = ((1.76*$target-$realisasi)/$target)*100;
        return $hasil;
    }

}