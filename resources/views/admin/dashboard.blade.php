@extends('layout/index')
@section('dashboard')
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                   <h5 class="card-title"> <span><i class="fa-regular fa-book mr-2"></i></span>Artikel</h5>
                    <p class="card-text">Jumlah artikel yang sudah dibuat : {{ count($artikel) }}</p>
                    <a href="artikel/buat" class="btn btn-primary">Buat Artikel</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><span> <i class="fa-regular fa-newspaper mr-2"></i></span>Berita</h5>
                    <p class="card-text">Jumlah berita yang sudah dibuat : {{ count($berita) }}</p>
                    <a href="berita/buat" class="btn btn-primary">Buat Berita</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><span> <i class="fa-regular fa-calendar-plus mr-2 "></i></span>Kegiatan</h5>
                    <p class="card-text">Jumlah kegiatan yang sudah dibuat : {{ count($kegiatan) }}</p>
                    <a href="kegiatan/buat" class="btn btn-primary">Buat Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
        <div class="card p-4 shadow mt-4">
            <div class="card-header">
                Grafik Jumlah
            </div>
            <div class="card-body">
                <div id="grafik"></div>
            </div>
        </div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let artikel = <?php echo json_encode($total_artikel) ?>;
        let berita = <?php echo json_encode($total_berita) ?>;
        let kegiatan = <?php echo json_encode($total_kegiatan) ?>;
        let bulan = <?php echo json_encode($bulan) ?>;
        Highcharts.chart('grafik', {
            title:{
                text: "Jumlah Data"
            },
            yAxis:{
                title:{
                    text: "Jumlah Data Masuk",
                    
                }
            },
            xAxis:{
                categories: bulan
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series: [
                {
                    name: "Artikel",
                    data: artikel
                },
                {
                    name: "Berita",
                    data:berita
                },
                {
                    name: "Kegiatan",
                    data: kegiatan
                }
            ]
            
        });
    </script>
@endsection
