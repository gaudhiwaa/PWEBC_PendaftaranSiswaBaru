<?php 

  include('config.php');

  if(!isset($_GET['id']) ){
    header('Location: list-siswa.php');
  }

  $id = $_GET['id'];

  $sql = "SELECT * FROM calon_siswa WHERE id=$id";
  $query = mysqli_query($db, $sql);
  $siswa = mysqli_fetch_assoc($query);

  if( mysqli_num_rows($query) < 1 ){
    die("Data tidak ditemukan");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Edit Siswa</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light">
  <header>
    <h1 class="text-center my-3">Formulir Edit Siswa</h1>
  </header>

  <form action="proses-edit.php" method="POST" class="d-flex justify-content-center mt-5">
    <fieldset class="p-4 border border-3 border-secondary rounded">

      <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

      <div class="my-3">
          <label for="nama">Nama: </label>
          <input type="text" name="nama" placeholder="Nama Lengkap" class="bg-dark text-light" value="<?php echo $siswa['nama'] ?>" />
      </div>
      <div class="my-3">
          <label for="alamat">Alamat: </label>
          <textarea name="alamat" class="bg-dark text-light"><?php echo $siswa['alamat'] ?></textarea>
      </div>
      <div class="my-3">
          <label for="jenis_kelamin">Jenis Kelamin: </label>
          <?php $jk = $siswa['jenis_kelamin']; ?>
          <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jk == 'Laki-laki') ? "checked": "" ?>> Laki-laki</label>
          <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
      </div>
      <div class="my-3">
          <label for="agama">Agama: </label>
          <?php $agama = $siswa['agama']; ?>
          <select name="agama" class="bg-dark text-light">
              <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
              <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
              <option <?php echo ($agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
              <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
              <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
            </select>
      </div>
      <div class="my-3">
          <label for="sekolah_asal">Sekolah Asal: </label>
          <input type="text" name="sekolah_asal" placeholder="Nama Sekolah" class="bg-dark text-light" value="<?php echo $siswa['sekolah_asal'] ?>" />
      </div>
      <div class="d-flex justify-content-center">
        <input type="submit" value="Simpan" name="simpan" class="mt-3 bg-warning text-dark" />
      </div>
    </fieldset>
  </form>

  <!-- CDN Bootstrap JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</body>
</html>