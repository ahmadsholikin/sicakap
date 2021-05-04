<?php namespace App\Controllers\Output;
use App\Controllers\BackendController;
use App\Models\EntrianData\SusunanSKPModel;
use App\Models\EntrianData\PeriodeSKPModel;

class Cetak extends BackendController
{
	public function __construct()
	{
		$this->SusunanSKPModel = new SusunanSKPModel();
		$this->PeriodeSKPModel = new PeriodeSKPModel();
	}

	public function print_skp()
	{
        $default_periode_id         			= $this->request->getPost('cetak_periode_id');
        $data['cetak_pejabat_penilai_nip']		= $this->request->getPost('cetak_pejabat_penilai_nip');
		$data['cetak_pejabat_penilai_nama']     = $this->request->getPost('cetak_pejabat_penilai_nama');
		$data['cetak_pejabat_penilai_jabatan']  = $this->request->getPost('cetak_pejabat_penilai_jabatan');
		$data['tempat']             			= $this->request->getPost('cetak_tempat');
        $data['tanggal']            			= $this->request->getPost('cetak_tanggal');
        $data['skp']                			= $this->PeriodeSKPModel->get(['nip'=>$_SESSION['id_user'],'periode_id'=>$default_periode_id]);
        $data['data']               			= $this->SusunanSKPModel->get(['nip'=>$_SESSION['id_user'],'periode_id'=>$default_periode_id]);
        return view('backend/output/print_skp',$data);
	}
}