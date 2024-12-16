<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="../css/admin/kendaraan.css">
<link rel="stylesheet" href="../css/admin/popupCard.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?= base_url('js/kendaraan.js') ?>"></script>
<script src="<?= base_url('js/sweet-alert/sweetalert2.all.min.js') ?>"></script>

<div class="container-wrapper">
    <div class="container">
        <div class="popup-card">
            <div class="close"> <i data-feather="x-circle"></i> </div>

            <h1 id="popupTitle"> Data Kendaraan </h1>

            <form action="" method="post" id="form" enctype="multipart/form-data">
                <input type="hidden" id="editId" name="edit_id">

                <label for="merk_kendaraan">Kategori Kendaraan</label>
                <select id="kode_kategori" name="kode_kategori" required>
                    <?php foreach ($kategori as $row) : ?>
                        <option value="<?= $row["kode_kategori"]; ?>"><?= $row["kode_kategori"]; ?></option>
                    <?php endforeach ?>
                </select>

                <label for="merk_kendaraan">Merk Kendaraan:</label>
                <input type="text" id="merk_kendaraan" name="merk_kendaraan" required>

                <label for="varian">Varian :</label>
                <input type="text" id="varian" name="varian" required>

                <label for="kapasitas_penumpang">Kapasitas Penumpang :</label>
                <input type="text" id="kapasitas_penumpang" name="kapasitas_penumpang" required>

                <label for="tahun_produksi">Tahun Produksi:</label>
                <input type="text" id="tahun_produksi" name="tahun_produksi" required>

                <label for="nomor_polisi">Nomor Polisi:</label>
                <input type="text" id="nomor_polisi" name="nomor_polisi" required>

                <label for="harga_sewa">Harga Sewa:</label>
                <input type="text" id="harga_sewa" name="harga_sewa" required>

                <div id="fileUploadContainer">
                    <label for="gambar">Gambar:</label>
                    <div class="file-drop" id="fileDropArea">
                        <input type="hidden" id="isImageRemovedInput" name="isImageRemoved" value="0">
                        <span class="drop-text">Drop image here or click to upload</span>
                        <input type="file" name="gambar" id="gambar" class="file-input">
                        <span id="selectedFileName"></span>
                        <button type="button" id="removeFileBtn" class="remove-btn">Remove</button>
                    </div>
                </div>

                <div class="checkout">
                    <button type="submit" class="button-popup" id="submitButton"> </button>
                </div>
            </form>
        </div>

        <h1> Data Kendaraan </h1>

        <div class="table-wrapper">
            <button class="add-button">Tambah</button>

            <table class="content-table">
                <thead>
                    <th> No. </th>
                    <th> Id </th>
                    <th> Kategori </th>
                    <th> Merk </th>
                    <th> Varian </th>
                    <th> Kapasitas </th>
                    <th> Tahun Produksi </th>
                    <th> Nomor Polisi </th>
                    <th> Harga Sewa </th>
                    <th> Gambar </th>
                    <th> Aksi </th>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kendaraan as $row) : ?>
                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $row["id_kendaraan"]; ?>
                            </td>
                            <td>
                                <?= $row["kode_kategori"]; ?>
                            </td>
                            <td>
                                <?= $row["merk_kendaraan"]; ?>
                            </td>
                            <td>
                                <?= $row["varian"]; ?>
                            </td>
                            <td>
                                <?= $row["kapasitas_penumpang"]; ?>
                            </td>
                            <td>
                                <?= $row["tahun_produksi"]; ?>
                            </td>
                            <td>
                                <?= $row["nomor_polisi"]; ?>
                            </td>
                            <td>
                                <?= number_format($row["harga_sewa"]) ?>
                            </td>
                            <td>
                                <?= $row["gambar"]; ?>
                            </td>

                            <td>
                                <div class="actions">
                                    <a class="edit-button" data-id="<?= $row['id_kendaraan'] ?>" style="margin-right: 10px;">
                                        <img src="../src/icon/edit.svg" alt="Edit" width="20" height="20">
                                    </a>

                                    <a class="delete-button" href="/admin/kendaraan/deleteKendaraan/<?= $row["id_kendaraan"] ?>">
                                        <img src="../src/icon/trash.svg" alt="Delete" width="20" height="20">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>