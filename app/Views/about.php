<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="css/about.css">
<div class="about">

    <section class="about-us">
        <div class="gambar"></div>
        <div class="tulisan">
            <h2>About Us</h2>
            <p>GogoRentals adalah platform rental mobil yang menyediakan layanan praktis untuk memenuhi kebutuhan transportasi pengguna. Dengan berbagai pilihan mobil yang berkualitas, pengguna dapat dengan mudah menemukan kendaraan yang sesuai dengan preferensi dan anggaran pengguna.</p>
            <p>Proses pemesanan di GogoRentals sangat mudah. Pengguna cukup mengikuti beberapa langkah sederhana untuk memiliki kendaraan pilihan tanpa kesulitan. GogoRentals menjamin kualitas mobil yang disediakan, dengan fokus utama pada keamanan dan kenyamanan pengguna.</p>
        </div>
    </section>
    <section class="members">
        <h2>Members</h2>
        <div class="member-list">
            <div class="member">
                <div class="gambar-member" id="ichsan"></div>
                <p>Muhammad Ichsan Firdaus</p>
                <p>140810220025</p>
            </div>
            <div class="member">
                <div class="gambar-member" id="vernan"></div>
                <p>Vernandika Stanley Hansen</p>
                <p>140810220031</p>
            </div>
            <div class="member">
                <div class="gambar-member" id="jason"></div>
                <p>Jason Natanael Krisyanto</p>
                <p>140810220051</p>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>