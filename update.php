<?php
require("koneksi.php");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $nama_asli_pemain = $_POST["nama_asli_pemain"];
    $film_yang_dimainkan = $_POST["film_yang_dimainkan"];
    $foto = $_POST["foto"];
    
    $perintah = "UPDATE tblmarvel SET nama = '$nama', deskripsi = '$deskripsi', nama_asli_pemain='$nama_asli_pemain', film_yang_dimainkan='$film_yang_dimainkan', foto='$foto' WHERE id='$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
 
echo json_encode($response);
mysqli_close($konek);