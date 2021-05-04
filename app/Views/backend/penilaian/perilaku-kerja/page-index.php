<style>
    #mask:hover, #mask:active{
        border: 1px solid orangered;
        width: 60px; 
        box-sizing: border-box;
        -webkit-box-sizing:border-box;
        -moz-box-sizing: border-box;
        padding: 2px 4px;
    }

    #mask{
        border: 1px solid transparent;
        width: 60px; 
        box-sizing: border-box;
        -webkit-box-sizing:border-box;
        -moz-box-sizing: border-box;
        padding: 2px 4px;
        background-color: transparent;
    }

    .bg-indigo{
        background-color: #9c27b01c;
    }

    kbd {
        padding: 2px 4px;
        font-size: 90%;
        color: #fff;
        background-color: #333;
        border-radius: 3px;
        -webkit-box-shadow: inset 0 -1px 0 rgb(0 0 0 / 25%);
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 25%);
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
			<table class="table table-bordered table-sm mb-0" style="width: 100%">
				<thead>
                    <tr>
                        <th style="width:3%">No.</th>
                        <th>Indikator Penilaian</th>
                        <th style="width:10%">Poin Nilai</th>
                        <th style="width:10%">Sebutan</th>
                        <th style="width:5%">Jumlah</th>
                    </tr>
                    <tr class="bg-light">
                        <?php for ($i=1; $i < 6; $i++) : ?>
                        <th><?=$i;?></th>
                        <?php endfor;?>
                    </tr>
				</thead>
				<tbody>
					<?php $index=1;$user=1;foreach ($data as $main): ?>
						<tr>
							<td colspan="14">
                                <a data-toggle="collapse" href="#col<?=$index;?>" role="button" aria-expanded="false" aria-controls="col<?=$index;?>"><span class="mdi mdi-chevron-down"></span><b><?=$main['nama'];?> - <?=$main['nip'];?></b></a>. &nbsp;&nbsp;
                                <a style="cursor:pointer" onclick="infoWa('<?=$main['nip'];?>')" class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square svg-14"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Kabarkan Penilaian Telah Selesai</a>
                            </td>
						</tr>
						<?php $no=1; $urut=1; foreach ($main['penilaian'] as $row): ?>
                        <?php if($urut==6){ ?>
						<tr class="bg-indigo">
                        <?php } else { ?>
                        <tr>
                        <?php } ?>
                            <td><?=$urut;?></td>
                            <td><?=$row['indikator'];?></td>
                            <td>
                                <input type="number" min="0" max="100" maxlength="3" value="<?=$row['poin'];?>" id="mask" 
                                onchange="setNilai('<?=$row['id'];?>','<?=$main['nip'];?>',this.value,'<?=$main['periode_id'];?>','<?=$index;?>','<?=$urut;?>','<?=$user;?>')" 
                                onkeyup="setNilai('<?=$row['id'];?>','<?=$main['nip'];?>',this.value,'<?=$main['periode_id'];?>','<?=$index;?>','<?=$urut;?>','<?=$user;?>')">  
                            </td>
                            <td id="keterangan<?=$index;?><?=$urut;?>"><?=$row['keterangan'];?></td>
                            <?php if($urut==1):?>
                            <td rowspan="8"></td>
                            <?php endif;?>
						</tr>
                        <?php $urut++; $index++; endforeach; ?>
                        <tr class="bg-light">
                            <td>7</td>
                            <td>Jumlah</td>
                            <td id="total<?=$user;?>"><?=$main['perilaku_kerja_jumlah'];?></td>
                            <td></td>
                        </tr>
                        <tr  class="bg-light">
                            <td>8</td>
                            <td>Rata-Rata</td>
                            <td id="rerata<?=$user;?>"><?=$main['perilaku_kerja_rerata'];?></td>
                            <td id="sebutan<?=$user;?>"><?=$main['perilaku_kerja_sebutan'];?></td>
                        </tr>
                        <tr  class="bg-light">
                            <td></td>
                            <td colspan="3" class="text-right"><b>Nilai Perilaku Kerja = </b> <span id="rerata-<?=$user;?>"><?=$main['perilaku_kerja_rerata'];?></span> x 40 %</td>
                            <td id="prosentase<?=$user;?>"><?=$main['perilaku_kerja_prosentase'];?></span></td>
                        </tr>
					<?php $no++;$user++;endforeach; ?>
				</tbody>
			</table>
		</div>
        <div class="card pt-2 pl-2">
            <p>Untuk membatalkan penilaian, cukup <kbd>isikan angka 0</kbd> pada kotak isian di kolom <kbd>poin nilai (3)</kbd> dibaris indikator yang dituju.</p>
        </div>
	</div>
</div>
<script>
	function setNilai(indikator_id,nip,poin,periode_id,index,urut,user)
	{
        if((poin!='')||(poin<0))
        {
            $.ajax(
            {
                url 	: '<?=backend_url();?>/perilaku-kerja/set-nilai',
                type 	: 'POST',
                data 	: { 
                            "indikator_id"	: indikator_id,
                            "nip"	        : nip,
                            "poin"	        : poin,
                            "periode_id"    : periode_id,
                            "csrf_app"	    : $("input[name='csrf_app']").val()
                        },
                success: function(data, textStatus, xhr)
                {
                    obj = JSON.parse(data);
                    $("#keterangan"+index+''+urut).html(obj.keterangan);
                    $("#total"+user).html(obj.total);
                    $("#rerata"+user).html(obj.rerata);
                    $("#sebutan"+user).html(obj.sebutan);
                    $("#rerata-"+user).html(obj.rerata);
                    $("#prosentase"+user).html(obj.prosentase);
                    console.log(obj);
                },
                error: function(textStatus,xhr)
                {
                    console.log(textStatus);
                }
            });
        }
	}

    function infoWa(nip)
    {
        $.ajax(
        {
            url 	: '<?=backend_url();?>/perilaku-kerja/info-wa',
            type 	: 'POST',
            data 	: { 
                        "nip"	        : nip,
                        "csrf_app"	    : $("input[name='csrf_app']").val()
                    },
            success: function(data, textStatus, xhr)
            {
                $.alert('Pesan berhasil dikirim');
            },
            error: function(textStatus,xhr)
            {
                console.log(textStatus);
            }
        });
    }
</script>