<?php namespace App\Controllers\Backend\Penilaian;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\Penyesuaian\TambahanKreativitasModel;

class PenyesuaianSKP extends BackendController
{
	public $path_view   = "backend/penilaian/penyesuaian-skp/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->SusunanSKPModel          = new SusunanSKPModel();
        $this->PeriodeSKPModel          = new PeriodeSKPModel();
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

		$periode_terpilih   = 0;
        $periode_range      = "Belum Ada Entrian Periode";
		$data['periode']    = $this->PeriodeSKPModel->orderBy('periode_awal','DESC')->get(['nip'=>$_SESSION['id_user']]);
        $default_periode    = $this->PeriodeSKPModel->get(['nip'=>$_SESSION['id_user'],"is_default"=>'Ya']);
        //kondisi awal, mengambil data paling up to date
        if(!empty($data['periode']))
        {
            $periode_terpilih   = $data['periode'][0]['periode_id'];
            $periode_range      = tanggal_dMY($data['periode'][0]['periode_awal']).' - '.tanggal_dMY($data['periode'][0]['periode_akhir']);
        }
        // kondisi jika ada pengaturan default pada entrian periode
        if(!empty($default_periode))
        {
            $periode_terpilih   = $default_periode[0]['periode_id'];
            $periode_range      = tanggal_dMY($default_periode[0]['periode_awal']).' - '.tanggal_dMY($default_periode[0]['periode_akhir']);
        }
        // kondisi dimana ada paramater get yang dikirimkan
        if(!empty($this->request->getGet['periode']))
        {
            $periode_terpilih   = $this->request->getGet['periode'];
            $default_periode    = $this->PeriodeSKPModel->get(['nip'=>$_SESSION['id_user'],"periode_id"=>$periode_terpilih]);
            $periode_range      = tanggal_dMY($default_periode[0]['periode_awal']).' - '.tanggal_dMY($default_periode[0]['periode_akhir']);
        }

        $data['periode_id']     = $periode_terpilih;
        $data['periode_range']  = $periode_range;

        $data['skp']                    = $this->SusunanSKPModel->get(['nip'=>$_SESSION['id_user'],"periode_id"=>$periode_terpilih]);
        $data['tambahan_kreativitas']   = $this->TambahanKreativitasModel->get(['nip'=>$_SESSION['id_user'],"periode_id"=>$periode_terpilih]);
		$param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function getSKP()
    {
        $id     = $this->request->getGet('id');
        $data   = $this->SusunanSKPModel->get(['nip'=>$_SESSION['id_user'],"skp_id"=>$id]);

        $response['fix_kuantitas']              = ($data[0]['fix_kuantitas']=='') ? $data[0]['target_kuantitas']  : $data[0]['fix_kuantitas'] ;
        $response['realisasi_kuantitas']        = ($data[0]['realisasi_kuantitas']=='') ? (($data[0]['fix_kuantitas']=='') ? $data[0]['target_kuantitas']  : $data[0]['fix_kuantitas'])  : $data[0]['realisasi_kuantitas'] ;
        $response['fix_output']                 = ($data[0]['fix_output']=='') ? $data[0]['target_output']  : $data[0]['fix_output'] ;
        $response['realisasi_output']           = ($data[0]['realisasi_output']=='') ? (($data[0]['fix_output']=='') ? $data[0]['target_output']  : $data[0]['fix_output'])  : $data[0]['realisasi_output'] ;
        $response['fix_kualitas_mutu']          = ($data[0]['fix_kualitas_mutu']=='') ? $data[0]['target_kualitas_mutu']  : $data[0]['fix_kualitas_mutu'] ;
        $response['realisasi_kualitas_mutu']    = ($data[0]['realisasi_kualitas_mutu']=='') ? (($data[0]['fix_kualitas_mutu']=='') ? $data[0]['target_kualitas_mutu']  : $data[0]['fix_kualitas_mutu'])  : $data[0]['realisasi_kualitas_mutu'] ;
        $response['fix_waktu']                  = ($data[0]['fix_waktu']=='') ? $data[0]['target_waktu']  : $data[0]['fix_waktu'] ;
        $response['realisasi_waktu']            = ($data[0]['realisasi_waktu']=='') ? (($data[0]['fix_waktu']=='') ? $data[0]['target_waktu']  : $data[0]['fix_waktu'])  : $data[0]['realisasi_waktu'] ;
        $response['fix_satuan_waktu']           = ($data[0]['fix_satuan_waktu']=='') ? $data[0]['target_satuan_waktu']  : $data[0]['fix_satuan_waktu'] ;
        $response['realisasi_satuan_waktu']     = ($data[0]['realisasi_satuan_waktu']=='') ? (($data[0]['fix_satuan_waktu']=='') ? $data[0]['target_satuan_waktu']  : $data[0]['fix_satuan_waktu'])  : $data[0]['realisasi_satuan_waktu'] ;
        $response['fix_biaya']                  = ($data[0]['fix_biaya']=='') ? $data[0]['target_biaya']  : $data[0]['fix_biaya'] ;
        $response['realisasi_biaya']            = ($data[0]['realisasi_biaya']=='') ? (($data[0]['fix_biaya']=='') ? $data[0]['target_biaya']  : $data[0]['fix_biaya'])  : $data[0]['realisasi_biaya'] ;

        echo json_encode($response);
    }

