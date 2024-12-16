<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('css/admin/dashboard.css'); ?>">

<section>
    <h1>Dashboard</h1>
    <div class="kotak">
        <div class="card">
            <div class="icon" id="user">
                <!-- <img src="/img/user.png" alt="user"> -->
            </div>
            <div class="deskripsi">
                <h3><?= $jumlahUser;?></h3>
                <p> User </p>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="booking"></div>
            <div class="deskripsi">
                <h3><?= $jumlahBooking ?></h3>
                <p>Booking</p>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="kendaraan"></div>
            <div class="deskripsi">
                <h3><?= $jumlahKendaraan ?></h3>
                <p>Kendaraan</p>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="income"></div>
            <div class="deskripsi">
                <h3><?= number_format($jumlahIncome)?></h3>
                <p>Total Income</p>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="instagram"></div>
            <div class="deskripsi-sosmed">
                <div class="deskripsi-1">
                    <h3>20K</h3>
                    <p>Followers</p>
                </div>
                <div class="deskripsi-1">
                    <h3>37</h3>
                    <p>Posts</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="xtwitter"></div>
            <div class="deskripsi-sosmed">
                <div class="deskripsi-1">
                    <h3>16K</h3>
                    <p>Followers</p>
                </div>
                <div class="deskripsi-1">
                    <h3>62</h3>
                    <p>Tweets</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="icon" id="facebook"></div>
            <div class="deskripsi-sosmed">
                <div class="deskripsi-1">
                    <h3>6K</h3>
                    <p>Friends</p>
                </div>
                <div class="deskripsi-1">
                    <h3>48</h3>
                    <p>Feeds</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>