<?php
include("../model/conn.php");

if (isset($_GET['file_id']) && isset($_GET['purpose'])) {
    if ($_GET['purpose'] == "delete") {
        $sql = "UPDATE files SET f_status='Deleted' WHERE file_id={$_GET['file_id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('File Deleted successfuly'); window.location.href = '../admin/view-efiles.php?user_id={$_GET['file_id']}';</script>";

        } else {
            echo "<script>alert('Error updating record:  {$conn->error}'); window.location.href = 'index.php';</script>";
        }
    }
}
