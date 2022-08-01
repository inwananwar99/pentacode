<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 bg-white">
                <img src="<?= base_url('assets/')?>logo/logobig.png" alt="" width="300" heigth="300">
            </div>
            <div class="col-md-8 bg-primary">
            <?php foreach($desc as $d):?>
                <p class="mt-3"><?= $d['deskripsi']; ?></p>
            <?php endforeach; ?>
                <div class="row bg-light" style="margin-top:200px;margin-left:400px;">
                <?php foreach($users as $u):?>
                    <h1 class="ml-3"><?= $u['name'];?></h1>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-6 mt-3 bg-white">
                <ul>
                    <li>CONTACT</li>
                    <p>Email dan Whatsapp</p>
                    <li>KEMAMPUAN</li>
                    <ul>
                    <?php foreach($kemampuan as $k):?>
                         <li><?= $k['nama_prestasi']; ?></li>
                    <?php endforeach; ?>
                    </ul>
                    <li>RIWAYAT PENDIDIKAN</li>
                    <ul>
                    <?php foreach($pendidikan as $p):?>
                         <li><?= $p['jenjang']; ?></li>
                    <?php endforeach; ?>
                    </ul>
                    <li>PRESTASI</li>
                    <ul>
                    <?php foreach($sertifikat as $s):?>
                         <li><?= $s['jenis_sert']; ?></li>
                    <?php endforeach; ?>
                    </ul>
                </ul>
            </div>
            <div class="col-md-6 bg-info">
                <ul class="mt-3">
                    <li>PENGALAMAN KERJA</li>
                    <li>RIWAYAT PROJECT</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>