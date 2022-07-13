<a class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Prestasi</th>
            <th>Bidang</th>
            <th>Tahun Prestasi</th>
            <th>Status</th>
            <th>File Lampiran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($prestasi as $p) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $p['nama_prestasi'];?></td>
            <td><?= $p['bidang'];?></td>
            <td><?= $p['tahun'];?></td>
            <?php if($p['status'] == 'Disetujui'){ ?>
              <td><button class="btn btn-success"><?= $p['status']; ?></button></td>
              <?php }else{ ?>
                <td><button class="btn btn-danger"><?= $p['status']; ?></button></td>
            <?php } ?>
            <td><a href="<?= base_url('assets/img/pegawai/prestasi/'.$p['lampiran']); ?>" target="_blank"><?= $p['lampiran'];?></a></td>
            <?php if($this->session->userdata('role') == 'Pegawai'){ ?>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $p['id_prestasi'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $p['id_prestasi']?>">Hapus</a>
            </td>
            <?php }else{ ?>
              <td>
                <?php if($p['status'] == 'Disetujui'){ ?>
                  <button class="btn btn-info" disabled>Validasi</button>
                  <?php }else{ ?>
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#validateModal<?= $p['id_prestasi']?>">Validasi</a>
                <?php } ?>
                <div class="modal fade" id="validateModal<?= $p['id_prestasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?= base_url('User/validasiBerkas/'.'prestasi'.'/'.$p['id_prestasi']);?>" method="POST">
                        <div class="modal-body">
                          <button type="submit" value="Ditolak" name="status" class="btn btn-danger">Tolak</button>
                          <button type="submit" value="Disetujui" name="status" class="btn btn-success">Setujui</button>
                        </div>
                        </form>
                      </div>
                </div>
                </div>
              </td>
            <?php } ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add Level -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Prestasi/addPrestasi');?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="">Nama Prestasi</label>
               <input type="text" name="nama" class="form-control" placeholder="Nama Prestasi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Bidang</label>
               <input type="text" name="bidang" class="form-control" placeholder="Bidang ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Tahun Prestasi</label>
               <input type="text" name="tahun" class="form-control" placeholder="Tahun Prestasi ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Lampiran Prestasi</label>
               <p class="text-red"><i>*Lampiran harus berupa file pdf</i></p>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran Prestasi ..." autofocus>
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
<?php foreach ($prestasi as $p1):?>
    <div class="modal fade" id="editModal<?= $p1['id_prestasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Prestasi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('Prestasi/updatePrestasi/'.$p1['id_prestasi']);?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="">Nama Prestasi</label>
               <input type="text" name="nama" value="<?= $p1['nama_prestasi']; ?>" class="form-control" placeholder="Nama Prestasi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Bidang</label>
               <input type="text" name="bidang" value="<?= $p1['bidang']; ?>" class="form-control" placeholder="Bidang ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Tahun Prestasi</label>
               <input type="text" name="tahun" value="<?= $p1['tahun']; ?>" class="form-control" placeholder="Tahun Prestasi ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Lampiran Prestasi</label>
               <p class="text-red"><i>*Lampiran harus berupa file pdf</i></p>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran Prestasi ..." autofocus>
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
<?php foreach ($prestasi as $p2) :?>
<div class="modal fade" id="deleteModal<?= $p2['id_prestasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Prestasi/deletePrestasi/'.$p2['id_prestasi']); ?>" method="POST">
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