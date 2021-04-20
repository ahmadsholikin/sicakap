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
                                        'link_skp_id',
                                        'link_skp_kegiatan',
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

    public function skpAktif()
    {
        $kueri = "SELECT skp.*
                    FROM susunan_skp skp
                    INNER JOIN periode_skp periode
                    ON periode.periode_id= skp.periode_id
                    WHERE periode.is_default='Ya' 
                    AND skp.nip='".$_SESSION['id_user']."'
                    AND skp.target_acc='Ya'";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function skpJabatan()
    {
        $kueri = "SELECT ps.kegiatan,ps.angka_kredit 
                    FROM susunan_skp ps
                    INNER JOIN pegawai peg
                    ON ps.nip=peg.nip
                    WHERE peg.jabatan='".$_SESSION['jabatan']."'
                    GROUP BY LOWER(ps.kegiatan)";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function skpLink()
    {
        $kueri = "SELECT skp.* FROM susunan_skp skp
                    INNER JOIN periode_skp periode
                    ON skp.periode_id = periode.periode_id
                    WHERE periode.is_default='Ya' AND skp.nip IN
                    (SELECT link.link_atasan_id
                    FROM link_hirarki link
                    WHERE link.nip='".$_SESSION['id_user']."' AND deleted_at IS NULL)";
        
        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }
}