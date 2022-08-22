<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
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
                <td><?= $p['tgl_bergabung']; ?></td>
                <td><a href="<?= base_url('User/detailPortfolio/'.$p['id_user']); ?>" class="btn btn-info">Detail</a></td>
                <td><a href="<?= base_url('assets/upload/manajer/'.$p['surat_pengajuan']); ?>"><?= $p['surat_pengajuan']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

