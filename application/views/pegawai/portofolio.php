<?php if($portofolio == NULL){?>
  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah</a>
  <p class="text-center mt-3 text-bold">Belum Ada Deskripsi Tentang Anda. Silahkan Tambah Deskripsi Pribadi Anda</p>
  <?php }else{?>
    <?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
      <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($portofolio as $port) { ?>
        <tr>       
          <td><?= $this->session->userdata('name'); ?></td>
          <td><?= $port['deskripsi'];?></td>
          <td>
            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Ubah</a>
            <a href="<?= base_url('User/detailPortfolio'); ?>" class="btn btn-info">Detail</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php }?>

  <!-- Modal Add -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Deskripsi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/updatePortfolio/');?>" method="POST">
            <div class="form-group">
               <label for="">Deskripsi</label>
               <textarea name="desc" class="form-control"></textarea>
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

<!-- Modal Update -->

<?php foreach($portofolio as $port1):?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Deskripsi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/updatePortfolio/');?>" method="POST">
            <div class="form-group">
               <label for="">Deskripsi</label>
               <textarea name="desc" class="form-control"><?= $port1['deskripsi'];?></textarea>
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
