<?php if(empty($periode)):?>
<h5>Uupps.. Data tidak ditemukan</h5>
<?php else:?>
<div class="card">
	<div class="card-header bg-transparent border-bottom-0 px-1 ">
		<div class="mail-navbar">
			<div class="d-flex align-items-center">
				<div class="tx-14 tx-color-04">
					<span>Tampilkan Review Penilaian Dari : </span>
					<a href="" class="link-01 dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$terpilih;?></a>
					<div class="dropdown-menu">
						<span class="dropdown-item-text">-- Pilihan --</span>
						<?php foreach($periode as $p):?>
						<a class="dropdown-item" href="?id=<?=$p['periode_id'];?>"><?='SKP a.n '.($p['nama']).' utk periode '.tanggal_dMY($p['periode_awal']).' - '.tanggal_dMY($p['periode_akhir']);?></a>
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-flex">
				<a href="" data-toggle="tooltip" title="klik untuk memuat ulang data"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-cw"><polyline points="23 4 23 10 17 10"></polyline><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path></svg></a>
			</div>
		</div>
	</div>
    <?=csrf_field();?>
	<div class="">
        <div class="table-responsive">
			<table class="table table-bordered table-sm mb-0" style="width: 100%;">
				<thead>
					<tr>
						<th rowspan="2" style="width:3%">NO</th>
						<th rowspan="2">I. KEGIATAN TUGAS JABATAN</th>
                        <th style="width:3%" rowspan="2">AK</th>
                        <th colspan="4" class="text-center">TARGET</th>
                        <th style="width:3%" rowspan="2">AK</th>
                        <th colspan="4" class="text-center">REALISASI</th>
                        <th style="width:7%" rowspan="2">PENGHITUNGAN</th>
                        <th style="width:7%" rowspan="2">NILAI<br>CAPAIAN<br>SKP</th>
					</tr>
                    <tr>
                        <th style="width:8%">Kuant/ Output</th>
                        <th style="width:3%">Kual/<br>Mutu</th>
                        <th style="width:5%">Waktu</th>
                        <th>Biaya</th>
                        <th style="width:8%">Kuant/ Output</th>
                        <th style="width:3%">Kual/<br>Mutu</th>
                        <th style="width:5%">Waktu</th>
                        <th>Biaya</th>
                    </tr>
                    <tr class="bg-light">
                        <?php for ($i=1; $i < 15; $i++) : ?>
                        <th><?=$i;?></th>
                        <?php endfor;?>
                    </tr>
				</thead>
                <tbody>
                    <?php $no=1; foreach($skp as $row): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=ucfirst($row['kegiatan']);?> <?php if($row['link_skp_kegiatan']<>'-'){ ?> <span class="mdi mdi-link-variant bd-highlight" data-toggle="tooltip" data-placement="bottom" title="Link : <?=$row['link_skp_kegiatan'];?>"> Link</span><?php } ?></td>
							<td><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$row['angka_kredit'], 3, '.', '');} ?></td>
                            <td>
                                <?php if(($row['fix_kuantitas']<>'')&&($row['target_kuantitas']<>$row['fix_kuantitas'])){ ?><del><?=rp($row['target_kuantitas']);?> <?=ucfirst($row['target_output']);?></del><br><?=rp($row['fix_kuantitas']);?> <?=ucfirst($row['target_output']);?><?php }else { echo $row['target_kuantitas'].' '.ucfirst($row['target_output']); } ?>
                            </td>
							<td><?=$row['target_kualitas_mutu'];?></td>
                            <td>
                                <?php if(($row['fix_waktu']<>'')&&($row['target_waktu']<>$row['fix_waktu'])){ ?><del><?=$row['target_waktu'].' '.ucfirst($row['target_satuan_waktu']);?></del><br><?=$row['fix_waktu'].' '.ucfirst($row['target_satuan_waktu']);?><?php }else { echo $row['target_waktu'].' '.ucfirst($row['target_satuan_waktu']); } ?>
                            </td>
							<td>
                                <?php if(($row['fix_biaya']<>'')&&($row['target_biaya']<>$row['fix_biaya'])){ ?><del><?=rp($row['target_biaya']);?></del><br><?=rp($row['fix_biaya']);?><?php }else { echo $row['target_biaya']==0?'-':rp($row['target_biaya']); } ?>
                            </td>
                            <td><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$row['angka_kredit'], 3, '.', '');} ?></td>
                            <td><?=$row['realisasi_kuantitas'];?> <?=ucfirst($row['realisasi_output']);?></td>
                            <td><?=$row['realisasi_kualitas_mutu'];?></td>
                            <td><?=$row['realisasi_waktu'];?> <?=ucfirst($row['realisasi_satuan_waktu']);?></td>
                            <td><?=$row['realisasi_biaya']==0?'-':rp($row['realisasi_biaya']);?></td>
                            <td class="text-center"><?=$row['penghitungan'];?></td>
                            <td class="text-center"><?=$row['nilai'];?></td>
                        </tr>
                    <?php endforeach;?>
                    <?php if(!empty($tambahan_kreativitas)):?>
                        <tr>
                            <th></th>
                            <th colspan="13">II. TUGAS TAMBAHAN DAN KREATIVITAS :</th>
                        </tr>
                        <?php $itt=1;$ik=2;$index=1;foreach($tambahan_kreativitas as $row): ?>
                            <?php if($row['kategori']=='Tugas Tambahan'):?>
                            <tr>
                                <td><?=($itt==1)?$itt:'';?></td>
                                <td><?=$row['deskripsi'];?> </td>
                                <td></td>
                                <td colspan="10"></td>
                                <?=($itt==1)?"<td style='vertical-align:middle' class='text-center' rowspan='".$jml_tugas_tambahan."'>".$poin_tugas_tambahan."</td>":'';?>
                            </tr>
                            <?php $itt++;endif;?>
                            <?php if($row['kategori']=='Kreativitas'):?>
                            <tr>
                                <td><?=($ik==2)?$ik:'';?></td>
                                <td><?=$row['deskripsi'];?> </td>
                                <td></td>
                                <td colspan="10"></td>
                                <?=($ik==2)?"<td style='vertical-align:middle' class='text-center' rowspan='".$jml_kreativitas."'>".$poin_kreativitas."</td>":'';?>
                            </tr>
                            <?php $ik++; endif;?>
                        <?php $index++;endforeach;?>
                    <?php else:?>
                        <tr>
                            <th></th>
                            <th colspan="13">II. TUGAS TAMBAHAN DAN KREATIVITAS :</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>(tugas tambahan)</th>
                            <th></th>
                            <th colspan="10"></th>
                            <th rowspan="2" style="vertical-align: middle;" class="text-center"></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>(tugas tambahan)</th>
                            <th></th>
                            <th colspan="10"></th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>(kreativitas)</th>
                            <th></th>
                            <th colspan="10"></th>
                            <th rowspan="2" style="vertical-align: middle;" class="text-center"></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>(kreativitas)</th>
                            <th></th>
                            <th colspan="10"></th>
                        </tr>
                        <tr>
                            <th colspan="13" rowspan="2" class="text-center" style="vertical-align: middle;">Nilai Capaian SKP</th>
                            <th class="text-center"></th>
                        </tr>
                        <tr>
                            <th class="text-center"></th>
                        </tr>
                    <?php endif;?>
                    <tr>
                        <td rowspan="2" colspan="13" class="text-center" style="vertical-align: middle;"><b>Nilai Capaian SKP</b></td>
                        <td class="text-center"><b><?=$jumlah_skp;?></b></td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>(<?=$sebutan_skp;?>)</b></td>
                    </tr>
                    <tr>
                        <td rowspan="15">4.</td>
                    </tr>
                    <tr>
                        <td colspan="12" class="text-center">UNSUR YANG DINILAI</td>
                        <td class="text-center">JUMLAH</td>
                    </tr>
                    <tr>
                        <td colspan="12"><b>a. Sasaran Kinerja PNS (SKP) = <?=$jumlah_skp;?> X 60 % </b></td>
                        <td class="text-center"><b><?=$prosentase_skp;?></b></td>
                    </tr>
                    <tr>
                        <td rowspan="10">b. Perilaku Kerja</td>
                    </tr>
                    <?php $urut=1; foreach ($penilaian as $row_pk): ?>
                    <tr>
                        <td><?=$urut;?></td>
                        <td colspan="8"><?=$row_pk['indikator_nama'];?></td>
                        <td><?=$row_pk['poin'];?></td>
                        <td>(<?=$row_pk['keterangan'];?>)</td>
                        <?php if($urut==1):?>
                        <td rowspan="8"></td>
                        <?php endif;?>
                    </tr>
                    <?php $urut++; endforeach; ?>
                    <?php if(count($penilaian)<=5):?>
                        <tr>
                            <td>6.</td>
                            <td colspan="8">Kepemimpinan</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>7.</td>
                        <td colspan="8">Jumlah</td>
                        <td><?=$periode_terpilih[0]['perilaku_kerja_jumlah'];?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td colspan="8">Rata-Rata</td>
                        <td><?=$periode_terpilih[0]['perilaku_kerja_rerata'];?></td>
                        <td><?=$periode_terpilih[0]['perilaku_kerja_sebutan'];?></td>
                    </tr>
                    <tr>
                        <td colspan="11"><b>Nilai Perilaku Kerja =  <?=$periode_terpilih[0]['perilaku_kerja_rerata'];?> x 40 % </b></td>
                        <td class="text-center"><b><?=$periode_terpilih[0]['perilaku_kerja_prosentase'];?></b></td>
                    </tr>
                    <tr class="bg-light">
                        <th rowspan="2" colspan="12"  class="text-center" style="vertical-align: middle;"><b>NILAI PRESTASI KERJA</b></th>
                        <th class="text-center"><b><?=$jumlah_ppk;?></b></th>
                    </tr>
                    <tr class="bg-light">
                        <th class="text-center"><b>(<?=$sebutan_ppk;?>)</b></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <ul class="chat-msg-list">
                <?php if(!empty($periode_terpilih[0]['keberatan'])):?>
                <li class="msg-item">
                    <div class="avatar avatar-sm">
                        <span class="avatar-initial rounded-circle bg-dark"><?=substr(ltrim($periode_terpilih[0]['nama'],' '), 0, 1);?></span>
                    </div>
                    <div class="msg-body">
                        <h6 class="msg-user"><?=$periode_terpilih[0]['nama'];?> <span><?=jam_Hi($periode_terpilih[0]['tanggal_keberatan']);?>, <?=tanggal_dMY($periode_terpilih[0]['tanggal_keberatan']);?></span></h6>
                        <p><span>Keberatan atas penilaian</span></p>
                        <p><span><?=$periode_terpilih[0]['keberatan'];?></span></p>
                    </div>
                </li>
                <?php endif;?>

                <?php if(!empty($periode_terpilih[0]['tanggapan'])):?>
                <li class="msg-item reverse">
                    <div class="avatar avatar-sm">
                        <span class="avatar-initial rounded-circle bg-dark"><?=substr(ltrim($periode_terpilih[0]['pejabat_penilai_nama'],' '), 0, 1);?></span>
                    </div>
                    <div class="msg-body">
                        <h6 class="msg-user"><?=$periode_terpilih[0]['pejabat_penilai_nama'];?> <span><?=jam_Hi($periode_terpilih[0]['tanggal_tanggapan']);?>, <?=tanggal_dMY($periode_terpilih[0]['tanggal_tanggapan']);?></span></h6>
                        <p><span>Tanggapan Pejabat Penilai</span></p>
                        <p><span><?=$periode_terpilih[0]['tanggapan'];?></span></p>
                    </div>
                </li>
                <?php endif;?>

                <?php if(!empty($periode_terpilih[0]['keputusan'])):?>
                <li class="msg-item reverse">
                    <div class="avatar avatar-sm">
                        <span class="avatar-initial rounded-circle bg-dark"><?=substr(ltrim($periode_terpilih[0]['pejabat_penilai_nama'],' '), 0, 1);?></span>
                    </div>
                    <div class="msg-body">
                        <h6 class="msg-user"><?=$periode_terpilih[0]['pejabat_penilai_nama'];?> <span><?=jam_Hi($periode_terpilih[0]['tanggal_keputusan']);?>, <?=tanggal_dMY($periode_terpilih[0]['tanggal_keputusan']);?></span></h6>
                        <p><span>Keputusan Pejabat Penilai</span></p>
                        <p><span><?=$periode_terpilih[0]['keputusan'];?></span></p>
                    </div>
                </li>
                <?php endif;?>

                <?php if(!empty($periode_terpilih[0]['rekomendasi'])):?>
                <li class="msg-item reverse">
                    <div class="avatar avatar-sm">
                        <span class="avatar-initial rounded-circle bg-dark"><?=substr(ltrim($periode_terpilih[0]['pejabat_penilai_nama'],' '), 0, 1);?></span>
                    </div>
                    <div class="msg-body">
                        <h6 class="msg-user"><?=$periode_terpilih[0]['pejabat_penilai_nama'];?> <span><?=jam_Hi($periode_terpilih[0]['tanggal_rekomendasi']);?>, <?=tanggal_dMY($periode_terpilih[0]['tanggal_rekomendasi']);?></span></h6>
                        <p><span>Keputusan Pejabat Penilai</span></p>
                        <p><span><?=$periode_terpilih[0]['rekomendasi'];?></span></p>
                    </div>
                </li>
                <?php endif;?>

            </ul>
        </div>
        <?php if($periode_terpilih[0]['nip']==$_SESSION['id_user']):?>
            <div class="chat-panel">
                <div class="chat-body-footer border-bottom">
                    <div class="chat-body-options">
                        <a href="" ><i data-feather="frown"></i></a>
                    </div>    
                    <div class="form-group">
                        <input type="text" name="pesan" class="form-control" placeholder="Apabila ada keberatan mengenai penilaian diatas, silakan tuliskan disini">
                    </div>
                    <input type="hidden" name="konteks" id="konteks" value="Keberatan">
                    <button class="btn btn-icon" name="btn" onclick="kirimPesan()"><i data-feather="send"></i> Kirim</button>
                </div>
            </div>
        <?php else : ?>
            <div class="chat-panel">
                <div class="chat-body-footer border-bottom">
                    <div class="chat-body-options">
                        <a href=""><i data-feather="smile"></i></a>
                        <a href="" class="link-01 dropdown-toggle" type="button" id="dropdown-menu-reply" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tanggapan</a>
                        <div class="dropdown-menu">
                            <span onclick="selectThis('Tanggapan')" class="dropdown-item">Tanggapan</span>
                            <span onclick="selectThis('Keputusan')" class="dropdown-item">Keputusan</span>
                            <span onclick="selectThis('Rekomendasi')" class="dropdown-item">Rekomendasi</span>
                        </div>
                    </div>    
                    <div class="form-group">
                        <input type="text" name="pesan" class="form-control" placeholder="Silakan berikan komentar atas tanggapan yang dikirimkan ke Anda disini...">
                    </div>
                    <input type="hidden" name="konteks" id="konteks" value="Tanggapan">
                    <button class="btn btn-icon" name="btn" onclick="kirimPesan()" value="Tanggapan"><i data-feather="send"></i> Kirim</button>
                </div>
            </div>   
        <?php endif;?>
    </div>
