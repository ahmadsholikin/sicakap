<div class="mail-panel">
    <!-- mail-sidebar -->
    <div id="mailBodyList" class="mail-body ml-0" style="width:100%;">
        <div class="mail-body-header">
            <h5  style="font-size: 20px;"><?=date('F Y');?>
                <span class="d-none d-lg-inline">Total pengajuan yang belum dikonfirmasi 12 Baris</span>
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
                <?php $list=1;foreach ($data as $row) : ?>
                <li class="mail-item unread">
                    <?php 
                        switch ($row['is_approve'])
                        {
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
                        <span class="avatar-initial rounded-circle <?=$status;?> row<?=$list;?>" ><?=$row['poin'];?></span>
                    </div>
                    <div class="mail-item-body">
                        <div class="">
                            <span><b><?=$row['nama'];?></b><br> <?=tanggal_dMY($row['tanggal_kegiatan']);?> @ <?=jam_Hi($row['jam_mulai']);?> - <?=jam_Hi($row['jam_selesai']);?>
                                <?php if($row['is_submit']=='Ya'):?>
                                    <span class="mdi mdi-check-circle ml-3 text-warning"></span>&nbsp;1 Qty Realisasi
                                <?php endif;?>
                            </span>
                            <span><span class="mdi mdi-clock-outline"></span>&nbsp;<?=jam_Hi($row['tanggal_entrian']);?>&nbsp;&nbsp;<span class="mdi mdi-calendar-today"></span>&nbsp;<?=tanggal_dMY($row['tanggal_entrian']);?></span>
                        </div>
                        <div class="float-right d-none d-lg-block d-md-block">
                            <a class="mr-2 text-danger" onclick="getConfirm('<?=$row['id'];?>','Ya','row<?=$list;?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square svg-14">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                                Terima
                            </a>
                            <a class=" text-danger" onclick="getConfirm('<?=$row['id'];?>','Tidak','row<?=$list;?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash svg-14">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                <span>Tolak</span> 
                            </a>
                        </div>
                        <p class="text-black"><?=$row['uraian_kegiatan'];?></p>
                        <?php if($row['link_skp_id']<>0):?>
                        <small><span class="mdi mdi-link-variant"></span> <?=$row['link_skp_kegiatan'];?></small>
                        <?php endif;?>
                        <div class="d-md-none d-lg-none d-block">
                            <div class="divider-text my-2">Verifikasi</div>
                            <a class="mr-2 text-danger" onclick="getConfirm('<?=$row['id'];?>','Ya','row<?=$list;?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square svg-14">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                                Terima
                            </a>
                            <a class="float-right text-danger" onclick="getConfirm('<?=$row['id'];?>','Tidak','row<?=$list;?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash svg-14">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                <span>Tolak</span> 
                            </a>
                        </div>
                    </div>
                </li>
                <?php $list++; endforeach;?>
            </ul>
        </div>
    </div>
</div>
<script>
function getConfirm(id,status,row)
{
    $.ajax(
    {
        url 	: '<?=backend_url();?>/verif-aktivitas-harian/set-status',
        type 	: 'POST',
        data 	: { 
                    "id"		: id,
                    "status"	: status,
                    "csrf_app"	: $("input[name='csrf_app']").val()
                },
        success: function(data, textStatus, xhr)
        {
            $.toast({
                heading : 'Sukses', 
                text: 'Data berhasil diperbaharui', 
                icon:'info',
                position: 'top-right',
                bgColor: '#ffeb81',
                textColor: '#000'
            });
                
            if( status=='Ya')
            {
                $("."+row).removeClass("bg-danger");
                $("."+row).removeClass("bg-info");
                $("."+row).addClass("bg-success");
            }
            else if( status=="Tidak")
            {
                $("."+row).addClass("bg-danger");
                $("."+row).removeClass("bg-info");
                $("."+row).removeClass("bg-success");
            }
            else
            {
                $("."+row).removeClass("bg-danger");
                $("."+row).addClass("bg-info");
                $("."+row).addClass("bg-success");
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