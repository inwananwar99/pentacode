<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Proyek</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($join as $j) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $j['name'];?></td>
            <td><?= $j['id_proyek'];?></td>
            <td><?= $j['status'];?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>