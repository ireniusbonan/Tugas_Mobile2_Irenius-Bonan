<?php
require_once('../config/koneksi_db.php');
$myArray = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM produk WHERE id = ? ORDER BY id ASC");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }

        $stmt->close();
        $conn->close();
        echo json_encode($myArray);
    } else {
        echo json_encode(array('error' => 'Query execution failed.'));
    }
} else {
    echo json_encode(array('error' => 'No product ID provided.'));
}
?>
