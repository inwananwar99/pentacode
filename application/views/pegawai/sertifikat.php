<a class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Jenis Sertifikat</th>
            <th>Bidang Studi</th>
            <th>Tahun Sertifikat</th>
            <th>Status</th>
            <th>File Lampiran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($sertifikat as $s) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $s['jenis_sert'];?></td>
            <td><?= $s['bidang_studi'];?></td>
            <td><?= $s['thn_sert'];?></td>
            <?php if($s['status'] == 'Disetujui'){ ?>
              <td><button class="btn btn-success"><?= $s['status']; ?></button></td>
              <?php }else{ ?>
                <td><button class="btn btn-danger"><?= $s['status']; ?></button></td>
            <?php } ?>
            <td><a href="<?= base_url('assets/img/pegawai/sertifikat/'.$s['lampiran']); ?>" target="_blank"><?= $s['lampiran'];?></a></td>
            <?php if($this->session->userdata('role') == 'Pegawai'){ ?>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $s['id_sert'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $s['id_sert']?>">Hapus</a>
            </td>
            <?php }else{ ?>
              <td>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#validateModal<?= $s['id_sert']?>">Validasi</a>
                <div class="modal fade" id="validateModal<?= $s['id_sert']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?= base_url('User/validasiBerkas/'.'sertifikat'.'/'.$s['id_sert']);?>" method="POST">
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Sertifikat</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Sertifikat/addSertifikat');?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="">Jenis Sertifikat</label>
               <input type="text" name="jenis" class="form-control" placeholder="Jenis Sertifikat ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Bidang Studi</label>
               <input type="text" name="bidang_studi" class="form-control" placeholder="Bidang Studi ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Tahun Sertifikat</label>
               <input type="text" name="tahun" class="form-control" placeholder="Tahun Sertifikat ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Lampiran Sertifikat</label>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran Sertifikat ..." autofocus>
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
<?php foreach ($sertifikat as $s1):?>
    <div class="modal fade" id="editModal<?= $s1['id_sert']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Sertifikat</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('Sertifikat/updateSertifikat/'.$s1['id_sert']);?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="">Jenis Sertifikat</label>
               <input type="text" name="jenis" value="<?= $s1['jenis_sert']; ?>" class="form-control" placeholder="Jenis Sertifikat ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Bidang Studi</label>
               <input type="text" name="bidang_studi" value="<?= $s1['bidang_studi']; ?>" class="form-control" placeholder="Bidang Studi ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Tahun Sertifikat</label>
               <input type="text" name="tahun" value="<?= $s1['thn_sert']; ?>" class="form-control" placeholder="Tahun Sertifikat ..." autofocus>
            </div>
            <div class="form-group">
               <label for="">Lampiran Sertifikat</label>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran Sertifikat ..." autofocus>
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
<?php foreach ($sertifikat as $s2) :?>
<div class="modal fade" id="deleteModal<?= $s2['id_sert']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Sertifikat/deleteSertifikat/'.$s2['id_sert']); ?>" method="POST">
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