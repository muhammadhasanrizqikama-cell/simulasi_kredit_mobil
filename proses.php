<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["submit"])) {
    header("Location: index.php");
    exit;
}

$nama = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$hargamobil = filter_input(INPUT_POST, "hargamobil", FILTER_VALIDATE_FLOAT);
$tenor = filter_input(INPUT_POST, "tenor", FILTER_VALIDATE_INT);
$dp = filter_input(INPUT_POST, "dp", FILTER_VALIDATE_INT);

$dataForm = [
    "nama" => $nama,
    "email" => $email,
    "hargamobil" => (string)($_POST["hargamobil"] ?? ""),
    "tenor" => (string)($_POST["tenor"] ?? ""),
    "dp" => (string)($_POST["dp"] ?? "")
];

function kembaliKeForm(string $pesan, array $data): void {
    $query = http_build_query(array_merge(["pesan" => $pesan], $data));
    header("Location: index.php?" . $query);
    exit;
}

if ($nama === "") {
    kembaliKeForm("Nama harus diisi.", $dataForm);
}
if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    kembaliKeForm("Masukkan email yang valid.", $dataForm);
}
if ($hargamobil === false || $hargamobil <= 0) {
    kembaliKeForm("Harga mobil harus lebih besar dari nol.", $dataForm);
}
if ($tenor === false || !in_array($tenor, [1, 2, 3, 4, 5], true)) {
    kembaliKeForm("Pilih tenor antara 1 sampai 5 tahun.", $dataForm);
}
if ($dp === false || !in_array($dp, [10, 20, 30, 40, 50], true)) {
    kembaliKeForm("Pilih persentase DP yang tersedia.", $dataForm);
}

$lamaangsuran = $tenor * 12;
$dpNominal = ($dp / 100) * $hargamobil;
$bunga = (20 / 100) * $hargamobil;
$totalangsuran = ($hargamobil + $bunga) - $dpNominal;
$hargaangsuran = $totalangsuran / $lamaangsuran;

function e($nilai): string {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, "UTF-8");
}
function rupiah(float $nilai): string {
    return "Rp" . number_format($nilai, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Simulasi Kredit Mobil</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #ffffff;
            color: #000000;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
       
        .accent, .muted { color: #000000; }

        .result-row {
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            padding: 5px 0;
            border: none;
        }
        .result-row span:first-child { color: #000000; }

        .result-row strong { font-weight: normal; text-align: left; overflow-wrap: anywhere; }
        
        .monthly {
            margin-top: 16px;
            padding: 0;
            background: #ffffff;
            border: none;
        }
    </style>
</head>
<body>
<main class="">
    <p class="">Hasil simulasi</p>
   

    <div class="result-row"><span>Nama</span><strong><?= e($nama) ?></strong></div>
    <div class="result-row"><span>Email</span><strong><?= e($email) ?></strong></div>
    <div class="result-row"><span>Harga mobil</span><strong><?= rupiah((float)$hargamobil) ?></strong></div>
    <div class="result-row"><span>Tenor</span><strong><?= e($tenor) ?> tahun</strong></div>
    <div class="result-row"><span>Lama angsuran</span><strong><?= e($lamaangsuran) ?> bulan</strong></div>
    <div class="result-row"><span>DP</span><strong><?= e($dp) ?>%</strong></div>
    <div class="result-row"><span>Nominal DP</span><strong><?= rupiah((float)$dpNominal) ?></strong></div>
    <div class="result-row"><span>Bunga (20% dari harga mobil)</span><strong><?= rupiah((float)$bunga) ?></strong></div>
    <div class="result-row"><span>Total yang diangsur</span><strong><?= rupiah((float)$totalangsuran) ?></strong></div>

    <div class="monthly">
        <p class="muted mb-1">Perkiraan angsuran per bulan</p>
        <div class="display-6 fw-bold accent"><?= rupiah((float)$hargaangsuran) ?></div>
    </div>

    <p class="muted small mt-3">Catatan: Ini simulasi sederhana dengan bunga tetap 20% dari harga mobil, bukan penawaran pembiayaan resmi.</p>
    <p><a href="index.php">Kembali ke Formulir</a></p>
</main>
</body>
</html>
