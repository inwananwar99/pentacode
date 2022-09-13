<?php
$no =1;
foreach($rank as $r){
    echo 'No.'.$no++.' '.$r['name'].' '.$r['nilai'],'<br>';
}
?>

<div class="row mt-3">
    <div class="col-md-4">
        <form action="<?= base_url('Promosi/updateJabatan/'.$jab_baru.'/'.$id_promosi[0]['id_promosi']); ?>" method="POST">
            <input type="hidden" name="status" value="TRUE">
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>