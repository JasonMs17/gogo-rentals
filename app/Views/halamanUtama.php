<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css -->
<link rel="stylesheet" href="css/style.css">

<!-- body -->
<section class="hero">
    <div class="hero-wrapper">
        <h1>Solusi Perjalanan <br> yang <span class="color">Mudah</span> dan <br> <span class="color">Terpercaya</span></h1>
        <a href=<?= base_url('/browse');?>>Reserve Now</a>
    </div>

</section>

<div class="banner">
    <div class="icon-container">
        <span class="icon"><img src="Src/Icon/check.svg" alt="Password Icon"></span> Pilihan Kendaraan Luas
    </div>
    <div class="icon-container">
        <span class="icon"><img src="Src/Icon/check.svg" alt="Password Icon"></span> Kemudahan Pesanan
    </div>

    <div class="icon-container">
        <span class="icon"><img src="Src/Icon/check.svg" alt="Password Icon"></span> Harga Terjangkau
    </div>

    <div class="icon-container">
        <span class="icon"><img src="Src/Icon/check.svg" alt="Password Icon"></span> Pemeliharaan    Rutin
    </div>
</div>

<section class="recommendation">
    <h1>EXPLORE YOUR <br> DREAM CAR</h1>
    <div class="kotak">
        <a href="/browse#FamilyCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="family-car"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Family Car</h3>
                    <p>Pilihan ideal untuk memenuhi kebutuhan mobilitas sehari-hari keluarga Anda. Dirancang dengan perhatian khusus pada kenyamanan, keamanan, dan fungsionalitas, mobil keluarga menyediakan ruang yang luas dan fitur-fitur yang membuat perjalanan bersama anggota keluarga menjadi pengalaman yang menyenangkan.</p>
                </div>
            </div>
        </a>
        <a href="/browse#SedanCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="sedan"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Sedan Car</h3>
                    <p>Dengan desainnya yang elegan dan performa yang lincah, menawarkan kombinasi harmonis antara gaya dan fungsionalitas. Dengan bentuk bodi yang ramping dan garis desain yang aerodinamis, sedan memancarkan kesan keanggunan dan kemewahan.</p>
                </div>
            </div>
        </a>
        <a href="/browse#PickupCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="pickup-car"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Pickup Car</h3>
                    <p>Dengan kekokohan dan keandalannya, menawarkan kombinasi sempurna antara gaya hidup aktif dan kebutuhan beban. Desain tangguh dan fungsionalitas yang luar biasa menjadikan pickup sebagai pilihan yang ideal untuk berbagai keperluan, mulai dari petualangan di alam terbuka hingga tugas-tugas berat.</p>
                </div>
            </div>
        </a>
        <a href="/browse#ElectricCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="electric-car"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Electric Car</h3>
                    <p>Sebagai simbol inovasi ramah lingkungan di industri otomotif, membawa revolusi baru dalam cara kita memandang transportasi. Ditenagai sepenuhnya oleh listrik, mobil ini menggabungkan performa canggih dengan kesadaran lingkungan, menciptakan pengalaman berkendara yang bersih, efisien, dan berkelanjutan</p>
                </div>
            </div>
        </a>
        <a href="/browse#HatchbackCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="hatchback-car"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Hatchback Car</h3>
                    <p>Dengan desainnya yang kompak dan serbaguna, menawarkan kombinasi antara gaya urban dan kepraktisan. Dikenal dengan bentuk bodi yang pendek dan pintu belakang yang dapat dibuka ke atas, hatchback memberikan tampilan yang segar dan kecepatan yang responsif.</p>
                </div>
            </div>
        </a>
        <a href="/browse#ConvertibleCar">
            <div class="rekomendasi-kendaraan">
                <div class="gambar-kendaraan" id="convertible-car"></div>
                <div class="deskripsi-kendaraan">
                    <h3>Convertible Car</h3>
                    <p>Dengan kemampuannya untuk menyajikan pengalaman berkendara yang bebas dan terbuka, menghadirkan kebebasan dan gaya dalam satu paket. Dikenal dengan atap yang dapat dilipat atau dihilangkan sepenuhnya, convertible memberikan sensasi berkendara yang membebaskan dan menyenangkan.</p>
                </div>
            </div>
        </a>
    </div>
</section>
<?= $this->endSection(); ?>