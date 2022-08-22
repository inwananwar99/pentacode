<a href="<?= base_url('Promosi/saw'); ?>" class="btn btn-success mb-3">Perangkingan</a>
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
        $no=1;
        foreach($promosi as $p): ?>
            <tr>       
                <td><?= $no++; ?></td>
                <td><?= $p['jabatan_baru']; ?></td>
                <td><a href="<?= base_url('Promosi/detailPromosi/'.$p['jabatan_baru']); ?>" class="btn btn-warning ml-3">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

