<?php

function hitung($lama, $tarif)
{
  return $lama * $tarif;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarif Parkir</title>
</head>

<body>
  <form action="" method="get">
    <li>
      <label for="no_polisi">No Polisi: </label>
      <input type="text" name="no_polisi" id="no_polisi" required>
    </li>
    <li>
      <label for="lama_parkir">Lama Parkir: </label>
      <input type="number" name="lama_parkir" id="lama_parkir" required>
    </li>
    <li>
      <label for="tarif">Tarif / Jam: </label>
      <input type="number" name="tarif" id="tarif" required>
    </li>
    <li><button name="submit">Hitung</button></li>
  </form>
  
  <?php
  if (isset($_GET['submit'])) {
    $hasil = hitung($_GET['lama_parkir'], $_GET['tarif']);
    echo 'Kendaraan dengan No. Polisi ' . $_GET['no_polisi'] . ' dikenakan tarif parkir ' . $hasil;
  }
  ?>
</body>

</html>