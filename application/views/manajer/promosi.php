<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Tanggal Bergabung</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1;
        foreach($promosi as $p): ?>
            <tr>       
                <td><?= $no++; ?></td>
                <td><?= $p['name']; ?></td>
                <td><?= $p['jabatan']; ?></td>
                <td><?= $p['tgl_bergabung']; ?></td>
                <td>
                <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#editModal<?= $p['id_promosi'];?>">Ubah</a>
                  <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#deleteModal<?= $p['id_promosi'];?>">Hapus</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan Promosi Jabatan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Promosi/addPengajuan');?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <input type="hidden" name="id_manajer" class="form-control" value="<?= $this->session->userdata('id');?>"> 
            </div>
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <select name="id_pegawai" class="form-control">
                   <option>-- Pilih Pegawai --</option>
                   <?php foreach($user as $u):?>
                        <option value="<?= $u['id']?>"><?= $u['name']?></option>
                    <?php endforeach;?>
               </select>
            </div>
            <div class="form-group">
               <label for="">Jabatan</label>
               <input type="text" name="jabatan_pegawai" class="form-control" placeholder="Jabatan Pegawai ..." > 
            </div>
            <div class="form-group">
               <label for="">Tanggal Bergabung</label>
               <input type="date" name="tgl" class="form-control" placeholder="Tanggal Bergabung ..." > 
            </div>
            <div class="form-group">
               <label for="">Portofolio</label>
               <input type="file" name="portofolio" class="form-control" placeholder="Portofolio ..." > 
            </div>
            <div class="form-group">
               <label for="">Jabatan Baru</label>
               <input type="text" name="jabatan_baru" class="form-control" placeholder="Jabatan Baru ..." > 
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
<?php foreach ($promosi as $l1):?>
    <div class="modal fade" id="editModal<?= $l1['id_promosi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Promosi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('Promosi/updatePengajuan/'.$l1['id_promosi']);?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <input type="hidden" name="id_manajer" class="form-control" value="<?= $this->session->userdata('id');?>"> 
            </div>

            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <select name="id_pegawai" class="form-control">
                   <option value="<?= $l1['id']; ?>">-- <?= $l1['name']; ?> --</option>
                   <?php foreach($user as $u):?>
                        <option value="<?= $u['id']?>"><?= $u['name']?></option>
                    <?php endforeach;?>
               </select>
            </div>
            <div class="form-group">
               <label for="">Jabatan</label>
               <input type="text" name="jabatan_pegawai" class="form-control" value="<?= $l1['jabatan']; ?>" placeholder="Jabatan Pegawai ..." > 
            </div>
            <div class="form-group">
               <label for="">Tanggal Bergabung</label>
               <input type="date" name="tgl" class="form-control" value="<?= $l1['tgl_bergabung']; ?>" placeholder="Tanggal Bergabung ..." > 
            </div>
            <div class="form-group">
               <label for="">Portofolio</label>
               <input type="file" name="portofolio" class="form-control" placeholder="Portofolio ..." > 
            </div>
            <?= $l1['portofolio']; ?>
            <div class="form-group">
               <label for="">Jabatan Baru</label>
               <input type="text" name="jabatan_baru" class="form-control" value="<?= $l1['jabatan_baru']; ?>" placeholder="Jabatan Baru ..." > 
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
<?php foreach ($promosi as $l2) :?>
<div class="modal fade" id="deleteModal<?= $l2['id_promosi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Promosi/deletePengajuan/'.$l2['id_promosi']); ?>" method="POST">
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