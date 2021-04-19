<?php  namespace App\Models\Verifikasi;
use CodeIgniter\Model;

class PersetujuanSKPModel extends Model
{
    protected $table              = 'susunan_skp';
    protected $primaryKey         = 'skp_id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function periodeSKPLink()
    {
        $kueri = "SELECT sskp.periode_id, prd.periode_awal, prd.periode_akhir
                    FROM susunan_skp sskp
                    INNER JOIN link_hirarki link
                    ON sskp.nip = link.nip
                    INNER JOIN periode_skp prd
                    ON prd.periode_id = sskp.periode_id
                    WHERE link.link_atasan_id = '".$_SESSION['id_user']."'
                    GROUP BY prd.periode_awal, prd.periode_akhir
                    ORDER BY prd.periode_akhir DESC;";

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

    public function daftarSKPLink()
    {
        $kueri = "SELECT sskp.periode_id, prd.periode_awal, prd.periode_akhir
                    FROM susunan_skp sskp
                    INNER JOIN link_hirarki link
                    ON sskp.nip = link.nip
                    INNER JOIN periode_skp prd
                    ON prd.periode_id = sskp.periode_id
                    WHERE link.link_atasan_id = '".$_SESSION['id_user']."'
                    GROUP BY sskp.periode_id
                    ORDER BY prd.periode_akhir DESC;";

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