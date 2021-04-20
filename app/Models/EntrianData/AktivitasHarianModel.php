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
            return $this->where($id)->find();
        } 
    }                              

}