<?php
$pesan = $_GET["pesan"] ?? "";
$nilai_nama = $_GET["nama"] ?? "";
$nilai_email = $_GET["email"] ?? "";
$nilai_hargamobil = $_GET["hargamobil"] ?? "";
$nilai_tenor = $_GET["tenor"] ?? "";
$nilai_dp = $_GET["dp"] ?? "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredit Mobil BMW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg: #080d18;
            --panel: #101a2b;
            --panel2: #14243b;
            --blue: #168cff;
            --blue-light: #65b5ff;
            --text: #f3f7ff;
            --muted: #a9b8ce;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            padding-top: 76px;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }
        .navbar {
            background: rgba(5, 10, 20, .96);
            border-bottom: 1px solid rgba(22, 140, 255, .35);
            box-shadow: 0 5px 24px rgba(0, 0, 0, .25);
        }
        .navbar-brand { letter-spacing: 3px; }
        .navbar-brand span { color: var(--blue-light); }
        .navbar-toggler { border-color: #398fe5; }
        .offcanvas { background: #0b1424; color: var(--text); }
        .nav-link { color: #d7e7fa; }
        .nav-link:hover, .nav-link.active { color: var(--blue-light) !important; }
        .carousel-item img {
            height: min(68vh, 600px);
            min-height: 300px;
            object-fit: cover;
            filter: brightness(.58);
        }
        .carousel-caption {
            bottom: 18%;
            text-shadow: 0 2px 12px #000;
        }
        .carousel-caption h2 {
            font-size: clamp(1.8rem, 4vw, 3.3rem);
            font-weight: 800;
        }
        .accent { color: var(--blue-light); }
        .section-card {
            background: linear-gradient(145deg, var(--panel), #0c1422);
            border: 1px solid rgba(75, 155, 255, .22);
            border-radius: 18px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, .2);
        }
        .section-title { font-weight: 800; }
        .about-img {
            width: 100%;
            min-height: 260px;
            max-height: 360px;
            object-fit: cover;
            border-radius: 14px;
        }
        .form-control, .form-select {
            background-color: #0a1322;
            border: 1px solid #2a4261;
            color: var(--text);
            min-height: 45px;
        }
        .form-control:focus, .form-select:focus {
            background-color: #0a1322;
            color: white;
            border-color: var(--blue);
            box-shadow: 0 0 0 .2rem rgba(22, 140, 255, .2);
        }
        .form-control::placeholder { color: #8396b0; }
        .form-select option { background: #101a2b; }
        .form-check-input { background-color: #0a1322; border-color: #5e789b; }
        .form-check-input:checked { background-color: var(--blue); border-color: var(--blue); }
        .tenor-option {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            margin: 4px 5px 4px 0;
            border: 1px solid #2a4261;
            border-radius: 10px;
            background: #0a1322;
        }
        .btn-blue {
            background: var(--blue);
            color: white;
            border: 1px solid var(--blue);
            font-weight: 700;
            padding: 11px 22px;
        }
        .btn-blue:hover { background: #0875d5; color: white; }
        .alert-info {
            background: #102c49;
            color: #cfe8ff;
            border-color: #245d91;
        }
        footer {
            background: #050a13;
            border-top: 1px solid rgba(22, 140, 255, .4);
        }
        .small-muted { color: var(--muted); }
        section { scroll-margin-top: 90px; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#beranda">SIMULASI <span>KREDIT</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#menu" aria-controls="menu" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="menu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu Layanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kalkulator">Kalkulator Kredit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<header id="beranda" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#beranda" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#beranda" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#beranda" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="asset/OIP (2).jpg" class="d-block w-100" alt="Mobil BMW">
            <div class="carousel-caption d-none d-md-block">
                <p class="text-uppercase accent fw-bold">Drive your ambition</p>
                <h2>Kredit Mobil <span class="accent">Terpercaya</span></h2>
                <p>Wujudkan mobil impian Anda disini</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="asset/OIP (3).jpg" class="d-block w-100" alt="Pilihan mobil BMW">
            <div class="carousel-caption d-none d-md-block">
                <h2>Mobil Impian Anda <span class="accent">Ada di Sini</span></h2>
                <p>Pilih tenor sesuai kebutuhan Anda.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="asset/OIP (4).jpg" class="d-block w-100" alt="Mobil untuk perjalanan">
            <div class="carousel-caption d-none d-md-block">
                <h2>Hitung Kredit <span class="accent">Sekarang</span></h2>
                <p>Perkirakan angsuran bulanan Anda dengan kalkulator kredit.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#beranda" data-bs-slide="prev" aria-label="Sebelumnya">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#beranda" data-bs-slide="next" aria-label="Berikutnya">
        <span class="carousel-control-next-icon"></span>
    </button>
</header>

<main class="container py-5">
    <section id="tentang" class="row align-items-center g-4 mb-5">
        <div class="col-lg-6">
            <div class="section-card p-4 p-md-5 h-100">
                <p class="accent fw-bold text-uppercase mb-2">Tentang kami</p>
                <h2 class="section-title mb-3">Solusi Kredit <span class="accent">Mobil Anda</span></h2>
                <p class="small-muted mb-0">Kami menyediakan informasi simulasi Kredit Mobil untuk membantu Anda memperkirakan uang muka, bunga, dan angsuran bulanan. Pilih tenor yang sesuai dengan rencana Anda.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="asset/OIP (1).jpg" class="about-img" alt="Tentang layanan kredit mobil">
        </div>
    </section>

    <section id="kalkulator" class="section-card p-4 p-md-5">
        <div class="mb-4">
            <p class="accent fw-bold text-uppercase mb-2">Simulasi pembiayaan</p>
            <h2 class="section-title">Kalkulator Kredit Mobil</h2>
            <p class="small-muted mb-0">Isi data berikut untuk menghitung perkiraan angsuran.</p>
        </div>

        <?php if ($pesan !== ""): ?>
            <div class="alert alert-info" role="alert"><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></div>
        <?php endif; ?>

        <form action="proses.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama lengkap</label>
                    <input id="nama" type="text" name="nama" class="form-control"
                        value="<?= htmlspecialchars($nilai_nama, ENT_QUOTES, "UTF-8") ?>" required>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control"
                        value="<?= htmlspecialchars($nilai_email, ENT_QUOTES, "UTF-8") ?>" required>
                </div>
                <br>
                <div class="col-12">
                    <label for="hargamobil" class="form-label">Harga mobil (Rp)</label>
                    <input id="hargamobil" type="number" name="hargamobil" class="form-control"
                        min="1" step="1" placeholder="Contoh: 500000000"
                        value="<?= htmlspecialchars($nilai_hargamobil, ENT_QUOTES, "UTF-8") ?>" required>
                </div>
                <br>
                <div class="col-12">
                    <label class="form-label d-block">Tenor angsuran</label>
                    <?php foreach ([1, 2, 3, 4, 5] as $tahun): ?>
                        <label class="tenor-option">
                            <input class="form-check-input mt-0" type="radio" name="tenor"
                                value="<?= $tahun ?>" <?= (string)$nilai_tenor === (string)$tahun ? "checked" : "" ?> required>
                            <span><?= $tahun ?> Tahun</span>
                        </label>
                    <?php endforeach; ?>
                </div>
                <div class="col-12">
                    <label for="dp" class="form-label">Uang muka (DP)</label>
                    <select id="dp" name="dp" class="form-select" required>
                        <option value="">Pilih persentase DP</option>
                        <?php foreach ([10, 20, 30, 40, 50] as $persen): ?>
                            <option value="<?= $persen ?>" <?= (string)$nilai_dp === (string)$persen ? "selected" : "" ?>>
                                <?= $persen ?>%
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" value="1" class="btn btn-blue">Hitung Angsuran &rarr;</button>
                </div>
            </div>
        </form>
    </section>
</main>

<footer id="kontak" class="text-center py-4 mt-4">
    <div class="container">
        <h4 class="fw-bold">SIMULASI<span class="accent">KREDIT</span></h4>
        <p class="small-muted mb-1">Solusi simulasi kredit mobil Anda.</p>
        <p class="small-muted mb-0">Email: muhammadhasanrizqikama@gmail.com</p>
        <p class="small-muted mb-0">Hubungi: +62-858-0468-2798</p>
        <p class="small-muted small mt-3 mb-0">&copy; <?= date("Y") ?> Simulasi Kredit Mobil</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
