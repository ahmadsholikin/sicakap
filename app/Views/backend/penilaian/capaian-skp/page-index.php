<style>
    #mask:hover, #mask:active{
        border: 1px solid orangered;
        width: 50px; 
        box-sizing: border-box;
        -webkit-box-sizing:border-box;
        -moz-box-sizing: border-box;
        padding: 2px 4px;
    }

    #mask{
        border: 1px solid transparent;
        width: 50px; 
        box-sizing: border-box;
        -webkit-box-sizing:border-box;
        -moz-box-sizing: border-box;
        padding: 2px 4px;
        background-color: transparent;
    }
</style>
<div class="card">
	<div class="card-header bg-transparent border-bottom-0 px-1">
		<div class="mail-navbar">
			<div class="d-flex align-items-center">
				<div class="tx-14 tx-color-04">
					<span>Tampilkan Periode : </span>
					<a href="" class="link-01 dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$periode_terpilih;?></a>
					<div class="dropdown-menu">
						<span class="dropdown-item-text">-- Pilihan Periode --</span>
						<?php foreach($periode as $p):?>
						<a class="dropdown-item" href="?from=<?=$p['periode_awal'];?>&to=<?=$p['periode_akhir'];?>"><?=tanggal_dMY($p['periode_awal']).' - '.tanggal_dMY($p['periode_akhir']);?></a>
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
	<div class="card-body border-0 p-0">
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-sm mb-0" style="width: 100%">
				<thead>
                    <tr>
						<th rowspan="2" style="width:3%">NO</th>
						<th rowspan="2">KEGIATAN TUGAS</th>
                        <th style="width:3%" rowspan="2">AK</th>
                        <th colspan="4" class="text-center">TARGET</th>
                        <th style="width:3%" rowspan="2">AK</th>
                        <th colspan="4" class="text-center">REALISASI</th>
                        <th style="width:5%" rowspan="2">PENGHITU<br>NGAN</th>
                        <th style="width:5%" rowspan="2">NILAI<br>CAPAIAN<br>SKP</th>
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
					<?php $index=1;foreach ($data as $main): ?>
						<tr>
							<td colspan="14"><a data-toggle="collapse" href="#col<?=$index;?>" role="button" aria-expanded="false" aria-controls="col<?=$index;?>"><span class="mdi mdi-chevron-down"></span><b><?=$main['nama'];?> - <?=$main['nip'];?></b></a>. &nbsp;&nbsp; Terdapat <?=count($main['skp']);?> Baris Kegiatan</td>
						</tr>
						<?php $no=1; foreach ($main['skp'] as $row): ?>
						<tr class="collapse multi-collapse <?=status_bl($row['target_acc']);?> row<?=$index;?><?=$no;?>" id="col<?=$index;?>">
                            <td><?=$no;?></td>
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
                            <td class="bg-light">
                                <?php if($row['realisasi_kuantitas']<>''): ?>
                                <input type="number" min="0" max="100" maxlength="3" value="<?=$row['realisasi_kualitas_mutu'];?>" id="mask" onchange="setSKP(this.value,'<?=$row['skp_id'];?>','<?=$index;?>','<?=$no;?>')" onkeyup="setSKP(this.value,'<?=$row['skp_id'];?>','<?=$index;?>','<?=$no;?>')">  
                                <?php endif;?>
                            </td>
                            <td><?=$row['realisasi_waktu'];?> <?=ucfirst($row['realisasi_satuan_waktu']);?></td>
                            <td><?=$row['realisasi_biaya']==0?'-':rp($row['realisasi_biaya']);?></td>
                            <td><span id="ph<?=$index;?><?=$no;?>"><?=$row['penghitungan'];?></span></td>
                            <td><span id="ncs<?=$index;?><?=$no;?>"><?=$row['nilai'];?></span></td>
						</tr>
						<?php $no++;endforeach ?>
                    <?php $index++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
    var object;
	function setSKP(value,id,obj,row)
	{
        if((value!='')||(value<0))
        {
            $.ajax(
            {
                url 	: '<?=backend_url();?>/capaian-skp/set-skp',
                type 	: 'POST',
                data 	: { 
                            "id"	    : id,
                            "value"	    : value,
                            "csrf_app"	: $("input[name='csrf_app']").val()
                        },
                success: function(data, textStatus, xhr)
                {
                    object = JSON.parse(data);
                    $("#ph"+obj+""+row).html(object.penghitungan);
                    $("#ncs"+obj+""+row).html(object.nilai);
                    
                },
                error: function(textStatus,xhr)
                {
                    console.log(textStatus);
                }
            });
        }
	}
</script>