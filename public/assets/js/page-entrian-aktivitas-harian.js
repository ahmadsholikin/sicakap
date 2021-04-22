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


function getConfirm(id,status,list)
{
    $.confirm({
        title: 'konfirmasi',
        content: 'Apakah yang Anda ingin lakukan dengan konten entrian aktivitas kegiatan ini ?',
        type: 'red',
        typeAnimated: true,
        icon:'mdi mdi-alert',
        buttons: {
            edit: function () {
                if(status=="Belum")
                {
                    $("#id").val(id);
                    $("#proses").val("update");
                    $('#mailCompose').addClass('show');

                    $("#poin").val($("#tb-poin"+list).val());
                    $("#entrian-tanggal").val($("#tb-tanggal_kegiatan"+list).val());
                    $("#entrian-penilai_nip").val($("#tb-penilai_nip"+list).val());
                    $("#entrian-link_skp_id").val($("#tb-link_skp_id"+list).val());
                    $("#entrian-is_submit").val($("#tb-is_submit"+list).val());
                    $("#uraian_kegiatan").html($("#tb-uraian_kegiatan"+list).val());
                }
                else
                {
                    $.alert({
                        title: 'Informasi',
                        content: 'Entrian yang Anda pilih sudah dieksekusi oleh Penilai, sehingga Anda tidak dapat mengubahnya. Terimakasih :)',
                    });
                }
            },
            hapus: function (){
                if(status=="Belum")
                {
                    window.location=backend_url+"/aktivitas-harian/delete?id="+id;
                }
                else
                {
                    $.alert({
                        title: 'Informasi',
                        content: 'Entrian yang Anda pilih sudah dieksekusi oleh Penilai, sehingga Anda tidak dapat mengubahnya. Terimakasih :)',
                    });
                }
            },
            batal: function () {
                $("#proses").val("insert");
            },
        }
    });
}