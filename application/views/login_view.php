<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body class="bg-info">
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 100px;">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Login Panel</h3>
                    <p class="text-center">Silahkan login terlebih dahulu!</p>
                    <?= $this->session->flashdata('message')?>
                    <form action="<?= base_url('Welcome/do_login')?>" method="POST">
                        <div class="form-group">
                            <label for="">Email</label>
                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email')?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                            <input type="password" name="password" class="form-control" value="<?= set_value('password')?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>