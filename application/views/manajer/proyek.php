<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Proyek</th>
            <th>Rekomendasi</th>
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
                  <?php }else{?>
                    <td><?= 'Sudah memilih rekomendasi'; ?></td>
                  <?php }?>
                  <td><?= $d['status_proyek']; ?></td>
                  <td>
                  <a href="#" class="btn btn-warning" id="detail" data-toggle="modal" data-user1="<?= $d['id_user1']; ?>" data-user2="<?= $d['id_user2']; ?>" data-user3="<?= $d['id_user3']; ?>" data-target="#detailModal<?= $d['id_proyek']?>">Detail</a>
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
                <option>Coming Soon</option>
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
            <?php
        $data = $this->db->query("SELECT * FROM cf_sf JOIN users ON cf_sf.id_user = users.id WHERE users.id_proyek2 IS NULL ORDER BY cf_sf.final_result DESC");
            if($data->num_rows()== 0){ ?>
            <p>Belum ada karyawan yang direkomendasikan!</p>
            <?php }else{ ?>
              <p>Apakah anda yakin ingin memilih pegawai ini?</p>
              <?php $no=1;
                  foreach($factor as $f){ 
                      ?>
                    <p><?= 'Rank '.$no.' - '.$f['name'].'(PIC)';?></p>
                    <input type="hidden" class="form-control" name="id_user<?= $no++;?>" value="<?= $f['id_user']; ?>">
              <?php }  
            }?>
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

<!-- Modal Detail Proyek -->
<?php foreach ($proyek as $p3) :?>
<div class="modal fade" id="detailModal<?= $p3['id_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-s" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Detail Proyek <?= $p3['nama_proyek'].' ('.$p3['status_proyek'].')';?></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <h5>

<?php $p3['id_proyek'];
  $user1 = $p3['id_user1'];
  $user2 = $p3['id_user2'];
  $user3 = $p3['id_user3'];

  $nama_user1 = $this->db->get_where ('users', array('id' => $user1))->row();
  $nama_user2 = $this->db->get_where ('users', array('id' => $user2))->row();
  $nama_user3 = $this->db->get_where ('users', array('id' => $user3))->row();
// var_dump($nama_user3);
?>
<div>
  <form>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Proyek</label>
      <div class="col-sm-10">
        <input type="readonly" readonly class="form-control-plaintext" id="staticEmail" value=" <?= $p3['nama_proyek']?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi Proyek</label>
      <div class="col-sm-10">
        <input type="readonly" readonly class="form-control" value=" <?= $p3['ket_proyek']?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Awal</label>
      <div class="col-sm-10">
        <input type="readonly" readonly class="form-control" value=" <?= $p3['tgl_awal_proyek']?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Akhir</label>
      <div class="col-sm-10">
        <input type="readonly" readonly class="form-control" value=" <?= $p3['tgl_akhir_proyek']?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Team Proyek</label>
      <div class="col-sm-10">
        <?php if($p3['id_user1']==NULL){ ?>
          <p>Silahkan pilih rekomendasi terlebih dahulu</p>
        <?php }else{ ?>
        <ul >
          <li><?= $nama_user1->name ?></li>
          <li><?= $nama_user2->name ?></li>
          <li><?= $nama_user3->name ?></li>
        </ul>
        <?php } ?>
      </div>
    </div>

  </form>
</div>
</h5>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
  </div>
</div>
</div>
<?php endforeach;?>

<?php foreach($proyek as $proy):?>
  <!-- Modal Edit User -->
<div class="modal fade" id="editModal<?= $proy['id_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Proyek</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Proyek/updateProyek/'.$proy['id_proyek']);?>" method="POST">
            <div class="form-group">
               <label for="">Nama Proyek</label>
               <input type="text" name="nama" class="form-control" value="<?= $proy['nama_proyek'];?>" autofocus> 
            </div>
            <div class="form-group">
               <label for="">Keterangan Proyek</label>
              <textarea name="ket_proyek" class="form-control"><?= $proy['ket_proyek'];?></textarea>
            </div>
            <div class="form-group">
              <label for="">Tanggal Awal Proyek</label>
              <input type="date" name="tgl_awal_proyek" class="form-control" value="<?= $proy['tgl_awal_proyek'];?>">
            </div>
            <div class="form-group">
              <label for="">Tanggal Akhir Proyek</label>
              <input type="date" name="tgl_akhir_proyek" class="form-control" value="<?= $proy['tgl_akhir_proyek'];?>">
            </div>
            <div class="form-group">
              <label for="">Status Proyek</label>
              <select name="status_proyek" class="form-control">
                <option value="<?= $proy['status_proyek'];?>">-- <?= $proy['status_proyek'];?> --</option>
                <option>Coming Soon</option>
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
<?php endforeach; ?>

<?php foreach($proyek as $proy1):?>
  <!-- Modal Delete Proyek -->
<div class="modal fade" id="deleteModal<?= $proy1['id_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-s" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Hapus Proyek</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Proyek/deleteProyek/'.$proy1['id_proyek']);?>" method="POST">
          <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach; ?>
