<?php namespace App\Controllers\Backend\Penilaian;
use App\Controllers\BackendController;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\Penilaian\PerilakuKerjaModel;
use App\Models\Penyesuaian\TambahanKreativitasModel;
use App\Models\Auth\PegawaiModel;

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
        $this->PegawaiModel             = new PegawaiModel();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}

        $periode_id                = 0;
        $data['terpilih']          = "";
        $data['periode']           = $this->PeriodeSKPModel->where('nip',$_SESSION['id_user'])->orWhere('pejabat_penilai_nip',$_SESSION['id_user'])->get();
        $data['periode_terpilih']  = $data['periode'];
        $nip                       = $_SESSION['id_user'];
        $poin_tugas_tambahan       = 0;
        $poin_kreativitas          = 0;
        $perilaku_kerja_prosentase = 0;


        //berlaku jika tidak ditemukan data, maka defaultnya adalah dari data user login itu sendiri
        if(!empty($data['periode']))
        {
            $data['terpilih']          = 'SKP a.n <b>'.($data['periode'][0]['nama']).'</b> utk periode '.tanggal_dMY($data['periode'][0]['periode_awal']).' - '.tanggal_dMY($data['periode'][0]['periode_akhir']);
            $periode_id                = $data['periode'][0]['periode_id'];
            $nip                       = $data['periode'][0]['nip'];
            $poin_tugas_tambahan       = (isset($data['periode'][0]['poin_tugas_tambahan'])==true)?$data['periode'][0]['poin_tugas_tambahan']:0;
            $poin_kreativitas          = (isset($data['periode'][0]['poin_kreativitas'])==true)?$data['periode'][0]['poin_kreativitas']:0;
            $perilaku_kerja_prosentase = (isset($data['periode'][0]['perilaku_kerja_prosentase'])==true)?$data['periode'][0]['perilaku_kerja_prosentase']:0;
        }

        //berlaku jika user memilih salah satu dropdownnya
        if(!empty($this->request->getGet('id')))
        {
            $periode_id                = $this->request->getGet('id');
            $periode                   = $this->PeriodeSKPModel->get(['periode_id'=> $periode_id]);
            $data['terpilih']          = 'SKP a.n <b>'.($periode[0]['nama']).'</b> utk periode '.tanggal_dMY($periode[0]['periode_awal']).' - '.tanggal_dMY($periode[0]['periode_akhir']);
            $nip                       = $periode[0]['nip'];
            $poin_tugas_tambahan       = (isset($periode[0]['poin_tugas_tambahan'])==true)?$periode[0]['poin_tugas_tambahan']:0;
            $poin_kreativitas          = (isset($periode[0]['poin_kreativitas'])==true)?$periode[0]['poin_kreativitas']:0;
            $perilaku_kerja_prosentase = (isset($periode[0]['perilaku_kerja_prosentase'])==true)?$periode[0]['perilaku_kerja_prosentase']:0;
            $data['periode_terpilih']  = $periode;
        }
        
        $data['skp']                    = $this->SusunanSKPModel->get(["periode_id"=>$periode_id]);
        $data['tambahan_kreativitas']   = $this->TambahanKreativitasModel->get(['nip'=>$nip, 'periode_id'=> $periode_id, 'is_approve'=> 'Ya' ]);
        $data['jml_tugas_tambahan']     = count($this->TambahanKreativitasModel->get(['nip'=>$nip, 'periode_id'=> $periode_id, 'is_approve'=> 'Ya', 'kategori'=>'Tugas Tambahan' ]));
        $data['jml_kreativitas']        = count($this->TambahanKreativitasModel->get(['nip'=>$nip, 'periode_id'=> $periode_id, 'is_approve'=> 'Ya', 'kategori'=>'Kreativitas' ]));
        $data['penilaian']              = $this->PerilakuKerjaModel->orderBy('indikator_urut','ASC')->get(['nip'=>$nip, 'periode_id'=> $periode_id ]);
		
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

        $rerata_skp          = $jumlah_nilai/$jumlah_row;
        $jumlah_skp          = $rerata_skp + $poin_tugas_tambahan + $poin_kreativitas;
        $prosentase_skp      = $jumlah_skp*(60/100);

        $sebutan     = "";
        $t           = (int)$jumlah_skp;

        switch(true)
        {
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

        $jumlah_ppk  =  $perilaku_kerja_prosentase+$prosentase_skp;
        $sebutan_ppk = "";
        $t           = (int)$jumlah_ppk;

        switch(true)
        {
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
        $data['poin_tugas_tambahan'] = $poin_tugas_tambahan;
        $data['poin_kreativitas'] = $poin_kreativitas;

        $param['page']          = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function kirimPesan()
    {
        if ($this->request->isAJAX())
        {
            $info           = array();
            $konteks        = entitiestag($this->request->getPost('konteks'));
            $periode_id     = entitiestag($this->request->getPost('periode_id'));
            $pesan          = entitiestag($this->request->getPost('pesan'));

            $periode        = $this->PeriodeSKPModel->get(['periode_id'=>$periode_id]);
           
            
            switch ($konteks) {
                case 'Tanggapan':
                    $data['tanggapan']          = $pesan;
                    $data['tanggal_tanggapan']  = date('Y-m-d H:i:s');

                    // mengirim WA ke pegawai yang dinilai, maka data pegawai yang diambil adalah punyanya atasan.
                    $pegawai = $this->PegawaiModel->get(['nip'=>$periode[0]['nip']]);
                    $info    = array(
                        "nohp"  => $pegawai[0]['kontak'],
                        "pesan" => "Hai ini dari sicakap.magelangkab.go.id\n\nMemberitahukan bahwa pejabat penilai Anda mengirimkan pesan *tanggapan atas penilaian* prestasi kerja milik Anda, bertulisan : \n\n''".$pesan."''.\n\nSilakan cek info selanjutnya pada sistem.\n\n*Terima kasih* ;-)",
                        "tipe"  => "text" 
                    );
                    break;

                case 'Rekomendasi':
                    $data['rekomendasi']         = $pesan;
                    $data['tanggal_rekomendasi'] = date('Y-m-d H:i:s');

                    // mengirim WA ke pegawai yang dinilai, maka data pegawai yang diambil adalah punyanya atasan.
                    $pegawai = $this->PegawaiModel->get(['nip'=>$periode[0]['nip']]);
                    $info    = array(
                        "nohp"  => $pegawai[0]['kontak'],
                        "pesan" => "Hai ini dari sicakap.magelangkab.go.id\n\nMemberitahukan bahwa pejabat penilai Anda mengirimkan pesan *rekomendasi atas penilaian* prestasi kerja milik Anda, bertulisan : \n\n''".$pesan."''.\n\nSilakan cek info selanjutnya pada sistem.\n\n*Terima kasih* ;-)",
                        "tipe"  => "text" 
                    );
                    break;

                case 'Keputusan':
                    $data['keputusan']         = $pesan;
                    $data['tanggal_keputusan'] = date('Y-m-d H: i: s');

                    // mengirim WA ke pegawai yang dinilai, maka data pegawai yang diambil adalah punyanya atasan.
                    $pegawai = $this->PegawaiModel->get(['nip'=>$periode[0]['nip']]);
                    $info    = array(
                        "nohp"  => $pegawai[0]['kontak'],
                        "pesan" => "Hai ini dari sicakap.magelangkab.go.id\n\nMemberitahukan bahwa pejabat penilai Anda mengirimkan pesan *keputusan atas penilaian* prestasi kerja milik Anda, bertulisan : \n\n''".$pesan."''.\n\nSilakan cek info selanjutnya pada sistem.\n\n*Terima kasih* ;-)",
                        "tipe"  => "text" 
                    );
                    break;
                    
                default:
                        $data['keberatan']          = $pesan;
                        $data['tanggal_keberatan']  = date('Y-m-d H:i:s');
                        // mengirim WA ke atasan, maka data pegawai yang diambil adalah punyanya atasan.
                        $pegawai = $this->PegawaiModel->get(['nip'=>$periode[0]['pejabat_penilai_nip']]);
                        $info    = array(
                            "nohp"  => $pegawai[0]['kontak'],
                            "pesan" => "Hai ini dari sicakap.magelangkab.go.id\n\nMemberitahukan bahwa ".$periode[0]['nama']." mengirimkan pesan *keberatan atas penilaian* prestasi kerja yang Anda berikan, bertulisan : \n''".$pesan."''.\nSilakan cek info dan berikan tanggapan selanjutnya pada sistem.\n\n*Terima kasih* ;-)",
                            "tipe"  => "text" 
                        );
                    break;
            }

            $this->PeriodeSKPModel->update($periode_id,$data);

            //send WA
            $curl = curl_init();
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
        else
        {
            echo "Access Denied";
        }
    }
}