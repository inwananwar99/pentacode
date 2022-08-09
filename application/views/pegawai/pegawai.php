<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Portofolio</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($pegawai as $d) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $d['nama_pegawai'];?></td>
            <td><?= $d['jenis_kelamin']; ?></td>
            <td><?= $d['alamat']; ?></td>
            <td><?= $d['nama_jabatan']; ?></td>
            <td><a href="<?= base_url('User/detailPortfolio/'.$d['id']); ?>" class="btn btn-info">Detail</a></td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['id_pegawai'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['id_pegawai']?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add User -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addPegawai');?>" method="POST">
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Jenis Kelamin</label>
               <select name="jk" id="" class="form-control">
                   <option>-- Pilih Jenis Kelamin --</option>
                   <option>Laki-laki</option>
                   <option>Perempuan</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Tempat Lahir</label>
               <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Tanggal Lahir</label>
               <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Alamat</label>
               <textarea name="alamat" class="form-control"></textarea> 
            </div>
            <div class="form-group">
               <label for="">No Telepon</label>
               <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon ..."> 
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email" name="email" class="form-control" placeholder="Email ..."> 
            </div>
            <div class="form-group">
               <label for="">Jabatan</label>
               <select name="id_jabatan" class="form-control">
                   <option>-- Pilih Jabatan --</option>
                   <?php foreach($jabatan as $l) :?>
                   <option value="<?= $l['id_jabatan']; ?>"><?= $l['nama_jabatan']; ?></option>
                   <?php endforeach; ?>
               </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
</div>
<!-- Modal Update-->
<?php foreach ($pegawai as $p1):?>
    <div class="modal fade" id="editModal<?= $p1['id_pegawai']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/updatePegawai/'.$p1['id_pegawai']);?>" method="POST">
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <input type="text" name="nama" class="form-control" value="<?= $p1['nama_pegawai']; ?>" placeholder="Nama Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Jenis Kelamin</label>
               <select name="jk" id="" class="form-control">
                   <option value="<?= $p1['jenis_kelamin']?>">-- <?= $p1['jenis_kelamin']?> --</option>
                   <option>Laki-laki</option>
                   <option>Perempuan</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Tempat Lahir</label>
               <input type="text" name="tempat" class="form-control" value="<?= $p1['tmp_lahir']?>" placeholder="Tempat Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Tanggal Lahir</label>
               <input type="date" name="tanggal" class="form-control" value="<?= $p1['tgl_lahir']?>" placeholder="Tanggal Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Alamat</label>
               <textarea name="alamat" class="form-control"><?= $p1['alamat']?></textarea> 
            </div>
            <div class="form-group">
               <label for="">No Telepon</label>
               <input type="number" name="no_telp" class="form-control" value="<?= $p1['no_tlp']?>" placeholder="Nomor Telepon ..."> 
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email" name="email" class="form-control" value="<?= $p1['email']?>" placeholder="Email ..."> 
            </div>
            <div class="form-group">
               <label for="">Jabatan</label>
               <select name="id_jabatan" class="form-control">
                   <option value="<?= $p1['id_jabatan']?>">-- <?= $p1['nama_jabatan']?> --</option>
                   <?php foreach($jabatan as $l) :?>
                   <option value="<?= $l['id_jabatan']; ?>"><?= $l['nama_jabatan']; ?></option>
                   <?php endforeach; ?>
               </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>

<!-- Modal Hapus -->
<?php foreach ($pegawai as $p) :?>
<div class="modal fade" id="deleteModal<?= $p['id_pegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deletePegawai/'.$p['id_pegawai']); ?>" method="POST">
        <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>