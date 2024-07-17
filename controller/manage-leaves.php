<?php
include("../model/conn.php");

if (isset($_GET['leave_id']) && isset($_GET['purpose'])) {
    if ($_GET['purpose'] == "approve") {
        $sql = "UPDATE leavemanagement SET status='approved' WHERE leave_id={$_GET['leave_id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Leave Approved successfuly'); window.location.href = '../admin/leaves.php';</script>";

        } else {
            echo "<script>alert('Error updating record:  {$conn->error}'); window.location.href = 'index.php';</script>";
        }
    }
    else if ($_GET['purpose'] == "decline") {
        $sql = "UPDATE leavemanagement SET status='declined' WHERE leave_id={$_GET['leave_id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Leave Declined successfuly'); window.location.href = '../admin/leaves.php';</script>";

        } else {
            echo "<script>alert('Error updating record:  {$conn->error}'); window.location.href = 'index.php';</script>";
        }
    }
}
