<?php namespace App\Controllers\Backend\Penilaian;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\Verifikasi\PersetujuanSKPModel;
use App\Models\Penilaian\PerilakuKerjaModel;
use App\Models\Penilaian\IndikatorPerilakuKerjaModel;
use App\Models\Auth\PegawaiModel;

class PerilakuKerja extends BackendController
{
	public $path_view   = "backend/penilaian/perilaku-kerja/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->SusunanSKPModel             = new SusunanSKPModel();
        $this->PeriodeSKPModel             = new PeriodeSKPModel();
        $this->PersetujuanSKPModel         = new PersetujuanSKPModel();
        $this->PerilakuKerjaModel          = new PerilakuKerjaModel();
        $this->IndikatorPerilakuKerjaModel = new IndikatorPerilakuKerjaModel();
        $this->PegawaiModel                = new PegawaiModel();
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
            else
            {
                $default_periode_id         = $this->request->getGet('periode_id');
            }
        }

        $data['default_periode_id'] = $default_periode_id;
        $data['periode_terpilih']   = $default_periode_rentang;
        $data['data']               = $this->PerilakuKerjaModel->daftarPerilakuKerjaLink();
       // dd($data['data']);
		$param['page']              = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function setNilai()
    {
        $indikator_id   = entitiestag($this->request->getPost('indikator_id'));
        $indikator      = $this->IndikatorPerilakuKerjaModel->get(['id'=>$indikator_id]);
        $poin           = entitiestag($this->request->getPost('poin'));
        $nip            = entitiestag($this->request->getPost('nip'));
        $periode_id     = entitiestag($this->request->getPost('periode_id'));

        $keterangan     = "";
        $t              = (int)$poin;
        switch(true) {
            case in_array($t, range(91,100)): 
                $keterangan = "Sangat baik";
            break;
            case in_array($t, range(76,90)): 
                $keterangan = "Baik";
            break;
            case in_array($t, range(61,75)): 
                $keterangan = "Cukup";
            break;
            case in_array($t, range(51,60)): 
                $keterangan = "Kurang";
            break;
            case in_array($t, range(1,50)): 
                $keterangan = "Buruk";
            break;
            default:  $keterangan = "";
        }

        $data['periode_id']     = $periode_id;
        $data['nip']            = $nip; 
        $data['keterangan']     = $keterangan;
        $data['poin']           = $poin;
        $data['indikator_id']   = $indikator[0]['id'];
        $data['indikator_nama'] = $indikator[0]['indikator'];
        $data['indikator_urut'] = $indikator[0]['urut'];

        //$exist                  = $this->PerilakuKerjaModel->where('nip',$nip)->where('periode_id',$periode_id)->where('indikator_id',$indikator_id)->get();
        $exist  = $this->PerilakuKerjaModel->getExist($nip,$periode_id,$indikator_id);
        
        //jika nilai kosong maka datanya dihapus
        if($poin==0)
        {
            $this->PerilakuKerjaModel->delete($exist[0]['id']);
        }
        else
        {
            //$data['deleted_at'] = "";
            //$this->PerilakuKerjaModel->update($exist[0]['id'],$data);

            if(!empty($exist))
            {
                $this->PerilakuKerjaModel->update($exist[0]['id'],$data);
            }
            else
            {
                $this->PerilakuKerjaModel->insert($data);
            }
        }

        

        $all        = $this->PerilakuKerjaModel->where('nip',$nip)->where('periode_id',$periode_id)->get();
        $jumlah     = 0;
        $total      = 0; 
        $rerata     = 0;
        $prosentase = 0;

        if(!empty($all))
        {
            $jumlah = count($all);
            foreach($all as $row):
                $total+=$row['poin'];
            endforeach;

            $rerata     = round(($total/$jumlah),2);
            $prosentase = round(($rerata*0.4),2);
        }

        $sebutan     = "";
        $t           = (int)$rerata;
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

        $result = array(
            'keterangan' => $keterangan,
            'jumlah'     => $jumlah,
            'total'      => $total,
            'rerata'     => $rerata,
            'prosentase' => $prosentase,
            'sebutan'    => $sebutan
        );

        $perilaku_kerja['perilaku_kerja_jumlah']     = $total;
        $perilaku_kerja['perilaku_kerja_sebutan']    = $sebutan;
        $perilaku_kerja['perilaku_kerja_rerata']     = $rerata;
        $perilaku_kerja['perilaku_kerja_prosentase'] = $prosentase;

        $this->PeriodeSKPModel->update($periode_id,$perilaku_kerja);
        echo json_encode($result);
    }

    public function infoWa()
    {
        $nip        = entitiestag($this->request->getPost('nip'));
        $pegawai    = $this->PegawaiModel->get(['nip'=>$nip]);

        $curl = curl_init();

        $info = array(
            "nohp"  => $pegawai[0]['kontak'],
            "pesan" => "Hai ini dari sicakap.magelangkab.go.id\n\nMemberitahukan bahwa penilaian SKP dari Atasan Anda *telah selesai*.\nSilakan cek info selanjutnya pada sistem.\n\n*Terima kasih* ;-)",
            "tipe"  => "text" 
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL             => "https://apibot.magelangkab.go.id/Api/wa/send",
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_POSTFIELDS      => json_encode($info),
            CURLOPT_HTTPHEADER      => array(
                "cache-control: no-cache",
                "service: sipgan",
                "token: 0ba9aab0887c801aacb89660e92cb17c"
            ),
        ));

        $response   = curl_exec($curl);
        $err        = curl_error($curl);

        curl_close($curl);

        if ($err)
        {
            echo "cURL Error #:" . $err;
        } 
        else
        {
            echo $response;
        }
    }
}