    public function setSKP()
    {
        $id = entitiestag($this->request->getPost('skp_id'));

        $data['fix_kuantitas']  	     = entitiestag($this->request->getPost('fix_kuantitas'));
        $data['fix_output']  	         = entitiestag($this->request->getPost('fix_output'));
        $data['fix_kualitas_mutu']       = entitiestag($this->request->getPost('fix_kualitas_mutu'));
        $data['fix_waktu']  	         = entitiestag($this->request->getPost('fix_waktu'));
        $data['fix_satuan_waktu']        = entitiestag($this->request->getPost('fix_satuan_waktu'));
        $data['fix_biaya']  	         = entitiestag(str_replace(".","",$this->request->getPost('fix_biaya')));

        $data['realisasi_kuantitas']  	 = entitiestag($this->request->getPost('realisasi_kuantitas'));
        $data['realisasi_output']  	     = entitiestag($this->request->getPost('realisasi_output'));
        $data['realisasi_waktu']  	     = entitiestag($this->request->getPost('realisasi_waktu'));
        $data['realisasi_satuan_waktu']  = entitiestag($this->request->getPost('realisasi_satuan_waktu'));
        $data['realisasi_biaya']  	     = entitiestag(str_replace(".","",$this->request->getPost('realisasi_biaya')));

        $exist   = $this->SusunanSKPModel->get(['nip'=>$_SESSION['id_user'],"skp_id"=>$id]);

        if(empty($exist))
        {
            echo "Akses Ditolak";
        }
        else
        {
            $this->SusunanSKPModel->update($id, $data);
            echo "Berhasil";
        }
    }


    public function addTambahanKreativitas()
    {
        $data['nip']        = $_SESSION['id_user'];
        $id                 = entitiestag($this->request->getPost('id'));
        $data['periode_id'] = entitiestag($this->request->getPost('periode_id'));
        $data['deskripsi']  = entitiestag($this->request->getPost('deskripsi'));
        $data['kategori']   = entitiestag($this->request->getPost('kategori'));

        if(empty($id)||$id=='-')
        {
            $this->TambahanKreativitasModel->insert($data);
        }
        else
        {
            $this->TambahanKreativitasModel->update($id,$data);
        }
        return redirect()->to(backend_url().'/penyesuaian-skp');
    }

    public function deleteTambahanKreativitas()
    {
        $id     = $this->request->getGet('id');
        $this->TambahanKreativitasModel->delete($id);
        return redirect()->to(backend_url().'/penyesuaian-skp');
    }

    public function approveTambahanKreativitas()
    {
        // Check for AJAX request.
        if ($request->isAJAX())
        {
            $id         = entitiestag($this->request->getPost('id'));
            $status     = entitiestag($this->request->getPost('status'));
            $kategori   = entitiestag($this->request->getPost('kategori'));

            $data['is_approve'] = $status;
            $this->TambahanKreativitasModel->update($id,$data);
            
            $row        = $this->TambahanKreativitasModel->get(['id'=>$id]);
            $periode_id = $row[0]['periode_id'];

            $acc  = $this->TambahanKreativitasModel->get(['nip'=>$row[0]['nip'],'periode_id'=>$row[0]['periode_id'],'is_approve'=>'Ya','kategori'=>$kategori]); 
            $acc  = count($acc);
            // perhitungan jumlah nilai berdasarkan rentang
            $poin = 0;
            switch(true) 
            {
                case in_array($acc, range(1,3)): 
                    $poin = 1;
                break;

                case in_array($acc, range(4,6)):
                    $poin = 2;
                break;

                case in_array($acc, range(7,999)): 
                    $poin = 3;
                break;

                default : $poin = 0;
            }

        
            if($kategori=='Tugas Tambahan')
            {
                $save['poin_tugas_tambahan'] = $poin;
                $this->PeriodeSKPModel->update($periode_id,$save);
            }
            else
            {
                $save['poin_kreativitas'] = $poin;
                $this->PeriodeSKPModel->update($periode_id,$save);
            }

            echo $poin;
        }
        else
        {
            echo "Access Denied";
        }
    }
}