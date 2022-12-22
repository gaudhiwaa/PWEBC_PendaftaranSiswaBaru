<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Siswa</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light d-flex flex-column align-items-center">
  <div class="row" style="height: 100vh">
    <div class="col d-flex flex-column justify-content-center align-items-center mb-5">

      <header>
        <h1>Pendaftaran Siswa Baru</h1>
      </header>

      <h3 class="mb-4">Menu</h3>
      <nav class="d-flex justify-content-center">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary"><a href="form-daftar.php" class="text-light text-decoration-none">Daftar Baru</a></button>
          <button type="button" class="btn btn-primary"><a href="list-siswa.php" class="text-light text-decoration-none">Pendaftar</a></button>
        </div>
      </nav>

      <?php if(isset($_GET['status'])): ?>
        <div>
          <?php 
            if($_GET['status'] == 'sukses') {
              echo "<p class='fw-bold fs-3 text-success'>Pendaftaran berhasil!</p>";
            } else {
              echo "<p class='fw-bold fs-3 text-danger'>Pendaftaran gagal!</p>";
            }
            ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- cdn Bootstrap js -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</body>
</html>