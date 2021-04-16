<div class="card">
    <div class="card-header">
        Form Entri Periode SKP
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/periode-skp/insert" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Periode Awal</label>
                    <input class="form-control form-control-sm tanggal" name="periode_awal" type="text" readonly required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Periode Akhir</label>
                    <input class="form-control form-control-sm tanggal" name="periode_akhir" type="text" readonly required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pilihan Link Pejabat Penilai</label>
                    <select class="form-control form-control-sm" name="pejabat_penilai" required>
                        <?php foreach($link as $l): ?>
                        <option value="<?=$l['link_atasan_id'];?>"><?=$l['link_atasan_nama'];?></option>
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