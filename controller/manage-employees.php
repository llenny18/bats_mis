<?php
include("../model/conn.php");

if (isset($_GET['employee_id']) && isset($_GET['purpose'])) {
    if ($_GET['purpose'] == "delete") {
        $sql = "UPDATE employeedetails SET e_status='Deleted' WHERE employee_id={$_GET['employee_id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Account Deleted successfuly'); window.location.href = '../admin/users.php';</script>";

        } else {
            echo "<script>alert('Error updating record:  {$conn->error}'); window.location.href = 'index.php';</script>";
        }
    }
    else if ($_GET['purpose'] == "activate") {
        $sql = "UPDATE employeedetails SET e_status='Active' WHERE employee_id={$_GET['employee_id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Account Activated successfuly'); window.location.href = '../admin/users.php';</script>";

        } else {
            echo "<script>alert('Error updating record:  {$conn->error}'); window.location.href = 'index.php';</script>";
        }
    }
}
