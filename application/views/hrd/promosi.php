<a href="<?= base_url('Promosi/saw'); ?>" class="btn btn-success mb-3">Perangkingan</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Tanggal Bergabung</th>
            <th>Portofolio</th>
            <th>Surat Pengajuan</th>
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
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>