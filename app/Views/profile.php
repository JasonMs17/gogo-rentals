<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css -->
<link rel="stylesheet" href="css/register.css">
<title>Signup Page</title>

<!-- body -->
<section>
    <div class="banner">
        <h1> Edit Profile </h1>
    </div>

    <div class="wrapper">
        <form action="profile" method="post">

            <p> Username </p> <input class="read-only" type="text" name="username" value="<?= $user['username']; ?>" required readonly>
            <p> Nama Lengkap </p> <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
            <p> Alamat </p>
            <textarea name="alamat" id="" cols="30" rows="10" required><?= $user['alamat'] ?></textarea>
            <p> Nomor Telepon </p> <input type="number" name="no_telepon" value="<?= $user['no_telepon']; ?>" required>

            <button type="submit">Save</button>

            <a href="<?= base_url('/logout'); ?>"> Logout </a>
        </form>

    </div>

</section>

<?= $this->endSection(); ?>
<?php $this->setData(['hideFooter' => true]); ?>