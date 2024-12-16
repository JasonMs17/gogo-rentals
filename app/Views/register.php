<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css -->
<link rel="stylesheet" href="css/register.css">
<title>Signup Page</title>

<!-- body -->
<section>
    <div class="banner">
        <h1> GoGo Rentals</h1>
    </div>

    <div class="wrapper">
        <div class="title">
            <p>Already have an account? <a href="<?= base_url('/login'); ?>">Login <u>here</u></a></p>
        </div>

        <form action="/register" method="post">
            <p> Username </p> <input type="text" name="username" value="<?= set_value('username') ?>" required>

            <?php if (isset($validation)) : ?>
                <div class="validation-errors">
                    <p><?= $validation->showError('username') ?></p>
                </div>
            <?php endif; ?>

            <p> Password </p> <input type="password" name="password" required value="<?= set_value('password') ?>">
            <p> Konfirmasi Password </p> <input type="password" name="pass_confirm" required>

            <?php if (isset($validation)) : ?>
                <div class="validation-errors">
                    <p><?= $validation->showError('pass_confirm') ?></p>
                </div>
            <?php endif; ?>

            <p> Nama Lengkap </p> <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" required>
            <p> Alamat </p>
            <textarea name="alamat" id="" cols="30" rows="10" required><?= set_value('alamat') ?></textarea>
            <p> Nomor Telepon </p> <input type="number" name="no_telepon" value="<?= set_value('no_telepon') ?>" required>

            <button type="submit">Register</button>
        </form>
    </div>

</section>

<?= $this->endSection(); ?>
<?php $this->setData(['hideFooter' => true]); ?>
