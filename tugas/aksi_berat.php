<?php
$nama=$_POST['Nama'];
echo"$nama <br>";
$berat=$_POST['BeratBadan'];
$tinggi=$_POST['TinggiBadan'];

$bmi=$berat/($tinggi*$tinggi);
echo "Nilai Bmi Anda Adalah : ","$bmi <br>";

menentukan_status($bmi);
function menentukan_status($stat) {
    if ($stat>=30.0) {
        echo "status bmi anda :","Obesitas";
    }elseif ($stat>= 25.0) {
        echo "status bmi anda :","Kegemukan";
    }elseif ($stat>= 18.5) {
        echo "status bmi anda :","normal";
    }else {
        echo "status bmi anda :","Kurus";
    }



}
?>
