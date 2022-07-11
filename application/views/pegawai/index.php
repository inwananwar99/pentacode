<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($user as $u) : ?>
        <tr>       
          <?php if($u['level'] !== 'Super' && $u['id_level'] == 4){ ?>
            <td><?= $no++;?></td>
            <td><?= $u['name'];?></td>
            <td><?= $u['email']; ?></td>
            <td><?= $u['level']; ?></td>
            <td>
              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $u['id'];?>">Ubah</a>
              <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $u['id']?>">Hapus</a>
            </td>
          <?php } ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add User -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addUser');?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama User</label>
            <select name="nama" class="form-control">
                    <option>-- Pilih Nama Pegawai --</option>
                   <?php foreach($pegawai as $p) :?>
                   <option value="<?= $p['nama_pegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
                   <?php endforeach; ?>
               </select>
          </div>
          <div class="form-group">
            <label for="">Email User</label>
            <input type="email" name="email" class="form-control" placeholder="Email User ...">
          </div>
          <div class="form-group">
            <label for="">Password User</label>
            <input type="password" name="password" class="form-control" placeholder="Password ...">
          </div>
          <div class="form-group">
            <label for="">Foto User</label>
            <input type="file" name="foto" class="form-control" placeholder="Foto User ...">
          </div>
          <div class="form-group">
          <label for="">Level</label>
               <select name="id_level" class="form-control">
                 <option>-- Pilih Level --</option>
                   <?php foreach($level as $l) :?>
                   <option value="<?= $l['id_level']; ?>"><?= $l['level']; ?></option>
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
<?php foreach ($user as $u1):?>
    <div class="modal fade" id="editModal<?= $u1['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/updateUser/'.$u1['id']);?>" method="POST">
        <div class="form-group">
            <label for="">Nama User</label>
            <select name="nama" class="form-control">
                    <option value="<?= $u['name']; ?>">-- <?= $u['name']; ?> --</option>
                   <?php foreach($pegawai as $p) :?>
                   <option value="<?= $p['nama_pegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
                   <?php endforeach; ?>
               </select>
          </div>
          <div class="form-group">
            <label for="">Email User</label>
            <input type="email" name="email" class="form-control" value="<?= $u['email']; ?>" placeholder="Email User ...">
          </div>
          <div class="form-group">
          <label for="">Level</label>
               <select name="id_level" class="form-control">
                 <option value="<?= $u['id_level']; ?>">-- <?= $u['level']; ?> --</option>
                   <?php foreach($level as $l) :?>
                   <option value="<?= $l['id_level']; ?>"><?= $l['level']; ?></option>
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
<?php foreach ($user as $d2) :?>
<div class="modal fade" id="deleteModal<?= $d2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deleteUser/'.$d2['id']); ?>" method="POST">
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