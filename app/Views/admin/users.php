<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('css/admin/user.css') ?>">

<div class="container">

    <h1> Data Users </h1>
    
    <div class="table-wrapper">
        <table class="content-table">
            <thead>
                <th> No </th>
                <th> Username </th>
                <th> Nama Lengkap </th>
                <th> Alamat </th>
                <th> No Telepon </th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $row["username"]; ?>
                    </td>
                    <td>
                        <?= $row["nama_lengkap"]; ?>
                    </td>
                    <td>
                        <?= $row["alamat"]; ?>
                    </td>
                    <td>
                        <?= $row["no_telepon"]; ?>
                    </td>
                </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>