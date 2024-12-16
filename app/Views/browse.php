<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css js -->
<link rel="stylesheet" href="css/browse.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= base_url('js/browse.js') ?>"></script>
<script src="<?= base_url('js/sweet-alert/sweetalert2.all.min.js') ?>"></script>

<script>
    var userLoggedIn = <?= json_encode($userLoggedIn); ?>;
</script>

<section class="container-wrapper">
    <section class="container">
        <h1>Browse</h1>

        <div class="reservasi-card">
            <div class="closeReservasi"> <i data-feather="x-circle"></i> </div>

            <h1> Reservasi </h1>
            <form action="/browse" method="post">

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="no_telepon">Nomor Telepon:</label>
                <input type="tel" id="no_telepon" name="no_telepon" required>

                <label for="kategori">Kategori:</label>
                <select id="kategori" name="kategori" required>
                    <?php foreach ($kendaraan as $kategoriName => $listKendaraan) : ?>
                        <?php if (!empty($listKendaraan)) : ?>
                            <option value="<?= $kategoriName; ?>"><?= $kategoriName; ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>

                <label for="pilihan_kendaraan">Kendaraan:</label>
                <select id="pilihan_kendaraan" name="pilihan_kendaraan" required>
                    <?php foreach ($kendaraan as $kategoriName => $listKendaraan) : ?>
                        <?php foreach ($listKendaraan as $row) : ?>
                            <option value="<?= $row['detail_kendaraan']; ?>">
                                <?= $row['detail_kendaraan']; ?>
                            </option>
                        <?php endforeach ?>
                    <?php endforeach ?>
                </select>

                <label for="tgl_sewa">Tanggal Sewa:</label>
                <input type="date" id="tgl_sewa" name="tgl_sewa" min="<?= date('Y-m-d'); ?>" required>

                <label for="tgl_pengembalian">Tanggal Pengembalian:</label>
                <input type="date" id="tgl_pengembalian" name="tgl_pengembalian" min="<?= date('Y-m-d'); ?>" required>

                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran">
                    <?php foreach ($metode as $metode_pembayaran) : ?>
                        <option value="<?= $metode_pembayaran ?>"><?= $metode_pembayaran ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="checkout">
                    <input type="hidden" id="total_biaya" name="total_biaya" value="0" readonly>
                    <div class="total"> 0 </div>
                    <button class="book-now"> Book now </button>
                </div>
            </form>
        </div>

        <?php foreach ($kendaraan as $kategori => $listKendaraan) : ?>
            <?php if (!empty($listKendaraan)) : ?>
                <?php
                $idKategori = str_replace(" ", "", $kategori);
                ?>

                <div id="<?= $idKategori; ?>" class="kategori">
                    <h2 class="judulKategori"><?= $kategori; ?></h2>

                    <div class="list-mobil">
                        <?php foreach ($listKendaraan as $row) : ?>
                            <div class="cardContainer">
                                <div class="card">
                                    <div class="front-card reveal-card">
                                        <div class="gambar-kendaraan">
                                            <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="Kendaraan Image">
                                        </div>

                                        <div class="detail-kendaraan">
                                            <p><?= $row['detail_kendaraan']; ?></p>
                                        </div>
                                    </div>

                                    <div class="back-card">
                                        <div class="showFrontCardButton"><i data-feather="x-circle" class="icon"></i></div>

                                        <div class="atas">
                                            <div>
                                                <h2><?= $row['detail_kendaraan']; ?></h2>
                                            </div>
                                            <div class="kapasitas">
                                                <i data-feather="user" class="icon"></i>
                                                <p><?= $row['kapasitas_penumpang']; ?></p>
                                            </div>
                                            <div class="tahun">
                                                <i data-feather="calendar" class="icon"></i>
                                                <p><?= $row['tahun_produksi']; ?></p>
                                            </div>
                                            <div class="nopol">
                                                <p><?= $row['nomor_polisi']; ?></p>
                                            </div>
                                            <div class="harga">
                                                <p class="harga-sewa" data-detail="<?= $row['detail_kendaraan']; ?>">Rp<?= number_format($row['harga_sewa']) ?> / Hari </p>
                                            </div>
                                        </div>
                                        <div class="button">
                                            <p>Pesan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach; ?>
    </section>
</section>

<script>
    $(document).ready(function() {
        $("#kategori").change(function() {
            var selectedKategori = $(this).val();
            updateDetailKendaraanOptions(selectedKategori);
        });

        $(".card").click(function() {
            var selectedKategori = $(this).closest(".kategori").find("h2.judulKategori").text();

            var selectedDetailKendaraan = $.trim($(this).find(".detail-kendaraan").text());

            $("#kategori").val(selectedKategori).change();
            $("#pilihan_kendaraan").val(selectedDetailKendaraan).change();
        });

        function updateDetailKendaraanOptions(selectedKategori) {
            $("#pilihan_kendaraan").empty();

            <?php foreach ($kendaraan as $kategoriName => $listKendaraan) : ?>
                <?php if (!empty($listKendaraan) && $kategoriName !== 'electric') : ?>
                    <?php foreach ($listKendaraan as $row) : ?>
                        if ("<?= $kategoriName ?>" === selectedKategori) {
                            var option = $("<option>")
                                .val("<?= $row['detail_kendaraan']; ?>")
                                .text("<?= $row['detail_kendaraan']; ?>")
                            $("#pilihan_kendaraan").append(option);
                        }
                    <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
        }

        var initialSelectedKategori = $("#kategori").val();

        updateDetailKendaraanOptions(initialSelectedKategori);

        $("#tgl_sewa, #tgl_pengembalian, #kategori, #pilihan_kendaraan").change(function() {
            var selectedTanggalSewa = $("#tgl_sewa").val();
            var selectedTanggalPengembalian = $("#tgl_pengembalian").val();
            var selectedKategori = $("#kategori").val();
            var selectedDetailKendaraan = $("#pilihan_kendaraan").val();

            if (selectedTanggalSewa && selectedTanggalPengembalian) {
                var diffInDays = Math.ceil((new Date(selectedTanggalPengembalian) - new Date(selectedTanggalSewa)) / (1000 * 60 * 60 * 24));

                var rentalPrice = getRentalPrice(selectedKategori, selectedDetailKendaraan);

                var totalPrice = diffInDays * rentalPrice;

                var formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: totalPrice % 1 === 0 ? 0 : 2
                });

                $(".total").text(formatter.format(totalPrice));
                $("#total_biaya").val(totalPrice);
            } else {
                $(".total").text("0");
            }
        });

        function getRentalPrice(kategori, detailKendaraan) {
            var hargaSewaText = $(".harga-sewa[data-detail='" + detailKendaraan + "']").text();
            
            var numericHargaSewa = parseFloat(hargaSewaText.replace(/[^\d]/g, ''));

            return numericHargaSewa;
        }
    });
</script>

<?= $this->endSection(); ?>