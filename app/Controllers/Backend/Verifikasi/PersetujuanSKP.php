<?php namespace App\Controllers\Backend\Verifikasi;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;
use App\Models\Verifikasi\PersetujuanSKPModel;

class PersetujuanSKP extends BackendController
{
	public $path_view   = "backend/verifikasi/persetujuan-skp/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->SusunanSKPModel  = new SusunanSKPModel();
        $this->PeriodeSKPModel  = new PeriodeSKPModel();
        $this->PersetujuanSKPModel = new PersetujuanSKPModel();

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

    public function accAll()
    {
        $list = $this->PersetujuanSKPModel->detailSKPLink();
        
        foreach ($list as $key)
        {
            $data['target_acc'] = "Ya";
            $this->SusunanSKPModel->update($key['skp_id'],$data);
        }

        return redirect()->to(backend_url().'/persetujuan-skp');
    }

    public function setStatus()
    {
        if ($this->request->isAJAX())
        {
            $id = $this->request->getPost('id');
            $data['target_acc'] = $this->request->getPost('status');
            echo $this->SusunanSKPModel->update($id,$data);
        }
        else
        {
            echo "Access Denied";
        }
    }
}