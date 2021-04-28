<?php  namespace App\Models\Penyesuaian;
use CodeIgniter\Model;

class TambahanKreativitasModel extends Model
{
    protected $table              = 'tambahan_kreativitas';
    protected $primaryKey         = 'id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'id',
                                        'nip',
                                        'periode_id',
                                        'deskripsi',
                                        'kategori',
                                        'is_approve',
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