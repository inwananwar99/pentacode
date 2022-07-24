<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($jabatan as $j) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $j['nama_jabatan'];?></td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $j['id_jabatan'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $j['id_jabatan']?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add Level -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addJabatan');?>" method="POST">
            <div class="form-group">
               <label for="">Nama Jabatan</label>
               <input type="text" name="jabatan" class="form-control" placeholder="Jabatan Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Deskripsi Pekerjaan</label>
                <textarea name="desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="">Level Pegawai</label>
                <select name="id_level" class="form-control">
                    <option>-- Pilih Level --</option>
                <?php foreach($level as $l): ?>
                    <option value="<?= $l['id_level']?>"><?= $l['level']?></option>
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
<?php foreach ($jabatan as $j1):?>
    <div class="modal fade" id="editModal<?= $j1['id_jabatan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Jabatan Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/updateJabatan/'.$j1['id_jabatan']);?>" method="POST">
            <div class="form-group">
               <label for="">Nama Jabatan</label>
               <input type="text" name="jabatan" class="form-control" value="<?= $j1['nama_jabatan']; ?>" placeholder="Jabatan Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Deskripsi Pekerjaan</label>
                <textarea name="jobdesc" class="form-control"><?= $j1['jobdesc']; ?></textarea>
            </div>
            <div class="form-group">
               <label for="">Level Pegawai</label>
                <select name="id_level" class="form-control">
                    <option value="<?= $j1['id_level']; ?>">-- <?= $j1['level']; ?> --</option>
                <?php foreach($level as $l): ?>
                    <option value="<?= $l['id_level']?>"><?= $l['level']?></option>
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
<?php foreach ($jabatan as $j2) :?>
<div class="modal fade" id="deleteModal<?= $j2['id_jabatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deleteJabatan/'.$j2['id_jabatan']); ?>" method="POST">
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