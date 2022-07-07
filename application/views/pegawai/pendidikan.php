<?php if($this->session->userdata('role')!=='Manajer'){?>
  <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?php }?>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <?php if($this->session->userdata('role')=='Manajer'){?>
              <th>Nama</th>
            <?php }?>
            <th>Jenjang Pendidikan</th>
            <th>Gelar Pendidikan</th>
            <th>Bidang Studi</th>
            <th>Perguruan Tinggi</th>
            <th>Tahun Lulus</th>
            <th>Lampiran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($pendidikan as $d):?>
        <tr>       
            <td><?= $no++; ?></td>
            <?php if($this->session->userdata('role')=='Manajer'){?>
              <td><?= $d['name'];?></td>
            <?php }?>
            <td><?= $d['jenjang']; ?></td>
            <td><?= $d['gelar']; ?></td>
            <td><?= $d['bidang_studi']; ?></td>
            <td><?= $d['perguruan_tinggi']; ?></td>
            <td><?= $d['thn_lulus']; ?></td>
            <td><a href="<?= base_url('assets/img/pegawai/pendidikan/'.$d['lampiran']); ?>" target="_blank"><?= $d['lampiran'];?></a></td>
            <?php if($this->session->userdata('role') == 'Pegawai'){ ?>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['id_pendidikan']; ?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['id_pendidikan']; ?>">Hapus</a>
            </td>
            <?php }else{ ?>
              <td>
                <form action="<?= base_url('User/validasiBerkas/'.'pendidikan'.'/'.$d['id_pendidikan']);?>" method="POST">
                  <input type="hidden" name="status" value="Disetujui">
                  <button type="submit" class="btn btn-info">Validasi</button>
                </form>
              </td>
            <?php } ?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/addPendidikan');?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="">Jenjang Pendidikan</label>
              <select name="jenjang" class="form-control">
                <option>-- Pilih Jenjang --</option>
                <option>Diploma</option>
                <option>Sarjana</option>
                <option>Magister</option>
                <option>Doktoral</option>
              </select>
            </div>
            <div class="form-group">
               <label for="">Gelar Pendidikan</label>
               <select name="gelar" class="form-control">
                <option>-- Pilih Gelar --</option>
                <option>Ahli Madya</option>
                <option>Sarjana Terapan</option>
                <option>Sarjana</option>
                <option>Magister</option>
                <option>Doktor</option>
              </select> 
            </div>
            <div class="form-group">
               <label for="">Bidang Studi</label>
               <input type="text" name="bidang_studi" class="form-control" placeholder="Bidang Studi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Perguruan Tinggi</label>
               <input type="text" name="pt" class="form-control" placeholder="Perguruan Tinggi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Tahun Lulus</label>
               <input type="text" name="tahun" class="form-control" placeholder="Tahun Lulus ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Lampiran Ijazah/Sertifikat</label>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran ..." autofocus> 
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
</div>
<!-- Modal Update-->
<?php foreach ($pendidikan as $d1):?>
    <div class="modal fade" id="editModal<?= $d1['id_pendidikan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Pendidikan Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/updatePendidikan/'.$d1['id_pendidikan']);?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
               <label for="">Jenjang Pendidikan</label>
              <select name="jenjang" class="form-control">
                <option value="<?= $d1['jenjang']; ?>">-- <?= $d1['jenjang']; ?> --</option>
                <option>Diploma</option>
                <option>Sarjana</option>
                <option>Magister</option>
                <option>Doktoral</option>
              </select>
            </div>
            <div class="form-group">
               <label for="">Gelar Pendidikan</label>
               <select name="gelar" class="form-control">
                <option value="<?= $d1['gelar']; ?>">-- <?= $d1['gelar']; ?> --</option>
                <option>Ahli Madya</option>
                <option>Sarjana Terapan</option>
                <option>Sarjana</option>
                <option>Magister</option>
                <option>Doktor</option>
              </select> 
            </div>
            <div class="form-group">
               <label for="">Bidang Studi</label>
               <input type="text" name="bidang_studi" class="form-control" value="<?= $d1['bidang_studi']; ?>" placeholder="Bidang Studi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Perguruan Tinggi</label>
               <input type="text" name="pt" class="form-control" value="<?= $d1['perguruan_tinggi']; ?>" placeholder="Perguruan Tinggi ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Tahun Lulus</label>
               <input type="text" name="tahun" class="form-control" value="<?= $d1['thn_lulus']; ?>" placeholder="Tahun Lulus ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Lampiran Ijazah/Sertifikat</label>
               <input type="file" name="lampiran" class="form-control" placeholder="Lampiran ..." autofocus>
               <input type="hidden" name="status" value="<?= $d1['status']; ?>">
               <br>
               <p><?= $d1['lampiran']; ?></p> 
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
</div>
<?php endforeach;?>

<!-- Modal Hapus -->
<?php foreach ($pendidikan as $d2) :?>
<div class="modal fade" id="deleteModal<?= $d2['id_pendidikan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deletePendidikan/'.$d2['id_pendidikan']); ?>" method="POST">
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