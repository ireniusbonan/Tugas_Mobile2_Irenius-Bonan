<?php
require_once('../config/koneksi_db.php');

$data = json_decode(file_get_contents("php://input"));

if ($data->id != null) {
    $id             = $data->id;
    $nama_produk    = $data->nama_produk;
    $harga          = $data->harga;
    $tipe_produk    = $data->tipe_produk;
    $stok           = $data->stok;

    // Prepare the SQL query
    $sql = $conn->prepare("UPDATE produk SET nama_produk=?, tipe_produk=?, harga=?, stok=? WHERE id=?");

    // Check if the prepare was successful
    if ($sql === false) {
        echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => $conn->error));
    } else {
        // Bind parameters and execute the query
        $sql->bind_param('ssddd', $nama_produk, $tipe_produk, $harga, $stok, $id);

        // Check if the execution was successful
        if ($sql->execute()) {
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        } else {
            echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => $conn->error));
        }
    }
} else {
    echo "GAGAL"; // If the 'id' parameter is not provided in the JSON data
}
?>
