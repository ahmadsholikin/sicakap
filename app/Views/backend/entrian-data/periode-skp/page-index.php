<div class="card">
	<div class="card-header bg-transparent">
		<a class="text-danger" href="<?=backend_url();?>/periode-skp/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Periode Awal</th>
						<th>Periode Akhir</th>
						<th>Pejabat Penilai</th>
						<th>Default</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=tanggal_dMY($row['periode_awal']);?></td>
						<td><?=tanggal_dMY($row['periode_akhir']);?></td>
						<td><?=$row['pejabat_penilai_nama'];?></td>
                        <td><a style="cursor:pointer" href="<?=backend_url();?>/periode-skp/default?id=<?=$row['periode_id'];?>"><?=status_skp($row['is_default']);?></a></td>
						<td>
							<div class="btn-group" role="group">
								<?=btn_edit('./periode-skp/edit?id='.$row['periode_id']);?>
								<?=btn_delete('./periode-skp/delete?id='.$row['periode_id']);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
