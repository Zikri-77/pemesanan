<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Paket Wisata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="container py-4">

  <h2>Form Pemesanan Paket Wisata</h2>
  <form action="simpan.php" method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>No. Telepon</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Jumlah Paket</label>
      <input type="number" id="jumlah_paket" name="jumlah_paket" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
      <label>Jenis Paket</label>
      <select id="jenis_paket" name="jenis_paket" class="form-select" required>
        <option value="">--Pilih Paket--</option>
        <option value="premium">Premium (Rp. 1.000.000)</option>
        <option value="standart">Standart (Rp. 750.000)</option>
        <option value="hemat">Hemat (Rp. 500.000)</option>
      </select>
    </div>

    <!-- Preview Total Bayar -->
    <div class="mb-3">
      <label>Total Bayar</label>
      <input type="text" id="total_bayar" class="form-control" readonly>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script>
// Harga paket
const hargaPaket = {
  premium: 1000000,
  standart: 750000,
  hemat: 500000
};

const jumlahInput = document.getElementById("jumlah_paket");
const paketSelect = document.getElementById("jenis_paket");
const totalBayarInput = document.getElementById("total_bayar");

// Fungsi hitung total
function hitungTotal() {
  const jumlah = parseInt(jumlahInput.value) || 0;
  const jenis = paketSelect.value;
  let total = 0;

  if (jenis && hargaPaket[jenis]) {
    total = jumlah * hargaPaket[jenis];
  }

  totalBayarInput.value = total > 0 ? "Rp " + total.toLocaleString("id-ID") : "";
}

// Event listener
jumlahInput.addEventListener("input", hitungTotal);
paketSelect.addEventListener("change", hitungTotal);
</script>
</body>
</html>
