<?php  namespace App\Models\EntrianData;
use CodeIgniter\Model;

class PeriodeSKPModel extends Model
{
    protected $table              = 'periode_skp';
    protected $primaryKey         = 'periode_id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'nip',
                                        'nama',
                                        'pangkat',
                                        'gol',
                                        'jabatan',
                                        'jabatan_kd',
                                        'jenis_jabatan',
                                        'unit_kerja',
                                        'pejabat_penilai_nip',
                                        'pejabat_penilai_nama',
                                        'pejabat_penilai_pangkat',
                                        'pejabat_penilai_gol',
                                        'pejabat_penilai_jabatan',
                                        'pejabat_penilai_unit_kerja',
                                        'periode_awal',
                                        'periode_akhir',
                                        'is_default',
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