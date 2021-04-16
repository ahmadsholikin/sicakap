<?php namespace App\Models\Auth;
use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table              = 'pegawai';
    protected $primaryKey         = 'nip';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';

    protected $allowedFields      = [
                                        'nip',
                                        'nama',
                                        'pangkat',
                                        'gol',
                                        'jabatan',
                                        'jabatan_kd',
                                        'jenis_jabatan',
                                        'unit_kerja',
                                        'foto',
                                        'email',
                                        'kontak',
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