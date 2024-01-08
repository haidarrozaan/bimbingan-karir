<?php 
session_name('id_dokter');
session_start();

include('koneksi.php');

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id_dokter = $_SESSION['id_dokter'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $status = $_POST['status'];
}
    $updateQuery = "UPDATE jadwal_periksa SET status = 'Tidak Aktif' WHERE id_dokter = '$id_dokter' AND status = 'Aktif'";
    $koneksi->query($updateQuery);

    $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai, status) VALUES ('$id_dokter', '$hari', '$jam_mulai', '$jam_selesai', '$status')";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // ...
        $status = $_POST['status'];
    
        // Pastikan id_dokter yang dipost sama dengan id_dokter dari sesi
        if ($id_dokter_posted == $id_dokter) {
            // Simpan ke database (sesuaikan dengan logika aplikasi Anda)
            $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai, status) VALUES ('$id_dokter', '$hari', '$jam_mulai', '$jam_selesai', '$status')";
            // Eksekusi query
            $result = $mysqli->query($query);
    }
}else{
    $pesan = "ID Dokter tidak valid.";
}
$koneksi->close();
?>