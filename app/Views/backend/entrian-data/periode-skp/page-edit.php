<div class="card">
    <div class="card-header bg-transparent">
        Form Entri Periode SKP
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/periode-skp/update" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?=$row[0]['periode_id'];?>">
            <div class="form-row">
                <div class="col form-group">
                    <label>Periode Awal</label>
                    <input class="form-control form-control-sm tanggal" value="<?=tanggal_dMY($row[0]['periode_awal']);?>" name="periode_awal" type="text" readonly required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Periode Akhir</label>
                    <input class="form-control form-control-sm tanggal" value="<?=tanggal_dMY($row[0]['periode_akhir']);?>" name="periode_akhir" type="text" readonly required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pilihan Link Atasan Langsung</label>
                    <select class="form-control form-control-sm" name="atasan" required>
                        <?php foreach($link as $l): ?>
                        <option <?=selected($l['link_atasan_id'],$row[0]['atasan_nip']);?> value="<?=$l['link_atasan_id'];?>"><?=$l['link_atasan_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pilihan Link Pejabat Penilai</label>
                    <select class="form-control form-control-sm" name="pejabat_penilai" required>
                        <?php foreach($link as $l): ?>
                        <option <?=selected($l['link_atasan_id'],$row[0]['pejabat_penilai_nip']);?> value="<?=$l['link_atasan_id'];?>"><?=$l['link_atasan_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pilihan Link Atasan Pejabat Penilai</label>
                    <select class="form-control form-control-sm" name="atasan_pejabat_penilai" required>
                        <?php foreach($link as $l): ?>
                        <option <?=selected($l['link_atasan_id'],$row[0]['atasan_pejabat_penilai_nip']);?> value="<?=$l['link_atasan_id'];?>"><?=$l['link_atasan_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>