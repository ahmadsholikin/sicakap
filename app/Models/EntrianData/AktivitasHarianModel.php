<?php namespace App\Models\EntrianData;
use CodeIgniter\Model;

class AktivitasHarianModel extends Model
{
    protected $table              = 'aktivitas_harian';
    protected $primaryKey         = 'id';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';

    protected $allowedFields      = [
                                        'tanggal_entrian',
                                        'tanggal_kegiatan', 
                                        'nip',
                                        'nama',
                                        'pangkat',
                                        'gol',
                                        'jabatan',
                                        'jabatan_kd',
                                        'jenis_jabatan',
                                        'unit_kerja',
                                        'foto',
                                        'penilai_nip',
                                        'penilai_nama',
                                        'link_skp_id',
                                        'link_skp_kegiatan',
                                        'uraian_kegiatan',
                                        'jam_mulai',
                                        'jam_selesai',
                                        'poin',
                                        'is_approve',
                                        'tanggal_verifikasi',
                                        'is_submit',
                                        'created_at',
                                        'updated_at',
                                        'deleted_at'
                                    ];

    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where($id)->orderBy('tanggal_kegiatan','DESC')->find();
        } 
    }
    
    
    public function jumlahBarisPerStatus($status="")
    {
        $kueri = "SELECT id 
                    FROM aktivitas_harian ah
                    WHERE MONTH(ah.tanggal_kegiatan)='".date('m')."'
                    AND YEAR(ah.tanggal_kegiatan)='".date('Y')."'
                    AND ah.nip='".$_SESSION['id_user']."'
                    AND ah.is_approve='".$status."'";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return 0;
        }
        else
        {
            return count($kueri);
        }
    }

    public function jumlahBarisLinkSKP()
    {
        $kueri = "SELECT id 
                    FROM aktivitas_harian ah
                    WHERE MONTH(ah.tanggal_kegiatan)='".date('m')."'
                    AND YEAR(ah.tanggal_kegiatan)='".date('Y')."'
                    AND ah.nip='".$_SESSION['id_user']."'
                    AND ah.link_skp_id > 0 ";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return 0;
        }
        else
        {
            return count($kueri);
        }
    }

    public function jumlahPoinPerStatus($status="")
    {
        $kueri = "SELECT SUM(ah.poin) as total
                    FROM aktivitas_harian ah
                    WHERE MONTH(ah.tanggal_kegiatan)='".date('m')."'
                    AND YEAR(ah.tanggal_kegiatan)='".date('Y')."'
                    AND ah.nip='".$_SESSION['id_user']."'
                    AND ah.is_approve='".$status."'
                    GROUP BY ah.nip";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return 0;
        }
        else
        {
            return (int)$kueri[0]['total'];
        }
    }

}