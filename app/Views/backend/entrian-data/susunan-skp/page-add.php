<div class="card">
    <div class="card-header bg-transparent">
        <div class="mail-navbar">
            <div class="d-flex align-items-center">
                <div class="tx-14 tx-color-04">Form Entri Susunan SKP</div>
            </div>
            <div class="d-none d-lg-flex">
                <span data-toggle="modal" data-target=".bd-example-modal-lg">
                    <a title="klik untuk melihat referensi" data-toggle="tooltip" data-placement="top" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                </span>
                <span data-toggle="modal" data-target=".jbtn-example-modal-lg" class="ml-2">
                    <a title="klik untuk melihat SKP pegawai lain berdasarkan jabatan yang sama" data-toggle="tooltip" data-placement="top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 svg-14">
                            <circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/susunan-skp/insert" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pilihan Periode</label>
                    <select class="form-control form-control-sm" name="periode_id" type="text">
                        <?php foreach($periode as $p): ?>
                        <option value="<?=$p['periode_id'];?>"><?=tanggal_dMY($p['periode_awal']);?> - <?=tanggal_dMY($p['periode_akhir']);?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                    <?php if(empty($periode)): ?>
                        <div class="help-block with-errors">Anda belum mengentrikan periode SKP, silakan membuatnya terlebih dahulu.</div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Link ke SKP Atasan</label>
                    <select class="form-control form-control-sm" name="link_atasan_id" type="text">
                        <option value="-">Tidak dihubungkan</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Kegiatan Tugas Jabatan</label>
                    <textarea class="form-control form-control-sm" name="kegiatan" id="uraian_kegiatan"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-4 form-group">
                    <label>Angka Kredit</label>
                    <input class="form-control form-control-sm" name="angka_kredit" id="angka_kredit" type="text" placeholder="Isikan 0 jika AK tidak ada" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-12 col-md-4  form-group">
                    <label>Kuantitas</label>
                    <input class="form-control form-control-sm" name="target_kuantitas" type="text" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-12 col-md-4 form-group">
                    <label>Output</label>
                    <input class="form-control form-control-sm" name="target_output" type="text" placeholder="Dokumen, Laporan, Layanan, Kegiatan" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-3 form-group">
                    <label>Kualitas / Mutu</label>
                    <input class="form-control form-control-sm" name="target_kualitas_mutu" type="text" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-12 col-md-3 form-group">
                    <label>Durasi Waktu</label>
                    <input class="form-control form-control-sm" name="target_waktu" type="text" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-12 col-md-3 form-group">
                    <label>Satuan Waktu</label>
                    <select class="form-control form-control-sm" name="target_satuan_waktu"  required>
                        <option value="Bulan">Bulan</option>
                        <option value="Hari">Hari</option>
                        <option value="Tahun">Tahun</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-12 col-md-3 form-group">
                    <label>Biaya</label>
                    <input class="form-control form-control-sm" name="target_biaya" type="text" required value="0">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Daftar Referensi Kegiatan Berdasarkan Jabatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover dt10" style="width: 100%" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Uraian Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list_uraian as $lu):?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td class="kegiatan"><?=$lu->uraian;?></td>
                            <td><a class="pilih" data-dismiss="modal" style="cursor:pointer">Pilih</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade jbtn-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Daftar Referensi Entrian SKP dari Pegawai Lain</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover dt10" style="width: 100%" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Uraian Kegiatan</th>
                            <th>Angka Kredit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list_uraian_jabatan as $luj):?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td class="kegiatan"><?=$luj['kegiatan'];?></td>
                            <td class="angka_kredit"><?php if(($_SESSION['jenis_jabatan']=='11')||($_SESSION['jenis_jabatan']=='90')){ echo '-'; }else{ echo number_format((float)$luj['angka_kredit'], 3, '.', '');} ?></td>
                            <td><a class="pilih_jab" data-dismiss="modal" style="cursor:pointer">Pilih</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('.pilih').click(function() {
        var uraian = $(this).closest('td').prev('.kegiatan').text();
        $("#uraian_kegiatan").html(uraian);
    });

    $('.pilih_jab').click(function() {
        var uraian = $(this).closest('tr').children('.kegiatan').text();
        $("#uraian_kegiatan").html(uraian);

        var angka_kredit = $(this).closest('tr').children('.angka_kredit').text();
        $("#angka_kredit").val(angka_kredit);
    });
</script>