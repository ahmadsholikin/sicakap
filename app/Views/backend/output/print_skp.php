<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak SKP</title>
</head>
<body>
    <style type="text/css">
        h4{font-family:Verdana, Geneva, sans-serif !important;;font-size:13px;}
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:11px;
        overflow:hidden;padding:2px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:11px;
        font-weight:normal;overflow:hidden;padding:2px 5px;word-break:normal;}
        .tg .tg-z39z{font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;text-align:center;vertical-align:top}
        .tg .tg-v7oa{font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;font-weight:bold;text-align:center;
        vertical-align:middle}
        .tg .tg-sql0{font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;font-weight:bold;text-align:left;vertical-align:top}
        .tg .tg-ggkl{font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;text-align:left;vertical-align:top}
        .tg .tg-w3t6{border-color:#000000;font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;text-align:center;
        vertical-align:top}
        .tg .tg-pdq2{font-family:Verdana, Geneva, sans-serif !important;;font-size:10px;font-weight:bold;text-align:center;
        vertical-align:top}
        .bbless{border-bottom: 1px solid #fff !important;}
        .bold{font-weight: bold;}
        .center{text-align: center;}
        .font-12{font-family:Verdana, Geneva, sans-serif !important;font-size:10px}
        .strongunderline{font-weight: bold;text-decoration: underline;}
    </style>
    <center>
        <h4>
            FORMULIR SASARAN KERJA<br>
            PEGAWAI NEGERI SIPIL
        </h4>
    </center>
    <table class="tg" style="width: 100%">
        <colgroup>
            <col style="width: 2%">
            <col style="width: 12%">
            <col style="width: 10%">
            <col style="width: 37%">
            <col style="width: 3%">
            <col style="width: 12%">
            <col style="width: 8%">
            <col style="width: 6%">
            <col style="width: 10%">
        </colgroup>
        <thead>
            <tr>
                <th class="tg-pdq2">NO</th>
                <th class="tg-sql0" colspan="3">I. PEJABATAN PENILAI</th>
                <th class="tg-pdq2">NO</th>
                <th class="tg-sql0" colspan="4">II. PEGAWAI NEGERI SIPIL YANG DINILAI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-z39z bbless">1</td>
                <td class="tg-ggkl bbless">Nama</td>
                <td class="tg-ggkl bbless bold" colspan="2"><?=$skp[0]['pejabat_penilai_nama'];?></td>
                <td class="tg-w3t6 bbless">1</td>
                <td class="tg-ggkl bbless">Nama</td>
                <td class="tg-ggkl bbless bold" colspan="3"><?=$skp[0]['nama'];?></td>
            </tr>
            <tr>
                <td class="tg-z39z bbless">2</td>
                <td class="tg-ggkl bbless">NIP</td>
                <td class="tg-ggkl bbless" colspan="2"><?=$skp[0]['pejabat_penilai_nip'];?></td>
                <td class="tg-w3t6 bbless">2</td>
                <td class="tg-ggkl bbless">NIP</td>
                <td class="tg-ggkl bbless" colspan="3"><?=$_SESSION['nip'];?></td>
            </tr>
            <tr>
                <td class="tg-z39z bbless">3</td>
                <td class="tg-ggkl bbless">Pangkat/Gol. Ruang</td>
                <td class="tg-ggkl bbless" colspan="2"><?=$skp[0]['pejabat_penilai_pangkat'];?> / <?=$skp[0]['pejabat_penilai_gol'];?></td>
                <td class="tg-w3t6 bbless">3</td>
                <td class="tg-ggkl bbless">Pangkat/Gol. Ruang</td>
                <td class="tg-ggkl bbless" colspan="3"><?=$_SESSION['pangkat'];?> (<?=$_SESSION['gol'];?>)</td>
            </tr>
            <tr>
                <td class="tg-z39z bbless">4</td>
                <td class="tg-ggkl bbless">Jabatan</td>
                <td class="tg-ggkl bbless" colspan="2"><?=$skp[0]['pejabat_penilai_jabatan'];?></td>
                <td class="tg-w3t6 bbless">4</td>
                <td class="tg-ggkl bbless">Jabatan</td>
                <td class="tg-ggkl bbless" colspan="3"><?=$_SESSION['jabatan'];?></td>
            </tr>
            <tr>
                <td class="tg-z39z">5</td>
                <td class="tg-ggkl">Unit Kerja</td>
                <td class="tg-ggkl" colspan="2"><?=strtoupper($skp[0]['pejabat_penilai_unit_kerja']);?></td>
                <td class="tg-w3t6">5</td>
                <td class="tg-ggkl">Unit Kerja</td>
                <td class="tg-ggkl" colspan="3"><?=strtoupper($_SESSION['unit_kerja']);?></td>
            </tr>
            <tr>
                <td class="tg-v7oa" rowspan="2">NO</td>
                <td class="tg-v7oa" colspan="3" rowspan="2">III. KEGIATAN TUGAS JABATAN</td>
                <td class="tg-v7oa" rowspan="2">AK</td>
                <td class="tg-v7oa" colspan="4">TARGET</td>
            </tr>
            <tr>
                <td class="tg-v7oa">KUANT/OUTPUT</td>
                <td class="tg-v7oa">KUAL/MUTU</td>
                <td class="tg-v7oa">WAKTU</td>
                <td class="tg-v7oa">BIAYA</td>
            </tr>
            <tr>
                <td class="tg-z39z" colspan="9"></td>
            </tr>
            <?php $no=1; foreach ($data as $row): ?>
            <tr>
                <td  class="tg-z39z"><?=$no++;?></td>
                <td class="tg-ggkl" colspan="3"><?=ucfirst($row['kegiatan']);?></td>
                <td class="tg-z39z"><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$row['angka_kredit'], 3, '.', '');} ?></td>
                <td class="tg-z39z"><?=$row['target_kuantitas'];?> <?=ucfirst($row['target_output']);?></td>
                <td class="tg-z39z"><?=$row['target_kualitas_mutu'];?></td>
                <td class="tg-z39z"><?=$row['target_waktu'];?> <?=ucfirst($row['target_satuan_waktu']);?></td>
                <td class="tg-z39z"><?=$row['target_biaya']==0?'-':$row['target_biaya'];?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <table style="width:100%; margin-top:20px">
        <colgroup>
            <col style="width: 30%">
            <col style="width: 40%">
            <col style="width: 30%">
        </colgroup>
        <tr>
            <td></td>
            <td></td>
            <td class="center font-12"><?=$tempat;?>, <?=$tanggal;?></td>
        </tr>
        <tr>
            <td class="center font-12">Pejabat Penilai,</td>
            <td></td>
            <td class="center font-12">Pegawai Negeri Sipil Yang Dinilai</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><br><br><br><br></td>
        </tr>
        <tr>
            <td class="center font-12 strongunderline"><?=$skp[0]['pejabat_penilai_nama'];?></td>
            <td></td>
            <td class="center font-12 strongunderline"><?=$skp[0]['nama'];?></td>
        </tr>
        <tr>
            <td class="center font-12">NIP. <?=$skp[0]['pejabat_penilai_nip'];?></td>
            <td></td>
            <td class="center font-12">NIP. <?=$skp[0]['nip'];?></td>
        </tr>
    </table>
</body>
</html>