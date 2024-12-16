<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css -->
<link rel="stylesheet" href="css/myBooking.css">


<!-- body -->
<section class="container">
    <h1>My Booking</h1>
    <div class="kotak">
        <?php foreach ($userBooking as $row) : ?>
            <div class="card 
            <?php if ($row['status'] == "Menunggu Konfirmasi") { ?>
                                bayangan-menunggu
                            <?php } else if ($row['status'] == "Sukses") { ?>
                                bayangan-berhasil
                            <?php } else if ($row['status'] == "Gagal") { ?>
                                bayangan-gagal
                            <?php } ?>
            ">

                <p id="id-booking"><?= $row['id_booking']; ?></p>
                <p><?= $row['status']; ?></p>
                <div class="gambar-kendaraan">
                    <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="Kendaraan Image">
                </div>
                <p id="detail-kendaraan"><?= $row['detail_kendaraan']; ?></p>
                <p id="nomor-polisi"><?= $row['nomor_polisi']; ?></p>
                <p><?= $row['no_telepon']; ?></p>
                <div class="durasi">
                    <div class="ket">
                        <p>From : </p>
                        <p>Until : </p>
                    </div>
                    <div class="waktu">
                        <p><?= $row['tanggal_sewa']; ?></p>
                        <p><?= $row['tanggal_pengembalian']; ?></p>
                    </div>
                </div>

                <p><?= $row['metode_pembayaran']; ?></p>
                <p>Rp<?= number_format($row['total_biaya']); ?></p>
                
                <p style="color: #f52222cc;"><?= $row['deskripsi']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection(); ?>