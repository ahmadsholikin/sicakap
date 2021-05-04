<?php  namespace App\Models\Penilaian;
use CodeIgniter\Model;

class IndikatorPerilakuKerjaModel extends Model
{
    protected $table              = 'indikator_perilaku_kerja';
    protected $primaryKey         = 'id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'id',
                                        'indikator',
                                        'urut',
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
            return $this->orderBy('urut','ASC')->findAll();
        }
        else
        {
            return $this->orderBy('urut','ASC')->where($id)->find();
        } 
    }
}