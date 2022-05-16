<?php
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .row{
        text-align: justify;
        }
        .bod{
            margin-left: 90px;
            margin-right: 20px;
        }

    </style>
    <title>BAPH</title>
</head>
<body>
    <div class="row">
        <div class="col-md-3">
            <img src="<?= base_url('assets/logo/pupr.png')?>" alt="" width="150px" height="150px" style="margin-left: 100px;">
        </div>
        <div class="col-md-9">
        <img src="<?= base_url('assets/logo/kop.png')?>" alt=""><br>
        <p style="font-size:70%;"><b>Alamat :   Jl.  Pattimura   No.  20   Kebayoran  Baru   Jakarta  Selatan  12110  Telp. (021) 7396616,   email:  satkertanah.sda@gmail.com</b></p>
        </div>
    </div>
    <hr><width="100" height="75"></hr>
        <div class="bod">
            <h5 class="text-center"><b>BERITA ACARA PEMBAYARAN GANTI KERUGIAN DALAM BENTUK UANG</b></h5>
            <?php foreach([$baph] as $b1): ?>
                <p class="text-center">Nomor : <?= $b1['no_baph']; ?></p><br>
            <?php endforeach; ?>
            <p style="margin-left:20px" align="justify">Pada hari ini tanggal <?= tgl_indo(date('Y-m-d')); ?>, telah dilaksanakan pemberian Ganti Kerugian Pengadaan Tanah Pembangunan Bendungan Sadawarna di Kabupaten Subang yang berlokasi di:</p>
            <div class="row">
                <div class="col-md-2">
                    <p class="text-center">1. Desa/Kelurahan</p>
                    <p style="margin-left:20px">Kecamatan</p> 
                </div>
                <div class="col-md-10">
                    <p>: Sadawarna</p>
                    <p>: Cibogo</p>
                </div>
            </div>
            <p style="margin-left:20px">Dengan daftar Pihak yang Berhak yang menerima Ganti Kerugian sebagai berikut:</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pihak yang Berhak</th>
                        <th>No. Urut Daftar Nominatif</th>
                        <th>Luas tanah yang dilepas</th>
                        <th>Besarnya Nilai Ganti Kerugian</th>
                        <th>Ket. </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <!-- BAPH -->
            <h4 class="text-center">BERITA ACARA PELEPASAN HAK</h4>
            <?php foreach([$baph] as $b2): ?>
            <p class="text-center">Nomor : <?= $b2['no_baph']; ?></p><br>
            <?php endforeach; ?>
            <p style="margin-left:20px">Pada hari ini	               tanggal                            bulan Februari tahun 2022, hadir dihadapan saya Joko Susanto, A.Ptnh, M.Si selaku Kepala Kantor Pertanahan Kabupaten Subang.</p>

            <table style="margin-left: 300px;">
                <?php foreach([$baph] as $b1): ?>
                <tr>
                    <th>Nama</th>
                    <th><?= '  : '.$b1['nama']; ?></th>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th><?= '  : '.$b1[ 'alamat']; ?></th>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>
		window.print();
	</script>

</body>


</html>