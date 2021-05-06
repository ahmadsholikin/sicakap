<?php namespace App\Controllers\Backend\Verifikasi;
use App\Controllers\BackendController;
use App\Models\EntrianData\AktivitasHarianModel;

class verifAktivitasHarian extends BackendController
{
	public $path_view   = "backend/verifikasi/verif-aktivitas-harian/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->AktivitasHarianModel = new AktivitasHarianModel();
	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}


        $data['data']           = $this->AktivitasHarianModel->get(['penilai_nip'=>$_SESSION['id_user']]);
		$param['page']          = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

    public function setStatus()
    {
		if ($this->request->isAJAX())
        {
			$id                         = $this->request->getPost('id');
			$data['is_approve']         = $this->request->getPost('status');
			$data['tanggal_verifikasi'] = date('Y-m-d H:i:s');
			echo $this->AktivitasHarianModel->update($id,$data);
		}
		else
		{
			echo "Access Denied";
		}
    }
}