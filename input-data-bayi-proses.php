<?php
    include('koneksi.php')

    $nama_bayi = $_POST['nama_bayi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $bb_lahir = $_POST['bb_lahir'];
    $tb_lahir = $_POST['tb_lahir'];
    $nama_ortu = $_POST['nama_ortu'];

    $query = mysqli_query($koneksi, "INSERT INTO data_bayi SET
        nama_bayi = '$nama_bayi',
        jenis_kelamin = '$jenis_kelamin',
        tanggal_lahir = '$tanggal_lahir',
        bb_lahir = '$bb_lahir',
        tb_lahir = '$tb_lahir',
        nama_ortu = '$nama_ortu',
    ");

    if($query)
    {
        echo "Data Berhasil Disimpan";
        echo "<meta http-equiv='refresh' content='2; url=data-bayi.php'>";
    }
    else
    {
        echo "Data Gagal Tersimpan";
        mysqli_error($query);
    }
?>