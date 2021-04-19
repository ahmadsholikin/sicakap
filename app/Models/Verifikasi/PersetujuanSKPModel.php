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
                    WHERE link.link_atasan_id = '".$_SESSION['id_user']."' AND prd.is_default='Ya'
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
        $kueri = "SELECT periode.nip,periode.nama FROM susunan_skp skp
                    INNER JOIN periode_skp periode
                    ON skp.periode_id = periode.periode_id
                    WHERE periode.is_default='Ya' AND skp.nip IN
                    (SELECT link.nip
                    FROM link_hirarki link
                    WHERE link.link_atasan_id='".$_SESSION['id_user']."' AND deleted_at IS NULL)
                    GROUP BY periode.nip";
        $kueri = $this->db->query($kueri)->getResultArray();
        if(empty($kueri))
        {
            return array();
        }
        else
        {
            $data = array();
            foreach ($kueri as $key)
            {
                $kueri_sub = "SELECT skp.* FROM susunan_skp skp
                                INNER JOIN periode_skp periode
                                ON skp.periode_id = periode.periode_id
                                WHERE periode.nip='".$key['nip']."' AND periode.is_default='Ya' AND skp.nip IN
                                (SELECT link.nip
                                FROM link_hirarki link
                                WHERE link.link_atasan_id='".$_SESSION['id_user']."' 
                                AND deleted_at IS NULL) ;";

                $kueri_sub  = $this->db->query($kueri_sub)->getResultArray();
                $dump = array(
                    "nip"   => $key['nip'],
                    "nama"  => $key['nama'],
                    "skp"   => $kueri_sub
                );
                
                array_push($data,$dump);
            }
            return $data;
        }
    }

    public function detailSKPLink()
    {
        $kueri = "SELECT skp.* FROM susunan_skp skp
                    INNER JOIN periode_skp periode
                    ON skp.periode_id = periode.periode_id
                    WHERE periode.is_default='Ya' AND skp.nip IN
                    (SELECT link.nip
                    FROM link_hirarki link
                    WHERE link.link_atasan_id='".$_SESSION['id_user']."' 
                    AND deleted_at IS NULL) ";
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