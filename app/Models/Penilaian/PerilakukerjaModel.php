<?php  namespace App\Models\Penilaian;
use CodeIgniter\Model;

class PerilakuKerjaModel extends Model
{
    protected $table              = 'perilaku_kerja';
    protected $primaryKey         = 'id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;

    protected $allowedFields      = [
                                        'id',
                                        'nip',
                                        'periode_id',
                                        'indikator_id',
                                        'indikator_nama',
                                        'indikator_urut',
                                        'poin',
                                        'keterangan',
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

    public function getExist($nip, $periode_id, $indikator_id)
    {
        $kueri = "SELECT * 
                    FROM perilaku_kerja
                    WHERE nip='".$nip."' 
                    AND periode_id='".$periode_id."' 
                    AND indikator_id='".$indikator_id."'";
        $kueri = $this->db->query($kueri)->getResultArray();            
        return $kueri;
    }

    public function daftarPerilakuKerjaLink()
    {
        $kueri = "SELECT periode.nip,periode.nama,periode.periode_id, periode.perilaku_kerja_jumlah,periode.perilaku_kerja_rerata,periode.perilaku_kerja_sebutan,periode.perilaku_kerja_prosentase
                    FROM susunan_skp skp
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
                $kueri_sub = "SELECT * FROM (SELECT
                                ipk.id,
                                ipk.indikator,
                                COALESCE ( pk.poin, '' ) AS poin,
                                COALESCE ( pk.keterangan, '' ) AS keterangan,
                                COALESCE ( ipk.urut, '' ) AS urut	
                            FROM
                                indikator_perilaku_kerja ipk
                                LEFT JOIN perilaku_kerja pk ON ipk.id = pk.indikator_id
                                INNER JOIN periode_skp periode ON pk.periode_id = periode.periode_id 
                            WHERE
                                periode.nip = '".$key['nip']."' 
                                AND periode.is_default = 'Ya' 
                                AND ipk.deleted_at IS NULL
                                AND pk.nip IN ( SELECT link.nip FROM link_hirarki link 
                                WHERE link.link_atasan_id = '".$_SESSION['id_user']."' AND deleted_at IS NULL ) 
                            UNION ALL
                            SELECT
                                id,
                                indikator,
                                '' AS poin,
                                '' AS keterangan,
                                urut	
                            FROM
                                indikator_perilaku_kerja) dump
                                GROUP BY dump.id
                                ORDER BY dump.urut;";

                $kueri_sub  = $this->db->query($kueri_sub)->getResultArray();

                $dump = array(
                    "nip"                       => $key['nip'],
                    "nama"                      => $key['nama'],
                    "periode_id"                => $key['periode_id'],
                    "perilaku_kerja_jumlah"     => $key['perilaku_kerja_jumlah'],
                    "perilaku_kerja_rerata"     => $key['perilaku_kerja_rerata'],
                    "perilaku_kerja_sebutan"    => $key['perilaku_kerja_sebutan'],
                    "perilaku_kerja_prosentase" => $key['perilaku_kerja_prosentase'],
                    "penilaian"                 => $kueri_sub,
                );
                array_push($data,$dump);
            }
   
            return $data;
        }
    }
}