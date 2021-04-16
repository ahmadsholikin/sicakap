<?php  namespace App\Models\EntrianData;
use CodeIgniter\Model;

class SusunanSKPModel extends Model
{
    protected $table              = 'susunan_skp';
    protected $primaryKey         = 'skp_id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'nip',
                                        'periode_id',
                                        'link_atasan_id',
                                        'link_atasan_nama',
                                        'kegiatan',
                                        'angka_kredit',
                                        'target_kuantitas',
                                        'target_output',
                                        'target_kualitas_mutu',
                                        'target_waktu',
                                        'target_satuan_waktu',
                                        'target_biaya',
                                        'target_acc',
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