
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logobig.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul.' - Pentacode'; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <style>
      .ar{
        margin-left: 10px;
      }
    </style>
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url()?>assets/logo/logo-prime.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pentacode</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
            <?php if($this->session->userdata('bidang')){?>
              <p class="text-white"><?= '('.$this->session->userdata('role').' '.$this->session->userdata('bidang').')'; ?></p>
            <?php }else{?>
              <p class="text-white"><?= '('.$this->session->userdata('role').')'; ?></p>
            <?php }?>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Welcome/dashboard')?>" class="nav-link <?= $title == 'dashboard' ? 'active' : ''?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if($this->session->userdata('role') == 'Pegawai'){?>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User/data_profil'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pribadi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('User/data_divisi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Divisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('User/data_jabatan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Kualifikasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User/pendidikan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('User/data_divisi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Proyek</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Proyek/riwayat'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Riwayat Pekerjaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('Prestasi')?>" class="nav-link <?= $title == 'prestasi' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Data Kompetensi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Sertifikat')?>" class="nav-link <?= $title == 'sertifikat' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Data Sertifikat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/portofolio/'.$this->session->userdata('id'))?>" class="nav-link <?= $title == 'sertifikat' ? 'active' : ''?>">
                <i class="nav-icon fas fa-file"></i>
                <p>
                Portofolio
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'Admin Finance'){?>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'Admin Finance'){?>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'Admin Pentacode'){?>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'Admin Marketing'){?>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'Admin Digital'){?>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>
            <?php }else if($this->session->userdata('role') == 'HRD'){?>
              <li class="nav-item">
              <a href="<?= base_url('User/pegawai')?>" class="nav-link <?= $title == 'pegawai' ? 'active' : ''?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Kelola Data Pegawai
                </p>
              </a>
            </li>   
            <li class="nav-item">
              <a href="<?= base_url('Promosi/pengajuan')?>" class="nav-link <?= $title == 'promosi' ? 'active' : ''?>">
              <i class="nav-icon fas fa-signal"></i>
                <p>
                Daftar Promosi Jabatan
                </p>
              </a>
            </li>              
            <?php }else if($this->session->userdata('role') == 'Manajer'){?>
              <li class="nav-item">
              <a href="<?= base_url('User/pegawai')?>" class="nav-link <?= $title == 'pegawai' ? 'active' : ''?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Kelola Data Pegawai
                </p>
              </a>
            </li>
              <li class="nav-item">
                <a href="<?= base_url('Proyek')?>" class="nav-link <?= $title == 'proyek' ? 'active' : ''?>">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>
                  Kelola Data Proyek
                  </p>
                </a>
              </li>
              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Validasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User/pendidikan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Sertifikat'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Sertifikat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Prestasi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kompetensi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Promosi/pengajuan')?>" class="nav-link <?= $title == 'pengajuan' ? 'active' : ''?>">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>
                  Promosi Jabatan
                  </p>
                </a>
              </li>
            <?php
           }else if($this->session->userdata('role') == 'Super Admin'){?>
              <li class="nav-item">
              <a href="<?= base_url('User/admin')?>" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Kelola Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/level')?>" class="nav-link <?= $title == 'level' ? 'active' : ''?>">
                <i class="nav-icon fas fa-signal"></i>
                <p>
                Kelola Data Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User')?>" class="nav-link <?= $title == 'user' ? 'active' : ''?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Kelola Data User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('User/jabatan')?>" class="nav-link <?= $title == 'jabatan' ? 'active' : ''?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                Kelola Data Jabatan
                </p>
              </a>
            </li>              
            <?php } ?>
            <li class="nav-item">
              <a href="<?= base_url('Welcome/logout')?>" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <?php $this->load->view($konten); ?>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url()?>assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url()?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url()?>assets/dist/js/adminlte.js"></script>
  <script src="<?= base_url()?>assets/dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- DataTables & Plugins -->
  <script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <script>
    imgInpp.onchange = evt => {
    const [file] = imgInpp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }

  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blahh.src = URL.createObjectURL(file)
    }
  }
  </script>
  <script>  
    $('#peg').on('change', function(){
      // ambil data dari elemen option yang dipilih
      const peg = $('#peg option:selected').data('jabatan');
      const join = $('#peg option:selected').data('bergabung');
      const tk = $('#peg option:selected').data('tingkat');
      // tampilkan data ke element
      $('[name=jabatan_pegawai]').val(peg);
      $('[name=tgl]').val(join);
      getData(tk);
      function getData(tk){
        $.ajax({
          method: 'get',
          url   : '<?=base_url()?>Promosi/highJabatan/'+tk,
          dataType : 'json',
          success : function(data){
            var html = '';
            var i;
            $('[name=jabatan_baru]').val(data.nama_jabatan);
          },error: function() {
              console.log('Something is wrong');
           }
          });
        }
    });

    $('#peg1').on('change', function(){
      // ambil data dari elemen option yang dipilih
      const peg = $('#peg1 option:selected').data('jabatan1');
      const join = $('#peg1 option:selected').data('bergabung1');
      // tampilkan data ke element
      $('[name=jabatan_pegawai]').val(peg);
      $('[name=tgl]').val(join);
    });

    $('#detail').on('click', function(){
      // ambil data dari elemen option yang dipilih
      const user1 = $('#detail').data('user1');
      const user2 = $('#detail').data('user2');
      const user3 = $('#detail').data('user3');
      // tampilkan data ke element
      getData(user1,user2,user3);
      function getData(user1,user2,user3){
        $.ajax({
          method: 'get',
          url   : '<?=base_url()?>Proyek/detailProyek/'+user1+'/'+user2+'/'+user3,
          dataType : 'json',
          success : function(data){
                      const body = document.getElementById('rowDetail1')
                      const user1 = document.createElement("p")
                      const user2 = document.createElement("p")
                      const user3 = document.createElement("p")
                      user1.innerText = data[0].name+',';
                      user2.innerText = data[1].name+',';
                      user3.innerText = data[2].name;
                      body.append()
           },error: function() {
              console.log('Something is wrong');
           }
          });
        }
    });
  </script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  </body>
  </html>
