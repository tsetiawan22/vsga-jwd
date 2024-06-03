<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Akhir Vgsa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    .container {
            max-width: 800px; 
            margin: 0 auto;
            padding: 15px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        body {
            font-family: 'Times new roman', sans-serif; 
        }

        img {
            width: 100px;
            height: 90px;
        }

        h1 {
            font-family: 'Times', serif;
        }

        h4 {
            font-family: 'Times', serif;
            text-align: center;
            background-color: #70c0d7;
        }

        ::placeholder {
            font-size: 14px;
        }

    </style>
    

</head>
<body>
<nav class="navbar">  
        <div class="container" style="background-color:white">
            <h1 class="navbar-brand" style="font-size:40px">
                <img src="img/LOGO-UBL.png" class="d-inline-block align-text-bot">
                Tugas Akhir VSGA G5 - JWD C
            </h1>
        </div>
    </nav>

    <?php
    // Array untuk jenis kelamin, agama, jurusan, dan mata kuliah
    $dJKelamin = array("Laki-Laki", "Perempuan");
    $dAgama = array("Islam", "Hindu", "Buddha", "Kristen", "Konghucu");
    $daftarprodi = array("Sistem Informasi", "Pendidikan Bahasa Ingris", "Ilmu Komunikasi", "Ilmu hukum, Teknik Mesin", "Teknik Arsitektur", "Informatika", "Teknik Sipil", "Management", "Adminitrasi Public","Adminitrasi Bisnis");
    $dMatKul = array("Basis Data", "Pemrograman", "Bahasa Indonesia", "Personal Development", "Arsitektur Ti", "Pengantar Desain Sistem", "Pancasila", "Matematika dasar", "Pengantar Ti", "Data Mining", "Sistem Operasi", "Forensik ti", "Sistem Pennjang Keputusan", );
    
    $fileDatamhs = "data/data_mahasiswa.json";
    $isiDataMahasiswa = file_get_contents($fileDatamhs);
    $daftarmhs = array();
    $daftarmhs = json_decode($isiDataMahasiswa, true);

    if(isset($_POST['btnSimpan'])) { 
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $jurusan = $_POST['jurusan'];
        $mataKuliah = $_POST['mataKuliah'];
        $nilai = $_POST['nilai'];
        $nilaiMutu = hitungNilai($nilai);
        $lulus = indikatorkelulusan($nilai);
    
        $dataMahasiswa = array(
            "npm" => $npm,
            "nama" => $nama,
            "jenisKelamin" => $jenisKelamin,
            "jurusan" => $jurusan,
            "mataKuliah" => $mataKuliah,
            "nilai" => $nilai,
            "nilaiMutu" => $nilaiMutu,
            "lulus" => $lulus
        );

        array_push($daftarmhs, $dataMahasiswa);
        $datatulisfile = json_encode($daftarmhs, JSON_PRETTY_PRINT);
        file_put_contents($fileDatamhs, $datatulisfile);
    }
    function hitungNilai($nilai) {
        if ($nilai >= 90 ) {
            return "A";
        }else if($nilai >= 80 ) {
            return "B";
        }else if($nilai >= 70 ) {
            return "C";
        }else if($nilai >= 60 ) {
            return "D";
        }else {
            return "E" ;
        }
    }

    function indikatorkelulusan($nilai) {
        if ($nilai >= 71 ) {
            return "Lulus";
        }else {
            return "Tidak Lulus";
        }
    }
?>


        <h4>Form Mahasiswa</h4>
        <form action="#" method="post" class="row g-3">
            <div class="col-md-5">
                <label for="npm" class="form-label">NPM <br></label>
                <input type="number" name="npm" id="npm" class="form-control"  required>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="alamat" class="form-label">Alamat <br></label>
                <input type="text" name="alamat" id="alamat" class="form-control"  required>
            </div>
            <div class="col-md-5">
                <label for="nama" class="form-label">Nama <br></label>
                <input type="text" name="nama" id="nama" class="form-control"  required>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="nomorTelpon" class="form-label">Nomor Telpon <br> </label>
                <input type="integer" name="nomorTelpon" id="nomorTelpon" class="form-control"  required>
            </div>
            <div class="col-md-5">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin <br> </label>
                <select name="jenisKelamin" id="jenisKelamin" class="form-select" required>
                    <?php
                    foreach($dJKelamin as $djk) {
                        echo "<option value='$djk'> $djk </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="email" class="form-label">Email <br> </label>
                <input type="text" name="email" id="email" class="form-control"  required>
            </div>

            <div class="col-md-5">
                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempatLahir" id="tempatLahir" class="form-control" required>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="jurusan" class="form-label">Jurusan <br></label>
                 <select name="jurusan" id="jurusan" class="form-select"  required>
                    <?php
                    foreach($daftarprodi as $dafpro) {
                        echo "<option value='$dafpro'> $dafpro </option>";
                    }
                    ?>
                </select>

            </div>
            <div class="col-md-5">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir <br></label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control" required>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="mataKuliah" class="form-label">Mata Kuliah <br></label>
                <select name="mataKuliah" id="mataKuliah" class="form-select" >
                    <?php
                    foreach($dMatKul as $dafmk) {
                        echo "<option value='$dafmk'> $dafmk </option>";
                    }
                    ?>
                </select>
                </div>

                <div class="col-md-5">
                <label for="agama" class="form-label">Agama <br></label>
                <select name="agama" id="agama" class="form-select" required>
                    <?php
                    foreach($dAgama as $dafa) {
                        echo "<option value='$dafa'> $dafa </option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-5">
                <label for="nilai" class="form-label">Nilai <br></label>
                <input type="text" name="nilai" id="nilai" class="form-control"  required>
            </div>

            <div class="mb-3">
                    <button type="submit" class="col-md-3 btn btn-primary float-right" name="btnSimpan" id="btnSimpan">Simpan</button>
                </div>

                </form>
        </div>
        <br>
        <div class="container">
            <h4 style="margin-top: 30px;">Daftar Mahasiswa</h4>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <td>NPM</td>
                        <td>Nama</td>
                        <td>Jenis Kelamin</td>
                        <td>Jurusan</td>
                        <td>Mata Kuliah</td>
                        <td>Nilai</td>
                        <td>NH</td>
                        <td>KET</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($daftarmhs as $mahasiswa) {
                        echo "<tr>";
                        echo "<td>". $mahasiswa['npm']. "</td>";
                        echo "<td>". $mahasiswa['nama']. "</td>";
                        echo "<td>". $mahasiswa['jenisKelamin']. "</td>";
                        echo "<td>". $mahasiswa['jurusan']. "</td>";
                        echo "<td>". $mahasiswa['mataKuliah']. "</td>";
                        echo "<td>". $mahasiswa['nilai']. "</td>";
                        echo "<td>". $mahasiswa['nilaiMutu']. "</td>";
                        echo "<td>". $mahasiswa['lulus']. "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
        <script src="js/bootstrap.js"></script>



</body>
</html>