</div>
<?php endif; ?>
<div class="divider-text mt-5 mb-3">Sistem Informas Catatan Kinerja dan Penilaian ASN. Pemerintah Kabupaten Magelang</div>
<script>
    function kirimPesan()
    {
        const pesan     = $("input[name='pesan']").val();
        const konteks   = $("input[name='konteks']").val();

        if(pesan!='')
        {
            $.dialog({
                icon: 'fa fa-spinner fa-spin',
                title: 'Sending...',
                content: 'Mohon tunggu sebentar, sistem sedang proses mengirimkan WA kepada yang bersangkutan ;)'
            });

            $.ajax(
            {
                url 	: '<?=backend_url();?>/review/kirim-pesan',
                type 	: 'POST',
                data 	: { 
                            "pesan"	    : pesan,
                            "konteks"	: konteks,
                            "periode_id": "<?=$periode_terpilih[0]['periode_id'];?>", 
                            "csrf_app"	: $("input[name='csrf_app']").val()
                        },
                success: function(data, textStatus, xhr)
                {
                    location.reload();
                },
                error: function(textStatus,xhr)
                {
                    console.log(textStatus);
                }
            });
        }
    }

    function selectThis(konteks)
    {
        $("input[name='konteks']").val(konteks);
        $("#dropdown-menu-reply").html(konteks);
    }
</script>