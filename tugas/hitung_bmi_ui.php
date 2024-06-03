<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hasil Hitung BMI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <form action="#" method="post" >
    Nama :<input type="text" name="Nama" id="Nama"> <br>
    BeratBadan: <input type="number" name="BeratBadan" id="BeratBadan"><br>
    TinggiBadan : <input type="number" name="TinggiBadan" id="TinggiBadan"><br>
    <input type="submit" value="Hitung"> <br>
    <?php

if (isset($_POST['Nama']) && isset($_POST['BeratBadan']) && isset($_POST['TinggiBadan'])) {
  $nama = $_POST['Nama'];
  $berat = $_POST['BeratBadan'];
  $tinggi = $_POST['TinggiBadan'];

  $nilai_bmi = $berat / ($tinggi * $tinggi);

  function get_grade($bmi)
  {
    if ($bmi > 30.0) {
      return "Obesitas";
    } else if ($bmi > 25.0) {
      return "Kegemukan";
    } else if ($bmi > 18.5) {
      return "Normal";
    } else {
      return "Kurus";
    }
  }

  $status_bmi = get_grade($nilai_bmi);
}

 ?>
</form>
</body>
</html>