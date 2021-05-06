<?php namespace App\Controllers\Backend\Penilaian;
use App\Controllers\BackendController;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\Penilaian\PerilakuKerjaModel;
use App\Models\Penyesuaian\TambahanKreativitasModel;

class Review extends BackendController
{
	public $path_view   = "backend/penilaian/review/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->PeriodeSKPModel          = new PeriodeSKPModel();
        $this->SusunanSKPModel          = new SusunanSKPModel();
        $this->PerilakuKerjaModel       = new PerilakuKerjaModel();
        $this->TambahanKreativitasModel = new TambahanKreativitasModel();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}

        $periode_id             = 0;
        $data['terpilih']       = "";
        $data['periode']        = $this->PeriodeSKPModel->where('nip',$_SESSION['id_user'])->orWhere('pejabat_penilai_nip',$_SESSION['id_user'])->get();

        if(!empty($data['periode']))
        {
            $data['terpilih']   = 'SKP a.n <b>'.($data['periode'][0]['nama']).'</b> utk periode '.tanggal_dMY($data['periode'][0]['periode_awal']).' - '.tanggal_dMY($data['periode'][0]['periode_akhir']);
            $periode_id = $data['periode'][0]['periode_id'];
        }

       
        if(!empty($this->request->getGet('id')))
        {
            $periode_id = $this->request->getGet('id');
        }
        
        $data['skp']                    = $this->SusunanSKPModel->get(["periode_id"=>$periode_id]);
        $data['tambahan_kreativitas']   = $this->TambahanKreativitasModel->get(['nip'=>$data['periode'][0]['nip'], 'periode_id'=> $periode_id, 'is_approve'=> 'Ya' ]);

        $data['jml_tugas_tambahan']     = count($this->TambahanKreativitasModel->get(['nip'=>$data['periode'][0]['nip'], 'periode_id'=> $periode_id, 'is_approve'=> 'Ya', 'kategori'=>'Tugas Tambahan' ]));
        $data['jml_kreativitas']        = count($this->TambahanKreativitasModel->get(['nip'=>$data['periode'][0]['nip'], 'periode_id'=> $periode_id, 'is_approve'=> 'Ya', 'kategori'=>'Kreativitas' ]));
    
        $data['penilaian']              = $this->PerilakuKerjaModel->orderBy('indikator_urut','ASC')->get(['nip'=>$data['periode'][0]['nip'], 'periode_id'=> $periode_id ]);
		
        //perhitungan nilai capaian SKP
        $jumlah_nilai   = 0;
        $jumlah_row     = 0;
        $rerata_skp     = 0;
        $jumlah_skp     = 0;

        foreach($data['skp'] as $row)
        {
            $jumlah_row++;
            $jumlah_nilai += $row['nilai'];
        }

        $poin_tugas_tambahan = (isset($data['periode'][0]['poin_tugas_tambahan'])==true)?$data['periode'][0]['poin_tugas_tambahan']:0;
        $poin_kreativitas    = (isset($data['periode'][0]['poin_kreativitas'])==true)?$data['periode'][0]['poin_kreativitas']:0;

        $rerata_skp          = $jumlah_nilai/$jumlah_row;
        $jumlah_skp          = $rerata_skp + $poin_tugas_tambahan + $poin_kreativitas;
        $prosentase_skp      = $jumlah_skp*(60/100);

        $sebutan     = "";
        $t           = (int)$jumlah_skp;

        switch(true) {
            case in_array($t, range(91,100)): 
                $sebutan = "Sangat baik";
            break;
            case in_array($t, range(76,90)): 
                $sebutan = "Baik";
            break;
            case in_array($t, range(61,75)): 
                $sebutan = "Cukup";
            break;
            case in_array($t, range(51,60)): 
                $sebutan = "Kurang";
            break;
            case in_array($t, range(1,50)): 
                $sebutan = "Buruk";
            break;
            default:  $sebutan = "";
        }

        $jumlah_ppk  = $data['periode'][0]['perilaku_kerja_prosentase']+$prosentase_skp;
        $sebutan_ppk = "";
        $t           = (int)$jumlah_ppk;

        switch(true) {
            case in_array($t, range(91,100)): 
                $sebutan_ppk = "Sangat baik";
            break;
            case in_array($t, range(76,90)): 
                $sebutan_ppk = "Baik";
            break;
            case in_array($t, range(61,75)): 
                $sebutan_ppk = "Cukup";
            break;
            case in_array($t, range(51,60)): 
                $sebutan_ppk = "Kurang";
            break;
            case in_array($t, range(1,50)): 
                $sebutan_ppk = "Buruk";
            break;
            default:  $sebutan_ppk = "";
        }
        

        $data['jumlah_skp']     = $jumlah_skp;
        $data['sebutan_skp']    = $sebutan;
        $data['prosentase_skp'] = $prosentase_skp;
        $data['jumlah_ppk']     = $jumlah_ppk;
        $data['sebutan_ppk']    = $sebutan_ppk;
        $param['page']          = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}
}