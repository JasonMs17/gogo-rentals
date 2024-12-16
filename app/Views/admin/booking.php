<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('css/admin/booking.css'); ?>">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?= base_url('js/sweet-alert/sweetalert2.all.min.js') ?>"></script>

<section>
    <h1>EDIT BOOKING</h1>
    <?php foreach ($booking as $status => $daftarBooking) : ?>
        <?php if (!empty($status)) : ?>
            <div class="kategori">
                <h2 class="
                <?php if ($status == "Menunggu konfirmasi") { ?>
                                warna-menunggu
                            <?php } else if ($status == "Sukses") { ?>
                                warna-berhasil
                            <?php } else if ($status == "Gagal") { ?>
                                warna-gagal
                            <?php } ?>
                "><?= $status; ?></h2>

                <div class="list-booking">
                    <?php foreach ($daftarBooking as $row) : ?>
                        <div class="card
                            <?php if ($status == "Menunggu konfirmasi") { ?>
                                bayangan-menunggu
                            <?php } else if ($status == "Sukses") { ?>
                                bayangan-berhasil
                            <?php } else if ($status == "Gagal") { ?>
                                bayangan-gagal
                            <?php } ?>
                        " data-booking-id="<?= $row['id_booking']; ?>">

                            <div class="atas">
                                <p id="id-booking"><?= $row['id_booking']; ?></p>

                                <div class="gambar-kendaraan">
                                    <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="Kendaraan Image">
                                </div>

                                <p id="detail-kendaraan"><?= $row['detail_kendaraan']; ?></p>
                                <p id="id-kendaraan"><?= $row['id_kendaraan']; ?></p>
                                <p><?= $row['username']; ?> / <?= $row['nomor_polisi']; ?>
                                <p>
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
                                <p>Rp<?= number_format($row["total_biaya"]); ?></p>

                            </div>


                            <select name="status" id="status" onchange="updateStatus(event)">
                                <option value="Menunggu Konfirmasi" <?= ($row['status'] == 'Menunggu Konfirmasi') ? 'selected' : ''; ?>>Menunggu Konfirmasi</option>
                                <option value="Gagal" <?= ($row['status'] == 'Gagal') ? 'selected' : ''; ?>>Gagal</option>
                                <option value="Sukses" <?= ($row['status'] == 'Sukses') ? 'selected' : ''; ?>>Sukses</option>
                            </select>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach; ?>
</section>

<script>
    function updateStatus(event) {
        var dropdown = $(event.target);
        var selectedOption = dropdown.val();

        var card = dropdown.closest('.card');
        var bookingId = card.data('booking-id');

        if (selectedOption === 'Gagal') {
            Swal.fire({
                title: 'Alasan',
                input: 'text',
                inputPlaceholder: 'Deskripsi',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    var deskripsi = result.value;
                    updateBookingStatus(bookingId, selectedOption, deskripsi);
                } else {
                    location.reload();
                }
            });
        } else {
            var deskripsi = ''; 
            updateBookingStatus(bookingId, selectedOption, deskripsi);
        }

        function updateBookingStatus(bookingId, status, deskripsi) {
        $.ajax({
            url: 'update-status',
            method: 'POST',
            data: {
                id_booking: bookingId,
                status: status,
                deskripsi: deskripsi, 
            },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
    }
</script>



<?= $this->endSection(); ?>