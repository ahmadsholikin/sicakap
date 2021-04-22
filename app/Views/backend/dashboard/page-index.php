<style type="text/css">
    #container {
        height: 325px; 
    }

    .highcharts-figure, .highcharts-data-table table {
        min-width: 310px; 
        max-width: 500px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .highcharts-background{
        fill: transparent !important;
    }
</style>
<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12 mb-4">
        <div class="card card-hover card-project-pink">
            <div class="card-body">
                <div class="media">
                    <div class="project-logo bg-pink tx-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg></div>
                    <div class="media-body mg-l-10 mg-sm-l-15">
                        <p class="tx-13 tx-color-04 mg-b-5">Aplikasi Terintegrasikan.</p>
                        <h5 class="tx-color-01 mg-b-0">Sistem Informasi Catatan Aktivitas Pegawai (SiCAKAP)</h5>
                    </div><!-- media-body -->
                </div>
                <p><br>Merupakan sebuah aplikasi penilaian kinerja pegawai berbasis web yang bertujuan untuk memudahkan penyusunan SKP (Sasaran Kerja Pegawai) 
                secara terintegrasi dari eselon tertinggi hingga staf. Aplikasi ini juga berfungsi untuk memudahkan pelaksanaan penilaian prestasi kerja PNS pada sebuah OPD</p>
                <p>Sistem yang dirancang untuk mengontrol kinerja pegawai yang nantinya berguna untuk memberikan penilaian bagi setiap pegawai negeri sipil di lingkungan Kabupaten Magelang. Aplikasi yang dirancang ini dapat digunakan untuk semua pegawai negeri sipil yang berdinas di Pemkab Magelang sebagai salah satu syarat pemberian tambahan penghasilan pegawai negeri sipil di lingkungan</p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4">
        <div class="card card-hover card-profile-one">
            <div class="card-body">
                <div class="media">
                    <div class="avatar avatar-xxl">
                        <img src="<?=$_SESSION['user_image'];?>" onerror="this.onerror=null;this.src='https://via.placeholder.com/500/637382/fff';" class="rounded-circle" alt="">
                    </div>
                    <div div class="media-body">
                        <h5 class="card-title"><?=session('nama_pegawai');?></h5>
                        <p class="card-desc"><?=session('id_user');?><br><b><?=session('jabatan');?></b><br><?=session('nama_uker');?><br><?=session('unit_kerja');?></p>

                        <div class="media-footer">
                            <div>
                                <h6>0</h6>
                                <label>Target</label>
                            </div>
                            <div>
                                <h6>0</h6>
                                <label>Realisasi</label>
                            </div>
                            <div>
                                <h6>0 %</h6>
                                <label>Capaian</label>
                            </div>
                        </div><!-- media-footer -->
                    </div>
                </div><!-- media -->
            </div><!-- card-body -->
            <div class="card-footer" >
                <p class="p-0 m-0">Login sebagai <b>Staff</b></p>
            </div>
        </div><!-- card -->
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-lg-4 col-sm-12 mb-sm-4 mb-4">
        <div class="card card-hover card card-project-three card-project-pink">
            <div class="card-body">
                <div class="marker marker-ribbon marker-danger marker-top-right pos-absolute t-10 r-0">Predikat Kinerja Anda "Kurang"</div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description text-center">
                        Aktivitas Kinerja Periode <b>Tahun <?=date('Y');?></b>
                    </p>
                </figure>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-8 col-sm-12 mb-4">
        <div class="card card-hover card-chart-three">
            <div class="card-header bg-transparent pd-lg-y-15">
                <h6 class="card-title mg-b-0">Progress Aktivitas Bulanan</h6>
                <nav class="nav nav-card-icon">
                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></a>
                  <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></a>
                </nav>
            </div><!-- card-header -->
            <div class="card-body">
                <div class="card-chart-header">
                    <div class="chart-legend">
                        <label><span class="bg-blue"></span> Target</label>
                        <label><span class="bg-green"></span> Realisasi</label>
                    </div>
                </div><!-- card-chart-header -->
                <div class="chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chartBar1" style="display: block; width: 760px; height: 220px;" width="760" height="220" class="chartjs-render-monitor"></canvas></div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    var ctxLabel  = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var ctxData1  = [0,0,0,0,0,0,0,0,0,0,0,0];
    var ctxData2  = [0,0,0,0,0,0,0,0,0,0,0,0];
    var ctxColor1 = '#59a7fe';
    var ctxColor2 = '#6beaa6';

    // Bar chart
    var ctx1 = document.getElementById('chartBar1').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
        labels: ctxLabel,
        datasets: [{
            data: ctxData1,
            backgroundColor: ctxColor1
        }, {
            data: ctxData2,
            backgroundColor: ctxColor2
        }]
        },
        options: {
        tooltips: { enabled: false },
        hover: {mode: null},
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false,
            labels: {
            display: false
            }
        },
        scales: {
            yAxes: [{
            gridLines: {
                color: '#f4f4f8'
            },
            ticks: {
                beginAtZero:true,
                fontSize: 9,
                fontColor: '#87889a',
                max: 100
            }
            }],
            xAxes: [{
            gridLines: {
                display: false
            },
            barPercentage: 0.6,
            ticks: {
                beginAtZero:true,
                fontSize: 10,
                fontColor: '#87889a'
            }
            }]
        }
        }
    });

    Highcharts.chart('container', {

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: ''
        },

        pane: {
            startAngle: -120,
            endAngle: 120,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 100,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'Prosentase Capaian'
            },
            plotBands: [{
                from: 0,
                to: 30,
                color: '#DF5353' // green
            }, {
                from: 30,
                to: 75,
                color: '#DDDF0D' // yellow
            }, {
                from: 75,
                to: 100,
                color: '#55BF3B' // red
            }]
        },

        series: [{
            name: 'Aktivitas',
            data: [0],
            tooltip: {
                valueSuffix: ' Pekerjaan'
            }
        }]

    },
    // Add some life
    function (chart) {
        // if (!chart.renderer.forExport) {
        //     setInterval(function () {
        //         var point = chart.series[0].points[0],
        //             newVal,
        //             inc = Math.round((Math.random() - 0.5) * 20);

        //         newVal = point.y + inc;
        //         if (newVal < 0 || newVal > 200) {
        //             newVal = point.y - inc;
        //         }

        //         point.update(newVal);

        //     }, 3000);
        // }
    });
});
</script>