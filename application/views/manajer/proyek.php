<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Proyek</th>
            <th>Nama Pegawai</th>
            <th>Status Proyek</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
            foreach ($proyek as $d) : ?>
              <tr>       
                  <td><?= $no++;?></td>
                  <td><?= $d['nama_proyek'];?></td>
                  <?php if($d['id_user1']==NULL){ ?>
                  <td><button class="btn btn-info" data-toggle="modal" data-target="#recommendModal<?= $d['id_proyek'];?>">Rekomendasi</button></td>
                  <?php }else{ ?>
                    <td><?= $d['name'];?></td>
                  <?php } ?>
                  <td><?= $d['status_proyek']; ?></td>
                  <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['id_proyek'];?>">Ubah</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['id_proyek']?>">Hapus</a>
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
               <label for="">Keterangan Proyek</label>
              <textarea name="ket_proyek" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="">Status Pegawai</label>
              <select name="status_pegawai" class="form-control">
                <option>-- Pilih Status --</option>
                <option>Jasbor</option>
                <option>Fungsional</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tanggal Awal Proyek</label>
              <input type="date" name="tgl_awal_proyek" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Tanggal Akhir Proyek</label>
              <input type="date" name="tgl_akhir_proyek" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Status Proyek</label>
              <select name="status_proyek" class="form-control">
                <option>-- Pilih Status --</option>
                <option>On Progress</option>
                <option>Finish</option>
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

<!-- Rekomendasi -->
<?php foreach ($proyek as $p2) :?>
<div class="modal fade" id="recommendModal<?= $p2['id_proyek']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Rekomendasi Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Proyek/rekomendasi/'.$p2['id_proyek']); ?>" method="POST">
        <div class="modal-body">
            <p>Apakah anda yakin ingin memilih pegawai ini?</p>
            <?php
                $no=1;
                    foreach($factor as $f){ ?>
                    <p><?= 'Rank '.$no.' - '.$f['name'].'(PIC)';?></p>
                    <input type="hidden" class="form-control" name="id_user<?= $no++;?>" value="<?= $f['id_user']; ?>">
                <?php } ?>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pilih</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>