<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Proyek</th>
            <th>Lama Proyek</th>
            <th>Jumlah Personil</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($proyek as $d) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $d['nama'];?></td>
            <td><?= $d['lama']; ?></td>
            <td><?= $d['jml']; ?></td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['id'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['id']?>">Hapus</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Proyek</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Proyek/addProyek');?>" method="POST">
            <div class="form-group">
               <label for="">Nama Proyek</label>
               <input type="text" name="nama" class="form-control" placeholder="Nama Proyek ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Lama Proyek</label>
               <input type="number" name="lama" class="form-control" placeholder="Lama Proyek ..."> 
            </div>
            <div class="form-group">
               <label for="">Jumlah Personil</label>
               <input type="number" name="jml" class="form-control" placeholder="Jumlah Personil ..."> 
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
<?php foreach ($proyek as $d1):?>
    <div class="modal fade" id="editModal<?= $d1['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Data Proyek</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Proyek/updateProyek/'.$d1['id']);?>" method="POST">
        <div class="form-group">
               <label for="">Nama Proyek</label>
               <input type="text" name="nama" class="form-control" value="<?= $d1['nama']; ?>" placeholder="Nama Proyek ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Lama Proyek</label>
               <input type="number" name="lama" class="form-control" value="<?= $d1['lama']; ?>" placeholder="Lama Proyek ..."> 
            </div>
            <div class="form-group">
               <label for="">Jumlah Personil</label>
               <input type="number" name="jml" class="form-control" value="<?= $d1['jml']; ?>" placeholder="Jumlah Personil ..."> 
            </div>        </div>
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
<?php foreach ($proyek as $d2) :?>
<div class="modal fade" id="deleteModal<?= $d2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Proyek/deleteProyek/'.$d2['id']); ?>" method="POST">
        <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>