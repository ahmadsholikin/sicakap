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
				<a href="<?=backend_url();?>/persetujuan-skp/acc-all" class="tx-medium"><i class="icon ion-checkmark-circled"></i> Acc Semua </a>
			</div>
		</div>
	</div>
	<?=csrf_field();?>
	<div class="card-body border-0 p-0">
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-sm mb-0" style="width: 100%">
				<thead>
					<tr class="bg-light">
						<th style="width:3%">No.</th>
						<th>Kegiatan Tugas Jabatan</th>
						<th style="width:5%">AK</th>
						<th style="width:5%">Target<br>Kuant</th>
                        <th style="width:5%">Target<br>Output</th>
                        <th style="width:5%">Target<br>Kual/Mutu</th>
                        <th style="width:5%">Target<br>Waktu</th>
                        <th style="width:5%">Satuan<br>Waktu</th>
                        <th style="width:8%">Biaya</th>
						<th style="width:7%">Status<br>ACC</th>
					</tr>
				</thead>
				<tbody>
					<?php $index=1;foreach ($data as $main): ?>
						<tr>
							<td colspan="11"><a data-toggle="collapse" href="#col<?=$index;?>" role="button" aria-expanded="false" aria-controls="col<?=$index;?>"><span class="mdi mdi-chevron-down"></span><b><?=$main['nama'];?> - <?=$main['nip'];?></b></a>. &nbsp;&nbsp; Terdapat <?=count($main['skp']);?> Baris Kegiatan</td>
						</tr>
						<?php $no=1; foreach ($main['skp'] as $row): ?>
						<tr class="collapse multi-collapse <?=status_bl($row['target_acc']);?> row<?=$index;?><?=$no;?>" id="col<?=$index;?>">
							<td><?=$no;?></td>
							<td><?=ucfirst($row['kegiatan']);?> <?php if($row['link_skp_kegiatan']<>'-'){ ?> <span class="mdi mdi-link-variant bd-highlight" data-toggle="tooltip" data-placement="bottom" title="Link : <?=$row['link_skp_kegiatan'];?>"> Link</span><?php } ?></td>
							<td><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$row['angka_kredit'], 3, '.', '');} ?></td>
							<td><?=$row['target_kuantitas'];?></td>
							<td><?=ucfirst($row['target_output']);?></td>
							<td><?=$row['target_kualitas_mutu'];?></td>
							<td><?=$row['target_waktu'];?></td>
							<td><?=ucfirst($row['target_satuan_waktu']);?></td>
							<td><?=$row['target_biaya']==0?'-':rp($row['target_biaya']);?></td>
							<td>
								<select onchange="setStatus('<?=$row['skp_id'];?>',this,'row<?=$index;?><?=$no;?>')" class="custom-select custom-select-sm tx-12 set-status-<?=$no;?>" >
									<option <?=selected('Belum',($row['target_acc']));?> value="Belum">Belum</option>
									<option <?=selected('Ya',($row['target_acc']));?> value="Ya">Ya</option>
									<option <?=selected('Tidak',($row['target_acc']));?> value="Tidak">Tidak</option>
								</select>
							</td>
						</tr>
						<?php $no++;endforeach ?>
                    <?php $index++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function setStatus(id,obj,row)
	{
		console.log(obj.value+'-'+row);
		$.ajax(
		{
			url 	: '<?=backend_url();?>/persetujuan-skp/set-status',
			type 	: 'POST',
			data 	: { 
						"id"		: id,
						"status"	: obj.value,
						"csrf_app"	: $("input[name='csrf_app']").val()
					},
			success: function(data, textStatus, xhr)
			{
				$.toast({
					heading : 'Sukses', 
					text: 'Horayy.. Data berhasil diperbaharui', 
					icon:'info',
					position: 'bottom-right',
					bgColor: '#ffefa1',
					textColor: '#000'
				});
					
				if( obj.value=='Ya')
				{
					$("."+row).removeClass("bl-danger");
					$("."+row).removeClass("bl-info");
					$("."+row).addClass("bl-success");
				}
				else if( obj.value=="Tidak")
				{
					$("."+row).addClass("bl-danger");
					$("."+row).removeClass("bl-info");
					$("."+row).removeClass("bl-success");
				}
				else
				{
					$("."+row).removeClass("bl-danger");
					$("."+row).addClass("bl-info");
					$("."+row).addClass("bl-success");
				}
			},
			error: function(textStatus,xhr)
			{
				$.toast({
					heading : 'Error', 
					text: 'Uups.. Sepertinya ada kesalahn pada sistem', 
					icon:'error',
					position: 'bottom-right',
					bgColor: '#ffefa1',
					textColor: '#000'
				});
			}
		});
	}
</script>