<a href="<?= base_url('Promosi/saw/'.$new_jabatan); ?>" class="btn btn-success mb-3">Perangkingan</a>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Tanggal Bergabung</th>
            <th>Portofolio</th>
            <th>Surat Pengajuan</th>
            <th>Status Promosi</th>
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
                <?php if($p['status'] == TRUE){?>
                    <td>Terpilih</td>
                    <?php }else{?>
                      <td>Belum Terpilih</td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

