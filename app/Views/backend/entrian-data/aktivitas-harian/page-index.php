<div class="mail-panel">
    <div class="mail-sidebar">
        <button onclick="entrianShow()" class="btn btn-block btn-outline-danger" >Entri Aktivitas</button>
        <nav class="nav nav-classic flex-column tx-13 mg-t-20">
            <a href="" class="nav-link active">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                    <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                </svg>
                <span>Semua</span>
                <span class="badge">0</span>
            </a>
            <a href="" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                    <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <span>Proses</span> <span class="badge">0</span>
            </a>
            <a href="" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <span>Diterima</span> <span class="badge">0</span>
            </a>
            <a href="" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash">
                    <circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                <span>Ditolak</span> <span class="badge">0</span>
            </a>
        </nav>
        <hr>
        <label class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-04">Label</label>
        <nav class="nav nav-classic flex-column">
            <a href="" class="nav-link">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>Tersambung SKP</span>
            </a>
        </nav>
    </div>
    <!-- mail-sidebar -->
    <div id="mailBodyList" class="mail-body">
        <div class="mail-body-header">
            <button  onclick="entrianShow()" class="btn d-md-none d-lg-none d-sm-inline btn-outline-danger" >Entri Aktivitas</button>
            <h5 class="d-none d-lg-inline" style="font-size: 20px;"><?=date('F Y');?>
                <span >Total poin 0 dari target 6.000</span>
            </h5>
            <div>
                <span class="text-muted tx-13 mg-r-10 d-none d-lg-inline">0 dari 0</span>
                <button class="btn btn-icon btn-xs btn-white" disabled="">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="btn btn-icon btn-xs btn-white" disabled="">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        <!-- mail-body-header -->
        <div class="mail-body-content">
            <div class="mail-navbar py-4">
                <div class="d-flex align-items-center">
                    <div class="tx-14 tx-color-04 mg-lg-l-15">
                        <span>Urutkan berdasarkan :</span>
                        <a href="" class="link-01">Terbaru</a>
                    </div>
                </div>
                <div class="d-none d-lg-flex pr-2">
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-cw">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                        </svg>
                    </a>
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg>
                    </a>
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                    </a>
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </a>
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </a>
                    <a href="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </a>
                </div>
            </div>
            <!-- mail-navbar -->
            <ul class="mail-list ps">
                <?php foreach ($data as $row) : ?>
                <li class="mail-item unread" onclick="getConfirm('<?=$row['id'];?>')">
                    <?php 
                        switch ($row['is_approve']) {
                            case 'Ya':
                                $status = "bg-success";
                                break;
                            case 'Tidak':
                                $status = "bg-danger";
                                break;
                            default:
                                $status = "bg-primary";
                                break;
                        }
                    ?>
                    <div class="avatar">
                        <span class="avatar-initial rounded-circle <?=$status;?>"><?=$row['poin'];?></span>
                    </div>
                    <div class="mail-item-body">
                        <div>
                            <span><?=tanggal_dMY($row['tanggal_kegiatan']);?> 
                            <?php if($row['is_submit']=='Ya'):?>
                                <span class="mdi mdi-check-circle ml-3 text-warning"></span>&nbsp;1 Qty Realisasi
                            <?php endif;?></span>
                            <span><span class="mdi mdi-clock-outline"></span>&nbsp;<?=jam_Hi($row['tanggal_entrian']);?>&nbsp;&nbsp;<span class="mdi mdi-calendar-today"></span>&nbsp;<?=tanggal_dMY($row['tanggal_entrian']);?></span>
                        </div>
                        <p class="text-black"><?=$row['uraian_kegiatan'];?></p>
                        <?php if($row['link_skp_id']<>0):?>
                        <small><span class="mdi mdi-link-variant"></span> <?=$row['link_skp_kegiatan'];?></small>
                        <?php endif;?>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<form action="<?=backend_url();?>/aktivitas-harian/insert" method="post" class="form">
    <?=csrf_field();?>
    <div id="mailCompose" class="mail-compose">
        <div class="mail-compose-dialog">
            <div class="mail-compose-header">
                <h6 class="mail-compose-title tx-white">Entrian Aktivitas Harian</h6>
                <nav class="nav nav-icon">
                    <a id="mailComposeMinimize" href="" class="nav-link nav-link-minimize d-none d-lg-block">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-square">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        </svg>
                    </a>
                    <a id="mailComposeShrink" href="" class="nav-link nav-link-shrink d-none d-lg-block">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize-2">
                            <polyline points="4 14 10 14 10 20"></polyline>
                            <polyline points="20 10 14 10 14 4"></polyline>
                            <line x1="14" y1="10" x2="21" y2="3"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize-2">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                    </a>
                    <a id="" href="" class="nav-link nav-link-close mailComposeClose">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </a>
                </nav>
            </div>
            <!-- mail-compose-header -->
            <div class="mail-compose-body">
                <div class="form-row align-items-center">
                    <div class="col-sm">Tanggal</div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control tanggal bd-0 pd-x-0" name="tanggal_kegiatan" value="<?=date('d M Y');?>">
                    </div>
                </div>
                <hr class="mg-y-10">
                <div class="form-row align-items-center">
                    <div class="col-sm">Kepada</div>
                    <div class="col-sm-10">
                        <select class="form-control bd-0 pd-x-0" name="penilai_nip" >
                            <?php foreach ($link as $r_link) : ?>
                            <option value="<?=$r_link['link_atasan_id'];?>"><?=$r_link['link_atasan_nama'];?> - <?=$r_link['link_atasan_id'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <hr class="mg-y-10">
                <div class="form-row align-items-center">
                    <div class="col-sm">Link SKP</div>
                    <div class="col-sm-10">
                        <select class="form-control bd-0 pd-x-0" name="link_skp_id">
                            <option value="-">Tidak berkaitan dengan kegiatan SKP</option>
                            <?php foreach ($skp as $r_skp) : ?>
                            <option value="<?=$r_skp['skp_id'];?>"><?=$r_skp['kegiatan'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <hr class="mg-y-10">
                <div class="form-row align-items-center">
                    <div class="col-sm">Status</div>
                    <div class="col-sm-10">
                        <select class="form-control bd-0 pd-x-0" name="is_submit">
                            <option value="Tidak">Tidak berkaitan dengan kegiatan SKP</option>
                            <option value="Tidak">Masih dalam proses</option>
                            <option value="Ya">Sudah selesai, tambahkan dalam kuantitas realisasi SKP</option>
                        </select>
                    </div>
                </div>
                <div class="form-row align-items-center px-1 mt-3">
                    <textarea class="form-control" name="uraian_kegiatan" id="uraian_kegiatan" cols="30" rows="10" placeholder="Tuliskan kegiatan aktivitas harian Anda disini...." required></textarea>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mg-t-25">
                    <select class="custom-select custom-select-sm tx-12" style="width: 150px;border:1px solid #dc3545" name="poin" id="poin" required>
                        <option selected="" value="0" disabled>Durasi Waktu</option>
                        <?php for ($i=1; $i < 41; $i++) : ?> 
                        <option value="<?=$i*5;?>"><?=$i*5;?> Menit</option>
                        <?php endfor; ?>
                    </select>
                    
                    <div class="tx-14 mg-t-15 mg-sm-t-0 float-right">
                        <button class="btn btn-danger btn-sm" type="submit">Kirim Laporan</button>
                        <button class="btn btn-white mg-r-5 btn-sm mailComposeClose" type="button">Batal</button>
                    </div>
                </div>
            </div>
            <!-- mail-compose-body -->
        </div>
        <!-- mail-compose-dialog -->
    </div>
</form>
<script>
    function entrianShow()
    {
        $('#mailCompose').addClass('show');
    }

    $('.mailComposeClose').on('click', function(e){
        e.preventDefault()

        if($('#mailCompose').hasClass('minimize') || $('#mailCompose').hasClass('shrink')) {
        $('#mailCompose').addClass('d-none');

        setTimeout(function(){
            $('#mailCompose').attr('class', 'mail-compose');
        },500);

        } else {
            $('#mailCompose').removeClass('show');
        }
    })

    $('#mailComposeShrink').on('click', function(e){
        e.preventDefault()
        $('#mailCompose').toggleClass('shrink')
        $('#mailCompose').removeClass('minimize')
    })

    $('#mailComposeMinimize').on('click', function(e){
        e.preventDefault()
        $('#mailCompose').toggleClass('minimize')
    })

    $('.form').submit(function () {
        var poin = $.trim($('#poin').val());
        if ((poin  == '0')||(poin  === '')){
            alert('Silakan pilih durasi waktu terlebih dahulu.');
            $( "#poin" ).focus();
            return false;
        }
    });


    function getConfirm(id)
    {
        $.confirm({
            title: 'konfirmasi',
            content: 'Apakah yang Anda ingin lakukan dengan konten entrian aktivitas kegiatan ini ?',
            type: 'red',
            typeAnimated: true,
            icon:'mdi mdi-alert',
            buttons: {
                edit: function () {
                    $.alert('Uupppss saat ini, fitur masih belum tersedia ;) ');
                },
                hapus: function () {
                    window.location="<?=backend_url('/aktivitas-harian/delete?id=');?>"+id;
                },
                batal: function () {
                },
            }
        });
    }
</script>