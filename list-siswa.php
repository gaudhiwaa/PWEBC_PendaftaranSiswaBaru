<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Siswa</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light">
  <header class="text-center">
    <h1 class="my-3">List Siswa yang Sudah Mendaftar</h1>
  </header>

  <div class="d-flex flex-column justify-content-center mx-5">

    <nav>
      <button type="button" class="btn btn-primary my-2">
        <a href="form-daftar.php" class="text-light text-decoration-none">Tambah Siswa</a>
      </button>
    </nav>

    <?php if(isset($_GET['status'])): ?>
      <div>
        <?php 
          if($_GET['status'] == 'sukses') {
            echo "<p class='fw-bold fs-3 text-success'>Perubahan berhasil!</p>";
          } else {
            echo "<p class='fw-bold fs-3 text-danger'>Perubahan gagal!</p>";
          }
          ?>
      </div>
    <?php endif; ?>

    <table style="border: 1px solid white;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Sekolah Asal</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
          $sql = "SELECT * FROM calon_siswa";
          $query = mysqli_query($db, $sql);
          $count = 1;

          while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>" . $count++ . "</td>";
            // echo "<td>" . $siswa['id'] . "</td>";
            echo "<td>" . $siswa['nama'] . "</td>";
            echo "<td>" . $siswa['alamat'] . "</td>";
            echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
            echo "<td>" . $siswa['agama'] . "</td>";
            echo "<td>" . $siswa['sekolah_asal'] . "</td>";

            echo "<td>";
            echo "<div class='btn-group' role='group'>";
            echo "<button type='button' class='btn btn-warning'><a href='form-edit.php?id=".$siswa['id']."' class='text-dark text-decoration-none'>Edit</a></button>";
            echo "<button type='button' class='btn btn-danger'><a onClick=\"javascript: return confirm('Hapus data ini?');\" href='hapus.php?id=".$siswa['id']."' class='text-light text-decoration-none'>Hapus</a></button>";
            echo "</div>";
            echo "</td>";

            echo "</tr>";
          }

        ?>
      </tbody>
    </table>

    <h5 class="fw-bold mt-3">Total jumlah siswa: <?= mysqli_num_rows($query); ?> siswa</h5>

    <div>
      <button type="button" class="btn btn-info my-2">
        <a href="index.php" class="text-dark text-decoration-none">Kembali Ke Menu Utama</a>
      </button>
    </div>

  </div>

  <!-- CDN Bootstrap JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</body>
</html>