<div class="card">
	<div class="card-header bg-transparent">
		<div class="mail-navbar">
			<div class="d-flex align-items-center">
				<div class="custom-control custom-checkbox pl-0 d-none d-lg-block">
					<a class="flex-fill text-danger" href="<?=backend_url();?>/susunan-skp/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
				</div>
				<div class="tx-14 tx-color-04 mg-lg-l-15">
					<span>Tampilkan Periode : </span>
					<a href="" class="link-01 dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$periode_terpilih;?></a>
					<div class="dropdown-menu">
						<span class="dropdown-item-text">-- Pilihan Periode --</span>
						<?php foreach($periode as $p):?>
						<a class="dropdown-item" href="?periode_id=<?=$p['periode_id'];?>"><?=tanggal_dMY($p['periode_awal']).' - '.tanggal_dMY($p['periode_akhir']);?></a>
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-flex">
				<a href="" data-toggle="tooltip" title="klik untuk memuat ulang data"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-cw"><polyline points="23 4 23 10 17 10"></polyline><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path></svg></a>
				<?php if($default_periode_id<>0):?>
				<a data-toggle="modal" data-target="#cetakModal" data-toggle="tooltip" title="klik untuk mencetak data SKP"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>
				<?php endif; ?>
				<a href="" data-toggle="tooltip" title="klik untuk mengunduh data SKP" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th style="width:3%">No.</th>
						<th>Kegiatan Tugas Jabatan</th>
						<th style="width:5%">AK</th>
						<th style="width:5%">Target<br>Kuant</th>
                        <th style="width:5%">Target<br>Output</th>
                        <th style="width:5%">Target<br>Kual/Mutu</th>
                        <th style="width:5%">Target<br>Waktu</th>
                        <th style="width:5%">Satuan<br>Waktu</th>
                        <th style="width:8%">Biaya</th>
						<th style="width:3%">Status<br>ACC</th>
                        <th style="width:3%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=ucfirst($row['kegiatan']);?> <?php if($row['link_skp_kegiatan']<>'-'){ ?> <span class="mdi mdi-link-variant bd-highlight" data-toggle="tooltip" data-placement="bottom" title="Link : <?=$row['link_skp_kegiatan'];?>"> Link</span><?php } ?></td>
                        <td><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$row['angka_kredit'], 3, '.', '');} ?></td>
                        <td><?=rp($row['target_kuantitas']);?></td>
                        <td><?=ucfirst($row['target_output']);?></td>
                        <td><?=$row['target_kualitas_mutu'];?></td>
                        <td><?=$row['target_waktu'];?></td>
                        <td><?=ucfirst($row['target_satuan_waktu']);?></td>
                        <td><?=$row['target_biaya']==0?'-':rp($row['target_biaya']);?></td>
						<td><?=status_skp($row['target_acc']);?></td>
						<td>
							<div class="btn-group" role="group">
								<?=btn_edit('./susunan-skp/edit?id='.$row['skp_id']);?>
								<?=btn_delete('./susunan-skp/delete?id='.$row['skp_id']);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<?php if($default_periode_id<>0):?>
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>/output/cetak-skp" method="POST" data-toggle="validator" role="form">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Pengaturan Cetak SKP</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= csrf_field() ?>
					<input type="hidden" name="cetak_periode_id" value="<?=$default_periode_id;?>">
					<div class="form-row">
						<div class="col-sm-12 form-group">
							<label>NIP Pejabat Penilai</label>
							<input class="form-control form-control-sm" placeholder="Entrikan NIP Pejabat Penilai" name="cetak_pejabat_penilai_nip" type="text" required value="<?=$periode[0]['pejabat_penilai_nip'];?>">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 form-group">
							<label>Nama Pejabat Penilai</label>
							<input class="form-control form-control-sm" placeholder="Entrikan Nama Pejabat Penilai" name="cetak_pejabat_penilai_nama" type="text" required value="<?=$periode[0]['pejabat_penilai_nama'];?>">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 form-group">
							<label>Jabatan dari Pejabat Penilai</label>
							<input class="form-control form-control-sm" placeholder="Entrikan Jabatan dari Pejabat Penilai" name="cetak_pejabat_penilai_jabatan" type="text" required value="<?=$periode[0]['pejabat_penilai_jabatan'];?>">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 form-group">
							<label>Tempat atau Lokasi Mencetak</label>
							<input class="form-control form-control-sm" placeholder="Entrikan Tempat atau Lokasi Mencetak" name="cetak_tempat" type="text" required value="Kota Mungkid">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 form-group">
							<label>Tanggal Cetak</label>
							<input class="form-control form-control-sm tanggal" name="cetak_tanggal" type="text" required value="<?=date('d M Y');?>" readonly>
							<div class="help-block with-errors"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Cetak</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
  	</div>
</div>
<?php endif;?>